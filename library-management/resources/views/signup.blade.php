@extends('app')
@section('content')
<style>/* ========== SIGNUP PAGE ========== */
.signup-page {
  background: #f1f5f9;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.signup-page-container {
  background: #ffffff;
  padding: 35px 40px;
  border-radius: 16px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.08);
  width: 100%;
  max-width: 420px;
}

/* ---------- Form ---------- */
.signup-page-container h2 {
  text-align: center;
  margin-bottom: 25px;
  font-size: 1.8rem;
  font-weight: 600;
  color: #1e293b;
}

.signup-page-container form input,
.signup-page-container form textarea,
.signup-page-container form select {
  width: 100%;
  padding: 12px 14px;
  margin-bottom: 15px;
  border: 1px solid #cbd5e1;
  border-radius: 10px;
  font-size: 0.95rem;
  outline: none;
  transition: border 0.3s ease, box-shadow 0.3s ease;
}

.signup-page-container form input:focus,
.signup-page-container form textarea:focus,
.signup-page-container form select:focus {
  border-color: #3b82f6;
  box-shadow: 0 0 0 3px rgba(59,130,246,0.2);
}

/* Error messages */
.error {
  display: block;
  font-size: 0.85rem;
  color: #dc2626;
  margin-top: -10px;
  margin-bottom: 10px;
}

/* Submit button */
#signupFormBtn {
  width: 100%;
  padding: 12px;
  background: #1e3a8a;
  color: #fff;
  font-weight: 600;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  transition: background 0.3s ease;
}

#signupFormBtn:hover {
  background: #153e75;
}

/* ---------- Login link ---------- */
.signup-page-login-link {
  margin-top: 15px;
  text-align: center;
  font-size: 0.95rem;
  color: #475569;
}

.signup-page-login-link a {
  color: #3b82f6;
  font-weight: 500;
  text-decoration: none;
}

.signup-page-login-link a:hover {
  text-decoration: underline;
}

/* ---------- Responsive ---------- */
@media (max-width: 480px) {
  .signup-page-container {
    padding: 25px 20px;
  }
}
</style>
<div class="signup-page">
  <div class="signup-page-container">
    <form id="signupFormElement">
      @csrf
      <h2>Sign Up</h2>

      <input type="text" id="fullname" name="fullname" placeholder="Full Name" required />
      <span class="error" id="fullnameError"></span>

      <input type="email" name="email" id="email" placeholder="Email" required />
      <span class="error" id="emailError"></span>

      <input type="password" name="password" id="password" placeholder="Password" required />
      <span class="error" id="passwordError"></span>

      <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required />
      <span class="error" id="confirmPasswordError"></span>

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

      <button type="submit" id="signupFormBtn">Register</button>
    </form>

    <div class="signup-page-login-link">
      <p>Already have an account? <a href="/login">Log In</a></p>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#signupFormBtn').click(function (e) {
  e.preventDefault();

  let valid = true;
  $('.error').text('');

  const fullname = $('#fullname').val().trim();
  const email = $('#email').val().trim();
  const password = $('#password').val();
  const confirmPassword = $('#confirm_password').val();
  const phone = $('#phone').val().trim();
  const address = $('#address').val().trim();
  const profession = $('#profession').val();

  const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  if (!fullname) {
    $('#fullnameError').text('Full Name is required');
    valid = false;
  }

  if (!email) {
    $('#emailError').text('Email is required');
    valid = false;
  } else if (!emailPattern.test(email)) {
    $('#emailError').text('Enter a valid email address');
    valid = false;
  }

  if (!password) {
    $('#passwordError').text('Password is required');
    valid = false;
  } else if (password.length < 6) {
    $('#passwordError').text('Password must be at least 6 characters');
    valid = false;
  }

  if (!confirmPassword) {
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
    fullname: fullname,
    email: email,
    password: password,
    confirm_password: confirmPassword,
    phone: phone,
    address: address,
    profession: profession
  };

  if (valid) {
    $.ajax({
      url: '/register',
      type: 'POST',
      data: formData,
      headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
      },
      success: function () {
        alert('Registration successful!');
        window.location.href = '/login';
      },
      error: function (xhr) {
        console.log('An error occurred: ' + xhr.responseText);
      }
    });
  }
});
</script>

<style>

</style>

@endsection
