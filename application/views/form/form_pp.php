<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPT Form</title>
    <link href="<?= base_url('assets/') ?>css/css-form-pp.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="form-header">
        <div class="form-left">
            <a href="<?= site_url('form/form_dua') ?>" class="btn-grey">SEBELUMNYA</a>
        </div>
        <div class="form-center">
            <h2> </h2>
        </div>
        <div class="form-right">
            <a href="<?= site_url('form/form_tiga') ?>" class="btn-grey">SELANJUTNYA</a>
        </div>
    </div>
    <div class="form-center">
        <h2>DAFTAR JUMLAH PENGHASILAN BRUTO DAN PEMBAYARAN PPh FINAL BERDASARKAN PP 46 TAHUN 2013 DAN ATAU PP 23 TAHUN 2018 <br> PER MASA PAJAK SERTA DARI MASING-MASING TEMPAT USAHA</h2>
    </div>

    <div class="section-container-last">
        <div class="taxpayer-section">
            <div class="taxpayer-info">
                <p>NAMA WAJIB PAJAK :</p>
                <p>NPWP :</p>
                <p>ALAMAT :</p>
            </div>
            <div class="yellow-box">
                <p style="text-transform:uppercase;"><?= $user['nama_lengkap']; ?></p>
                <p><?= formatNPWP($user['npwp']); ?></p>
                <p style="text-transform:uppercase;"><?= $user['alamat']; ?></p>
            </div>
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

    <?php
    $totalBruto = 0;
    foreach ($form_pp as $row) {
        $totalBruto += $row['perederan_bruto'];
    }

    $totalPPh = 0;
    foreach ($form_pp as $row) {
        $totalPPh += $row['jumlah_pph'];
    }
    ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>
    <!-- TABLE A -->
    <div class="section-container-last">
        <table class="main-table">
            <thead>
                <tr>
                    <th>NPWP</th>
                    <th>MASA PAJAK</th>
                    <th>ALAMAT</th>
                    <th>PEREDERAN BRUTO</th>
                    <th>JUMLAH PPh FINAL YANG <br> DIBAYAR</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($form_pp)): ?>
                    <?php foreach ($form_pp as $row): ?>
                        <tr>
                            <td><?= formatNPWP($user['npwp']); ?></td>
                            <td><?= $row['masa_pajak'] ?></td>
                            <td style="text-transform:uppercase;"><?= $row['alamat'] ?></td>
                            <td><?= number_format($row['perederan_bruto'], 0, ',', '.') ?></td>
                            <td><?= number_format($row['jumlah_pph'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">PEREDERAN BRUTO</th>
                    <th class="yellow-cell" id="total-bruto"><?= number_format($totalBruto, 0, ',', '.') ?></th>
                    <th>JUMLAH FINAL PPh YANG DIBAYAR</th>
                    <th class="yellow-cell" id="jumlah-pph"><?= number_format($totalPPh, 0, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>

        <div class="table-controls">
            <button class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal">Tambah</button>
            <button class="btn btn-outline-dark" onclick="deleteRowA()">Hapus</button>
            <label for="data-ke-a">Data Ke - </label>
            <input type="text" id="data-ke-a" class="form-controller" value="1">
            <div class="pagination-container">
                <?= $pagination; ?>
            </div>
        </div>

        <div class="table-controls">
            <div class="container mt-4 ">
                <table class="table">
                    <form>
                        <div class="form-group row align-items-center table">
                            <label class="col-sm-6 col-form-label">PINDAHKAN NILAI KE LAMPIRAN III ?</label>
                            <div class="col-sm-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lampiran" id="ya" value="ya">
                                    <label class="form-check-label" for="ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lampiran" id="tidak" value="tidak" checked>
                                    <label class="form-check-label" for="tidak">Tidak</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </table>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Form PP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addDataForm" action="<?= base_url('form/form_pp_save_a') ?>" method="post">

                        <div class="form-group">
                            <label for="npwp">NPWP</label>
                            <input type="text" class="form-control" id="npwp" name="npwp" required maxlength="15" minlength="15" oninput="formatNPWP(this)">

                        </div>
                        <div class="form-group">
                            <label for="masaPajak">Masa Pajak</label>
                            <select class="form-control" id="masaPajak" name="masa_pajak" required>
                                <option value="Januari">
                                    Januari
                                </option>
                                <option value="Februari">
                                    Februari
                                </option>
                                <option value="Maret">
                                    Maret
                                </option>
                                <option value="April">
                                    April
                                </option>
                                <option value="Mei">
                                    Mei
                                </option>
                                <option value="Juni">
                                    Juni
                                </option>
                                <option value="Juli">
                                    Juli
                                </option>
                                <option value="Agustus">
                                    Agustus
                                </option>
                                <option value="September">
                                    September
                                </option>
                                <option value="Oktober">
                                    Oktober
                                </option>
                                <option value="November">
                                    November
                                </option>
                                <option value="Desember">
                                    Desember
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="perederanBruto">Perederan Bruto</label>
                            <input type="number" class="form-control" id="perederanBruto" name="perederan_bruto" required oninput="hitungJumlahPPh()">
                        </div>
                        <div class="form-group">
                            <label for="jumlahPPh">Jumlah PPh</label>
                            <input type="number" class="form-control" id="jumlahPPh" name="jumlah_pph" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function formatNPWP(input) {
            // Hapus semua karakter non-angka
            let value = input.value.replace(/\D/g, '');
            // Batasi panjang input menjadi 15 karakter
            value = value.substring(0, 15);
            // Format NPWP dengan simbol
            if (value.length > 0) {
                value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})/, '$1.$2.$3.$4-$5.$6');
            }
            input.value = value;
        }

        // Fungsi untuk menghitung Jumlah PPh
        function hitungJumlahPPh() {
            const perederanBruto = document.getElementById('perederanBruto').value;
            const jumlahPPh = document.getElementById('jumlahPPh');

            if (perederanBruto) {
                // Hitung Jumlah PPh berdasarkan rumus: Perederan Bruto / 200
                const hasil = perederanBruto / 200;
                jumlahPPh.value = hasil.toFixed(0); // Format 2 digit di belakang koma
            } else {
                jumlahPPh.value = ''; // Kosongkan jika Perederan Bruto kosong
            }
        }

        function deleteRowA() {
            const dataKeA = document.getElementById("data-ke-a").value;

            if (dataKeA && !isNaN(dataKeA)) {
                if (confirm(`Apakah Anda yakin ingin menghapus data ke-${dataKeA}?`)) {
                    $.ajax({
                        url: "<?= base_url('form/hapus_form_pp') ?>",
                        method: "POST",
                        data: {
                            data_ke_a: dataKeA
                        },
                        success: function(response) {
                            const res = JSON.parse(response);
                            if (res.status === 'success') {
                                alert(res.message);
                                location.reload(); // Muat ulang halaman untuk memperbarui tabel
                            } else {
                                alert(res.message); // Tampilkan pesan error
                            }
                        },
                        error: function(xhr, status, error) {
                            alert("Terjadi kesalahan. Data tidak dapat dihapus.");
                        }
                    });
                }
            } else {
                alert("Masukkan nomor data yang valid.");
            }
        }

        function validateForm() {
            const npwpInput = document.getElementById('npwp').value.replace(/\D/g, ''); // Hapus simbol non-angka
            const npwpSession = "<?= $this->session->userdata('npwp') ?>"; // Ambil NPWP dari session

            if (npwpInput.length !== 15) {
                alert('NPWP harus 15 digit.');
                return false; // Hentikan pengiriman form
            }

            if (npwpInput !== npwpSession) {
                alert('NPWP yang diinput harus sama dengan NPWP Anda.');
                return false; // Hentikan pengiriman form
            }

            return true; // Lanjutkan pengiriman form
        }

        // Tambahkan event listener ke form
        document.getElementById('addDataForm').addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault(); // Hentikan pengiriman form jika validasi gagal
            }
        });
    </script>

</body>

</html>