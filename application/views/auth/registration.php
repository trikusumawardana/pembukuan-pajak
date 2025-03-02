<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Daftar Akun!</h1>
                            <img src="<?= base_url('assets/img/logo-simulasi.png'); ?>" alt="DJP Logo" class="img-fluid mb-4 djp-logo" style="max-width: 300px; height: auto;">
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= set_value('nama_lengkap'); ?>">
                                <input type="hidden" class="form-control form-control-user" id="efin" name="efin" value="<?= set_value('efin'); ?>">
                                <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="npwp" name="npwp" placeholder="NPWP" value="<?= set_value('npwp'); ?>">
                                <?= form_error('npwp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="EMAIL" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="no_telpon" name="no_telpon" placeholder="No. Telepon" value="<?= set_value('no_telpon'); ?>">
                                <?= form_error('no_telpon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulang Password">
                                </div>

                            </div>
                            <button type="submit" href="login.html" class="btn btn-primary btn-user btn-block login-btn">
                                Daftar Akun
                            </button>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small text-custom" href="<?= base_url('auth'); ?>">Sudah punya akun? <span class="font-weight-bold">Login!</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<script>
    document.getElementById('npwp').addEventListener('input', function(e) {
        // Hapus semua karakter non-digit
        let npwp = e.target.value.replace(/\D/g, '');

        // Batasi panjang NPWP hingga 15 digit angka
        if (npwp.length > 15) {
            npwp = npwp.substring(0, 15);
        }

        // Format NPWP sesuai pola: 45.786.330.0-424.000
        if (npwp.length >= 2) {
            npwp = npwp.substring(0, 2) + '.' + npwp.substring(2);
        }
        if (npwp.length >= 6) {
            npwp = npwp.substring(0, 6) + '.' + npwp.substring(6);
        }
        if (npwp.length >= 10) {
            npwp = npwp.substring(0, 10) + '.' + npwp.substring(10);
        }
        if (npwp.length >= 12) {
            npwp = npwp.substring(0, 12) + '-' + npwp.substring(12);
        }
        if (npwp.length >= 16) {
            npwp = npwp.substring(0, 16) + '.' + npwp.substring(16);
        }

        // Set nilai input ke format yang sudah diformat
        e.target.value = npwp;
    });
</script>

</body>

<style>
    .login-btn {
        background-color: #00285C;
        border-color: #00285C;
    }

    .text-custom {
        color: #00285C;
    }

    .text-custom:hover {
        color: blue;
        text-decoration: none;
    }
</style>

</html>