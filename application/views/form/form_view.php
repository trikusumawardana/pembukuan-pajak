<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPT Form</title>
    <link href="<?= base_url('assets/') ?>css/css-form.css" rel="stylesheet">
</head>

<body>
    <div class="form-header">
        <div class="form-left">
            <button type="submit" form="form-identitas" name="action" value="sebelumnya" class="btn-grey">SEBELUMNYA</button>
            <p class="vertical-text">FORMULIR</p>
            <div class="label-right">
                <h1>1770</h1>
                <p>KEMENTERIAN KEUANGAN RI <br> DIREKTORAT JENDERAL PAJAK</p>
            </div>
        </div>
        <div class="form-center">
            <h2>SPT TAHUNAN PPh WAJIB PAJAK ORANG PRIBADI</h2>
            <div class="form-info">
                <p>BAGI WAJIB PAJAK YANG MEMPUNYAI PENGHASILAN :</p>
                <hr>
                <ul>
                    <li>DARI USAHA/PEKERJAAN BEBAS;</li>
                    <li>DARI SATU ATAU LEBIH PEMBERI KERJA;</li>
                    <li>YANG DIKENAKAN PPh FINAL DAN/ATAU BERSIFAT FINAL; DAN/ATAU;</li>
                    <li>DALAM NEGERI LAINNYA ATAU LUAR NEGERI</li>
                </ul>
            </div>

        </div>
        <div class="form-right">
            <button type="submit" form="form-identitas" name="action" value="submit" class="btn-grey">SUBMIT</button>
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

            <!-- New block for BL and TH labels -->
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
                <label><input type="radio" name="option" value="Pencatatan"> Pencatatan</label>
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

    <!-- TABEL IDENTITAS START-->
    <form action="<?= site_url('form/update') ?>" method="post" id="form-identitas">
        <div class="form-container">
            <div class="form-section">
                <div class="vertical-text">IDENTITAS</div>

                <table>
                    <tr>
                        <td id="label">NPWP</td>
                        <td>:</td>
                        <td><input type="text" name="npwp" id="npwp" value="<?= $form_index_a['npwp'] ?? '' ?>"></td>
                    </tr>
                    <tr>
                        <td id="label">NAMA WAJIB PAJAK</td>
                        <td>:</td>
                        <td><input type="text" name="nama_wajib_pajak" value="<?= $form_index_a['nama_wajib_pajak'] ?? '' ?>" style="text-transform:uppercase;"></td>
                    </tr>
                    <tr>
                        <td id="label">JENIS USAHA/PEKERJAAN BEBAS</td>
                        <td>:</td>
                        <td><input type="text" name="jenis_usaha_pekerjaan_bebas" value="<?= $form_index_a['jenis_usaha_pekerjaan_bebas'] ?? '' ?>" style="text-transform:uppercase;"></td>
                        <td>KLU</td>
                        <td><input type="text" name="klu" value="<?= $form_index_a['klu'] ?? '' ?>"> </td>
                    </tr>
                    <tr>
                        <td id="label">NO. TELEPON/FAKSIMILI</td>
                        <td>:</td>
                        <td><input type="text" name="no_telepon_faksimili" value="<?= $form_index_a['no_telepon_faksimili'] ?? '' ?>"> </td>
                        <td> FAX</td>
                        <td><input type="text" name="fax" value="<?= $form_index_a['fax'] ?? '' ?>"> </td>
                    </tr>
                    <tr>
                        <td id="label">STATUS KEWAJIBAN PERPAJAKAN SUAMI-ISTERI</td>
                        <td>:</td>
                        <td class="">
                            <label><input type="radio" name="status_kewajiban_perpajakan" value="KK" <?= ($form_index_a['status_kewajiban_perpajakan'] ?? '') === 'KK' ? 'checked' : '' ?>>KK</label>
                            <label><input type="radio" name="status_kewajiban_perpajakan" value="HB" <?= ($form_index_a['status_kewajiban_perpajakan'] ?? '') === 'HB' ? 'checked' : '' ?>>HB</label>
                            <label><input type="radio" name="status_kewajiban_perpajakan" value="PH" <?= ($form_index_a['status_kewajiban_perpajakan'] ?? '') === 'PH' ? 'checked' : '' ?>>PH</label>
                            <label><input type="radio" name="status_kewajiban_perpajakan" value="MT" <?= ($form_index_a['status_kewajiban_perpajakan'] ?? '') === 'MT' ? 'checked' : '' ?>>MT</label>
                        </td>
                    </tr>
                    <tr>
                        <td id="label">NPWP SUAMI/ISTERI</td>
                        <td>:</td>
                        <td><input type="text" name="npwp_suami_istri" value="<?= $form_index_a['npwp_suami_istri'] ?? '' ?>"></td>
                    </tr>
                    <tr>
                        <td id="label-bawah" colspan="6"> Permohonan perubahan data disampaikan terpisah dari pelaporan SPT Tahunan Orang Pribadi ini, dengan menggunakan Formulir Perubahan Data Wajib Pajak dan dilengkapi dokumen yang disyaratkan</td>
                    </tr>
                </table>

            </div>
        </div>
        <!-- TABEL IDENTITAS END -->

        <br class="break-jarak">

        <!-- TABEL CONTENT -->
        <div class="section-container">
            <div class="section-header">
                <div class="vertical-header">A. PENGHASILAN NETO</div>
            </div>
            <div class="table-section">
                <div class="table-header-container">
                    <div class="table-header">*) Pengisian kolom-kolom yang berisi nilai rupiah harus tanpa nilai desimal (contoh penulisan lihat petunjuk pengisian halaman 3)</div>
                    <div class="table-header">RUPIAH</div>
                </div>
                <table class="income-table">
                    <tbody>
                        <tr>
                            <td class="description">1. PENGHASILAN NETO DALAM NEGERI DARI USAHA DAN/ATAU PEKERJAAN BEBAS <br>
                                <span class="explanation">
                                    [Diisi dari Formulir 1770 - I Halaman 1 Jumlah Bagian A atau Formulir 1770 - I Halaman 2 Jumlah Bagian B Kolom 5]
                                </span>
                            </td>
                            <td class="number-amount">
                                1
                            </td>
                            <td colspan="2" id="a1" class="bg-orange">
                                <input type="text" name="a1" value="<?= $form_empat_b['_4a'] ?? 0 ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="description">2. PENGHASILAN NETO DALAM NEGERI SEHUBUNGAN DENGAN PEKERJAAN <br>
                                <span class="explanation">
                                    [Diisi dari Formulir 1770 - I Halaman 2 Jumlah Bagian C Kolom 5]
                                </span>
                            </td>
                            <td class="number-amount">
                                2
                            </td>
                            <td colspan="2" id="a2" class="bg-orange">
                                <input type="text" name="a2" value="<?= $total_penghasilan_neto_c ?? 0 ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="description">3. PENGHASILAN NETO DALAM NEGERI LAINNYA <br>
                                <span class="explanation">
                                    [Diisi dari Formulir 1770 - I Halaman 2 Jumlah Bagian D Kolom 3]
                                </span>
                            </td>
                            <td class="number-amount">
                                3
                            </td>
                            <td colspan="2" id="a3" class="bg-orange">
                                <input type="text" name="a3" value="<?= $total_penghasilan_neto_d ?? 0 ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="description">4. PENGHASILAN NETO LUAR NEGERI <br>
                                <span class="explanation">
                                    [Apabila memiliki penghasilan dari luar negeri agar diisi dari Lampiran Tersendiri, lihat petunjuk pengisian]
                                </span>
                            </td>
                            <td class="number-amount">
                                4
                            </td>
                            <td colspan="2" id="a4" class="bg-white">
                                <input type="text" name="a4" value="<?= $form_index_b['a4'] ?? '' ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="description">5. JUMLAH PENGHASILAN NETO (1 + 2 + 3 + 4) <br>
                                <span class="explanation"> .</span>
                            </td>
                            <td class="number-amount">
                                5
                            </td>
                            <td colspan="2" id="a5" class="bg-orange">
                                <input type="text" name="a5" value="0" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="description">6. ZAKAT / SUMBANGAN KEAGAMAAN YANG BERSIFAT WAJIB <br>
                                <span class="explanation">
                                    [Apabila ada pengurangan zakat/sumbangan keagamaan]
                                </span>
                            </td>
                            <td class="number-amount">
                                6
                            </td>
                            <td colspan="2" id="a6" class="bg-white">
                                <input type="text" name="a6" value="<?= $form_index_b['a6'] ?? '' ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="description">7. JUMLAH PENGHASILAN NETO SETELAH PENGURANGAN ZAKAT / SUMBANGAN KEAGAMAAN YANG SIFATNYA WAJIB (5-6)</td>
                            <td class="number-amount">
                                7
                            </td>
                            <td colspan="2" id="a7" class="bg-orange">
                                <input type="text" name="a7" value="0" readonly>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="section-container">
            <div class="section-header">
                <div class="vertical-header">B. PENGHASILAN <br> KENA PAJAK</div>
            </div>
            <div class="table-section">
                <table class="income-table">
                    <tbody>
                        <tr>
                            <td class="description">8. KOMPENSASI KERUGIAN</td>
                            <td class="number-amount">
                                8
                            </td>
                            <td id="b8" class="bg-white">
                                <input type="text" name="b8" value="<?= $form_index_b['b8'] ?? '' ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="description">9. JUMLAH PENGHASILAN NETO SETELAH KOMPENSASI KERUGIAN (7-8)</td>
                            <td class="number-amount">
                                9
                            </td>
                            <td id="b9" class="bg-orange">
                                <input type="text" name="b9" value="0" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="description">10. PENGHASILAN TIDAK KENA PAJAK
                                <span class="radio-section" id="b10_radio">
                                    <label><input type="radio" name="b10_radio" value="TK" <?= ($form_index_b['b10_radio'] ?? '') === 'TK' ? 'checked' : '' ?>> TK</label>
                                    <label><input type="radio" name="b10_radio" value="K" <?= ($form_index_b['b10_radio'] ?? '') === 'K' ? 'checked' : '' ?>> K</label>
                                    <label><input type="radio" name="b10_radio" value="KI" <?= ($form_index_b['b10_radio'] ?? '') === 'KI' ? 'checked' : '' ?>> K/I</label>
                                </span>

                                <span class="radio-section">
                                    <select id="b11_option" name="b11_option">
                                        <option value="0" <?= ($form_index_b['b11_option'] ?? '') === '0' ? 'selected' : '' ?>>0</option>
                                        <option value="1" <?= ($form_index_b['b11_option'] ?? '') === '1' ? 'selected' : '' ?>>1</option>
                                        <option value="2" <?= ($form_index_b['b11_option'] ?? '') === '2' ? 'selected' : '' ?>>2</option>
                                        <option value="3" <?= ($form_index_b['b11_option'] ?? '') === '3' ? 'selected' : '' ?>>3</option>
                                    </select>
                                </span>
                            </td>
                            <td class="number-amount">
                                10
                            </td>
                            <td id="b10" class="bg-orange"><input type="text" name="b10" value="<?= $form_index_b['b10'] ?? 0 ?>" readonly></td>
                        </tr>
                        <tr>
                            <td class="description">11. PENGHASILAN KENA PAJAK (9-10)</td>
                            <td class="number-amount">
                                11
                            </td>
                            <td id="b11" class="bg-orange">
                                <input type="text" name="b11" value="0" readonly>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="section-container">
            <div class="section-header">
                <div class="vertical-header">C. PPh <br> TERUTANG</div>
            </div>
            <div class="table-section">
                <table class="income-table">
                    <tbody>
                        <tr>
                            <td class="description">12. PPh TERUTANG (TARIF PASAL 17 UU PPh X ANGKA 11) <input id="c12_checkbox" name="c12_checkbox" type="checkbox" <?= $form_index_b['c12_checkbox'] === 'on' ? 'checked' : '' ?>> Menggunakan Perhitungan Sendiri</td>
                            <td class="number-amount">
                                12
                            </td>
                            <td id="c12" class="bg-orange"> <input type="text" id="c12_input" name="c12" value="<?= $form_index_b['c12_checkbox'] === 'on' ? $form_index_b['c12'] : 0 ?>" <?= $form_index_b['c12_checkbox'] !== 'on' ? 'readonly' : '' ?>></td>
                        </tr>
                        <tr>
                            <td class="description">13. PENGEMBALIAN/PENGURANGAN PPh PASAL 24 YANG TELAH DIKREDITKAN</td>
                            <td class="number-amount">
                                13
                            </td>
                            <td id="c13" class="bg-white">
                                <input type="text" name="c13" value="<?= $form_index_b['c13'] ?? 0 ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="description">14. JUMLAH PPh TERUTANG (12 + 13)
                            </td>
                            <td class="number-amount">
                                14
                            </td>
                            <td id="c14" class="bg-orange">
                                <input type="text" name="c14" value="0" readonly>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="section-container">
            <div class="section-header">
                <div class="vertical-header">D. KREDIT PAJAK <br></div>
            </div>

            <div class="table-section">
                <table class="income-table">
                    <tbody>
                        <tr>
                            <td class="description">15. PPh YANG DIPOTONG / DIPUNGUT OLEH PIHAK LAIN, PPh YANG DIBAYAR /DIPOTONG DI LUAR NEGERI <br>DAN PPh DITANGGUNG PEMERINTAH
                                <span class="explanation">
                                    [Diisi dari formulir 1770 -II Jumlah Bagian A Kolom 7]
                                </span>
                            </td>
                            <td class="number-amount">
                                15
                            </td>
                            <td id="d15" class="bg-orange">
                                <input type="text" name="d15" value="<?= $total_jumlah_pph_yang_dipotong ?? 0 ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="description" id="d16_option">
                                16.
                                <input type="radio" disabled> a. PPh YANG HARUS DIBAYAR SENDIRI
                                <br>

                                <hr id="hr-radio-a"> (14-15)
                                <br>
                                <input type="radio" id="radio" checked> b. PPh YANG LEBIH DIPOTONG/DIPUNGKUT
                            </td>
                            <td class="number-amount">
                                16
                            </td>
                            <td id="d16" class="bg-orange">
                                <input type="text" name="d16" value="0" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="description">17. PPh YANG DIBAYAR SENDIRI
                                <span class="desc-ab">
                                    a. PPh PASAL 25 BULANAN <br>
                                    <span id="desc-b">
                                        b. STP PPh PASAL 25 (HANYA POKOK PAJAK)
                                    </span>
                                </span>
                            </td>
                            <!-- yang ini -->
                            <td class="number-amount">
                                17a
                                <hr id="just-space">
                                <hr id="space-ab">
                                17b
                            </td>
                            <td class="bg-white">
                                <span id="d17_a">
                                    <input type="text" name="d17_a" value="<?= $form_index_b['d17_a'] ?? 0 ?>">
                                </span>
                                <br>
                                <hr id="just-space">
                                <span id="d17_b">
                                    <input type="text" name="d17_b" value="<?= $form_index_b['d17_b'] ?? 0 ?>">
                                </span>
                            </td>
                            <!-- sampai sini -->
                        </tr>
                        <tr>
                            <td class="description">18. JUMLAH KREDIT PAJAK (17a+17b)
                            </td>
                            <td class="number-amount" id="d18">
                                18
                            </td>
                            <td class="bg-orange">
                                <input type="text" name="d18" value="0" readonly>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="section-container">
            <div class="section-header">
                <div class="vertical-header">E. PPh KURANG/ <br> LEBIH BAYAR</div>
            </div>

            <div class="table-section">
                <table class="income-table">
                    <tbody>
                        <tr>
                            <td class="description">
                                19.
                                <input type="radio" id="e19_option" disabled> a. PPh YANG KURANG DIBAYAR (PPh PASAL 29)
                                <span id="tgl-lunas">
                                    Tgl Lunas
                                    <div class="garis-tgl-lunas" id="tgl_lunas">
                                        <span id="box-tgl-lunas-vertical"></span>
                                        <span id="data-tgl-lunas"><input type="date" name="tgl_lunas" disabled></span>
                                        <span id="box-tgl-lunas-horizontal"></span>
                                        <span id="garis-satu"></span>

                                    </div>
                                </span>
                                <br>

                                <hr id="hr-radio-b"> (16-18)
                                <br>
                                <input type="radio" id="radio" id="e19_option" checked> b. PPh YANG LEBIH DIBAYAR (PPh PASAL 28 A)
                            </td>
                            <td class="number-amount-special">
                                19
                            </td>
                            <td class="bg-orange-special" id="e19">
                                <input type="text" name="e19" value="0" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="description">20. PERMOHONAN : PPh Lebih Bayar pada 19 b mohon
                                <!-- START TANGGAL LEBIH BAYAR-->
                                <span id="">
                                    <div class="checkbox-dua-puluh">
                                        <div class="table-container">
                                            <div class="table-row">
                                                <div class="table-cell">
                                                    <input type="checkbox" id="e20_checkbox_a" name="e20_checkbox_a" <?= $form_index_b['e20_checkbox_a'] ? 'checked' : '' ?>> a. DIRESTITUSIKAN
                                                </div>
                                                <div class="table-cell">
                                                    <input type="checkbox" id="e20_checkbox_c" name="e20_checkbox_c" <?= $form_index_b['e20_checkbox_c'] ? 'checked' : '' ?>> c. DIKEMBALIKAN DENGAN SKPPKP PASAL 17C (WP dengan Kriteria Tertentu)
                                                </div>
                                            </div>
                                            <div class="table-row">
                                                <div class="table-cell">
                                                    <input type="checkbox" id="e20_checkbox_b" name="e20_checkbox_b" <?= $form_index_b['e20_checkbox_b'] ? 'checked' : '' ?> disabled> b. DIPERHITUNGKAN DENGAN UTANG PAJAK
                                                </div>
                                                <div class="table-cell">
                                                    <input type="checkbox" id="e20_checkbox_d" name="e20_checkbox_d" <?= $form_index_b['e20_checkbox_d'] ? 'checked' : '' ?>> d. DIKEMBALIKAN DENGAN SKPPKP PASAL 17D (WP yang Memenuhi Persyaratan Tertentu)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                                <!-- END TANGGAL LEBIH BAYAR -->


                                <br> <br> <br> <br>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- TABEL CONTENT END -->

        <div class="section-container">
            <div class="section-header">
                <div class="vertical-header">F. ANGSURAN PPh <br> PASAL 25 TAHUN <br> PAJAK BERIKUTNYA</div>
            </div>
            <div class="table-section">
                <table class="income-table">
                    <tbody>
                        <tr>
                            <td class="description">
                                21. ANGSURAN PPh PASAL 25 TAHUN PAJAK BERIKUTNYA DIHITUNG SEBESAR, DIHITUNG BERDASARKAN:
                            </td>
                            <td class="number-amount">
                                21
                            </td>
                            <td class="bg-white" id="f21">
                                <input type="text" name="f21" value="0">
                            </td>
                        </tr>
                        <tr>
                            <td class="description">
                                <span class="checkbox-label">
                                    <input type="checkbox" name="f21_checkbox_a" id="f21_checkbox_a">a. 1/12 X JUMLAH PADA ANGKA 16
                                </span>
                                <span class="checkbox-label">
                                    <input type="checkbox" name="f21_checkbox_b" id="f21_checkbox_b">b. PERHITUNGAN WAJIB PAJAK ORANG PRIBADI PENGUSAHA TERTENTU
                                </span>
                                <span class="checkbox-label">
                                    <input type="checkbox" name="f21_checkbox_c" id="f21_checkbox_c">c. PERHITUNGAN DALAM LAMPIRAN TERSENDIRI
                                </span> <br> <br> <br>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="section-container">
            <div class="section-header">
                <div class="vertical-header">G. LAMPIRAN</div>
            </div>
            <div class="content-section">
                <p>SELAIN FORMULIR 1770 - I SAMPAI DENGAN 1770 - IV (BAIK YANG DIISI MAUPUN YANG TIDAK DIISI) HARUS DILAMPIRKAN PULA :</p>
                <div class="checkbox-container">
                    <div class="checkbox-column">
                        <label><input type="checkbox" id="g_checkbox_a"> SURAT KUASA KHUSUS (BILA DIKUASAKAN)</label>
                        <label><input type="checkbox" id="g_checkbox_b"> SSP LEMBAR KE-3 PPh PASAL 29</label>
                        <label><input type="checkbox" id="g_checkbox_c"> NERACA DAN LAP. LABA RUGI / REKAPITULASI BULANAN PEREDARAN BRUTO DAN/ATAU PENGHASILAN LAIN DAN BIAYA</label>
                        <label><input type="checkbox" id="g_checkbox_d"> PERHITUNGAN KOMPENSASI KERUGIAN FISKAL</label>
                        <label><input type="checkbox" id="g_checkbox_e"> BUKTI PEMOTONGAN/PEMUNGUTAN OLEH PIHAK LAIN/DITANGGUNG PEMERINTAH DAN YANG DIBAYAR/DIPOTONG DI LUAR NEGERI</label>
                        <label><input type="checkbox" id="g_checkbox_f"> FOTOKOPI FORMULIR 1721-A1 DAN/ATAU 1721-A2 LEMBAR</label>
                    </div>

                    <div class="checkbox-column">
                        <label><input type="checkbox" id="g_checkbox_g"> PERHITUNGAN ANGSURAN PPh PASAL 25 TAHUN PAJAK BERIKUTNYA</label>
                        <label><input type="checkbox" id="g_checkbox_h"><input type="text"></label>
                        <label><input type="checkbox" id="g_checkbox_i"> PERHITUNGAN PPh TERUTANG BAGI WAJIB PAJAK DENGAN STATUS PERPAJAKAN PH ATAU MT</label>
                        <label><input type="checkbox" id="g_checkbox_j"> DAFTAR JUMLAH MENGHASILAN DAN PEMBAYARAN PPh PASAL 25 (KHUSUS UNTUK ORANG PRIBADI PENGUSAHA TERTENTU)</label>
                        <label><input type="checkbox" id="g_checkbox_k"> DAFTAR JUMLAH PEREDERAN BRUTO DAN PEMBAYARAN PPh FINAL BERDASARKAN PPh 46 TAHUN 2013 PER MASA PAJAK DAN PER TEMPAT USAHA</label>
                        <label><input type="checkbox" id="g_checkbox_l"><input type="text"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-container">
            <div class="pernyataan">
                PERNYATAAN
            </div>
        </div>

        <div class="section-container-last">
            <div class="statement-section">
                <div class="statement-header">
                    <label><input type="radio" name="statement" value="Wajib Pajak" checked> WAJIB PAJAK</label>
                    <label><input type="radio" name="statement" value="Kuasa"> KUASA</label>
                </div>
                <div class="statement-content">
                    <p>
                        Dengan menyadari sepenuhnya akan segala akibatnya termasuk sanksi-sanksi sesuai dengan ketentuan perundang-undangan yang berlaku, saya menyatakan bahwa apa yang telah saya beritahukan di atas beserta lampiran-lampirannya adalah benar, lengkap dan jelas.
                    </p>
                    <div class="date-container">
                        <span>TANGGAL</span>
                        <input type="date" value="" id="tanggal">
                    </div><br> <br> <br>
                </div>
                <div class="signature-box">
                    TANDA TANGAN
                </div> <br> <br>
            </div>
            <div class="taxpayer-section">
                <p>NAMA WAJIB PAJAK :</p>
                <p>NPWP :</p>
                <div class="yellow-box">
                    <p style="text-transform:uppercase;"> <?= $form_index_a['nama_wajib_pajak'] ?? '' ?></p>
                    <p><?= $form_index_a['npwp'] ?? '' ?></p>
                </div>
            </div>

        </div>
    </form>

    <!-- END TABLE CONTENT -->

    <script>
        document.getElementById('npwp').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 15) value = value.substr(0, 15);

            let formatted = '';
            if (value.length > 0) formatted += value.substr(0, 2);
            if (value.length > 2) formatted += '.' + value.substr(2, 3);
            if (value.length > 5) formatted += '.' + value.substr(5, 3);
            if (value.length > 8) formatted += '.' + value.substr(8, 1);
            if (value.length > 9) formatted += '-' + value.substr(9, 3);
            if (value.length > 12) formatted += '.' + value.substr(12, 3);

            e.target.value = formatted;
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua radio button status
            const statusRadios = document.querySelectorAll('input[name="status_kewajiban_perpajakan"]');
            // Ambil input NPWP Suami/Istri
            const npwpSuamiIstriInput = document.querySelector('input[name="npwp_suami_istri"]');

            // Fungsi untuk menonaktifkan/mengaktifkan input
            function toggleNPWPSuamiIstri() {
                const selectedStatus = document.querySelector('input[name="status_kewajiban_perpajakan"]:checked').value;
                if (selectedStatus === 'KK' || selectedStatus === 'HB') {
                    npwpSuamiIstriInput.disabled = true; // Nonaktifkan input
                    npwpSuamiIstriInput.value = ''; // Kosongkan nilai
                } else {
                    npwpSuamiIstriInput.disabled = false; // Aktifkan input
                }
            }

            // Jalankan fungsi saat halaman dimuat
            toggleNPWPSuamiIstri();

            // Tambahkan event listener untuk setiap radio button
            statusRadios.forEach(radio => {
                radio.addEventListener('change', toggleNPWPSuamiIstri);
            });
        });

        // Fungsi untuk menghitung nilai a5 dan a7
        function calculateValues() {
            // Ambil nilai dari input a1, a2, a3, a4, dan a6
            const a1 = parseFloat(document.querySelector('input[name="a1"]').value) || 0;
            const a2 = parseFloat(document.querySelector('input[name="a2"]').value) || 0;
            const a3 = parseFloat(document.querySelector('input[name="a3"]').value) || 0;
            const a4 = parseFloat(document.querySelector('input[name="a4"]').value) || 0;
            const a6 = parseFloat(document.querySelector('input[name="a6"]').value) || 0;
            const b8 = parseFloat(document.querySelector('input[name="b8"]').value) || 0;
            const b10 = parseFloat(document.querySelector('input[name="b10"]').value) || 0;
            const c12 = parseFloat(document.querySelector('input[name="c12"]').value) || 0;
            const c13 = parseFloat(document.querySelector('input[name="c13"]').value) || 0;
            const d15 = parseFloat(document.querySelector('input[name="d15"]').value) || 0;

            const d17_a = parseFloat(document.querySelector('input[name="d17_a"]').value) || 0;
            const d17_b = parseFloat(document.querySelector('input[name="d17_b"]').value) || 0;

            // Hitung nilai a5
            const a5 = a1 + a2 + a3 + a4;
            document.querySelector('input[name="a5"]').value = a5;

            // Hitung nilai a7
            const a7 = a5 - a6;
            document.querySelector('input[name="a7"]').value = a7;

            // Hitung nilai a9
            const b9 = a7 - b8;
            document.querySelector('input[name="b9"]').value = b9;


            // Hitung nilai c14
            const c14 = c12 + c13;
            document.querySelector('input[name="c14"]').value = c14;

            // Hitung nilai c14
            const d18 = d17_a + d17_b;
            document.querySelector('input[name="d18"]').value = d18;

            // Hitung nilai c14
            const d16 = d15 - c14;
            document.querySelector('input[name="d16"]').value = d16;

            // Hitung nilai c14
            const e19 = d16 + d18;
            document.querySelector('input[name="e19"]').value = e19;

        }

        // Tambahkan event listener untuk input a4 dan a6
        document.querySelector('input[name="a4"]').addEventListener('input', calculateValues);
        document.querySelector('input[name="a6"]').addEventListener('input', calculateValues);
        document.querySelector('input[name="b8"]').addEventListener('input', calculateValues);
        document.querySelector('input[name="c12"]').addEventListener('input', calculateValues);
        document.querySelector('input[name="c13"]').addEventListener('input', calculateValues);

        // Jalankan fungsi calculateValues saat halaman dimuat
        document.addEventListener('DOMContentLoaded', calculateValues);

        // Fungsi untuk menghitung nilai b10 berdasarkan pilihan b10_radio dan b11_option
        function calculateB10() {
            // Ambil nilai dari b10_radio dan b11_option
            const b10Radio = document.querySelector('input[name="b10_radio"]:checked')?.value;
            const b11Option = document.getElementById('b11_option').value;

            // Definisikan nilai b10 berdasarkan logika yang diberikan
            let b10Value = 0;
            if (b10Radio === 'TK') {
                switch (b11Option) {
                    case '0':
                        b10Value = 54000000;
                        break;
                    case '1':
                        b10Value = 58500000;
                        break;
                    case '2':
                        b10Value = 63000000;
                        break;
                    case '3':
                        b10Value = 67500000;
                        break;
                }
            } else if (b10Radio === 'K') {
                switch (b11Option) {
                    case '0':
                        b10Value = 58500000;
                        break;
                    case '1':
                        b10Value = 63000000;
                        break;
                    case '2':
                        b10Value = 67500000;
                        break;
                    case '3':
                        b10Value = 72000000;
                        break;
                }
            } else if (b10Radio === 'KI') {
                switch (b11Option) {
                    case '0':
                        b10Value = 112500000;
                        break;
                    case '1':
                        b10Value = 117000000;
                        break;
                    case '2':
                        b10Value = 121500000;
                        break;
                    case '3':
                        b10Value = 126000000;
                        break;
                }
            }

            // Format nilai b10 dengan pemisah ribuan
            const formattedB10 = b10Value.toLocaleString('id-ID');
            document.querySelector('input[name="b10"]').value = formattedB10;

            // Hitung ulang nilai b11 (Penghasilan Kena Pajak)
            calculateB11();
        }

        // Fungsi untuk menghitung nilai b11 (Penghasilan Kena Pajak)
        // Fungsi untuk menghitung nilai b11 (Penghasilan Kena Pajak)
        function calculateB11() {
            const b9 = parseFloat(document.querySelector('input[name="b9"]').value.replace(/\./g, '')) || 0;
            const b10 = parseFloat(document.querySelector('input[name="b10"]').value.replace(/\./g, '')) || 0;

            let b11Value = b9 - b10;

            // Jika nilai b11 kurang dari 0, set menjadi 0
            if (b11Value < 0) {
                b11Value = 0;
            }

            // Format nilai b11 dengan pemisah ribuan
            document.querySelector('input[name="b11"]').value = b11Value.toLocaleString('id-ID');
        }

        // Tambahkan event listener untuk b10_radio dan b11_option
        document.querySelectorAll('input[name="b10_radio"]').forEach(radio => {
            radio.addEventListener('change', calculateB10);
        });

        document.getElementById('b11_option').addEventListener('change', calculateB10);

        // Jalankan fungsi calculateB10 saat halaman dimuat
        document.addEventListener('DOMContentLoaded', calculateB10);

        // Hapus format angka sebelum form disubmit
        document.getElementById('form-identitas').addEventListener('submit', function(e) {
            const b10Input = document.querySelector('input[name="b10"]');
            b10Input.value = unformatNumber(b10Input.value);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const c12Checkbox = document.getElementById('c12_checkbox');
            const c12Input = document.getElementById('c12_input');

            // Fungsi untuk mengatur readonly dan nilai c12
            function toggleC12Input() {
                if (c12Checkbox.checked) {
                    c12Input.removeAttribute('readonly'); // Hapus readonly jika checkbox dicentang
                } else {
                    c12Input.setAttribute('readonly', true); // Set readonly jika checkbox tidak dicentang
                    c12Input.value = 0; // Set nilai c12 ke 0 jika checkbox tidak dicentang
                }
            }

            // Panggil fungsi saat halaman dimuat
            toggleC12Input();

            // Tambahkan event listener untuk checkbox c12_checkbox
            c12Checkbox.addEventListener('change', toggleC12Input);
        });

        // Tambahkan event listener untuk checkbox c12_checkbox
        document.getElementById('c12_checkbox').addEventListener('change', toggleC12Input);

        // Jalankan fungsi saat halaman dimuat untuk mengatur status awal
        document.addEventListener('DOMContentLoaded', toggleC12Input);

        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua checkbox e20_checkbox
            const e20Checkboxes = document.querySelectorAll('input[name^="e20_checkbox_"]');

            // Fungsi untuk mengatur checkbox
            function toggleE20Checkboxes() {
                e20Checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        if (this.checked) {
                            // Nonaktifkan checkbox lainnya
                            e20Checkboxes.forEach(otherCheckbox => {
                                if (otherCheckbox !== this) {
                                    otherCheckbox.checked = false;
                                    otherCheckbox.disabled = true; // Nonaktifkan checkbox lainnya
                                }
                            });
                        } else {
                            // Aktifkan kembali checkbox lainnya jika tidak ada yang dicentang
                            e20Checkboxes.forEach(otherCheckbox => {
                                otherCheckbox.disabled = false;
                            });
                        }
                    });
                });
            }

            // Panggil fungsi saat halaman dimuat
            toggleE20Checkboxes();
        });

    </script>
</body>

</html>