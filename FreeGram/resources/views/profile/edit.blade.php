<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeGram - Profile</title>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            overflow: hidden;
            overflow-y: auto;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 1000px;
            padding: 20px;
        }

        .navbar {
            width: 100%;
            background: white;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #667eea;
        }
        
        .navbar .logo a{
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
            color: #667eea;
        }
        .navbar .logout-btn {
            padding: 10px 20px;
            background: #667eea;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar .logout-btn:hover {
            background-color: red;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar .logout-btn:active {
            background-color: red;
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .main-content {
            display: flex;
            width: 100%;
            gap: 20px;
        }

        .profile-section {
            flex: 3;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .profile-section .section {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 10px;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .section-header {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input, .form-group textarea {
            width: 95%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group button {
            padding: 10px 20px;
            background: #667eea;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group button:hover {
            background-color: #556cd6;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-group button:active {
            background-color: #4458a3;
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nama_user {
            font-weight: bold;
            text-align: center;
        }

        .atasuser {
            text-align: center;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .left-sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 250px;
            background: white;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .left-sidebar.open {
            transform: translateX(0);
        }

        .left-sidebar .search-bar {
            margin-bottom: 20px;
            width: 80%;
        }

        .left-sidebar .search-bar input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .left-sidebar .nav-links a {
            display: block;
            margin: 10px 0;
            color: #333;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .left-sidebar .nav-links a:hover {
            background: #f0f0f0;
        }
        .inputbox{
            width: 80%;
        }
    </style>
</head>
<body>
<div class="left-sidebar" id="left-sidebar">
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
        <div class="nav-links">
            <a href="/dashboard">Home</a>
            <a href="/message">Messages</a>
        </div>
    </div>

    <div class="container">
        <div class="navbar">
            <div class="logo"><a href="/dashboard">FreeGram</a></div>
            <div class="profile">
                <p class="atasuser">Welcome back!</p>
                <p class="nama_user">{{ Auth::user()->name }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="main-content">
            <div class="profile-section">
                <div class="section">
                    <div class="section-header">Update Profile Information</div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit">Update Profile</button>
                        </div>
                    </form>
                </div>
                <div class="section-header">Update Profile Picture</div>
                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="profile_picture">Profile Picture</label>
                        <input type="file" name="profile_picture" id="profile_picture">
                    </div>
                    <div class="form-group">
                        <button type="submit">Update Profile</button>
                    </div>
                </form>
                <form method="post" action="{{ route('profile.remove_picture') }}" class="mt-6 space-y-6">
                @csrf
                @method('delete')
                <div class="form-group">
                    <button type="submit">Remove Profile Picture</button>
                </div>
            </form>

                <div class="section">
                    <div class="section-header">Update Password</div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" name="current_password" id="current_password" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" id="new_password" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <button type="submit">Update Password</button>
                        </div>
                    </form>
                </div>

                <div class="section">
                    <div class="section-header">Delete Account</div>
                    <form method="POST" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit">Delete Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('mousemove', function(e) {
            const sidebar = document.getElementById('left-sidebar');
            if (e.clientX < 50) {
                sidebar.classList.add('open');
            } else if (e.clientX > 250) {
                sidebar.classList.remove('open');
            }
        });
        </script>
</body>
</html>
