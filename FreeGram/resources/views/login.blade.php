<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeGram - Login</title>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .login-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .header {
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            color: #333;
        }

        .header p {
            color: #777;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }

        .input-group input:focus {
            border-color: #667eea;
            outline: none;
        }

        .login-btn {
            width: 100%;
            padding: 10px;
            background: #667eea;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-btn:hover {
            background: #556cd6;
        }

        .footer p {
            margin: 10px 0;
            color: #777;
        }

        .footer a {
            color: #667eea;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .inline-group {
            display: inline-flex;
            align-items: center;
        }

        .inline-group input[type="checkbox"] {
            margin-right: 5px;
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="header">
                <h1>Selamat Datang!</h1>
                <p>Masuk untuk melanjutkan</p>
            </div>
            @if ($errors->has('email'))
                <div class="error-message">{{ $errors->first('email') }}</div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required autofocus>
                </div>
                <div class="input-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group inline-group">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Save</label>
                </div>
                <button type="submit" class="login-btn">Masuk</button>
            </form>
            <div class="footer">
                <p><a href="{{ route('password.request') }}">Lupa kata sandi?</a></p>
                <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
            </div>
        </div>
    </div>
</body>
</html>
