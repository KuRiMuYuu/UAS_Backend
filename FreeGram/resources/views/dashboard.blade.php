<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeGram - Dashboard</title>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            overflow: hidden; /* Prevent horizontal scroll */
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

        .navbar .nav-links a {
            margin: 0 10px;
            color: #333;
            text-decoration: none;
        }

        .navbar .nav-links a:hover {
            text-decoration: underline;
        }

        .main-content {
            display: flex;
            width: 100%;
            gap: 20px;
        }

        .feed {
            flex: 3;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .feed .post {
            margin-bottom: 20px;
        }

        .post img {
            width: 100%;
            border-radius: 10px;
        }

        .sidebar {
            flex: 1;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .sidebar .profile {
            text-align: center;
        }

        .sidebar .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .sidebar .profile p {
            margin: 0;
            font-weight: bold;
        }

        .logout-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background: #667eea;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background: #556cd6;
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
        }

        .left-sidebar .search-bar input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .toggle-btn {
            position: absolute;
            left: 20px;
            top: 20px;
            font-size: 2rem;
            cursor: pointer;
            color: white;
        }

    </style>
</head>
<body>
    <div class="toggle-btn" onclick="toggleSidebar()">&#9776;</div>
    <div class="left-sidebar" id="left-sidebar">
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
    </div>

    <div class="container">
        <div class="navbar">
            <div class="logo">FreeGram</div>
            <div class="nav-links">
                <a href="#">Home</a>
                <a href="#">Profile</a>
                <a href="#">Messages</a>
            </div>
        </div>

        <div class="main-content">
            <div class="feed">
                <div class="post">
                    <img src="https://via.placeholder.com/800x400" alt="Post Image">
                    <p>Post caption goes here...</p>
                </div>
                <div class="post">
                    <img src="https://via.placeholder.com/800x400" alt="Post Image">
                    <p>Post caption goes here...</p>
                </div>
            </div>

            <div class="sidebar">
                <div class="profile">
                    <img src="https://via.placeholder.com/100" alt="Profile Picture">
                    <p>{{ Auth::user()->name }}</p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('left-sidebar').classList.toggle('open');
        }
    </script>
</body>
</html>
