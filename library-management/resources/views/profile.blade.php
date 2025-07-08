<style>

/* Container */
.container {
    max-width: 64rem;
    /* Equivalent to max-w-4xl */
    margin-left: auto;
    margin-right: auto;
    padding: 1rem;
}

/* Profile Header */
.profile-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding-bottom: 1rem;
    margin-bottom: 1rem;
    border-bottom: 1px solid #e5e7eb;
}

.profile-img {
    width: 5rem;
    height: 5rem;
    border-radius: 50%;
    border: 1px solid #e5e7eb;
    object-fit: cover;
}

.profile-name {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
}

.profile-id {
    color: #4b5563;
}

/* Profile Info */
.profile-info {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.info-title {
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
}

.profile-info p {
    margin-bottom: 0.25rem;
}

.profile-info strong {
    font-weight: 600;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 1rem;
}

button {
    padding: 0.5rem 1rem;
    color: white;
    border-radius: 0.375rem;
    border: none;
    cursor: pointer;
    font-weight: 500;
}

.btn-edit {
    background-color: #3b82f6;
}

.btn-edit:hover {
    background-color: #2563eb;
}

.btn-password {
    background-color: #facc15;
}

.btn-password:hover {
    background-color: #eab308;
}

.btn-history {
    background-color: #6c757d;
}

.btn-history:hover {
    background-color: #495057;
}
  .modal {
    position: fixed;
    z-index: 1000;
    left: 0; top: 0;
    width: 100%; height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5); /* overlay */
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .modal form {
    background: white;
    padding: 20px;
    border-radius: 8px;
    min-width: 300px;
  }

/* Responsive design */
@media (min-width: 768px) {
    .profile-info {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>

<div class="container">
  <!-- Profile Header -->
  <div class="profile-header">
    <img src="{{ $user->photo  }}" alt="Profile Picture" class="profile-img" />
    <div>
      <h2 class="profile-name">{{ $user->name }}</h2>
      <p class="profile-id">{{ $user->profession }} | Member ID: {{ $user->member_id }}</p>
    </div>
  </div>

  <!-- Profile Info -->
  <div class="profile-info">
    <div>
      <h3 class="info-title">Contact Info</h3>
      <p><strong>Email:</strong> {{ $user->email }}</p>
      <p><strong>Phone:</strong> {{ $user->phone }}</p>
      <p><strong>Address:</strong> {{ $user->address }}</p>
    </div>
    <div>
      <h3 class="info-title">Library Stats</h3>
      <p><strong>Borrowed:</strong> books</p>
      <p><strong>Overdue:</strong>book</p>
      <p><strong>Reserved:</strong>  books</p>
      <p><strong>Total History:</strong>  books</p>
    </div>
  </div>
</div>



    <!-- Action Buttons -->
    <div class="action-buttons">
      <button class="btn-edit">Edit Profile</button>
      <button class="btn-password">Change Password</button>
      <button class="btn-history">View History</button>
    </div>


<!-- Password Modal -->
<div id="passwordModal" class="modal" style="display:none;">
    <form id="changePasswordForm">
        @csrf
        <div>
          <label for="current_password">Current Password</label>
          <input type="password" name="current_password" required>
        </div>
        <div>
          <label for="new_password">New Password</label>
          <input type="password" name="new_password" required>
        </div>
        <div>
          <label for="confirm_password">Confirm Password</label>
          <input type="password" name="new_password_confirmation" required>
        </div>
        <button type="submit">Update Password</button>
        <button type="button" class="close-modal">Cancel</button>
      </form>

</div>

  </div>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>




    $(document).ready(function () {
      // Open modal
      $('.btn-password').on('click', function () {
        $('#passwordModal').fadeIn();
      });

      // Close modal
      $('.close-modal').on('click', function () {
        $('#passwordModal').fadeOut();
      });

      // Submit change password via AJAX
      $('#changePasswordForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submit

        $.ajax({
          url: '/change-password',
          method: 'POST',
          data: $(this).serialize(),
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          success: function (response) {
            alert('Password updated successfully!');
            $('#passwordModal').fadeOut();
            $('#changePasswordForm')[0].reset();
          },
          error: function (xhr) {
            if (xhr.status === 422) {
              let errors = xhr.responseJSON.errors;
              let msg = '';
              for (let field in errors) {
                msg += errors[field][0] + '\n';
              }
              alert(msg);
            } else {
              alert('Something went wrong.');
            }
          }
        });
      });

      // Optional: Close modal on click outside
      $(window).on('click', function (e) {
        if ($(e.target).is('#passwordModal')) {
          $('#passwordModal').fadeOut();
        }
      });
    });
  </script>

