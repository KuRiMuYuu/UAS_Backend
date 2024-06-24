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
            /* height: 100vh; */ /* Ganti atau hapus properti height ini */
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            overflow: hidden; /* Prevent horizontal scroll */
            overflow-y: auto; /* Enable vertical scroll */
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

        .post img, .post video {
            width: 100%;
            border-radius: 10px;
        }

        .upload-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: center;
        }

        .upload-container img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .upload-container textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            resize: none;
        }

        .upload-container input[type="file"] {
            display: none;
        }

        .upload-container label {
            display: inline-block;
            padding: 10px 20px;
            background: #667eea;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .upload-container button {
            padding: 10px 20px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .upload-container button:hover {
            background: #556cd6;
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
                <!-- Upload Container Form -->
                <div class="upload-container">
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <textarea name="caption" placeholder="Write a caption..." required></textarea>
                        <label for="file-upload">Choose a photo or video</label>
                        <input type="file" id="file-upload" name="media" accept="image/*,video/*" required>
                        <button type="submit">Post</button>
                    </form>
                </div>

                <!-- Posts -->
                @foreach ($posts as $post)
                <div class="post">
                    @if ($post->media_type == 'image')
                    <img src="{{ asset('storage/' . $post->media_path) }}" alt="Post Image">
                    @elseif ($post->media_type == 'video')
                    <video controls>
                        <source src="{{ asset('storage/' . $post->media_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    @endif
                    <p>{{ $post->caption }}</p>
                </div>
                @endforeach
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="profile">
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
