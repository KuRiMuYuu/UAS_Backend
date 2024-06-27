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

        .post-content img{
            width: 80%;
            border-radius: 10px;
            max-width: 500px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            
        }
        .post-content video{
            width: 100%;
            border-radius: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
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

        .upload-container button {
            display: inline-block;
            padding: 15px 20px;
            padding-top: 15px;
            padding-bottom: 10px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .upload-container label{
            display: inline-block;
            padding: 10px 20px;
            background: #667eea;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

        .upload-container label:hover, .upload-container button:hover {
            background-color: #008000;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

        .upload-container label:active, .upload-container button:active {
            background-color: #006400;
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        .toggle-btn {
            position: absolute;
            left: 20px;
            top: 20px;
            font-size: 2rem;
            cursor: pointer;
            color: white;
        }

        .delete-btn {
            padding: 5px 10px;
            background: #ff4d4d;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: background 0.3s;
        }

        .delete-btn:hover {
            background: #e60000;
        }

        .nama_user{
            font-weight: bold;
            text-align: center;
        }
        .atasuser{
            text-align: center;
        }
        .likes-count{
            margin-right: 20px;
            font-weight: bold;
        }
        .komeng textarea {
            width: 96%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            resize: none;
            font-size: 1rem;
            line-height: 1.5;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .komeng textarea:focus {
            border-color: #667eea;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            outline: none;
        }

        .komeng_btn{
            padding: 10px 20px;
            background-color: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .komeng_btn:hover{
            background-color: #556cd6;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .komeng_btn:active{
            background-color: #4458a3;
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1)
        }

        #video-preview {
            max-width: 20%; 
            display: none; 
            border-radius: 10px; 
        }

        #image-preview {
            max-width: 100px; 
            max-height: 100px; 
            display: none; 
            border-radius: 10px; 
            object-fit: cover; 
        }

    </style>
</head>
<body>
    <div class="left-sidebar" id="left-sidebar">
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
        <div class="nav-links">
            <a href="/profile">Profile</a>
            <a href="/message">Messages</a>
        </div>
    </div>

    <div class="container">
        <div class="navbar">
            <div class="logo">FreeGram</div>
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
            <div class="feed">
                <!-- Upload Container Form -->
                <div class="upload-container">
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <textarea name="caption" placeholder="Beri foto atau video kamu caption!" required></textarea>
                        <label for="file-upload">Choose a photo or video</label>
                        <input type="file" id="file-upload" name="media" accept="image/*,video/*" required>
                        <button type="submit">POST</button>
                        <div class="preview-container"></div>
                        <img id="image-preview" src="#" alt="Preview" style="display:none">
                        <video id="video-preview" src="#" style="display:none"></video>
                    </form>
                </div>

                <script>
                    const fileUpload = document.getElementById('file-upload');
                    const imagePreview = document.getElementById('image-preview');
                    const videoPreview = document.getElementById('video-preview');

                    fileUpload.addEventListener('change', function() {
                        const file = this.files[0];
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            if (file.type.includes('image')) {
                                imagePreview.style.display = 'block';
                                videoPreview.style.display = 'none';
                                imagePreview.src = e.target.result;
                            } else if (file.type.includes('video')) {
                                videoPreview.style.display = 'block';
                                imagePreview.style.display = 'none';
                                videoPreview.src = e.target.result;
                            }
                        };

                        reader.readAsDataURL(file);
                    });
                </script>

                <!-- Example of how you might display posts in your dashboard.blade.php -->
                @foreach ($posts as $post)
                <div class="post">
                    <div class="post-header">
                        <img src="{{ asset('storage/' . $post->user->profile_photo_path) }}" alt="User Profile">
                        <span class="username">{{ $post->user->name }}</span>
                        @if ($post->user_id === Auth::id())
                        <!-- Tambahkan Tombol Hapus -->
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="margin-left: auto;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                        @endif
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
                                <span class="comment-btn" onclick="toggleCommentForm({{ $post->id }});">Comment</span>
                            </div>
                            <div class="likes-count">
                                <span>{{ $post->likes->count() }} likes</span>
                            </div>
                        </div>

                        <!-- Comment Form -->
                        <div class="komeng"id="comment-form-{{ $post->id }}" style="display: none; margin-top: 10px;">
                            <form method="POST" action="{{ route('comments.store', $post->id) }}">
                                @csrf
                                <textarea name="body" placeholder="Tuliskan komentar mu!" required></textarea>
                                <button class="komeng_btn" type="submit">Kirim</button>
                            </form>
                        </div>

                        <!-- Display Comments -->
                        <div class="comments">
                            @foreach ($post->comments as $comment)
                            <div class="comment">
                                <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->body }}</p>
                            </div>
                            @endforeach
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

        function toggleCommentForm(postId) {
            const form = document.getElementById('comment-form-' + postId);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>
