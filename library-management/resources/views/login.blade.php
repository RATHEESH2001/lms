@extends('app')
@section('content')
<style>/* Scoped login styles */
.login-page {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: linear-gradient(135deg, #4f46e5, #9333ea);
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

.login-page-container {
  background: #fff;
  padding: 2.5rem;
  border-radius: 1.5rem;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  width: 100%;
  max-width: 400px;
  text-align: center;
  animation: fadeIn 0.6s ease-in-out;
}

.login-page-container h2 {
  margin-bottom: 1.5rem;
  font-size: 1.8rem;
  color: #333;
}

#loginFormElement input {
  width: 100%;
  padding: 0.9rem;
  margin: 0.6rem 0;
  border: 1px solid #ddd;
  border-radius: 0.75rem;
  font-size: 1rem;
  outline: none;
  transition: border 0.3s;
}

#loginFormElement input:focus {
  border-color: #4f46e5;
  box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
}

#loginFormBtn {
  width: 100%;
  padding: 0.9rem;
  margin-top: 1rem;
  background: #4f46e5;
  border: none;
  border-radius: 0.75rem;
  color: #fff;
  font-size: 1rem;
  cursor: pointer;
  font-weight: bold;
  transition: background 0.3s;
}

#loginFormBtn:hover {
  background: #4338ca;
}

.login-page-signup-link {
  margin-top: 1.5rem;
  font-size: 0.95rem;
}

.login-page-signup-link a {
  color: #4f46e5;
  font-weight: 600;
  text-decoration: none;
}

.login-page-signup-link a:hover {
  text-decoration: underline;
}

/* Messages */
#message {
  margin-bottom: 1rem;
  padding: 0.8rem;
  border-radius: 0.75rem;
  display: none;
  font-size: 0.95rem;
  text-align: left;
  white-space: pre-line;
}

.success-message {
  background: #dcfce7;
  color: #166534;
  border: 1px solid #86efac;
}

.error-message {
  background: #fee2e2;
  color: #991b1b;
  border: 1px solid #fca5a5;
}

/* Small devices */
@media (max-width: 480px) {
  .login-page-container {
    padding: 2rem 1.5rem;
  }

  .login-page-container h2 {
    font-size: 1.5rem;
  }
}

/* Fade-in animation */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-15px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
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
