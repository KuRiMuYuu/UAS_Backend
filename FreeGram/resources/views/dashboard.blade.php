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

        .navbar .logout-btn {
            padding: 10px 20px;
            background: #667eea;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .navbar .logout-btn:hover {
            background: #556cd6;
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
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 10px;
        }

        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            width: 100%;
        }

        .post-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .post-header .username {
            font-weight: bold;
        }

        .post-content {
            width: 100%;
        }

        .post-content img, .post-content video {
            width: 100%;
            border-radius: 10px;
        }

        .post-body {
            display: flex;
            flex-direction: column;
            width: 100%;
            padding: 10px;
            border-top: 1px solid #ddd;
            margin-top: 10px;
        }

        .post-caption {
            margin-bottom: 10px;
        }

        .post-interactions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .post-interactions .likes-comments {
            display: flex;
            align-items: center;
        }

        .post-interactions .likes-comments span {
            margin-right: 10px;
            cursor: pointer;
        }

        .post-interactions .likes-comments span:hover {
            text-decoration: underline;
        }

        .post-interactions .like-btn, .post-interactions .comment-btn {
            cursor: pointer;
            color: #667eea;
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
        <div class="nav-links">
            <a href="#">Profile</a>
            <a href="#">Messages</a>
        </div>
    </div>

    <div class="container">
        <div class="navbar">
            <div class="logo">FreeGram</div>
            <div class="profile">
            <p>{{ Auth::user()->name }}</p>
                </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
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

                <!-- Example of how you might display posts in your dashboard.blade.php -->
                @foreach ($posts as $post)
                <div class="post">
                    <div class="post-header">
                        <img src="{{ asset('storage/' . $post->user->profile_photo_path) }}" alt="User Profile">
                        <span class="username">{{ $post->user->name }}</span>
                    </div>
                    <div class="post-content">
                        @if ($post->media_type == 'image')
                        <img src="{{ asset('storage/' . $post->media_path) }}" alt="Post Image">
                        @elseif ($post->media_type == 'video')
                        <video controls>
                            <source src="{{ asset('storage/' . $post->media_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        @endif
                    </div>
                    <div class="post-body">
                        <p class="post-caption">{{ $post->caption }}</p>
                        <div class="post-interactions">
                            <div class="likes-comments">
                                <span class="like-btn" onclick="event.preventDefault(); document.getElementById('like-form-{{ $post->id }}').submit();">
                                    @if($post->likes->where('user_id', Auth::id())->count() > 0)
                                        Unlike
                                    @else
                                        Like
                                    @endif
                                </span>
                                <form id="like-form-{{ $post->id }}" action="{{ route('posts.like', $post->id) }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <span class="comment-btn">Comment</span>
                            </div>
                            <div class="likes-count">
                                <span>{{ $post->likes->count() }} likes</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
