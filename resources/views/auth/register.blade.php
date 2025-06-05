<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Absensi Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('wira.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            backdrop-filter: blur(5px);
            padding: 40px;
            border-radius: 10px;
            color: white;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }
        .form-control::placeholder {
            color: white;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.3); /* Sedikit lebih terang saat fokus */
            color: white;
            border-color: transparent;
        }
        select.form-control {
            appearance: none; /* Hilangkan gaya default browser */
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }
        select.form-control option {
            background: #333; /* Warna latar belakang dropdown */
            color: white; /* Warna teks */
        }
        select.form-control:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.3);
        }
        .password-field {
            position: relative;
            margin-bottom: 20px;
        }
        .password-field .form-control {
            padding-right: 40px;
            margin-bottom: 0;
        }
        .btn-custom {
            background-color: #859af5;
            border: none;
        }
        .btn-custom:hover {
            background-color: #4e74ff;
        }
        .login-link {
            margin-top: 15px;
            color: white;
        }
        .login-link a {
            color: #ffeb3b;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="col-md-4">
            <div class="card text-center p-4 shadow-lg">
                <h2 class="text-white mb-3">Register</h2>

                <!-- Menampilkan pesan error jika ada -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Menampilkan pesan sukses jika berhasil register -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('register.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="nis" class="form-control" placeholder="NIS" required>
                    </div>
                    <div class="mb-3">
                        <select name="kelas" class="form-control" required>
                            <option value="" disabled selected>Pilih Kelas</option>
                            <option value="X RPL 1">X RPL 1</option>
                            <option value="X RPL 2">X RPL 2</option>
                            <option value="XI RPL 1">XI RPL 1</option>
                            <option value="XI RPL 2">XI RPL 2</option>
                            <option value="XII RPL 1">XII RPL 1</option>
                            <option value="XII RPL 2">XII RPL 2</option>
                            <option value="X DKV 1">X DKV 1</option>
                            <option value="XI DKV 1">XI DKV 1</option>
                            <option value="XII DKV 1">XII DKV 1</option>
                            <option value="X Perhotelan 1">X Perhotelan 1</option>
                            <option value="XI Perhotelan 1">XI Perhotelan 1</option>
                            <option value="XII Perhotelan 1">XII Perhotelan 1</option>
                            <option value="X Kuliner 1">X Kuliner 1</option>
                            <option value="XI Kuliner 1">XI Kuliner 1</option>
                            <option value="XII Kuliner 1">XII Kuliner 1</option>
                        </select>
                    </div>
                    <div class="password-field">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <span class="material-icons">visibility</span>
                        </button>
                    </div>
                    <div class="password-field">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password" required>
                    </div>
                    <button type="submit" class="btn btn-custom btn-lg w-100">Daftar</button>
                </form>
                <p class="login-link">Sudah punya akun? <a href="{{ route('login') }}">Login sekarang</a></p>
             
            </div>
        </div>
    </div>

    <script>
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
