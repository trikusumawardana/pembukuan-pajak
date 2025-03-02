<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    <img src="<?= base_url('assets/img/logo-simulasi.png'); ?>" alt="DJP Logo" class="img-fluid mb-4 djp-logo" style="max-width: 300px; height: auto;">
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <!-- Ganti type="npwp" menjadi type="text" -->
                                        <input type="text" class="form-control form-control-user" id="npwp" name="npwp" placeholder="Masukan NPWP..." value="<?= set_value('npwp') ?>">
                                        <?= form_error('npwp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block login-btn">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small text-custom" href="<?= base_url('auth/registration'); ?>">Pengguna Baru? <span class="font-weight-bold">Daftar disini</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

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

        e.target.value = npwp;
    });
</script>

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