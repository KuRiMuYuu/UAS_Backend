<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeGram - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Style CSS */
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            transition: color 0.5s; /* Animasi perubahan warna teks */
        }

        /* Navbar */
        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #ccc;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .profile-picture {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            margin-left: auto; /* Move profile picture to the right */
        }

        /* Sidebar */
        .sidebar {
            background-color: #f0f0f0;
            width: 250px;
            padding: 20px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: -250px;
            overflow-y: auto;
            transition: left 0.3s ease-in-out;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar li a {
            text-decoration: none;
            transition: color 0.3s; /* Animasi perubahan warna teks */
        }

        .sidebar li a:hover {
            color: #667eea;
        }

        /* Main content */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Example Post */
        .post {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .post .author {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .post .content {
            margin-bottom: 10px;
        }

        .post .actions {
            display: flex;
            justify-content: space-between;
        }

        .post .actions i {
            cursor: pointer;
            color: #333;
        }

        /* Dark Mode */
        body.dark-mode {
            background-color: #333;
            color: #fff;
        }

        body.dark-mode .navbar {
            background-color: #222;
            border-color: #444;
        }

        body.dark-mode .sidebar {
            background-color: #444;
        }

        body.dark-mode .post {
            background-color: #222;
            color: #fff;
            border-color: #444;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-brand">FreeGram</div>
        <div class="settings">
            <button id="toggle-theme"><i class="fas fa-cog"></i></button>
            <div class="profile-picture">
                <img src="https://via.placeholder.com/40" alt="Profile Picture">
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3>Menu</h3>
        <ul>
            <li><a href="#">Beranda</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Pesan</a></li>
            <li><a href="#">Tentang</a></li>
            <!-- Tambahkan menu sesuai kebutuhan -->
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Example Post -->
        <div class="post">
            <div class="author">John Doe</div>
            <div class="content">Ini adalah contoh postingan dalam tampilan seperti Instagram. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</div>
            <div class="actions">
                <div><i class="far fa-heart"></i> 10</div>
                <div><i class="far fa-comment"></i> 5</div>
                <div><i class="fas fa-share"></i></div>
            </div>
        </div>

        <!-- Tambahkan postingan lainnya di sini -->
    </div>

    <!-- Font Awesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script>
        // Sidebar Animation
        const sidebar = document.getElementById('sidebar');
        const body = document.body;

        document.addEventListener('mousemove', function(e) {
            const x = e.pageX;

            // Ketika kursor berada dalam jarak 50px dari sisi kiri halaman, aktifkan sidebar
            if (x < 50) {
                sidebar.classList.add('active');
            } else {
                sidebar.classList.remove('active');
            }
        });

        // Toggle Dark Mode
        const toggleThemeBtn = document.getElementById('toggle-theme');
        toggleThemeBtn.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
