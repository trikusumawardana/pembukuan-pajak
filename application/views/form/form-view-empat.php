<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPT Form</title>
    <link href="<?= base_url('assets/') ?>css/css-form-empat.css" rel="stylesheet">
</head>

<body>
    <div class="form-header">
        <div class="form-left">
            <a href="#" class="btn-grey" id="btn-sebelumnya">SEBELUMNYA</a>
            <p class="vertical-text">FORMULIR</p>
            <div class="label-right">
                <p class="halaman">HALAMAN 1</p>
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
                    <li>PERHITUNGAN PENGHASILAN NETO DALAM NEGERI DARI USAHA DAN/</li>
                    <li>ATAU PEKERJAAN BEBAS BAGI WAJIB PAJAK YANG</li>
                    <li>MENYELENGGARAKAN PEMBUKUAN</li>
                </ul>
            </div>
        </div>
        <div class="form-right">
            <a href="#" class="btn-grey" id="btn-selanjutnya">SELANJUTNYA</a>
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

    <!-- Form Audit Section -->
    <form method="POST" action="<?= site_url('form/save_form_empat') ?>" id="form-empat">

        <input type="hidden" name="action" id="action" value="<?= $action ?>">
        <div class="audit-section">
            <table class="audit-table">
                <tr>
                    <td>PEMBUKUAN/LAPORAN KEUANGAN :</td>
                    <td>:
                        <label>
                            <input type="radio" name="pembukuan_laporan" value="Di Audit" onclick="toggleAuditFields(true)" <?= (!empty($form_empat_a) && $form_empat_a['pembukuan_laporan'] == 'Di Audit') ? 'checked' : '' ?>> Di Audit
                        </label>
                        <label>
                            <input type="radio" name="pembukuan_laporan" value="Tidak Diaudit" onclick="toggleAuditFields(false)" <?= (empty($form_empat_a) || $form_empat_a['pembukuan_laporan'] == 'Tidak Diaudit') ? 'checked' : '' ?>> Tidak Diaudit
                        </label>

                        <label for="opiniAkuntan" class="opini" id="opiniAkuntanLabel" style="<?= (empty($form_empat_a) || $form_empat_a['pembukuan_laporan'] == 'Tidak Diaudit' ? 'display:none;' : '') ?>">Opini Akuntan</label>
                        <select name="opini_akuntan" id="opiniAkuntan" required style="<?= (empty($form_empat_a) || $form_empat_a['pembukuan_laporan'] == 'Tidak Diaudit' ? 'display:none;' : '') ?>">
                            <option value="1. Wajar Tanpa Pengecualian" <?= (!empty($form_empat_a) && $form_empat_a['opini_akuntan'] == '1. Wajar Tanpa Pengecualian') ? 'selected' : '' ?>>1. Wajar Tanpa Pengecualian</option>
                            <option value="2. Wajar Dengan Pengecualian" <?= (!empty($form_empat_a) && $form_empat_a['opini_akuntan'] == '2. Wajar Dengan Pengecualian') ? 'selected' : '' ?>>2. Wajar Dengan Pengecualian</option>
                            <option value="3. Tidak Wajar" <?= (!empty($form_empat_a) && $form_empat_a['opini_akuntan'] == '3. Tidak Wajar') ? 'selected' : '' ?>>3. Tidak Wajar</option>
                            <option value="4. Tidak Ada Opini" <?= (!empty($form_empat_a) && $form_empat_a['opini_akuntan'] == '4. Tidak Ada Opini') ? 'selected' : '' ?>>4. Tidak Ada Opini</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>NAMA AKUNTAN PUBLIK</td>
                    <td>: <input type="text" id="nama-akuntan" class="input-audit" name="nama_akuntan" value="<?= !empty($form_empat_a) ? $form_empat_a['nama_akuntan'] : '' ?>" <?= (empty($form_empat_a) || $form_empat_a['pembukuan_laporan'] == 'Tidak Diaudit') ? 'disabled' : '' ?>></td>
                </tr>
                <tr>
                    <td>NPWP AKUNTAN PUBLIK</td>
                    <td>: <input type="text" id="npwp-akuntan" class="input-audit" name="npwp_akuntan" value="<?= !empty($form_empat_a) ? $form_empat_a['npwp_akuntan'] : '' ?>" <?= (empty($form_empat_a) || $form_empat_a['pembukuan_laporan'] == 'Tidak Diaudit') ? 'disabled' : '' ?>></td>
                </tr>
                <tr>
                    <td>NAMA KANTOR AKUNTAN PUBLIK</td>
                    <td>: <input type="text" id="nama-kantor-akuntan" class="input-audit" name="nama_kantor_akuntan" value="<?= !empty($form_empat_a) ? $form_empat_a['nama_kantor_akuntan'] : '' ?>" <?= (empty($form_empat_a) || $form_empat_a['pembukuan_laporan'] == 'Tidak Diaudit') ? 'disabled' : '' ?>></td>
                </tr>
                <tr>
                    <td>NPWP KANTOR AKUNTAN PUBLIK</td>
                    <td>: <input type="text" id="npwp-kantor-akuntan" class="input-audit" name="npwp_kantor_akuntan" value="<?= !empty($form_empat_a) ? $form_empat_a['npwp_kantor_akuntan'] : '' ?>" <?= (empty($form_empat_a) || $form_empat_a['pembukuan_laporan'] == 'Tidak Diaudit') ? 'disabled' : '' ?>></td>
                </tr>
                <tr>
                    <td>NAMA KONSULTAN PAJAK</td>
                    <td>: <input type="text" id="nama-konsultan-pajak" class="input-audit" name="nama_konsultan" value="<?= !empty($form_empat_a) ? $form_empat_a['nama_konsultan'] : '' ?>" <?= (empty($form_empat_a) || $form_empat_a['pembukuan_laporan'] == 'Tidak Diaudit') ? 'disabled' : '' ?>></td>
                </tr>
                <tr>
                    <td>NPWP KONSULTAN PAJAK</td>
                    <td>: <input type="text" id="npwp-konsultan-pajak" class="input-audit" name="npwp_konsultan" value="<?= !empty($form_empat_a) ? $form_empat_a['npwp_konsultan'] : '' ?>" <?= (empty($form_empat_a) || $form_empat_a['pembukuan_laporan'] == 'Tidak Diaudit') ? 'disabled' : '' ?>></td>
                </tr>
                <tr>
                    <td>NAMA KANTOR KONSULTAN PAJAK</td>
                    <td>: <input type="text" id="nama-kantor-konsultan-pajak" class="input-audit" name="nama_kantor_konsultan" value="<?= !empty($form_empat_a) ? $form_empat_a['nama_kantor_konsultan'] : '' ?>" <?= (empty($form_empat_a) || $form_empat_a['pembukuan_laporan'] == 'Tidak Diaudit') ? 'disabled' : '' ?>></td>
                </tr>
                <tr>
                    <td>NPWP KANTOR KONSULTAN PAJAK</td>
                    <td>: <input type="text" id="npwp-kantor-konsultan-pajak" class="input-audit" name="npwp_kantor_konsultan" value="<?= !empty($form_empat_a) ? $form_empat_a['npwp_kantor_konsultan'] : '' ?>" <?= (empty($form_empat_a) || $form_empat_a['pembukuan_laporan'] == 'Tidak Diaudit') ? 'disabled' : '' ?>></td>
                </tr>
            </table>
        </div>
        <!-- Ending Form Audit Section -->

        <!-- Form Income Table -->
        <div class="form-section">
            <table class="income-table">
                <thead>
                    <tr>
                        <th colspan="4">PENGHASILAN DARI USAHA DAN/ATAU PEKERJAAN BEBAS BERDASARKAN LAPORAN KEUANGAN KOMERSIAL :</th>
                        <th class="text-right">RUPIAH</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td rowspan="5" class="bordered-cell">1.</td> <!-- Nomor 1 dengan border -->
                        <td>a.</td>
                        <td>PEREDARAN USAHA</td>
                        <td>1a</td>
                        <td class="no-border"><input type="text" class="input-cell" id="input1a" name="_1a" value="<?= !empty($form_empat_b) ? $form_empat_b['_1a'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>b.</td>
                        <td>HARGA POKOK PENJUALAN</td>
                        <td>1b</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input1b" name="_1b" value="<?= !empty($form_empat_b) ? $form_empat_b['_1b'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>c.</td>
                        <td>LABA/RUGI BRUTO USAHA (1a - 1b)</td>
                        <td class="number-sub">1c</td>
                        <td class="yellow-cell no-border"><input type="text" class="input-cell" id="input1c" value="0" readonly></td>
                    </tr>
                    <tr>
                        <td>d.</td>
                        <td>BIAYA USAHA</td>
                        <td>1d</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input1d" name="_1d" value="<?= !empty($form_empat_b) ? $form_empat_b['_1d'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>e.</td>
                        <td>PENGHASILAN NETO (1c - 1d)</td>
                        <td>1e</td>
                        <td class="yellow-cell no-border"><input type="text" class="input-cell" id="input1e" value="0" readonly></td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th colspan="5">PENYESUAIAN FISKAL POSITIF</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="12" class="bordered-cell">2.</td> <!-- Nomor 2 dengan border -->
                        <td>a.</td>
                        <td>BIAYA YANG DIBEBANKAN/DIKELUARKAN UNTUK KEPENTINGAN PRIBADI WAJIB PAJAK ATAU ORANG YANG MENJADI TANGGUNGANNYA</td>
                        <td>2a</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input2a" name="_2a" value="<?= !empty($form_empat_b) ? $form_empat_b['_2a'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>b.</td>
                        <td>PREMI ASURANSI KESEHATAN, ASURANSI KECELAKAAN, ASURANSI JIWA, ASURANSI DWIGUNA, DAN ASURANSI BEASISWA YANG DIBAYAR OLEH WAJIB PAJAK</td>
                        <td>2b</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input2b" name="_2b" value="<?= !empty($form_empat_b) ? $form_empat_b['_2b'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>c.</td>
                        <td>PENGGANTIAN ATAU IMBALAN SEHUBUNGAN DENGAN PEKERJAAN ATAU JASA YANG DIBERIKAN DALAM BENTUK NATURA ATAU KENIKMATAN</td>
                        <td>2c</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input2c" name="_2c" value="<?= !empty($form_empat_b) ? $form_empat_b['_2c'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>d.</td>
                        <td>JUMLAH YANG MELEBIHI KEWAJARAN YANG DIBAYARKAN KEPADA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA SEHUBUNGAN DENGAN PEKERJAAN YANG DILAKUKAN</td>
                        <td>2d</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input2d" name="_2d" value="<?= !empty($form_empat_b) ? $form_empat_b['_2d'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>e.</td>
                        <td>HARTA YANG DIHIBAHKAN, BANTUAN ATAU SUMBANGAN</td>
                        <td>2e</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input2e" name="_2e" value="<?= !empty($form_empat_b) ? $form_empat_b['_2e'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>f.</td>
                        <td>PAJAK PENGHASILAN</td>
                        <td>2f</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input2f" name="_2f" value="<?= !empty($form_empat_b) ? $form_empat_b['_2f'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>g.</td>
                        <td>GAJI YANG DIBAYARKAN KEPADA PEMILIK / ORANG YANG MENJADI TANGGUNGANNYA</td>
                        <td>2g</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input2g" name="_2g" value="<?= !empty($form_empat_b) ? $form_empat_b['_2g'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>h.</td>
                        <td>SANKSI ADMINISTRASI</td>
                        <td>2h</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input2h" name="_2h" value="<?= !empty($form_empat_b) ? $form_empat_b['_2h'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>i.</td>
                        <td>SELISIH PENYUSUTAN/AMORTISASI KOMERSIAL DIATAS PENYUSUTAN/ AMORTISASI FISKAL</td>
                        <td>2i</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input2i" name="_2i" value="<?= !empty($form_empat_b) ? $form_empat_b['_2i'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>j.</td>
                        <td>BIAYA UNTUK MENDAPATKAN, MENAGIH DAN MEMELIHARA PENGHASILAN YANG DIKENAKAN PPh FINAL DAN PENGHASILAN YANG TIDAK TERMASUK OBJEK PAJAK</td>
                        <td>2j</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input2j" name="_2j" value="<?= !empty($form_empat_b) ? $form_empat_b['_2j'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>k.</td>
                        <td>PENYESUAIAN FISKAL POSITIF LAINNYA</td>
                        <td>2k</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input2k" name="_2k" value="<?= !empty($form_empat_b) ? $form_empat_b['_2k'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>l.</td>
                        <td>JUMLAH (2a s.d. 2k)</td>
                        <td>2l</td>
                        <td class="yellow-cell no-border"><input type="text" class="input-cell" id="input2l" value="0" readonly></td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th colspan="5">PENYESUAIAN FISKAL NEGATIF</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="4" class="bordered-cell">3.</td> <!-- Nomor 3 dengan border -->
                        <td>a.</td>
                        <td>PENGHASILAN YANG DIKENAKAN PPh FINAL DAN PENGHASILAN YANG TIDAK TERMASUK OBJEK PAJAK TETAPI TIDAK TERMASUK DALAM PEREDARAN USAHA</td>
                        <td>3a</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input3a" name="_3a" value="<?= !empty($form_empat_b) ? $form_empat_b['_3a'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>b.</td>
                        <td>SELISIH PENYUSUTAN / AMORTISASI KOMERSIAL DI BAWAH PENYUSUTAN AMORTISASI FISKAL</td>
                        <td>3b</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input3b" name="_3b" value="<?= !empty($form_empat_b) ? $form_empat_b['_3b'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>c.</td>
                        <td>PENYESUAIAN FISKAL NEGATIF LAINNYA</td>
                        <td>3c</td>
                        <td class=" no-border"><input type="text" class="input-cell" id="input3c" name="_3c" value="<?= !empty($form_empat_b) ? $form_empat_b['_3c'] : '0' ?>"></td>
                    </tr>
                    <tr>
                        <td>d.</td>
                        <td>JUMLAH (3a s.d. 3c)</td>
                        <td>3d</td>
                        <td class="yellow-cell no-border"><input type="text" class="input-cell" id="input3d" value="0" readonly></td>
                    </tr>
                    <tr>
                        <td class="bordered-cell">4.</td> <!-- Nomor 4 tanpa border -->
                        <th colspan="2">JUMLAH BAGIAN A (1e + 2l - 3d)</th>
                        <td>4.</td>
                        <td class="yellow-cell no-border"><input type="text" class="input-cell" id="input4a" name="_4a" value="<?= !empty($form_empat_b) ? $form_empat_b['_4a'] : '0' ?>"></td>
                    </tr>
                </tbody>
            </table>
            <!-- End Income Table -->
        </div>
    </form>

    <script>
        // Fungsi untuk memformat angka dengan pemisah ribuan
        function formatNumber(value) {
            if (!value) return '';
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        // Fungsi untuk menghapus format angka
        function unformatNumber(value) {
            if (!value) return 0;
            return parseFloat(value.replace(/\./g, '')) || 0;
        }

        // Event listener untuk input yang memicu perhitungan
        const inputIds = [
            'input1a', 'input1b', 'input1d', 'input2a', 'input2b', 'input2c', 'input2d', 'input2e', 'input2f', 'input2g', 'input2h', 'input2i', 'input2j', 'input2k',
            'input3a', 'input3b', 'input3c', 'input4a'
        ];

        inputIds.forEach(id => {
            const input = document.getElementById(id);
            if (input) {
                input.addEventListener('input', function() {
                    // Format input dengan pemisah ribuan
                    this.value = formatNumber(unformatNumber(this.value));
                    calculateValues(); // Panggil fungsi perhitungan
                });
            }
        });

        // Fungsi untuk menghitung nilai otomatis
        function calculateValues() {
            const input1a = unformatNumber(document.getElementById('input1a').value);
            const input1b = unformatNumber(document.getElementById('input1b').value);
            const input1d = unformatNumber(document.getElementById('input1d').value);

            const input2a = unformatNumber(document.getElementById('input2a').value);
            const input2b = unformatNumber(document.getElementById('input2b').value);
            const input2c = unformatNumber(document.getElementById('input2c').value);
            const input2d = unformatNumber(document.getElementById('input2d').value);
            const input2e = unformatNumber(document.getElementById('input2e').value);
            const input2f = unformatNumber(document.getElementById('input2f').value);
            const input2g = unformatNumber(document.getElementById('input2g').value);
            const input2h = unformatNumber(document.getElementById('input2h').value);
            const input2i = unformatNumber(document.getElementById('input2i').value);
            const input2j = unformatNumber(document.getElementById('input2j').value);
            const input2k = unformatNumber(document.getElementById('input2k').value);

            const input3a = unformatNumber(document.getElementById('input3a').value);
            const input3b = unformatNumber(document.getElementById('input3b').value);
            const input3c = unformatNumber(document.getElementById('input3c').value);

            // Hitung nilai otomatis
            const value1c = input1a - input1b;
            const value1e = value1c - input1d;

            const value2l = input2a + input2b + input2c + input2d + input2e + input2f + input2g + input2h + input2i + input2j + input2k;

            const value3d = input3a + input3b + input3c;

            const value4a = value1e + value2l - value3d;

            // Update nilai yang dihitung
            document.getElementById('input1c').value = formatNumber(value1c.toFixed());
            document.getElementById('input1e').value = formatNumber(value1e.toFixed());
            document.getElementById('input2l').value = formatNumber(value2l.toFixed());
            document.getElementById('input3d').value = formatNumber(value3d.toFixed());
            document.getElementById('input4a').value = formatNumber(value4a.toFixed());
        }

        // Hitung nilai awal saat halaman dimuat
        calculateValues();

        document.getElementById('form-empat').addEventListener('submit', function(e) {
            // Hapus format ribuan dari semua input sebelum submit
            inputIds.forEach(id => {
                const input = document.getElementById(id);
                if (input) {
                    input.value = unformatNumber(input.value); // Hapus semua simbol non-numerik
                }
            });
        });

        // Fungsi untuk menyimpan data sebelum berpindah halaman
        function saveAndRedirect(url) {
            // Submit form secara manual
            const form = document.getElementById('form-empat');
            form.action = "<?= site_url('form/save_form_empat') ?>"; // Set action form

            // Buat elemen input tersembunyi untuk menyimpan URL tujuan
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'redirect_url';
            input.value = url;
            form.appendChild(input);

            form.submit(); // Kirim form
        }

        // Event listener untuk tombol "SEBELUMNYA"
        document.getElementById('btn-sebelumnya').addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah default behavior
            saveAndRedirect('<?= site_url('form/form_tiga') ?>');
        });

        // Event listener untuk tombol "SELANJUTNYA"
        document.getElementById('btn-selanjutnya').addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah default behavior
            saveAndRedirect('<?= site_url('form/form_lima') ?>');
        });

        function toggleAuditFields(enable) {
            const auditFields = [
                'nama-akuntan', 'npwp-akuntan', 'nama-kantor-akuntan', 'npwp-kantor-akuntan',
                'nama-konsultan-pajak', 'npwp-konsultan-pajak', 'nama-kantor-konsultan-pajak', 'npwp-kantor-konsultan-pajak'
            ];

            auditFields.forEach(function(id) {
                const field = document.getElementById(id);
                field.disabled = !enable;
                field.style.backgroundColor = enable ? 'white' : '#ccc';
            });

            const opiniLabel = document.getElementById('opiniAkuntanLabel');
            const opiniDropdown = document.getElementById('opiniAkuntan');
            if (enable) {
                opiniLabel.style.display = 'inline';
                opiniDropdown.style.display = 'inline';
            } else {
                opiniLabel.style.display = 'none';
                opiniDropdown.style.display = 'none';
            }
        }

        // Jalankan toggleAuditFields saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const pembukuanLaporan = document.querySelector('input[name="pembukuan_laporan"]:checked').value;
            if (pembukuanLaporan === 'Di Audit') {
                toggleAuditFields(true);
            } else {
                toggleAuditFields(false);
            }
        });
    </script>
</body>

</html>