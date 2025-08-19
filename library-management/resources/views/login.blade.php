@extends('app')
@section('content')

<div class="login-page">
  <div class="login-page-container">
    <h2>Login</h2>

    <div id="message" style="display:none;"></div>

    <form id="loginFormElement">
      @csrf
      <input type="email" id="email" name="email" placeholder="Email" required />
      <input type="password" id="password" name="password" placeholder="Password" required />
      <button type="submit" id="loginFormBtn">Login</button>
    </form>

    <div class="login-page-signup-link">
      <p>Don't have an account? <a href="/signup">Sign Up</a></p>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('#loginFormBtn').click(function(e) {
    e.preventDefault();

    $.ajax({
      url: '/login',
      type: 'POST',
      data: {
        _token: $('input[name="_token"]').val(),
        email: $('#email').val(),
        password: $('#password').val()
      },
      success: function() {
        $("#message")
          .removeClass("error-message")
          .addClass("success-message")
          .text("Login successful! Redirecting...")
          .show();

        $('#email').val('');
        $('#password').val('');

        setTimeout(function() {
          window.location.href = "/home";
        }, 1500);
      },
      error: function(xhr) {
        if (xhr.status === 422) {
          var errors = xhr.responseJSON.errors;
          var errorMessage = '';
          for (var field in errors) {
            errorMessage += errors[field][0] + '\n';
          }
          $("#message")
            .removeClass("success-message")
            .addClass("error-message")
            .text(errorMessage)
            .show();
        } else if (xhr.status === 401) {
          $("#message")
            .removeClass("success-message")
            .addClass("error-message")
            .text("Invalid email or password")
            .show();
        } else {
          $("#message")
            .removeClass("success-message")
            .addClass("error-message")
            .text("An error occurred. Please try again.")
            .show();
        }
      }
    });
  });
});
</script>

<style>
/* Scoped login styles */

</style>

@endsection
