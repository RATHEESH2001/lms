@extends('app')
@section('content')
@include('layouts.header')

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
  @include('layouts.footer')
</div>


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

<style>

</style>
@endsection
