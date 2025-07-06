    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  {{-- <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .signup-container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background: #0056b3;
    }
    .login-link {
      margin-top: 15px;
      text-align: center;
    }
  </style>
</head>
<body> --}}
    @extends('app')
@section('content')
  <div class="signup-container">
      @csrf
    <h2>Sign Up</h2>
    <form >
      <input type="text" id="fullname" name="fullname" placeholder="Full Name"  />
      <input type="email" name="email" id="email" placeholder="Email"  />
      <input type="password" name="password" id="password" placeholder="Password"  />
      <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"  />
      <button type="submit" id="signupForm">Register</button>
    </form>
    <div class="login-link">
      <p>Already have an account? <a href="/login">Log In</a></p>
    </div>
  </div>

<script>

    $('#signupForm').click(function (e) {
    e.preventDefault(); // prevent default form submission

    alert("hcdc");
    let valid = true;

    // Clear previous errors
    $('.error').text('');

    const fullname = $('#fullname').val().trim();
    const email = $('#email').val().trim();
    const password = $('#password').val();
    const confirmPassword = $('#confirm_password').val();

    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if (fullname === '') {
        $('#fullnameError').text('Full Name is required');
        valid = false;
    }

    if (email === '') {
        $('#emailError').text('Email is required');
        valid = false;
    } else if (!emailPattern.test(email)) {
        $('#emailError').text('Enter a valid email address');
        valid = false;
    }

    if (password === '') {
        $('#passwordError').text('Password is required');
        valid = false;
    } else if (password.length < 6) {
        $('#passwordError').text('Password must be at least 6 characters');
        valid = false;
    }

    if (confirmPassword === '') {
        $('#confirmPasswordError').text('Confirm Password is required');
        valid = false;
    } else if (password !== confirmPassword) {
        $('#confirmPasswordError').text('Passwords do not match');
        valid = false;
    }

    if (valid) {
        $.ajax({
            url: '/register', // change to your endpoint
            type: 'POST',
            data: {
                _token: $('input[name="_token"]').val(),
                fullname: fullname,
                email: email,
                password: password
            },
            success: function (response) {
                alert('Registration successful!');
                // Optionally redirect or reset form
                // $('#myForm')[0].reset();
            },
            error: function (xhr, status, error) {
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    }
});


</script>
@endsection
