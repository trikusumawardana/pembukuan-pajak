<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPT Form</title>
    <link href="<?= base_url('assets/') ?>css/css-form-tiga.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="form-header">
        <div class="form-left">
            <a href="<?= site_url('form/form_dua') ?>" class="btn-grey">SEBELUMNYA</a>
            <p class="vertical-text">FORMULIR</p>
            <div class="label-right">
                <h1>1770-II</h1>
                <p>KEMENTERIAN KEUANGAN RI <br> DIREKTORAT JENDERAL PAJAK</p>
            </div>
        </div>
        <div class="form-center">
            <h2>LAMPIRAN - II</h2>
            <div class="form-info">
                <p>SPT TAHUNAN PPh WAJIB PAJAK ORANG PRIBADI</p>
                <hr>
                <ul>
                    <li>DAFTAR PEMOTONGAN/PEMUNGUTAN PPh OLEH PIHAK LAIN,</li>
                    <li>PPh YANG DIBAYAR/DIPOTONG DI LUAR NEGERI DAN</li>
                    <li>PPh DITANGGUNG PEMERINTAH</li>
                </ul>
            </div>
        </div>
        <div class="form-right">
            <a href="<?= site_url('form/form_empat') ?>" class="btn-grey">SELANJUTNYA</a>
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
                <p><?= $user['npwp']; ?></p>
            </div>
        </div>
    </div>

    <div class="table-header-position">
        <div class="table-header">
            <p>BAGIAN A. DAFTAR /PEMOTONGAN PPh OLEH PIHAK LAIN, PPh YANG DIBAYAR /DIPOTONG DI LUAR NEGERI DAN PPh DITANGGUNG PEMERINTAH</p>
        </div>
    </div>

    <?php
    $jumlahPPh = 0;
    foreach ($form_tiga as $row) {
        $jumlahPPh += $row['jumlah_pph_yang_dipotong'];
    }
    ?>

    <?php
    function formatNPWP($npwp)
    {
        // Hapus semua karakter non-angka
        $npwp = preg_replace('/\D/', '', $npwp);
        // Format NPWP dengan simbol
        return substr($npwp, 0, 2) . '.' . substr($npwp, 2, 3) . '.' . substr($npwp, 5, 3) . '.' . substr($npwp, 8, 1) . '-' . substr($npwp, 9, 3) . '.' . substr($npwp, 12, 3);
    }
    ?>

    <div class="section-container-last">
        <table class="main-table">
            <thead>
                <tr>
                    <th rowspan="2">NO</th>
                    <th rowspan="2">NAMA PEMOTONG/PEMUNGUT PAJAK</th>
                    <th rowspan="2">NPWP PEMOTONG/ PEMUNGUT PAJAK</th>
                    <th colspan="2">BUKTI PEMOTONGAN</th>
                    <th rowspan="2">JENIS PAJAK: PPh PASAL 21/22/23/26/DTP</th>
                    <th rowspan="2">JUMLAH PPh YANG DIPOTONG/PUNGUT</th>
                </tr>
                <tr>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                </tr>
                <tr>
                    <th>(1)</th>
                    <th>(2)</th>
                    <th>(3)</th>
                    <th>(4)</th>
                    <th>(5)</th>
                    <th>(6)</th>
                    <th>(7)</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php if (!empty($form_tiga)): ?>
                    <?php $nomor_urut = 1; // Inisialisasi nomor urut 
                    ?>
                    <?php foreach ($form_tiga as $row): ?>
                        <tr>
                            <td><?= $nomor_urut++ ?></td> <!-- Nomor urut ditampilkan dan ditingkatkan -->
                            <td class="text-uppercase"><?= $row['nama_pemotong'] ?></td>
                            <td><?= formatNPWP($row['npwp_pemotong']) ?></td>
                            <td><?= $row['bukti_pemotongan_nomor'] ?></td>
                            <td><?= $row['bukti_pemotongan_tanggal'] ?></td>
                            <td><?= $row['jenis_pajak'] ?></td>
                            <td><?= number_format($row['jumlah_pph_yang_dipotong'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5">JUMLAH BAGIAN A</th>
                    <th>JBA</th>
                    <th class="yellow-cell" id="total-amount"><?= number_format($jumlahPPh, 0, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>
        <div class="table-controls">
            <button class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal">Tambah</button>
            <button class="btn btn-outline-dark" onclick="deleteRowA()">Hapus</button>
            <label for="data-ke">Data Ke - </label>
            <input type="text" id="data-ke-a" value="1">
            <div class="pagination-container">
                <?= $pagination; ?>
            </div>
        </div>
        <div class="table-footer">
            <p>Pindahkan Jumlah Bagian A Kolom 7 ke Formulir 1770 Angka 15</p>
        </div>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Modal -->
        <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDataModalLabel">Tambah Data Form Tiga</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form id="addDataForm" action="<?= base_url('form/form_tiga_save') ?>" method="post">

                            <div class="form-group">
                                <label for="namaPemotong">Nama Pemotong/Pemungut Pajak</label>
                                <input type="text" class="form-control" id="namaPemotong" name="nama_pemotong" required>
                            </div>
                            <div class="form-group">
                                <label for="npwpPemotong">NPWP Pemotong/Pemungut Pajak</label>
                                <input type="text" class="form-control" id="npwpPemotong" name="npwp_pemotong" required maxlength="20">
                            </div>
                            <div class="form-group">
                                <label for="buktiPemotonganNomor">Bukti Pemotongan Nomor</label>
                                <input type="text" class="form-control" id="buktiPemotonganNomor" name="bukti_pemotongan_nomor" required>
                            </div>

                            <div class="form-group">
                                <label for="buktiPemotonganTanggal">Bukti Pemotongan Tanggal</label>
                                <input type="date" class="form-control" id="buktiPemotonganTanggal" name="bukti_pemotongan_tanggal" required>

                            </div>
                            <div class="form-group">
                                <label for="jenisPajak">Jenis Pajak</label>
                                <select name="jenis_pajak" class="form-control" id="jenisPajak">
                                    <option value="Pasal 21">Pasal 21</option>
                                    <option value="Pasal 22">Pasal 22</option>
                                    <option value="Pasal 23">Pasal 23</option>
                                    <option value="Pasal 24">Pasal 24</option>
                                    <option value="Pasal 26">Pasal 26</option>
                                    <option value="Pasal DTP">Pasal DTP</option>
                                    <option value="SKPPKP">SKPPKP</option>
                                </select>
                                <!-- <input type="text" class="form-control" id="jenisPajak" name="jenis_pajak" required> -->
                            </div>
                            <div class="form-group">
                                <label for="jumlahPPh">Jumlah PPh yang dipotong</label>
                                <input type="number" class="form-control" id="jumlahPPh" name="jumlah_pph_yang_dipotong" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="additional-text">
            <p>* DTP = PPh Ditanggung Pemerintah</p>
            <p>- Kolom (6) diisi dengan pilihan sebagai berikut: 21 / 22 / 23 / 24 / 26 / DTP (Contoh: ditulis 21, 22, 23, 24, 26, DTP)</p>
            <p>- Jika terdapat kredit pajak PPh Pasal 24, maka jumlah yang diisi adalah maksimum yang dapat dikreditkan sesuai lampiran tersendiri</p>
            <p>(lihat petunjuk pengisian tentang Lampiran II Bagian A dan Induk SPT angka 4)</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('npwpPemotong').addEventListener('input', function(e) {
            // Hapus semua karakter non-angka
            let value = e.target.value.replace(/\D/g, '');

            // Batasi panjang input menjadi 15 digit
            if (value.length > 15) {
                value = value.substring(0, 15);
            }

            // Format NPWP dengan simbol
            let formattedValue = '';
            for (let i = 0; i < value.length; i++) {
                if (i === 2 || i === 5 || i === 8 || i === 12) {
                    formattedValue += '.';
                }
                if (i === 9) {
                    formattedValue += '-';
                }
                formattedValue += value[i];
            }

            // Set nilai input dengan format
            e.target.value = formattedValue;
        });

        // Hapus simbol sebelum submit form
        document.getElementById('addDataForm').addEventListener('submit', function(e) {
            const npwpInput = document.getElementById('npwpPemotong');
            npwpInput.value = npwpInput.value.replace(/\D/g, ''); // Hapus semua karakter non-angka
        });
        document.getElementById('buktiPemotonganTanggal').addEventListener('input', function() {
            const inputDate = new Date(this.value);
            const currentDate = new Date();

            if (inputDate > currentDate) {
                this.setCustomValidity('Tanggal tidak boleh lebih dari hari ini.');
            } else {
                this.setCustomValidity('');
            }
        });

        function deleteRowA() {
            const dataKeA = document.getElementById("data-ke-a").value;

            if (dataKeA && !isNaN(dataKeA)) {
                if (confirm(`Apakah Anda yakin ingin menghapus data ke-${dataKeA}?`)) {
                    $.ajax({
                        url: "<?= base_url('form/hapus_form_tiga') ?>",
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
    </script>
</body>

</html>