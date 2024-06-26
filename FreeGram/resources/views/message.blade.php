<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeGram - Messages</title>
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
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%; 
            max-width: 1350px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0 10%;
        }

        .navbar {
            background: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #667eea;
        }

        .home-btn {
            padding: 10px 20px;
            background: #764ba2;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .home-btn:hover {
            background-color: #6a4aa3;
        }

        .main-content {
            display: flex;
            flex: 1;
        }

        .messages {
            display: flex;
            flex: 1;
        }

        .conversation-list {
            width: 30%;
            background: #f0f0f0;
            padding: 20px;
            overflow-y: auto;
        }

        .conversation {
            display: flex;
            align-items: center;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .conversation:hover {
            background-color: #e0e0e0;
        }

        .conversation img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .conversation .details {
            flex: 1;
        }

        .conversation .username {
            font-weight: bold;
        }

        .message-view {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .messages-container {
            flex: 1;
            overflow-y: auto;
        }

        .message {
            margin-bottom: 10px;
        }

        .message-content {
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
            word-wrap: break-word;
        }

        .from-me {
            align-self: flex-end;
            background: #667eea;
            color: white;
        }

        .from-other {
            align-self: flex-start;
            background: #f0f0f0;
        }

        .message-input {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .message-input textarea {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            resize: none;
            font-size: 1rem;
            margin-right: 10px;
        }

        .message-input button {
            padding: 10px 20px;
            background-color: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .message-input button:hover {
            background-color: #556cd6;
            transform: translateY(-2px);
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

    </style>
    </head>
    <body>
    <div class="left-sidebar" id="left-sidebar">
            <div class="search-bar">
                <input type="text" placeholder="Search...">
            </div>
            <div class="nav-links">
                <a href="#">Profile</a>
                <a href="/dashboard">Home</a>
            </div>
        </div>    
    <div class="container">
        <div class="navbar">
            <div class="logo">FreeGram</div>
        </div>

        <div class="main-content">
            <div class="messages">
                <!-- Daftar Pesan -->
                <div class="conversation-list">
                    <div class="conversation">
                        <img src="https://via.placeholder.com/50" alt="User Profile">
                        <div class="details">
                            <div class="username">Jane Doe</div>
                            <div class="message-preview">Hey! What's up?</div>
                        </div>
                    </div>
                    <!-- Tambahkan div conversation untuk setiap percakapan -->
                </div>

                <!-- Area Tampilan Pesan -->
                <div class="message-view">
                    <div class="messages-container">
                        <!-- Pesan-pesan dari percakapan -->
                        <div class="message from-other">
                            <div class="message-content">Hi there!</div>
                        </div>
                        <div class="message from-me">
                            <div class="message-content">Hello!</div>
                        </div>
                        <!-- Tambahkan div message untuk setiap pesan -->
                    </div>
                    <form class="message-input" action="#">
                        <textarea placeholder="Type your message..." required></textarea>
                        <button type="submit">Send</button>
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
