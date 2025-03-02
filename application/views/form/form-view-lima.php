<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPT Form</title>
    <link href="<?= base_url('assets/') ?>css/css-form-lima.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="form-header">
        <div class="form-left">
            <button type="button" class="btn-grey" onclick="saveAndRedirect('previous')">SEBELUMNYA</button>
            <p class="vertical-text">FORMULIR</p>
            <div class="label-right">
                <p class="halaman">HALAMAN 2</p>
                <h1>1770-I</h1>
                <p>KEMENTERIAN KEUANGAN RI <br> DIREKTORAT JENDERAL PAJAK</p>
            </div>
        </div>
        <div class="form-center">
            <h2>LAMPIRAN -I</h2>
            <div class="form-info">
                <p>SPT TAHUNAN PPh WAJIB PAJAK ORANG PRIBADI</p>
                <hr>
                <ul>
                    <li>PENGHITUNGAN PENGHASILAN NETO ALAM NEGERI DARI USAHA DAN/ATAU PEKERJAAN BEBAS AJIB PAJAK YANG MENYELENGGARAKAN PENCATATAN</li>
                    <li>PENGHITUNGAN PENGHASILAN NETO DALAM NEGERI SEHUBUNGAN DENGAN PEKERJAAN</li>
                    <li>PERHITUNGAN PENGHASILAN DALAM NEGERI LAINNYA</li>
                </ul>
            </div>
        </div>
        <div class="form-right">
            <button type="button" class="btn-grey" onclick="saveAndRedirect('next')">SELANJUTNYA</button>
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

    <!-- Table for BAGIAN B -->
    <form method="POST" action="<?= site_url('form/form_lima') ?>" id="form-lima">
        <input type="hidden" name="action" id="action" value="">
        <table class="income-table">
            <thead>
                <tr>
                    <th class="bordered-cell">NO</th>
                    <th class="bordered-cell">JENIS USAHA</th>
                    <th class="bordered-cell">PEREDARAN USAHA (Rupiah)</th>
                    <th class="bordered-cell">NORMA (%)</th>
                    <th class="bordered-cell">PENGHASILAN NETO (Rupiah)</th>
                </tr>
                <tr>
                    <td class="bordered-cell">(1)</td>
                    <td class="bordered-cell">(2)</td>
                    <td class="bordered-cell">(3)</td>
                    <td class="bordered-cell">(4)</td>
                    <td class="bordered-cell">(5)</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $data_b = [
                    ['DAGANG', 0, 0, 0],
                    ['INDUSTRI', 0, 0, 0],
                    ['JASA', 0, 0, 0],
                    ['PEKERJAAN BEBAS', 0, 0, 0],
                    ['USAHA LAINNYA', 0, 0, 0]
                ];

                $data_to_display_b = ($mode_b === 'edit') ? $form_data_b : $data_b;

                foreach ($data_to_display_b as $index => $row) {
                    $jenis_usaha = $row['jenis_usaha'] ?? ($row[0] ?? '');
                    $perederan_usaha = $row['perederan_usaha'] ?? ($row[1] ?? 0);
                    $norma = $row['norma'] ?? ($row[2] ?? '');
                    $penghasilan_neto = $row['penghasilan_neto'] ?? ($row[3] ?? 0);

                    echo '<tr>';
                    echo '<td class="bordered-cell">' . ($index + 1) . '.</td>';

                    echo '<td class="bordered-cell"><input class="input-cell input-cell-jenis" name="jenis_usaha[]" value="' . htmlspecialchars($jenis_usaha, ENT_QUOTES, 'UTF-8') . '" readonly></td>';

                    echo '<td class="grey-cell bordered-cell"><input class="grey-cell input-cell input-column-ba" name="perederan_usaha[]" value="' . formatNumber($perederan_usaha) . '" oninput="calculateTotalBa(this)" disabled /></td>';

                    echo '<td class="grey-cell bordered-cell"><input class="grey-cell input-cell input-column-5" name="norma[]" type="text" value="' . formatNumber($norma) . '" placeholder="0" oninput="calculateTotalB(this)" disabled /></td>';

                    echo '<td class="grey-cell bordered-cell"><input class="grey-cell input-cell input-column-bb" name="penghasilan_neto[]" type="text" placeholder="0" value="' . formatNumber($penghasilan_neto) . '" oninput="calculateTotalBb(this)" disabled/></td>';

                    echo '</tr>';
                }

                function formatNumber($value)
                {
                    if ($value === null || $value === '') {
                        return '0';
                    }
                    return number_format((float)$value, 0, ',', '.');
                }


                ?>
                <tr class="total-row">
                    <th colspan="2" class="bordered-cell">JUMLAH BAGIAN B</th>
                    <td class="yellow-cell bordered-cell"><input id="total-column-ba" class="input-cell" type="text" value="0" readonly /></td>
                    <th class="bordered-cell">JBB</th>
                    <td class="yellow-cell bordered-cell"><input id="total-column-bb" class="input-cell" type="text" value="0" readonly /></td>
                </tr>
            </tbody>
        </table>
        <p class="small-text">Pindahkan Jumlah Bagian B (Kolom 5) ke Formulir 1770 Angka 1</p>
        <br><br><br><br>
        <!-- END BAGIAN B -->


        <?php
        function formatNPWP($npwp)
        {
            // Hapus semua karakter non-angka
            $npwp = preg_replace('/\D/', '', $npwp);
            // Format NPWP dengan simbol
            return substr($npwp, 0, 2) . '.' . substr($npwp, 2, 3) . '.' . substr($npwp, 5, 3) . '.' . substr($npwp, 8, 1) . '-' . substr($npwp, 9, 3) . '.' . substr($npwp, 12, 3);
        }
        ?>
        <!-- Table for BAGIAN C -->
        <div class="table-header-position-dua">
            <br><br><br>
            <div class="table-header">
                <p>BAGIAN C. PENGHASILAN NETO DALAM NEGERI SEHUBUNGAN DENGAN PEKERJAAN</p>
                <p>(TIDAK TERMASUK PENGHASILAN YANG DIKENAKAN PPh BERSIFAT FINAL)</p>
            </div>
        </div>

        <table class="income-table">
            <thead>
                <tr>
                    <th class="bordered-cell">NPWP PEMBERI KERJA</th>
                    <th class="bordered-cell">NAMA PEMBERI KERJA</th>
                    <th class="bordered-cell">PENGHASILAN BRUTO</th>
                    <th class="bordered-cell">PENGURANGAN PENGHASILAN BRUTO</th>
                    <th class="bordered-cell">PENGHASILAN NETO</th>
                </tr>
            </thead>
            <tbody id="table-body-c">
                <?php if (!empty($form_lima_c)): ?>
                    <?php foreach ($form_lima_c as $row): ?>
                        <tr>
                            <td class="bordered-cell"><?= formatNPWP($row['npwp_pemberi_kerja']) ?></td>
                            <td class="bordered-cell"><?= $row['nama_pemberi_kerja'] ?></td>
                            <td class="bordered-cell"><?= formatNumber($row['penghasilan_bruto']) ?></td>
                            <td class="bordered-cell"><?= formatNumber($row['pengurangan_penghasilan_bruto']) ?></td>
                            <td class="bordered-cell"><?= formatNumber($row['penghasilan_neto_c']) ?></td>
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
                    <th colspan="4" class="bordered-cell">Jumlah Bagian C</th>
                    <td class="yellow-cell bordered-cell" id="total-amount">
                        <?= formatNumber($penghasilanNetoC) ?> <!-- Ganti variabel dan gunakan formatNumber -->
                    </td>
                </tr>
            </tfoot>
        </table>

        <!-- Form controls placed directly below the table -->
        <div class="form-controls">
            <button type="button" data-toggle="modal" data-target="#addDataModal">Tambah</button>
            <button type="button" onclick="deleteRowC()">Hapus</button>
            <label>Data Ke - <input type="text" id="data-ke-c" placeholder="Masukkan nomor baris" /></label>
            <!-- Pagination controls -->
            <div class="pagination-controls">
                <button type="button" onclick="previousPage()" id="prev-page-btn" disabled>Previous</button>
                <button type="button" onclick="nextPage()" id="next-page-btn" disabled>Next</button>
            </div>
        </div>

        <div class="form-controls">
            <div class="table-he">
                <p class="abjad">BAGIAN D. PENGHASILAN DALAM NEGERI LAINNYA <br>
                    (TIDAK TERMASUK PENGHASILAN YANG DIKENAKAN PPh BERSIFAT FINAL)</p>
            </div>
        </div>

        <table class="income-table">
            <thead>
                <tr>
                    <th class="bordered-cell">NO</th>
                    <th class="bordered-cell" colspan="2">JENIS USAHA</th>
                    <th class="bordered-cell">PENGHASILAN NETO</th>
                </tr>
                <tr>
                    <td class="bordered-cell">(1)</td>
                    <td class="bordered-cell" colspan="2">(2)</td>
                    <td class="bordered-cell">(3)</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $data_d = [
                    ['BUNGA', 0],
                    ['ROYALTI', 0],
                    ['SEWA', 0],
                    ['PENGHARGAAN DAN HADIAH', 0],
                    ['KEUNTUNGAN DARI PENJUALAN/PENGALIHAN HARTA', 0],
                    ['PENGHASILAN LAINNYA', 0],
                ];

                $data_to_display_d = ($mode_d === 'edit') ? $form_data_d : $data_d;

                foreach ($data_to_display_d as $index => $row) {
                    $jenis_usaha_d = $row['jenis_usaha_d'] ?? ($row[0] ?? '');
                    $penghasilan_neto_d = $row['penghasilan_neto_d'] ?? ($row[1] ?? 0);

                    echo '<tr>';
                    echo '<td class="bordered-cell">' . ($index + 1) . '</td>';
                    echo '<td class="bordered-cell" colspan="2"><input class="input-cell input-cell-jenis" name="jenis_usaha_d[]" value="' . htmlspecialchars($jenis_usaha_d, ENT_QUOTES, 'UTF-8') . '" readonly></td>';
                    echo '<td class="bordered-cell"><input class="input-cell input-column-d" name="penghasilan_neto_d[]" type="text" value="' . formatNumber($penghasilan_neto_d) . '" placeholder="0" oninput="calculateTotalD()" /></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" class="bordered-cell">JUMLAH BAGIAN D</th>
                    <th class="bordered-cell">JBD</th>
                    <td class="yellow-cell bordered-cell"><input id="total-column-d" class="input-cell" type="text" value="0" readonly /></td>
                </tr>
            </tfoot>
        </table>
        <p class="small-text">Pindahkan Jumlah Bagian D ke Formulir 1770 Angka 3</p>
    </form>
    <!-- END Bagian D -->

    <br><br><br><br>
    <!-- AKHIR DISINI -->

    <!-- Modal -->
    <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Form Lima</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="addDataForm" action="<?= base_url('form/form_lima_save') ?>" method="post">

                        <div class="form-group">
                            <label for="npwpPemberiKerja">NPWP Pemberi Kerja</label>
                            <input type="text" class="form-control" id="npwpPemberiKerja" name="npwp_pemberi_kerja" required maxlength="20">
                            <small id="npwpError" class="text-danger" style="display: none;">NPWP harus 15 digit angka.</small>
                        </div>

                        <div class="form-group">
                            <label for="namaPemberiKerja">Nama Pemberi Kerja</label>
                            <input type="text" class="form-control" id="namaPemberiKerja" name="nama_pemberi_kerja" required>
                        </div>

                        <div class="form-group">
                            <label for="penghasilanBruto">Penghasilan Bruto</label>
                            <input type="text" class="form-control" id="penghasilanBruto" name="penghasilan_bruto" required>
                        </div>

                        <div class="form-group">
                            <label for="penguranganPenghasilanBruto">Pengurangan Penghasilan Bruto</label>
                            <input type="text" class="form-control" id="penguranganPenghasilanBruto" name="pengurangan_penghasilan_bruto" required>

                        </div>

                        <div class="form-group">
                            <label for="penghasilanNetoC">Penghasilan Neto</label>
                            <input type="text" class="form-control" id="penghasilanNetoC" readonly>
                        </div>

                        <!-- Input hidden untuk penghasilan_neto_c -->
                        <input type="hidden" id="penghasilanNetoC" name="penghasilan_neto_c">

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
        // Validasi input sebelum submit form
        $('#addDataForm').submit(function(e) {
            const bruto = parseFloat($('#penghasilanBruto').val().replace(/\./g, '')) || 0;
            const pengurangan = parseFloat($('#penguranganPenghasilanBruto').val().replace(/\./g, '')) || 0;

            if (pengurangan > bruto) {
                alert('Pengurangan tidak boleh melebihi penghasilan bruto!');
                e.preventDefault();
                return false;
            }

            // Format ulang nilai sebelum dikirim
            $('#penghasilanBruto').val(bruto);
            $('#penguranganPenghasilanBruto').val(pengurangan);
            return true;
        });

        // Format input number dengan separator
        $('#penghasilanBruto, #penguranganPenghasilanBruto').on('input', function() {
            let value = $(this).val().replace(/\./g, '');
            if (!isNaN(value)) {
                $(this).val(formatNumber(value));
            }
        });

        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function unformatNumber(num) {
            return num.replace(/\./g, '');
        }

        // Function to calculate the total for BAGIAN B
        function calculateTotalBa() {
            let total = 0;
            const inputs = document.querySelectorAll('td input.input-column-ba');

            inputs.forEach(function(input) {
                let value = unformatNumber(input.value);
                const numValue = parseFloat(value) || 0;
                total += numValue;
            });

            document.getElementById('total-column-ba').value = formatNumber(total.toFixed(0));
        }

        function calculateTotalBb() {
            let total = 0;
            const inputs = document.querySelectorAll('td input.input-column-bb');

            inputs.forEach(function(input) {
                let value = unformatNumber(input.value);
                const numValue = parseFloat(value) || 0;
                total += numValue;
            });

            document.getElementById('total-column-bb').value = formatNumber(total.toFixed(0));
        }

        // Function to calculate the total for BAGIAN D
        function calculateTotalD() {
            let total = 0;
            const inputs = document.querySelectorAll('td input.input-column-d');

            inputs.forEach(function(input) {
                let value = unformatNumber(input.value);
                const numValue = parseFloat(value) || 0;
                total += numValue;
            });

            document.getElementById('total-column-d').value = formatNumber(total.toFixed(0));
        }

        // Fungsi untuk menghitung penghasilan neto
        function calculateNeto() {
            const penghasilanBruto = parseFloat(unformatNumber(document.getElementById('penghasilanBruto').value)) || 0;
            const penguranganBruto = parseFloat(unformatNumber(document.getElementById('penguranganPenghasilanBruto').value)) || 0;

            // Hitung penghasilan neto
            const penghasilanNeto = penghasilanBruto - penguranganBruto;

            // Set nilai penghasilan neto
            document.getElementById('penghasilanNetoC').value = formatNumber(penghasilanNeto);
        }

        document.addEventListener('DOMContentLoaded', function() {
            calculateTotalD(); // Hitung total saat halaman dimuat
        });

        // Function to save data and redirect
        function saveAndRedirect(action) {
            // Set action value
            document.getElementById('action').value = action;

            // Submit form
            document.getElementById('form-lima').submit();
        }

        function deleteRowC() {
            const dataKeC = document.getElementById("data-ke-c").value;

            if (dataKeC && !isNaN(dataKeC)) {
                if (confirm(`Apakah Anda yakin ingin menghapus data ke-${dataKeC}?`)) {
                    $.ajax({
                        url: "<?= base_url('form/hapus_form_lima_c') ?>",
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

        // Function to enforce numeric input only and limit length for NPWP
        function enforceNumericInput(event) {
            const input = event.target;
            let value = input.value;

            // Allow only numeric input and limit to 15 characters
            value = value.replace(/[^\d]/g, '').slice(0, 15);

            // Update the input's value
            input.value = value;
        }

        // Function to format NPWP input after user finishes typing
        function formatNPWP(input) {
            let value = input.value.replace(/\D/g, ''); // Hapus semua karakter non-angka
            if (value.length === 15) {
                // Format NPWP: XX.XXX.XXX.X-XXX.XXX
                value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})/, "$1.$2.$3.$4-$5.$6");
            }
            input.value = value; // Set nilai input dengan format
        }

        // Function to validate NPWP input length and block other inputs if invalid
        function validateNPWP(input) {
            let value = input.value.replace(/\./g, '');

            if (value.length < 15) {
                // Peringatan muncul dan fokus tetap di cell NPWP
                alert('NPWP harus terdiri dari 15 digit.');
                setTimeout(function() {
                    input.focus();
                    input.select();
                }, 0);
                lockOtherInputs(true); // Kunci input lainnya
            } else {
                formatNPWP(input); // Format NPWP setelah validasi sukses
                lockOtherInputs(false); // Buka kunci input lainnya jika valid
            }
        }

        // Function to lock or unlock other inputs based on NPWP validation
        function lockOtherInputs(lock) {
            const otherInputs = document.querySelectorAll('.input-column-c:not(.npwp-input)');

            otherInputs.forEach(function(input) {
                input.disabled = lock;
            });
        }

        // Function to enforce only alphabetic input in the "NAMA PEMBERI KERJA" cell
        function enforceAlphabeticInput(event) {
            const input = event.target;
            let value = input.value;

            // Remove any non-alphabetic characters
            value = value.replace(/[^a-zA-Z\s]/g, '');

            // Update the input's value with only alphabetic characters
            input.value = value;
        }

        // Function to calculate totals and format inputs with dot separators for BAGIAN C
        function calculateTotalC() {
            let total = 0;
            const inputs = document.querySelectorAll('td input.neto-cell');

            inputs.forEach(function(input) {
                let value = unformatNumber(input.value);
                const numValue = parseFloat(value) || 0;

                total += numValue;
            });

            document.getElementById('total-column-c').value = formatNumber(total.toFixed(0));
        }


        // Function to move to the previous page
        function previousPage() {
            if (currentPage > 1) {
                currentPage--;
                renderTableC();
                updatePaginationControls();
            }
        }

        // Function to move to the next page
        function nextPage() {
            const totalPages = Math.ceil(allRowsC.length / maxRowsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                renderTableC();
                updatePaginationControls();
            }
        }
        document.getElementById('npwpPemberiKerja').addEventListener('input', function(e) {
            const npwpInput = e.target;
            const npwpError = document.getElementById('npwpError');

            // Hapus semua karakter non-angka
            let value = npwpInput.value.replace(/\D/g, '');

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
                if (i === 10) {
                    formattedValue += '-';
                }
                formattedValue += value[i];
            }

            // Set nilai input dengan format
            npwpInput.value = formattedValue;

            // Validasi panjang NPWP
            if (value.length < 15) {
                npwpError.style.display = 'block'; // Tampilkan pesan error
            } else {
                npwpError.style.display = 'none'; // Sembunyikan pesan error
            }
        });

        // Hapus simbol sebelum submit form
        document.getElementById('addDataForm').addEventListener('submit', function(e) {
            const npwpInput = document.getElementById('npwpPemberiKerja');
            const npwpError = document.getElementById('npwpError');

            // Hapus semua karakter non-angka
            const npwpValue = npwpInput.value.replace(/\D/g, '');

            // Validasi panjang NPWP
            if (npwpValue.length !== 15) {
                e.preventDefault(); // Hentikan submit form
                npwpError.style.display = 'block'; // Tampilkan pesan error
                npwpInput.focus(); // Fokus ke input NPWP
            } else {
                npwpInput.value = npwpValue; // Simpan nilai tanpa simbol
            }
        });

        // Function to format input and validate that deduction is <= bruto
        function formatInputAndValidateBruto(input) {
            input.value = formatNumber(unformatNumber(input.value));
            validateDeduction(input.closest('tr').querySelector('.deduction-input'));
        }

        // Function to validate deduction amount and calculate neto
        function validateDeduction(input) {
            const row = input.closest('tr');
            const brutoInput = row.querySelector('.bruto-input');
            const netoInput = row.querySelector('.neto-cell');
            const brutoValue = parseFloat(unformatNumber(brutoInput.value)) || 0;
            const deductionValue = parseFloat(unformatNumber(input.value)) || 0;

            if (deductionValue > brutoValue) {
                alert('Nilai PENGURANGAN PENGHASILAN BRUTO tidak boleh lebih besar dari PENGHASILAN BRUTO.');
                input.value = formatNumber(0);
                netoInput.value = formatNumber(brutoValue);
            } else {
                input.value = formatNumber(deductionValue);
                const netoValue = brutoValue - deductionValue;
                netoInput.value = formatNumber(netoValue);
            }

            calculateTotalC();
        }

        // Tambahkan event listener untuk menghitung otomatis
        document.getElementById('penghasilanBruto').addEventListener('input', calculateNeto);
        document.getElementById('penguranganPenghasilanBruto').addEventListener('input', calculateNeto);

        // Initial update of pagination controls and table rendering
        updatePaginationControls();
        renderTableC();
    </script>
</body>

</html>