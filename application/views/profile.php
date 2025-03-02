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
                    <li><a href="#"><i class="fa fa-lock"></i> Ubah Kata Sandi</a></li>
                    <li><a href="#"><i class="fa fa-bell"></i> Aktivasi Fitur Layanan</a></li>
                    <li><a href="#" class="btn btn-warning"><i class="fa fa-info-circle"></i> Petunjuk</a></li>
                </ul>
                <p class="mt-4 text-yellow">
                    Menu ini digunakan untuk melihat data wajib pajak yang telah terdaftar sebagai pengguna DJP Online.
                    <br>
                    Di menu ini Anda dapat:
                    <br>
                    1. Melihat profil lengkap Anda
                    <br>
                    2. Mengubah data profil (email dan nomor handphone)
                </p>
            </div>
        </div>
        <div class="col-md-9">
            <div class="content">
                <div class="card card-border">
                    <h4 class="text-primary profile-info">Data Profil</h4>
                    <ul class="nav nav-tabs" id="profileTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="data-utama-tab" data-toggle="tab" href="#data-utama" role="tab" aria-controls="data-utama" aria-selected="true">Data Utama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="data-lainnya-tab" data-toggle="tab" href="#data-lainnya" role="tab" aria-controls="data-lainnya" aria-selected="false">Data Lainnya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="data-klu-tab" data-toggle="tab" href="#data-klu" role="tab" aria-controls="data-klu" aria-selected="false">Data KLU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="anggota-keluarga-tab" data-toggle="tab" href="#anggota-keluarga" role="tab" aria-controls="anggota-keluarga" aria-selected="false">Anggota Keluarga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="info-perpajakan-tab" data-toggle="tab" href="#info-perpajakan" role="tab" aria-controls="info-perpajakan" aria-selected="false">Info Perpajakan</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="profileTabContent">
                        <div class="tab-pane fade show active" id="data-utama" role="tabpanel" aria-labelledby="data-utama-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="npwp">NPWP</label>
                                        <input type="text" class="form-control" id="npwp" value="<?= $user['npwp']; ?>" placeholder="NPWP" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="efin">EFIN</label>
                                        <input type="text" class="form-control" id="efin" value="<?= $user['efin']; ?>" placeholder="EFIN" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" placeholder="Nama Lengkap" readonly>
                                    </div>
                                    <div class="form-group validation-btn">
                                        <span class="valid-status valid">Status Validitas Data Utama</span>
                                      <br>
                                        <button class="btn-valid">Valid</button>
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
                                    <div class="form-group validation-btn">
                                        <span class="valid-status valid">Check Validasi Data</span> <br>
                                        <button class="btn-validate"><i></i> Validasi Data</button>
                                        <button class="btn-valid">Valid</button>
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