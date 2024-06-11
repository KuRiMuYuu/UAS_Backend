<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeGram - Forgot Password</title>
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

        .forgot-password-box {
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

        .forgot-password-btn {
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

        .forgot-password-btn:hover {
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
    </style>
</head>
<body>
    <div class="container">
        <div class="forgot-password-box">
            <div class="header">
                <h1>Lupa Kata Sandi</h1>
                <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" :value="old('email')" required autofocus>
                    @error('email')
                        <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="forgot-password-btn">
                    {{ __('Email Password Reset Link') }}
                </button>
            </form>
            <div class="footer">
                <p>Ingat kata sandi? <a href="{{ route('login') }}">Masuk</a></p>
            </div>
        </div>
    </div>
</body>
</html>
