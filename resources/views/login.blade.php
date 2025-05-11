<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        /* Animated background elements */
        .bg-animation {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 0;
        }
        
        .bg-shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }
        
        .shape1 {
            width: 400px;
            height: 400px;
            top: -200px;
            right: -100px;
        }
        
        .shape2 {
            width: 300px;
            height: 300px;
            bottom: -150px;
            left: -50px;
        }
        
        .shape3 {
            width: 200px;
            height: 200px;
            bottom: 30%;
            right: 20%;
        }
        
        .shape4 {
            width: 150px;
            height: 150px;
            top: 30%;
            left: 10%;
            background: rgba(255, 255, 255, 0.03);
        }
        
        .login-container {
            max-width: 400px;
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }
        
        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }
        
        h3 {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
            position: relative;
            padding-bottom: 10px;
            font-size: 24px;
        }
        
        h3:after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            height: 3px;
            width: 40px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border-radius: 3px;
        }
        
        .form-control {
            border: 1px solid #e1e5eb;
            border-radius: 8px;
            padding: 12px 15px;
            background-color: #f8f9fa;
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            font-size: 14px;
        }
        
        .form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 3px 10px rgba(37, 117, 252, 0.15);
            background-color: #fff;
        }
        
        .form-control::placeholder {
            color: #adb5bd;
            font-size: 13px;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            font-weight: 500;
            color: #444;
            margin-bottom: 10px;
        }
        
        .form-label i {
            color: #6a11cb;
            margin-right: 8px;
        }
        
        /* Logo styles */
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .app-logo {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: 0 4px 15px rgba(106, 17, 203, 0.4);
        }
        
        .btn-login {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            padding: 12px;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(106, 17, 203, 0.4);
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(106, 17, 203, 0.5);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .alert {
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .forgot-password {
            text-align: right;
            margin-top: -10px;
            margin-bottom: 20px;
        }
        
        .forgot-password a {
            color: #2575fc;
            font-size: 13px;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .forgot-password a:hover {
            color: #6a11cb;
            text-decoration: underline;
        }
        
        .register-now {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #6c757d;
        }
        
        .register-now a {
            color: #2575fc;
            text-decoration: none;
            font-weight: 500;
        }
        
        .register-now a:hover {
            color: #6a11cb;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Background Animation -->
    <div class="bg-animation">
        <div class="bg-shape shape1"></div>
        <div class="bg-shape shape2"></div>
        <div class="bg-shape shape3"></div>
        <div class="bg-shape shape4"></div>
    </div>

    <div class="login-container">
        <div class="text-center mb-4">
            <div class="logo-container mb-3">
                <div class="app-logo">
                    <i class="fas fa-graduation-cap fa-3x"></i>
                </div>
            </div>
            <h3>Login</h3>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ $errors->first('login_error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope"></i>Email Address
                </label>
                <input type="email" name="email" id="email" class="form-control" required placeholder="Masukkan alamat email Anda">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">
                    <i class="fas fa-lock"></i>Password
                </label>
                <input type="password" name="password" id="password" class="form-control" required placeholder="Masukkan password Anda">
            </div>
            
            <div class="forgot-password">
                <a href="#">Lupa password?</a>
            </div>
            
            <button type="submit" class="btn btn-login btn-primary w-100">
                <i class="fas fa-sign-in-alt me-2"></i> Login
            </button>
            
            <div class="register-now">
                Belum punya akun? <a href="#">Daftar sekarang</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>