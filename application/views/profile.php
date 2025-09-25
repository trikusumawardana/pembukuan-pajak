<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/auth/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url('assets/auth/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/custom.css" rel="stylesheet">
    <style>
        /* Your CSS styles */
        <?php include 'path_to_your_custom_css_file.css'; ?>
    </style>
</head>

<body class="bg-white">
    <div class="row no-gutters">
        <div class="col-md-3">
            <div class="sidebar">
                <h3>Menu Profil</h3>
                <ul>
                    <li><a href="#"><i class="fa fa-user"></i> Data Profil</a></li>

                    <li><a href="#" class="btn btn-warning"><i class="fa fa-info-circle"></i> Petunjuk</a></li>
                </ul>
                <p class="mt-4 text-yellow">
                    Menu ini digunakan untuk melihat data wajib pajak yang telah terdaftar sebagai pengguna DJP Online.
                    <br>
                    Di menu ini Anda dapat Melihat profil lengkap Anda
                    <br>
                    <!-- 2. Mengubah data profil (email dan nomor handphone) -->
                </p>
            </div>
        </div>
        <?php
        function formatNPWP($npwp)
        {
            // Hapus semua karakter non-angka
            $npwp = preg_replace('/\D/', '', $npwp);
            // Format NPWP dengan simbol
            return substr($npwp, 0, 2) . '.' . substr($npwp, 2, 3) . '.' . substr($npwp, 5, 3) . '.' . substr($npwp, 8, 1) . '-' . substr($npwp, 9, 3) . '.' . substr($npwp, 12, 3);
        }
        ?>
        <div class="col-md-9">
            <div class="content">
                <div class="card card-border">
                    <h4 class="text-primary profile-info">Data Profil</h4>

                    <div class="tab-content mt-3" id="profileTabContent">
                        <div class="tab-pane fade show active" id="data-utama" role="tabpanel" aria-labelledby="data-utama-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="npwp">NPWP</label>
                                        <input type="text" class="form-control" id="npwp" value="<?= formatNPWP($user['npwp']); ?>" placeholder="NPWP" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="efin">EFIN</label>
                                        <input type="text" class="form-control" id="efin" value="<?= $user['efin']; ?>" placeholder="EFIN" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" placeholder="Nama Lengkap" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" value="<?= $user['email']; ?>" placeholder="Email" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" value="Semarang" placeholder="Alamat" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telpon">No. Telepon</label>
                                        <input type="text" class="form-control" id="no_telpon" value="<?= $user['no_telpon']; ?>" placeholder="No. Telpon" readonly>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Tabs for other sections (Data Lainnya, Data KLU, etc.) can be added here -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>