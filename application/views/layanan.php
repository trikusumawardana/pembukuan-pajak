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
</head>

<body>
    <div class="container"> <!-- Tambahkan class mt-5 untuk margin-top -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <section class="mb-2">
                            <h5 class="card-title mr-3"><i class="navbar-toggler-icon" style="max-width: 30px;"></i>Menu Profil</h5>
                        </section>
                        <hr>
                        <p class="card-text text-uppercase font-weight-bold mb-1 profile-info"><?= $user['nama_lengkap']; ?></p>
                        <p class="card-text mt-1 profile-info"><?= $user['npwp']; ?></p>
                        <p class="card-text mb-1 title-profile font-weight-bold ">Alamat</p>
                        <p class="card-text mt-1 text-uppercase isi-profile text-secondary profile-info"><?= $user['alamat']; ?></p>
                        <p class="card-text mb-1 title-profile font-weight-bold profile-info">No. Telepon</p>
                        <p class="card-text mt-1 isi-profile text-secondary profile-info"><?= $user['no_telpon']; ?></p>
                        <p class="card-text mb-1 title-profile font-weight-bold profile-info">EFIN</p>
                        <p class="card-text mt-1 isi-profile text-secondary profile-info"><?= $user['efin']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-file-text icon-profile-dashboard"></i>Riwayat Pelaporan</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($laporan)) : ?>
                                    <?php foreach ($laporan as $lapor) : ?>
                                        <tr>
                                            <td><?= date('d M Y', strtotime($lapor['tanggal'])); ?></td>
                                            <td><?= $lapor['status']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="2">Tidak ada data laporan.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>