<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register Page</title>
  <style>
    body {
      background: url('/assets/imgs/login.png') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .register-container {
      background: rgba(255, 255, 255, 0.92);
      padding: 2.5rem 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.12);
      width: 370px;
    }
    .register-form h2 {
      margin-bottom: 1.5rem;
      color:rgb(49, 104, 28);
      text-align: center;
      font-weight: bold;
    }
    .input-group {
      margin-bottom: 1.2rem;
    }
    .input-group label {
      display: block;
      margin-bottom: 0.4rem;
      color: #333;
    }
    .input-group input {
      width: 100%;
      padding: 0.6rem;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 1rem;
      transition: border-color 0.2s;
      background: #f6f9ff;
    }
    .input-group input:focus {
      border-color: #4e54c8;
      outline: none;
    }
    button[type="submit"] {
      width: 100%;
      background:rgb(49, 104, 28);
      color:rgb(5, 5, 5);
      border: none;
      padding: 0.8rem;
      font-size: 1.1rem;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.2s;
      font-weight: bold;
      margin-top: 0.5rem;
      margin-bottom: 0.5rem;
    }
    button[type="submit"]:hover {
      background: #FFF2D9;
    }
    .login-link {
      margin-top: 1rem;
      text-align: center;
      font-size: 0.95rem;
    }
    .login-link a {
      color: #4e54c8;
      text-decoration: none;
      transition: text-decoration 0.2s;
    }
    .login-link a:hover {
      text-decoration: underline;
    }
    .alert-danger {
      background: #ffe4e4;
      color: #a20000;
      border-radius: 5px;
      padding: 0.7rem 1rem;
      margin-bottom: 1rem;
    }
    .alert-danger ul {
      margin: 0;
      padding-left: 1.2em;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <form class="register-form" method="POST" action="{{ route('register') }}">
      @csrf

      <h2>Register</h2>
      
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="input-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your full name" value="{{ old('name') }}" required>
      </div>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
      </div>
      <div class="input-group">
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" placeholder="e.g. +962 7XXXXXXXX" value="{{ old('phone') }}" required>
      </div>
      <div class="input-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter your address" value="{{ old('address') }}" required>
      </div>
      <div class="input-group">
        <label for="city">City</label>
        <input type="text" id="city" name="city" placeholder="Enter your city" value="{{ old('city') }}" required>
      </div>
      <div class="input-group">
        <label for="postal_code">Postal Code</label>
        <input type="text" id="postal_code" name="postal_code" placeholder="Enter your postal code" value="{{ old('postal_code') }}" required>
      </div>
      <div class="input-group">
        <label for="country">Country</label>
        <input type="text" id="country" name="country" placeholder="Enter your country" value="{{ old('country') }}" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <div class="input-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="password_confirmation" placeholder="Confirm your password" required>
      </div>
      
      <button type="submit">Register</button>
      <p class="login-link">Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </form>
  </div>
</body>
</html>
