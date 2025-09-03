@extends('app')
@section('content')
@include('layouts.header')
<style>/* ========== USER PROFILE PAGE ========== */
.user-profile-page {
  background: #f8fafc;
  padding: 30px 20px;
  min-height: 100vh;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.user-profile-container {
  max-width: 900px;
  margin: 0 auto;
  background: #fff;
  border-radius: 16px;
  padding: 30px;
  box-shadow: 0 6px 16px rgba(0,0,0,0.08);
}

/* ---------- Header (avatar + name) ---------- */
.user-profile-header {
  display: flex;
  align-items: center;
  gap: 20px;
  border-bottom: 1px solid #e5e7eb;
  padding-bottom: 20px;
  margin-bottom: 25px;
}

.user-profile-img {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid #1e3a8a;
}

.user-profile-name {
  font-size: 1.8rem;
  font-weight: 600;
  color: #1e293b;
  margin: 0;
}

.user-profile-id {
  font-size: 0.95rem;
  color: #64748b;
}

/* ---------- Profile Info ---------- */
.user-profile-info {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 25px;
  margin-bottom: 30px;
}

.user-info-title {
  font-size: 1.2rem;
  font-weight: 600;
  color: #1e3a8a;
  margin-bottom: 10px;
}

.user-profile-info p {
  margin: 6px 0;
  font-size: 0.95rem;
  color: #334155;
}

/* ---------- Action Buttons ---------- */
.user-action-buttons {
  display: flex;
  gap: 15px;
  flex-wrap: wrap;
  margin-bottom: 20px;
}

.user-action-buttons button {
  padding: 10px 20px;
  border: none;
  border-radius: 10px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
}

.user-btn-edit {
  background: #3b82f6;
  color: #fff;
}

.user-btn-edit:hover {
  background: #2563eb;
}

.user-btn-password {
  background: #f59e0b;
  color: #fff;
}

.user-btn-password:hover {
  background: #d97706;
}

.user-btn-history {
  background: #10b981;
  color: #fff;
}

.user-btn-history:hover {
  background: #059669;
}

/* ---------- Password Modal ---------- */
.user-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(30,41,59,0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
}

.user-modal form {
  background: #fff;
  padding: 25px 30px;
  border-radius: 12px;
  width: 100%;
  max-width: 400px;
  box-shadow: 0 6px 16px rgba(0,0,0,0.15);
}

.user-modal form div {
  margin-bottom: 15px;
}

.user-modal label {
  display: block;
  font-size: 0.9rem;
  font-weight: 500;
  margin-bottom: 6px;
  color: #1e293b;
}

.user-modal input {
  width: 100%;
  padding: 10px;
  border: 1px solid #cbd5e1;
  border-radius: 8px;
  outline: none;
  transition: border 0.2s;
}

.user-modal input:focus {
  border-color: #3b82f6;
}

.user-modal button[type="submit"] {
  background: #3b82f6;
  color: #fff;
  padding: 10px 16px;
  border-radius: 8px;
  border: none;
  cursor: pointer;
  margin-right: 10px;
  transition: background 0.3s ease;
}

.user-modal button[type="submit"]:hover {
  background: #2563eb;
}

.user-close-modal {
  background: #e5e7eb;
  color: #111827;
  padding: 10px 16px;
  border-radius: 8px;
  border: none;
  cursor: pointer;
  transition: background 0.3s ease;
}

.user-close-modal:hover {
  background: #d1d5db;
}

/* ---------- Responsive ---------- */
@media (max-width: 768px) {
  .user-profile-info {
    grid-template-columns: 1fr;
  }

  .user-profile-header {
    flex-direction: column;
    align-items: flex-start;
    text-align: left;
  }

  .user-action-buttons {
    flex-direction: column;
    gap: 10px;
  }
}
</style>
<div class="user-profile-page">
  <div class="user-profile-container">
    <!-- Profile Header -->
    <div class="user-profile-header">
      <img src="{{ $user->photo }}" alt="Profile Picture" class="user-profile-img" />
      <div>
        <h2 class="user-profile-name">{{ $user->name }}</h2>
        <p class="user-profile-id">{{ $user->profession }} | Member ID: {{ $user->member_id }}</p>
      </div>
    </div>

    <!-- Profile Info -->
    <div class="user-profile-info">
      <div>
        <h3 class="user-info-title">Contact Info</h3>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Phone:</strong> {{ $user->phone }}</p>
        <p><strong>Address:</strong> {{ $user->address }}</p>
      </div>
      <div>
        <h3 class="user-info-title">Library Stats</h3>
        <p><strong>Borrowed:</strong> books</p>
        <p><strong>Overdue:</strong> book</p>
        <p><strong>Reserved:</strong> books</p>
        <p><strong>Total History:</strong> books</p>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="user-action-buttons">
      <button class="user-btn-edit">Edit Profile</button>
      <button class="user-btn-password">Change Password</button>
      <button class="user-btn-history">View History</button>
    </div>
  </div>

  <!-- Password Modal -->
  <div id="passwordModal" class="user-modal" style="display:none;">
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
      <button type="button" class="user-close-modal">Cancel</button>
    </form>
  </div>
</div>
@include('layouts.footer')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
  $('.user-btn-password').on('click', function () {
    $('#passwordModal').fadeIn();
  });

  $('.user-close-modal').on('click', function () {
    $('#passwordModal').fadeOut();
  });

  $('#changePasswordForm').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '/change-password',
      method: 'POST',
      data: $(this).serialize(),
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function () {
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

  $(window).on('click', function (e) {
    if ($(e.target).is('#passwordModal')) {
      $('#passwordModal').fadeOut();
    }
  });
});
</script>


@endsection
