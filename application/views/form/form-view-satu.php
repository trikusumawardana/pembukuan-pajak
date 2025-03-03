<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPT Form</title>
    <link href="<?= base_url('assets/') ?>css/css-form-satu.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="form-header">
        <div class="form-left">
            <p class="vertical-text">FORMULIR</p>
            <div class="label-right">
                <h1>1770-III</h1>
                <p>KEMENTERIAN KEUANGAN RI <br> DIREKTORAT JENDERAL PAJAK</p>
            </div>
        </div>
        <div class="form-center">
            <h2>LAMPIRAN - IV</h2>
            <div class="form-info">
                <p>SPT TAHUNAN PPh WAJIB PAJAK ORANG PRIBADI</p>
                <hr>
                <ul>
                    <li>HARTA PADA AKHIR TAHUN</li>
                    <li>KEWAJIBAN/UTANG PADA AKHIR TAHUN</li>
                    <li>DAFTAR SUSUNAN ANGGOTA KELUARGA</li>
                </ul>
            </div>
        </div>
        <div class="form-right">
            <a href="<?= site_url('form/form_dua') ?>" class="btn-grey">SELANJUTNYA</a>
            <div class="year-container">
                <div class="year-box">2</div>
                <div class="year-box">0</div>
                <div class="year-box">2</div>
                <div class="year-box">2</div>
            </div>
            <p class="vertical-text-right">TAHUN PAJAK</p>
            <div class="form-dates">
                <div class="date-row">
                    <div>0</div>
                    <div>1</div>
                    <div>2</div>
                    <div>2</div>
                </div>
                <p>s.d</p>
                <div class="date-row">
                    <div>1</div>
                    <div>2</div>
                    <div>2</div>
                    <div>2</div>
                </div>
            </div>
            <div class="bl-th">
                <label>BL</label>
                <label id="th">TH</label>
            </div>
            <div class="bl-th-dua">
                <label>BL</label>
                <label id="th">TH</label>
            </div>
            <div class="form-options">
                <label><input type="radio" name="option" value="Pembukuan" checked> Pembukuan</label>
                <label><input type="radio" name="option" value="Pencatatan" disabled> Pencatatan</label>
            </div>
            <div class="spt">
                <label>
                    <input type="checkbox"> SPT PEMBETULAN KE
                    <input type="text" value="0">
                </label>
            </div>
        </div>
    </div>
    <p class="warning"><strong>PERHATIAN:</strong> * SEBELUM MENGISI BACALAH PETUNJUK PENGISIAN * ISI DENGAN HURUF CETAK/DIKETIK DENGAN TINTA HITAM * BERI TANDA X DALAM KOTAK SESUAI PILIHAN</p>

    <div class="section-container-last">
        <div class="taxpayer-section">
            <div class="taxpayer-info">
                <p>NAMA WAJIB PAJAK :</p>
                <p>NPWP :</p>
            </div>
            <div class="yellow-box">
                <p style="text-transform:uppercase;"><?= $user['nama_lengkap']; ?></p>
                <p><?= formatNPWP($user['npwp']); ?></p>
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
    $totalAmount = 0;
    foreach ($form_data_a as $row) {
        $totalAmount += $row['harga_perolehan'];
    }
    ?>

    <!-- TABLE A -->
    <div class="section-container-last">
        <div class="table-header-position">
            <div class="table-header">
                <p>BAGIAN A. HARTA PADA AKHIR TAHUN</p>
            </div>
        </div>
        <table class="main-table">
            <thead>
                <tr>
                    <th>KODE HARTA</th>
                    <th>NAMA HARTA</th>
                    <th>TAHUN <br> PEROLEHAN</th>
                    <th>HARGA PEROLEHAN</th>
                    <th>KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($form_data_a)): ?>
                    <?php foreach ($form_data_a as $row): ?>
                        <tr>
                            <td><?= $row['kode_harta'] ?></td>
                            <td class="text-uppercase"><?= $row['nama_harta'] ?></td>
                            <td><?= $row['tahun_perolehan'] ?></td>
                            <td><?= number_format($row['harga_perolehan'], 0, ',', '.') ?></td>
                            <td class="text-uppercase"><?= $row['keterangan'] ?></td>
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
                    <th colspan="3">JUMLAH BAGIAN A</th>
                    <th class="yellow-cell" id="total-amount"><?= number_format($totalAmount, 0, ',', '.') ?></th>
                    <th></th>
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
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Harta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    <form id="addDataForm" action="<?= base_url('form/form_satu_save_a') ?>" method="post">

                        <div class="form-group">
                            <label for="kodeHarta">Kode Harta</label>
                            <select class="form-control" id="kodeHarta" name="kode_harta" required>
                                <?php foreach ($kode_harta as $kode): ?>
                                    <option value="<?= $kode['kode'] . ' - ' . $kode['nama'] ?>">
                                        <?= $kode['kode'] ?> - <?= $kode['nama'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="namaHarta">Nama Harta</label>
                            <input type="text" class="form-control" id="namaHarta" name="nama_harta" required>
                        </div>
                        <div class="form-group">
                            <label for="tahunPerolehan">Tahun Perolehan</label>
                            <input type="number" class="form-control" id="tahunPerolehan" name="tahun_perolehan" required>
                        </div>
                        <div class="form-group">
                            <label for="hargaPerolehan">Harga Perolehan</label>
                            <input type="number" class="form-control" id="hargaPerolehan" name="harga_perolehan" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    $totalPeminjam = 0;
    foreach ($form_data_b as $row) {
        $totalPeminjam += $row['jumlah_peminjaman'];
    }
    ?>

    <!-- TABLE B -->
    <div class="section-container-last">
        <div class="table-header-position">
            <div class="table-header">
                <p>BAGIAN B. KEWAJIBAN UTANG PADA AKHIR TAHUN</p>
            </div>
        </div>
        <table class="main-table">
            <thead>
                <tr>
                    <th>KODE UTANG</th>
                    <th>NAMA PEMBERI PINJAMAN</th>
                    <th>ALAMAT PEMBERI PINJAMAN</th>
                    <th>TAHUN PEMINJAMAN</th>
                    <th>JUMLAH PEMINJAMAN</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($form_data_b)): ?>
                    <?php foreach ($form_data_b as $row): ?>
                        <tr>
                            <td><?= $row['kode_utang'] ?></td>
                            <td class="text-uppercase"><?= $row['nama_pemberi_pinjaman'] ?></td>
                            <td class="text-uppercase"><?= $row['alamat_pemberi_pinjaman'] ?></td>
                            <td><?= $row['tahun_peminjaman'] ?></td>
                            <td><?= number_format($row['jumlah_peminjaman'], 0, ',', '.') ?></td>
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
                    <th colspan="4">JUMLAH BAGIAN B</th>
                    <th class="yellow-cell" id="total-amount"><?= number_format($totalPeminjam, 0, ',', '.') ?></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        <div class="table-controls">
            <button class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModalB">Tambah</button>
            <button class="btn btn-outline-dark" onclick="deleteRowB()">Hapus</button>
            <label for="data-ke-b">Data Ke - </label>
            <input type="text" id="data-ke-b" class="form-controller" value="1">
            <div class="pagination-container">
                <?= $pagination; ?>
            </div>
        </div>
    </div>

    <!-- Modal B-->
    <div class="modal fade" id="addDataModalB" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Harta B</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addDataForm" action="<?= base_url('form/form_satu_save_b') ?>" method="post">

                        <div class="form-group">
                            <label for="kodeUtang">Kode Utang</label>
                            <select class="form-control" id="kodeUtang" name="kode_utang" required>
                                <?php foreach ($kode_utang as $kode): ?>
                                    <option value="<?= $kode['kode'] . ' - ' . $kode['nama'] ?>">
                                        <?= $kode['kode'] ?> - <?= $kode['nama'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="namaPemberiPinjaman">Nama Pemberi Pinjaman</label>
                            <input type="text" class="form-control" id="namaPemberiPinjaman" name="nama_pemberi_pinjaman" required>
                        </div>
                        <div class="form-group">
                            <label for="alamatPemberiPinjaman">Alamat Pemberi Pinjaman</label>
                            <input type="text" class="form-control" id="alamatPemberiPinjaman" name="alamat_pemberi_pinjaman" required>
                        </div>
                        <div class="form-group">
                            <label for="tahunPeminjaman">Tahun Peminjaman</label>
                            <input type="text" class="form-control" id="tahunPeminjaman" name="tahun_peminjaman" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlahPeminjaman">Jumlah Peminjaman</label>
                            <input type="text" class="form-control" id="jumlahPeminjaman" name="jumlah_peminjaman">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLE C -->
    <div class="section-container-last">
        <div class="table-header-position">
            <div class="table-header">
                <p>BAGIAN C. DAFTAR SUSUNAN ANGGOTA KELUARGA</p>
            </div>
        </div>
        <!-- Additional Section Content -->
        <table class="main-table">
            <thead>
                <tr>
                    <th>NAMA ANGGOTA KELUARGA</th>
                    <th>NIK</th>
                    <th>HUBUNGAN</th>
                    <th>PEKERJAAN</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($form_data_c)): ?>
                    <?php foreach ($form_data_c as $row): ?>
                        <tr>
                            <td class="text-uppercase"><?= $row['nama_anggota_keluarga'] ?></td>
                            <td><?= $row['nik'] ?></td>
                            <td class="text-uppercase"><?= $row['hubungan'] ?></td>
                            <td class="text-uppercase"><?= $row['pekerjaan'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="table-controls">
            <button class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModalC">Tambah</button>
            <button class="btn btn-outline-dark" onclick="deleteRowC()">Hapus</button>
            <label for="data-ke-c">Data Ke - </label>
            <input type="text" id="data-ke-c" class="form-controller" value="1">
            <div class="pagination-container">
                <?= $pagination; ?>
            </div>
        </div>
    </div>

    <!-- Modal B-->
    <div class="modal fade" id="addDataModalC" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Harta C</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addDataForm" action="<?= base_url('form/form_satu_save_c') ?>" method="post">

                        <div class="form-group">
                            <label for="namaAnggotaKeluarga">Nama Anggota Keluarga</label>
                            <input type="text" class="form-control" id="namaAnggotaKeluarga" name="nama_anggota_keluarga" required>
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" required>
                        </div>
                        <div class="form-group">
                            <label for="hubungan">Hubungan</label>
                            <input type="text" class="form-control" id="hubungan" name="hubungan" required>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
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
        document.getElementById('kodeHarta').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex].text;
            this.value = selectedOption; // Hindari manipulasi manual
        });

        function deleteRowA() {
            const dataKeA = document.getElementById("data-ke-a").value;

            if (dataKeA && !isNaN(dataKeA)) {
                if (confirm(`Apakah Anda yakin ingin menghapus data ke-${dataKeA}?`)) {
                    $.ajax({
                        url: "<?= base_url('form/hapus_form_satu_a') ?>",
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

        function deleteRowB() {
            const dataKeB = document.getElementById("data-ke-b").value;

            if (dataKeB && !isNaN(dataKeB)) {
                if (confirm(`Apakah Anda yakin ingin menghapus data ke-${dataKeB}?`)) {
                    $.ajax({
                        url: "<?= base_url('form/hapus_form_satu_b') ?>",
                        method: "POST",
                        data: {
                            data_ke_b: dataKeB
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

        function deleteRowC() {
            const dataKeC = document.getElementById("data-ke-c").value;

            if (dataKeC && !isNaN(dataKeC)) {
                if (confirm(`Apakah Anda yakin ingin menghapus data ke-${dataKeC}?`)) {
                    $.ajax({
                        url: "<?= base_url('form/hapus_form_satu_c') ?>",
                        method: "POST",
                        data: {
                            data_ke_c: dataKeC
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

        document.getElementById('tahunPerolehan').addEventListener('input', function() {
            const tahunPerolehan = this.value;
            const tahunSekarang = new Date().getFullYear();

            if (tahunPerolehan.length > 4 || tahunPerolehan > tahunSekarang) {
                this.setCustomValidity('Tahun perolehan tidak boleh lebih dari 4 digit dan tidak boleh melebihi tahun saat ini.');
            } else {
                this.setCustomValidity('');
            }
        });

        document.getElementById('tahunPeminjaman').addEventListener('input', function() {
            const tahunPeminjaman = this.value;
            const tahunSekarang = new Date().getFullYear();

            if (tahunPeminjaman.length > 4 || tahunPeminjaman > tahunSekarang) {
                this.setCustomValidity('Tahun peminjaman tidak boleh lebih dari 4 digit dan tidak boleh melebihi tahun saat ini.');
            } else {
                this.setCustomValidity('');
            }
        });

        document.getElementById('nik').addEventListener('input', function() {
            const nik = this.value;

            if (nik.length !== 16 || isNaN(nik)) {
                this.setCustomValidity('NIK harus 16 digit angka.');
            } else {
                this.setCustomValidity('');
            }
        });
    </script>
</body>
</body>

</html>