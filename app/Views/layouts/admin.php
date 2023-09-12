<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <!-- Referensi ke Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- CSS khusus untuk tombol hamburger -->
    <style>
        /* CSS untuk tombol hamburger */
        .navbar-toggler-icon {
            background-color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Tombol hamburger untuk menampilkan tombol logout -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/dashboard">Dashboard</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- Menu 1: Lihat Data User -->
                    <li class="nav-item">
                        <a class="nav-link" href="/datauser">Data User</a>
                    </li>
                    <!-- Menu 2: Kalender -->
                    <li class="nav-item">
                        <a class="nav-link" href="/kalender">Kalender</a>
                    </li>
                    <!-- Menu 3: Pengaturan -->
                    <li class="nav-item">
                        <a class="nav-link" href="pengaturan">Pengaturan</a>
                    </li>
                </ul>
            </div>
            <!-- Tombol logout -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Bagian Konten -->
    <div class="container mt-4">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-3">
        <p>Zahruddin Fanani</p>
    </footer>

    <!-- Referensi ke Bootstrap JS -->
    
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>
