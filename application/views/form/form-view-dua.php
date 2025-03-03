<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPT Form</title>
    <link href="<?= base_url('assets/') ?>css/css-form-dua.css" rel="stylesheet">

</head>

<body>
    <div class="form-header">
        <div class="form-left">
            <button type="button" class="btn-grey" id="btn-previous">SEBELUMNYA</button>
            <p class="vertical-text">FORMULIR</p>
            <div class="label-right">
                <h1>1770-III</h1>
                <p>KEMENTERIAN KEUANGAN RI <br> DIREKTORAT JENDERAL PAJAK</p>
            </div>
        </div>
        <div class="form-center">
            <h2>LAMPIRAN - III</h2>
            <div class="form-info">
                <p>SPT TAHUNAN PPh WAJIB PAJAK ORANG PRIBADI</p>
                <hr>
                <ul>
                    <li>PENGHASILAN YANG DIKENAKAN PAJAK FINAL DAN/ATAU BERSIFAT FINAL</li>
                    <li>PENGHASILAN YANG TIDAK TERMASUK OBJEK PAJAK</li>
                    <li>PENGHASILAN ISTERI/SUAMI YANG DIKENAKAN PAJAK SECARA TERPISAH</li>
                </ul>
            </div>
        </div>
        <div class="form-right">
            <button type="button" class="btn-grey" id="btn-next">SELANJUTNYA</button>
            <button type="button" class="btn-grey hidden" id="btn-pp">PP 46/23</button>
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

    <div class="table-header-position">
        <div class="table-header">
            <p>BAGIAN A. PENGHASILAN NETO DALAM NEGERI DARI USAHA DANA/ATAU PEKERJAAN BEBAS</p>
            <p>(BAGI WAJIB PAJAK YANG MENYELENGGARAKAN PEMBUKUAN)</p>
        </div>
    </div>

    <!-- TABLE A -->
    <form method="POST" action="<?= site_url('form/form_dua') ?>" id="form-dua">
        <input type="hidden" name="action" id="action" value="">

        <input type="hidden" name="pp46_23_checkbox_value" id="pp46_23_checkbox_value" value="<?= $checkbox_status ?>">

        <table class="income-table">
            <thead>
                <tr>
                    <th class="bordered-cell">NO</th>
                    <th class="bordered-cell">JENIS PENGHASILAN</th>
                    <th class="bordered-cell">DASAR PENGENAAN <br> PAJAK/PENGHASILAN BRUTO</th>
                    <th class="bordered-cell">PPh TERUTANG <br> (Rupiah)</th>
                </tr>
                <tr>
                    <td class="bordered-cell">1</td>
                    <td class="bordered-cell">2</td>
                    <td class="bordered-cell">3</td>
                    <td class="bordered-cell">4</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $data_a = [
                    ['BUNGA DEPOSITO, TABUNGAN, DISKONTO SBI, SURAT BERHARGA NEGARA', 0, 0],
                    ['BUNGA/DISKONTO OBLIGASI', 0, 0],
                    ['PENJUALAN SAHAM DI BURSA EFEK', 0, 0],
                    ['HADIAH UNDIAN', 0, 0],
                    ['PESANGON, TUNJANGAN HARI TUA DAN TEBUSAN PENSIUN YANG DIBAYAR SEKALIGUS', 0, 0],
                    ['HONORARIUM ATAS BEBAN APBN / APBD', 0, 0],
                    ['PENGALIHAN HAK ATAS TANAH DAN/ATAU BANGUNAN', 0, 0],
                    ['BANGUNAN YANG DITERIMA DALAM RANGKA BANGUNAN GUNA SERAH', 0, 0],
                    ['SEWA ATAS TANAH DAN/ATAU BANGUNAN', 0, 0],
                    ['USAHA JASA KONSTRUKSI', 0, 0],
                    ['PENYALUR/DEALER/AGEN PRODUK BBM', 0, 0],
                    ['BUNGA SIMPANAN YANG DIBAYARKAN OLEH KOPERASI', 0, 0],
                    ['PENGHASILAN DARI TRANSAKSI DERIVATIF', 0, 0],
                    ['DIVIDEN', 0, 0],
                    ['PENGHASILAN ISTERI DARI SATU PEMBERI KERJA', 0, 0],
                    ['PENGHASILAN LAIN YANG DIKENAKAN PAJAK FINAL DAN/ATAU BERSIFAT FINAL', 0, 0],
                ];

                $data_to_display_a = ($mode_a === 'edit') ? $form_data_a : $data_a;

                // Di bagian tabel A, baris ke-16
                foreach ($data_to_display_a as $index => $row) {
                    $jenis_penghasilan_a = $row['jenis_penghasilan'] ?? ($row[0] ?? '');
                    $dasar_pengenaan_pajak_a = $row['dasar_pengenaan_pajak'] ?? ($row[1] ?? 0);
                    $pph_terutang_a = $row['pph_terutang'] ?? ($row[2] ?? 0);

                    // Jika ini baris ke-16
                    if ($index + 1 == 16) {
                        // Jika opsi Ya di-checked dan kirim_status adalah 'ya', isi dengan total dari form-pp
                        if ($checkbox_status == 1 && $kirim_status == 'ya') {
                            $dasar_pengenaan_pajak_a = $total_bruto_pp; // Isi dengan total perederan_bruto
                            $pph_terutang_a = $total_pph_pp; // Isi dengan total jumlahPPh
                        } else {
                            // Jika opsi Tidak di-checked atau kirim_status adalah 'tidak', isi dengan 0
                            $dasar_pengenaan_pajak_a = 0;
                            $pph_terutang_a = 0;
                        }
                    }

                    echo '<tr>';
                    echo '<td class="bordered-cell">' . ($index + 1) . '.</td>';
                    echo '<td class="bordered-cell"><textarea class="dynamic-input" name="jenis_penghasilan[]" readonly>' . htmlspecialchars($jenis_penghasilan_a, ENT_QUOTES, 'UTF-8') . '</textarea></td>';

                    // Nonaktifkan input untuk nomor 13
                    if ($index + 1 === 13) {
                        echo '<td class="bordered-cell grey-cell"><input type="text" class="bruto-input text-visib dynamic-input" name="dasar_pengenaan_pajak[]" value="' . formatNumber($dasar_pengenaan_pajak_a) . '" disabled /></td>';
                        echo '<td class="bordered-cell grey-cell"><input type="text" class="pph-input text-visib dynamic-input" name="pph_terutang[]" value="' . formatNumber($pph_terutang_a) . '" disabled /></td>';
                    } else {
                        // Tambahkan class khusus untuk baris ke-16
                        $tdBrutoClass = ($index + 1 === 16) ? 'bordered-cell yellow-cell' : 'bordered-cell';
                        $tdPphClass = ($index + 1 === 16) ? 'bordered-cell yellow-cell' : 'bordered-cell';

                        echo '<td class="' . $tdBrutoClass . '"><input type="text" class="bruto-input dynamic-input" name="dasar_pengenaan_pajak[]" value="' . formatNumber($dasar_pengenaan_pajak_a) . '" /></td>';
                        echo '<td class="' . $tdPphClass . '"><input type="text" class="pph-input dynamic-input" name="pph_terutang[]" value="' . formatNumber($pph_terutang_a) . '" /></td>';
                    }
                    echo '</tr>';
                }

                function formatNumber($value)
                {
                    return number_format($value, 0, ',', '.');
                }
                ?>
            <tfoot>
                <tr>
                    <td class="bordered-cell">17.</td>
                    <td class="bordered-cell">JUMLAH (1 s.d. 16)</td>
                    <td class="bordered-cell grey-cell">
                        <span id="total-bruto-a" class="total-text"></span>
                    </td>
                    <td class="bordered-cell yellow-cell">
                        <span id="total-pph-a" class="total-text">0</span>
                    </td>
                </tr>
            </tfoot>
            </tbody>
        </table>
    </form>

    <label class="checkbox-container">
        <input type="checkbox" class="inline-checkbox" id="pp46_23_checkbox" name="pp46_23_checkbox"
            <?= $checkbox_status == 1 ? 'checked' : '' ?> />
        PP 46/23
    </label>

    <!-- END TABLE A -->

    <!-- TABLE B -->
    <form method="POST" action="<?= site_url('form/form_dua') ?>" id="form-dua-b">

        <input type="hidden" name="action" id="action-b" value="">
        <table class="income-table">
            <tbody>
                <tr>
                    <td colspan="2" class="text-sub">BAGIAN B. PENGHASILAN YANG TIDAK TERMASUK OBJEK PAJAK</td>
                </tr>
            </tbody>
        </table>

        <table class="income-table">
            <thead>
                <tr>
                    <th class="bordered-cell">NO</th>
                    <th class="bordered-cell">JENIS PENGHASILAN</th>
                    <th class="bordered-cell">DASAR PENGENAAN PAJAK/PENGHASILAN BRUTO</th>
                </tr>
                <tr>
                    <td class="bordered-cell">(1)</td>
                    <td class="bordered-cell">(2)</td>
                    <td class="bordered-cell">(3)</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $data_b = [
                    ['BANTUAN / SUMBANGAN / HIBAH', 0],
                    ['WARISAN', 0],
                    ['BAGIAN LABA ANGGOTA PERSEORAN KOMANDITER TIDAK ATAS SAHAM, PERSEKUTUAN, PERKUMPULAN, FIRMA, KONGSI', 0],
                    ['KLAIM ASURANSI KESEHATAN, KECELAKAAN, JIWA, DWIGUNA, BEASISWA', 0],
                    ['BEASISWA', 0],
                    ['PENGHASILAN LAIN YANG TIDAK TERMASUK OBJEK PAJAK', 0],
                ];

                $data_to_display_b = ($mode_b === 'edit') ? $form_data_b : $data_b;

                foreach ($data_to_display_b as $index => $row) {

                    $jenis_penghasilan_b = $row['jenis_penghasilan_b'] ?? ($row[0] ?? '');
                    $dasar_pengenaan_pajak_b = $row['dasar_pengenaan_pajak_b'] ?? ($row[1] ?? 0);

                    echo '<tr>';
                    echo '<td class="bordered-cell">' . ($index + 1) . '</td>';

                    echo '<td class="bordered-cell"><textarea class="dynamic-input" name="jenis_penghasilan_b[]" readonly>' . htmlspecialchars($jenis_penghasilan_b, ENT_QUOTES, 'UTF-8') . '</textarea></td>';

                    echo '<td class="bordered-cell"><input type="text" class="bruto-input-b dynamic-input" name="dasar_pengenaan_pajak_b[]" value="' . formatNumber($dasar_pengenaan_pajak_b) .  '" />';
                    echo '</tr>';
                }

                ?>
                <tr class="total-row">
                    <td>JUMLAH BAGIAN B</td>
                    <td>JBB</td>
                    <td class="yellow-cell"><span id="total-bruto-b" class="total-text">0</span></td>
                </tr>
            </tbody>
        </table>
    </form>
    <!-- END TABLE B -->

    <!-- TABLE C -->
    <table class="income-table">
        <tbody>
            <tr>
                <td colspan="2" class="text-sub">BAGIAN C. PENGHASILAN ISTERI/SUAMI YANG DIKENAKAN PAJAK SECARA TERPISAH</td>
            </tr>
        </tbody>
    </table>

    <table class="income-table">
        <tbody>
            <tr>
                <td class="bordered-cell text-left">PENGHASILAN NETO ISTERI/SUAMI YANG DIKENAKAN PAJAK SECARA TERPISAH</td>
                <td class="bordered-cell yellow-cell">0</td>
            </tr>
        </tbody>
    </table>
    <!-- END TABLE C -->

    <div class="income-table">
        <p id="text-bawah">Isian ini berasal dari Lampiran PH-MT Kolom 4 Bagian Jumlah Penghasilan Netto</p>
    </div>

    <script>
        // Utility functions
        function formatNumber(value) {
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function parseNumber(value) {
            return parseInt(value.replace(/\./g, '')) || 0;
        }

        // Fungsi untuk memformat input secara real-time
        function formatInputRealTime(input) {
            input.addEventListener('input', function(e) {
                let value = e.target.value;
                let parsedValue = parseNumber(value);
                e.target.value = formatNumber(parsedValue);
            });
        }

        // Terapkan fungsi formatInputRealTime pada semua input yang relevan
        document.querySelectorAll('.bruto-input, .pph-input, .bruto-input-b').forEach(input => {
            formatInputRealTime(input);
        });

        // Fungsi untuk memvalidasi PPh Terutang
        function validatePPh(input) {
            const row = input.closest('tr');
            const brutoInput = row.querySelector('.bruto-input');
            const pphInput = row.querySelector('.pph-input');

            const brutoValue = parseNumber(brutoInput.value);
            const pphValue = parseNumber(pphInput.value);

            if (pphValue > brutoValue) {
                alert('Nilai PPh Terutang tidak boleh lebih besar dari Dasar Pengenaan Pajak/Penghasilan Bruto.');
                pphInput.value = formatNumber(brutoValue); // Set nilai PPh Terutang sama dengan Dasar Pengenaan Pajak
            }
        }

        // Calculate totals
        function calculateTotalsA() {
            let totalBrutoA = 0,
                totalPphA = 0;
            document.querySelectorAll('.bruto-input').forEach(input => {
                if (!input.disabled) {
                    totalBrutoA += parseNumber(input.value);
                }
            });
            document.querySelectorAll('.pph-input').forEach(input => totalPphA += parseNumber(input.value));
            document.getElementById('total-bruto-a').textContent = formatNumber(totalBrutoA);
            document.getElementById('total-pph-a').textContent = formatNumber(totalPphA);
        }

        function calculateTotalsB() {
            let totalBrutoB = 0;
            document.querySelectorAll('.bruto-input-b').forEach(input => totalBrutoB += parseNumber(input.value));
            document.getElementById('total-bruto-b').textContent = formatNumber(totalBrutoB);
        }

        // Event Listeners
        document.querySelectorAll('.bruto-input, .pph-input, .bruto-input-b').forEach(input => {
            input.addEventListener('input', () => {
                calculateTotalsA();
                calculateTotalsB();
            });
        });

        // Validasi PPh Terutang saat input diubah
        document.querySelectorAll('.pph-input').forEach(input => {
            input.addEventListener('input', () => {
                validatePPh(input);
            });
        });

        // Initial calculation
        calculateTotalsA();
        calculateTotalsB();

        // Referensi elemen
        const btnPP = document.getElementById('btn-pp'); // Tombol PP 46/23
        const btnNext = document.getElementById('btn-next'); // Tombol SELANJUTNYA
        const checkbox = document.getElementById('pp46_23_checkbox'); // Checkbox

        console.log({
            btnPP,
            btnNext,
            checkbox
        }); // Debugging elemen

        // Fungsi untuk mengatur visibilitas tombol
        function toggleButtons() {
            console.log("Checkbox status:", checkbox.checked); // Debugging status checkbox
            if (checkbox.checked) {
                btnPP.style.display = 'inline-block'; // Tampilkan tombol PP 46/23
                btnNext.style.display = 'none'; // Sembunyikan tombol SELANJUTNYA
            } else {
                btnPP.style.display = 'none'; // Sembunyikan tombol PP 46/23
                btnNext.style.display = 'inline-block'; // Tampilkan tombol SELANJUTNYA
            }
        }

        // Pasang event listener
        checkbox.addEventListener('change', toggleButtons);

        // Inisialisasi tampilan awal saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', () => {
            console.log("Halaman dimuat, mengatur tombol awal...");
            toggleButtons();
        });

        function submitForms(actionValue) {
            // Set action value for both forms
            document.getElementById('action').value = actionValue;
            document.getElementById('action-b').value = actionValue;

            // Sinkronisasi nilai checkbox dengan hidden input di form
            const formA = document.getElementById('form-dua');
            const checkbox = document.getElementById('pp46_23_checkbox');
            let hiddenCheckbox = document.getElementById('hidden-pp46_23_checkbox');

            if (!hiddenCheckbox) {
                hiddenCheckbox = document.createElement('input');
                hiddenCheckbox.type = 'hidden';
                hiddenCheckbox.name = 'pp46_23_checkbox';
                hiddenCheckbox.id = 'hidden-pp46_23_checkbox';
                formA.appendChild(hiddenCheckbox);
            }

            hiddenCheckbox.value = checkbox.checked ? 'on' : 'off';


            // Append data dari form B ke form A untuk pengiriman bersama
            const formB = document.getElementById('form-dua-b');
            const formBData = new FormData(formB);
            formBData.forEach((value, key) => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = key;
                hiddenInput.value = value;
                formA.appendChild(hiddenInput);
            });

            // Kirim form A
            formA.submit();
        }

        // Fungsi untuk mengubah warna latar belakang <td> di kolom 16
        function toggleYellowCell() {
            const checkbox = document.getElementById('pp46_23_checkbox');
            const row16 = document.querySelector('tr:nth-child(16)'); // Ambil baris ke-16
            const tdBruto16 = row16.querySelector('td:nth-child(3)'); // <td> Dasar Pengenaan Pajak
            const tdPph16 = row16.querySelector('td:nth-child(4)'); // <td> PPh Terutang
            const inputBruto16 = row16.querySelector('.bruto-input'); // Input Dasar Pengenaan Pajak
            const inputPph16 = row16.querySelector('.pph-input'); // Input PPh Terutang

            if (checkbox.checked) {
                tdBruto16.classList.add('yellow-cell');
                tdPph16.classList.add('yellow-cell');
                inputBruto16.disabled = true;
                inputPph16.disabled = true;
            } else {
                tdBruto16.classList.remove('yellow-cell');
                tdPph16.classList.remove('yellow-cell');
                inputBruto16.disabled = false;
                inputPph16.disabled = false;
            }
        }

        // Fungsi untuk mengupdate nilai hidden input checkbox
        function updateCheckboxValue() {
            const checkbox = document.getElementById('pp46_23_checkbox');
            const hiddenCheckbox = document.getElementById('pp46_23_checkbox_value');
            hiddenCheckbox.value = checkbox.checked ? '1' : '0'; // 1 jika dicentang, 0 jika tidak
        }

        // Pasang event listener pada checkbox
        document.getElementById('pp46_23_checkbox').addEventListener('change', () => {
            updateCheckboxValue(); // Update nilai hidden input
            toggleYellowCell(); // Update tampilan yellow-cell
        });

        // Inisialisasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            updateCheckboxValue(); // Set nilai awal hidden input
            toggleYellowCell(); // Sesuaikan tampilan awal berdasarkan status checkbox
            toggleButtons(); // Sesuaikan tampilan tombol berdasarkan status checkbox
        });

        // Event listeners for buttons
        document.getElementById('btn-previous').addEventListener('click', () => submitForms('previous'));
        document.getElementById('btn-next').addEventListener('click', () => submitForms('next'));
        document.getElementById('btn-pp').addEventListener('click', () => submitForms('pp'));
    </script>
</body>

</html>