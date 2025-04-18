@extends('app')
@section('content')
    <div class="signup-container">
        @csrf
        <h2>Sign Up</h2>
        <form>
            <input type="text" id="fullname" name="fullname" placeholder="Full Name" />
            <input type="email" name="email" id="email" placeholder="Email" />
            <input type="password" name="password" id="password" placeholder="Password" />
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" />
            <button type="submit" id="signupForm">Register</button>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="/login">Log In</a></p>
        </div>
    </div>
@endsection
