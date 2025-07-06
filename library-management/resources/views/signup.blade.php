    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
   /* Signup Form Container */
.signup-container {
  max-width: 500px;
  margin: 40px auto;
  padding: 30px;
  background-color: #ffffff;
  border: 1px solid #e0e0e0;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.signup-container h2 {
  text-align: center;
  margin-bottom: 25px;
  color: #333;
}

/* Form Fields */
.signup-container form input,
.signup-container form textarea,
.signup-container form select {
  width: 100%;
  padding: 12px 14px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 15px;
  box-sizing: border-box;
}

.signup-container form select {
  background-color: #fff;
}

/* Submit Button */
.signup-container button {
  width: 100%;
  padding: 12px;
  background-color: #4CAF50;
  border: none;
  color: white;
  font-size: 16px;
  font-weight: bold;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.signup-container button:hover {
  background-color: #45a049;
}

/* Login Link */
.login-link {
  margin-top: 20px;
  text-align: center;
}

.login-link a {
  color: #4CAF50;
  text-decoration: none;
  font-weight: 500;
}

.login-link a:hover {
  text-decoration: underline;
}
@media (max-width: 600px) {
  .signup-container {
    padding: 20px;
    margin: 20px;
  }
}

  </style>

    @extends('app')
@section('content')
<div class="signup-container">
    <form >
      @csrf
      <h2>Sign Up</h2>

      <input type="text" id="fullname" name="fullname" placeholder="Full Name" required />

      <input type="email" name="email" id="email" placeholder="Email" required />

      <input type="password" name="password" id="password" placeholder="Password" required />

      <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required />

      <input type="text" name="phone" id="phone" placeholder="Phone Number" required />

      <textarea name="address" id="address" placeholder="Address" rows="3" required></textarea>

      <select name="profession" id="profession" required>
        <option value="" disabled selected>Select Profession</option>
        <option value="developer">Developer</option>
        <option value="designer">Designer</option>
        <option value="manager">Manager</option>
        <option value="student">Student</option>
        <option value="other">Other</option>
      </select>

      <button type="submit" id="signupForm">Register</button>
    </form>

    <div class="login-link">
      <p>Already have an account? <a href="/login">Log In</a></p>
    </div>
  </div>


<script>

    $('#signupForm').click(function (e) {
    e.preventDefault(); // prevent default form submission


    let valid = true;

    // Clear previous errors
    $('.error').text('');

    const fullname = $('#fullname').val().trim();
const email = $('#email').val().trim();
const password = $('#password').val();
const confirmPassword = $('#confirm_password').val();
const phone = $('#phone').val().trim();
const address = $('#address').val().trim();
const profession = $('#profession').val();


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
const phoneRegex = /^[6-9]\d{9}$/;

if (!phone) {
  alert("Phone number is required.");
  return false;
} else if (!phoneRegex.test(phone)) {
  alert("Please enter a valid 10-digit Indian phone number.");
  return false;
}


if (!address) {
  alert("Address is required.");
  return false;
} else if (address.length < 10) {
  alert("Address must be at least 10 characters long.");
  return false;
}

if (!profession) {
  alert("Please select your profession.");
  return false;
}
const formData = {
  fullname: $('#fullname').val().trim(),
  email: $('#email').val().trim(),
  password: $('#password').val(),
  confirm_password: $('#confirm_password').val(),
  phone: $('#phone').val().trim(),
  address: $('#address').val().trim(),
  profession: $('#profession').val()
};


    if (valid) {
        $.ajax({
            url: '/register', // change to your endpoint
            type: 'POST',
            data: formData,
            headers: {
    'X-CSRF-TOKEN': $('input[name="_token"]').val() // for Laravel
  },
            success: function (response) {
                alert('Registration successful!');
                window.location.href = '/login';
                // Optionally redirect or reset form
                // $('#myForm')[0].reset();
            },
            error: function (xhr, status, error) {
                console.log('An error occurred: ' + xhr.responseText);
            }
        });
    }
});


</script>
@endsection
