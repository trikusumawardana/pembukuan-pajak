<body>

    <div class="container container-custom mt-5 no-padding mb-4">
        <div class="row no-margin">
            <div class="col-12 no-padding">
                <div class="card card-info">
                    <div class="card-body">
                        <a href="form">
                            <div class="card-border">
                                <img src="<?= base_url('assets/img/e-billing.png'); ?>" alt="gambar" class="img-fluid" style="width: 150px; height: auto;">
                            </div>
                        </a>
                    </div>
                    <p class="no-margin pl-4 ml-5 font-weight-bold">e-Billing</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container container-custom no-padding mb-4">
        <div class="row no-margin">
            <div class="col-12 no-padding">
                <div class="card card-info-dua p-1 no-margin">
                    <div class="card-body">
                        <p class="no-margin text-dark">"Apabila dapat data yang tidak sesuai,silahkan menghubungi Tri Kusumawardana di trikusumawardana6@gmail.com"</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container container-custom no-padding mb-4 mt-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-file icon-profile-dashboard bg-"></i> Riwayat Pembayaran</h6>
            </div>
            <div class="card-body">

                <p class="card-title">
                    <a href="#" class="pr-3" id="link-pembayaran">Pembayaran</a>
                    <a href="#" class="pr-3 pl-3" id="link-pbk-kirim">PBK Kirim</a>
                    <a href="#" class="pr-3 pl-3" id="link-pbk-terima">PBK Terima</a>
                </p>


                <!-- Pembayaran -->
                <div class="table-responsive" id="table-pembayaran">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>TAHUN/MASA PAJAK</th>
                                <th>TANGGAL BAYAR</th>
                                <th>NTPN</th>
                                <th>NOMINAL BAYAR</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Pembayaran</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>$320,800</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- PBK Kirim -->
                <div class="table-responsive" id="table-pbk-kirim" style="display:none;">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>PBK Kirim</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- PBK Terima -->
                <div class="table-responsive" id="table-pbk-terima" style="display:none;">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>PBK Terima</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk menangani klik -->
    <script>
        $(document).ready(function() {
            $('#link-pembayaran').click(function(e) {
                e.preventDefault();
                $('.table-responsive').hide();
                $('#table-pembayaran').show();
            });

            $('#link-pbk-kirim').click(function(e) {
                e.preventDefault();
                $('.table-responsive').hide();
                $('#table-pbk-kirim').show();
            });

            $('#link-pbk-terima').click(function(e) {
                e.preventDefault();
                $('.table-responsive').hide();
                $('#table-pbk-terima').show();
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>