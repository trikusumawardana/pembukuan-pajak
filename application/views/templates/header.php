<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/auth/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url('assets/auth/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/custom.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top bg-white">
        <div class="container-fluid ml-5 mr-5">
            <img src="<?= base_url('assets/img/logo-simulasi.png'); ?>" alt="DJP Logo" class="img-fluid" style="max-width:150px; height: auto;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-5" id="navbarResponsive">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?= set_active('informasi'); ?>">
                        <a class="nav-link" href="<?= base_url('informasi'); ?>">Informasi</a>
                    </li>
                    <li class="nav-item <?= set_active('bayar'); ?>">
                        <a class="nav-link" href="<?= base_url('bayar'); ?>">Bayar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">Logout</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold"><span class="text-yellow">Hallo,</span> <span class="text-uppercase"><?= $user['nama_lengkap']; ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold icon-profile" href="<?= base_url('profile'); ?>">
                            <i class="fa fa-user"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Tambahkan konten halaman di sini -->
</body>

</html>