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
    <link href="<?= base_url('assets/') ?>css/custom.css" rel="stylesheet"> <!-- Custom CSS -->
</head>

<body>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-info">
            <?= $this->session->flashdata('message'); ?>
        </div>
    <?php endif; ?>

    <?php
    function formatNPWP($npwp)
    {
        // Pastikan NPWP memiliki 15 karakter
        if (strlen($npwp) == 15) {
            return substr($npwp, 0, 2) . '.' .
                substr($npwp, 2, 3) . '.' .
                substr($npwp, 5, 3) . '.' .
                substr($npwp, 8, 1) . '-' .
                substr($npwp, 9, 3) . '.' .
                substr($npwp, 12, 3);
        } else {
            return $npwp; // jika tidak 15 karakter, kembalikan apa adanya
        }
    }
    ?>


    <div class="container container-custom mt-3">
        <div class="row no-margin">
            <div class="col-12 no-padding">
                <div class="card bg-primary text-white p-3 card-info">
                    <div class="card-body">
                        <h5 class="card-title m-0"><i class="fa fa-file icon-profile-dashboard"></i>Informasi</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-margin d-flex align-items-stretch">
            <div class="col-md-6 no-padding">
                <div class="card mb-0">
                    <div class="card-body">
                        <h3 class="text-uppercase"><?= $user['nama_lengkap']; ?></h3>
                        <p>Anda merupakan Wajib Pajak yang telah terdaftar pada sistem Direktorat Jenderal Pajak.</p>

                        <!-- <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <img src="https://www.djp.go.id/id/berita-djp/download/2023/02/03/KODE-BAR-NPWP.png" alt="NPWP 15" width="50">
                                        <span>NPWP 15</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <img src="https://www.djp.go.id/id/berita-djp/download/2023/02/03/KODE-BAR-NPWP.png" alt="NPWP 16" width="50">
                                        <span>NPWP 16</span>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label for="npwp">NPWP:</label>
                            <input type="text" class="form-control" id="npwp" value="<?= str_repeat('*', strlen($user['npwp']) - 3) . substr($user['npwp'], -3); ?>" readonly>

                        </div>


                        <div class="form-group">
                            <label for="email">Alamat Email:</label>
                            <input type="email" class="form-control" id="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="noTelp">No Telp:</label>
                            <input type="text" class="form-control" id="no_telpon" value="<?= $user['no_telpon']; ?>" readonly>
                        </div>
                        <button type="button" class="btn bg-primary btn-block" data-toggle="modal" data-target="#ubahProfilModal">Ubah Profil</button>

                        <!-- Modal Ubah Profil -->
                        <div class="modal fade" id="ubahProfilModal" tabindex="-1" role="dialog" aria-labelledby="ubahProfilModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ubahProfilModalLabel">Ubah Profil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('informasi/update_profile'); ?>" method="post">
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="no_telpon">No. Telp:</label>
                                                <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="<?= $user['no_telpon']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 no-padding">
                <div class="card mb-0">
                    <div class="card-body">
                        <button type="button" class="btn bg-primary btn-block" id="toggleNpwp">Tampilkan NPWP</button>


                        <p class="mb-4 mt-5">Anda dapat mengirim NPWP Elektronik ke email Anda dengan menekan tombol dibawah</p>

                        <!-- <button type="button" class="btn bg-primary btn-block mb-5" id="kirimEmail"><i class="fa fa-envelope mr-2" aria-hidden="true"></i>Kirim Email</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleNpwp').addEventListener('click', function() {
            var npwpInput = document.getElementById('npwp');
            var toggleButton = document.getElementById('toggleNpwp');

            if (toggleButton.textContent === 'Tampilkan NPWP') {
                // Tampilkan NPWP yang sudah diformat dari controller
                npwpInput.value = '<?= $formatted_npwp; ?>';
                toggleButton.textContent = 'Tutup NPWP';
            } else {
                npwpInput.value = '<?= str_repeat('*', strlen($user['npwp']) - 3) . substr($user['npwp'], -3); ?>';
                toggleButton.textContent = 'Tampilkan NPWP';
            }
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>