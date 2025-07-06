    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 300px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #28a745;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background: #218838;
    } 
    .signup-link {
      text-align: center;
      margin-top: 15px;
    }
  </style>
  <div class="login-container">
    <h2>Login</h2>
    <form >
            @csrf
      <input type="email" id="email" name="email" placeholder="Email" required />
      <input type="password" id="password" name="password" placeholder="Password" required />
      <button type="submit" id="loginForm">Login</button>
    </form>
    <div class="signup-link">
      <p>Don't have an account? <a href="/signup">Sign Up</a></p>
    </div>
  </div>


     <script>
   $(document).ready(function() {
  $('#loginForm').click(function(e) {
    e.preventDefault(); // Prevent default form submission
alert("jbkbdfkj");
    $.ajax({
      url: '/login',
      type: 'POST',
      data: {
        _token: $('input[name="_token"]').val(),
        email: $('#email').val(),
        password: $('#password').val()
      },
      success: function(response) {
        $("#message")
          .removeClass("error-message")
          .addClass("success")
          .text("Login successful! Redirecting...")
          .show();

        // Clear form fields
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
            errorMessage += errors[field][0] + '<br>';
          }
          $("#message")
            .removeClass("success")
            .addClass("error-message")
            .html(errorMessage)
            .show();
        } else if (xhr.status === 401) {
          $("#message")
            .removeClass("success")
            .addClass("error-message")
            .text("Invalid email or password")
            .show();
        } else {
          $("#message")
            .removeClass("success")
            .addClass("error-message")
            .text("An error occurred. Please try again.")
            .show();
        }
      }
    });
  });
});

  </script>
