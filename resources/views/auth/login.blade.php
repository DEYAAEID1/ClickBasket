<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <style>
    body {
      background: url('/assets/imgs/login.png') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: flex-start; /* حتى كل شيء يبدأ من اليسار */
      flex-direction: row; 
    }

    .side-image-container {
      width: 310px;       /* <-- تحكم العرض */
      height: 400px;      /* <-- تحكم الطول */
      display: flex;
      align-items: center;
      justify-content: center;
      margin-left: 95px;  /* مسافة من اليسار (اجعلها 0 إذا بدك تلصق الصورة في الشمال) */
      margin-right: 280px; /* المسافة بين الصورة وصندوق تسجيل الدخول */
      background: #f8ecc0;
      border-radius: 22px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.10);
    }
    .side-image-container img {
      max-width: 85%;     /* <-- تحكم عرض الصورة كنسبة من الصندوق */
      max-height: 85%;    /* <-- تحكم ارتفاع الصورة كنسبة من الصندوق */
      object-fit: contain;
      border-radius: 16px;
    }

    .login-container {
      background: rgba(255, 255, 255, 0.92);
      padding: 2.5rem 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.12);
      width: 350px;
    }

    .login-form h2 {
      margin-bottom: 1.5rem;
      color: #4e54c8;
      text-align: center;
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
    }

    .input-group input:focus {
      border-color: #4e54c8;
      outline: none;
    }

    button[type="submit"] {
      width: 100%;
      background: #4e54c8;
      color: #fff;
      border: none;
      padding: 0.8rem;
      font-size: 1.1rem;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.2s;
    }

    button[type="submit"]:hover {
      background: #5b5fc7;
    }

    .signup-link {
      margin-top: 1rem;
      text-align: center;
      font-size: 0.95rem;
    }

    .signup-link a {
      color: #4e54c8;
      text-decoration: none;
      transition: text-decoration 0.2s;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }

    @media (max-width: 900px) {
      body {
        flex-direction: column;
        align-items: center;
      }
      .side-image-container {
        margin-left: 0;
        margin-right: 0;
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>
  <!-- صورة في أقصى الشمال -->
  <div class="side-image-container">
   <a href="{{ route('landing') }}" > <img src="/assets/imgs/logo.png" alt="side image"/></a>
  </div>

  <div class="login-container">
    <form class="login-form" method="POST" action="{{ route('login') }}">
      @csrf
      <h2>Login</h2>
      @if ($errors->any())
        <div style="color:red; margin-bottom:10px;">
          {{ $errors->first() }}
        </div>
      @endif
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required autofocus>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit">Login</button>
      <p class="signup-link">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
    </form>
  </div>
</body>
</html>