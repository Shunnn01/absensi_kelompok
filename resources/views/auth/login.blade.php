<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Absensi Sekolah</title>
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('wira.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            background: rgba(255, 255, 255, 0.08);
            border: none;
            backdrop-filter: blur(8px);
            padding: 40px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            color: white;
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 20px;
            font-size: 15px;
            box-sizing: border-box;
        }
        .password-field {
            position: relative;
            margin-bottom: 20px;
        }
        .password-field .form-control {
            padding-right: 40px;
            margin-bottom: 0;
        }
        .form-control::placeholder {
            color: white;
            opacity: 0.7;
            font-size: 15px;
        }
        .btn-custom {
            background-color: #ff7eb3;
            border: none;
            color: white;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #ff4e87;
        }
        .register-link {
            margin-top: 10px;
            font-size: 14px;
        }
        .register-link a {
            color: #ff7eb3;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        .register-link a:hover {
            color: #ff4e87;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            cursor: pointer;
            z-index: 2;
            opacity: 0.8;
            font-size: 20px;
            background: none;
            border: none;
            outline: none;
        }
        .toggle-password:hover {
            opacity: 1;
        }
        .material-icons {
            font-size: 20px;
            vertical-align: middle;
        }
        .error-message {
            background-color: rgba(255, 0, 0, 0.7);
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: white;
            font-size: 14px;
        }
        .remember-me input {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1 style="margin-bottom: 20px;">Login</h1>
        
        <!-- Pesan Error -->
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif
        
        <!-- Form Login -->
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
            
            <div class="password-field">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <button type="button" class="toggle-password" onclick="togglePassword()">
                    <span class="material-icons">visibility</span>
                </button>
            </div>
            
            <div class="remember-me">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat saya</label>
            </div>
            
            <button type="submit" class="btn-custom">Masuk</button>
        </form>
        
        <p class="register-link">Belum punya akun? <a href="{{ route('register') }}">Register sekarang</a></p>
    </div>
    
    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password .material-icons');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = 'visibility_off';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = 'visibility';
            }
        }
    </script>
</body>
</html>