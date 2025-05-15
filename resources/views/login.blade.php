<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4a90e2, #007bff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }
        .login-container {
            width: 380px;
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .login-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(0,0,0,0.3);
        }
        .login-container h3 {
            margin-bottom: 20px;
            color: #333;
            font-weight: bold;
            text-align: center;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            width: 100%;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            width: 100%;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .text-center {
            margin-top: 15px;
            color: #666;
        }
        .text-center a {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h3>Welcome Back!</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('login_error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <div class="text-center">
        <p>Don't have an account? <a href="{{ route('register.form') }}">Register Now</a></p>
    </div>
</div>
</body>
</html>
