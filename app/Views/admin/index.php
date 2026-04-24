<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Edi Bengkel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?q=80&w=2000'); /* Gambar background bengkel */
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-section {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 50px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>

    <div class="container hero-section">
        <h1 class="display-3 fw-bold mb-3">Sistem Informasi Edi Jaya Motor</h1>
        <p class="lead mb-5">Manajemen bengkel dengan sangat efisien.</p>
        
        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
            <a href="<?= base_url('/admin/login'); ?>" class="btn btn-primary btn-lg px-5">Login</a>
            <a href="<?= base_url('/admin/register'); ?>" class="btn btn-outline-light btn-lg px-5">Register</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>