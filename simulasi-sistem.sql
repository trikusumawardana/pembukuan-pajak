-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 02:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simulasi-sistem`
--

-- --------------------------------------------------------

--
-- Table structure for table `form-dua-a`
--

CREATE TABLE `form-dua-a` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(30) NOT NULL,
  `jenis_penghasilan` varchar(255) NOT NULL,
  `dasar_pengenaan_pajak` varchar(50) DEFAULT NULL,
  `pph_terutang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-dua-a`
--

INSERT INTO `form-dua-a` (`id`, `npwp_user`, `jenis_penghasilan`, `dasar_pengenaan_pajak`, `pph_terutang`) VALUES
(2549, '123451234512345', 'BUNGA DEPOSITO, TABUNGAN, DISKONTO SBI, SURAT BERHARGA NEGARA', '1000000', '200000'),
(2550, '123451234512345', 'BUNGA/DISKONTO OBLIGASI', '3000000', '1000000'),
(2551, '123451234512345', 'PENJUALAN SAHAM DI BURSA EFEK', '300000', '20000'),
(2552, '123451234512345', 'HADIAH UNDIAN', '0', '0'),
(2553, '123451234512345', 'PESANGON, TUNJANGAN HARI TUA DAN TEBUSAN PENSIUN YANG DIBAYAR SEKALIGUS', '0', '0'),
(2554, '123451234512345', 'HONORARIUM ATAS BEBAN APBN / APBD', '0', '0'),
(2555, '123451234512345', 'PENGALIHAN HAK ATAS TANAH DAN/ATAU BANGUNAN', '0', '0'),
(2556, '123451234512345', 'BANGUNAN YANG DITERIMA DALAM RANGKA BANGUNAN GUNA SERAH', '0', '0'),
(2557, '123451234512345', 'SEWA ATAS TANAH DAN/ATAU BANGUNAN', '0', '0'),
(2558, '123451234512345', 'USAHA JASA KONSTRUKSI', '0', '0'),
(2559, '123451234512345', 'PENYALUR/DEALER/AGEN PRODUK BBM', '0', '0'),
(2560, '123451234512345', 'BUNGA SIMPANAN YANG DIBAYARKAN OLEH KOPERASI', '0', '0'),
(2561, '123451234512345', 'PENGHASILAN DARI TRANSAKSI DERIVATIF', '0', '0'),
(2562, '123451234512345', 'DIVIDEN', '0', '0'),
(2563, '123451234512345', 'PENGHASILAN ISTERI DARI SATU PEMBERI KERJA', '0', '0'),
(2564, '123451234512345', 'PENGHASILAN LAIN YANG DIKENAKAN PAJAK FINAL DAN/ATAU BERSIFAT FINAL', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `form-dua-b`
--

CREATE TABLE `form-dua-b` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(30) NOT NULL,
  `jenis_penghasilan_b` varchar(50) NOT NULL,
  `dasar_pengenaan_pajak_b` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-dua-b`
--

INSERT INTO `form-dua-b` (`id`, `npwp_user`, `jenis_penghasilan_b`, `dasar_pengenaan_pajak_b`) VALUES
(928, '123451234512345', 'BANTUAN / SUMBANGAN / HIBAH', '10000000'),
(929, '123451234512345', 'WARISAN', '100000'),
(930, '123451234512345', 'BAGIAN LABA ANGGOTA PERSEORAN KOMANDITER TIDAK ATA', '900000'),
(931, '123451234512345', 'KLAIM ASURANSI KESEHATAN, KECELAKAAN, JIWA, DWIGUN', '10000'),
(932, '123451234512345', 'BEASISWA', '0'),
(933, '123451234512345', 'PENGHASILAN LAIN YANG TIDAK TERMASUK OBJEK PAJAK', '0');

-- --------------------------------------------------------

--
-- Table structure for table `form-dua-checkbox`
--

CREATE TABLE `form-dua-checkbox` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(30) NOT NULL,
  `checkbox` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-dua-checkbox`
--

INSERT INTO `form-dua-checkbox` (`id`, `npwp_user`, `checkbox`) VALUES
(7, '123451234512345', '1');

-- --------------------------------------------------------

--
-- Table structure for table `form-empat-a`
--

CREATE TABLE `form-empat-a` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(40) NOT NULL,
  `pembukuan_laporan` varchar(50) DEFAULT NULL,
  `opini_akuntan` varchar(100) DEFAULT NULL,
  `nama_akuntan` varchar(100) DEFAULT NULL,
  `npwp_akuntan` varchar(50) DEFAULT NULL,
  `nama_kantor_akuntan` varchar(150) DEFAULT NULL,
  `npwp_kantor_akuntan` varchar(50) DEFAULT NULL,
  `nama_konsultan` varchar(100) DEFAULT NULL,
  `npwp_konsultan` varchar(50) DEFAULT NULL,
  `nama_kantor_konsultan` varchar(150) DEFAULT NULL,
  `npwp_kantor_konsultan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-empat-a`
--

INSERT INTO `form-empat-a` (`id`, `npwp_user`, `pembukuan_laporan`, `opini_akuntan`, `nama_akuntan`, `npwp_akuntan`, `nama_kantor_akuntan`, `npwp_kantor_akuntan`, `nama_konsultan`, `npwp_konsultan`, `nama_kantor_konsultan`, `npwp_kantor_konsultan`) VALUES
(5, '123451234512345', 'Di Audit', '1. Wajar Tanpa Pengecualian', '444444444444444', 'LARY BE WITH YOU', '422222222222222', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `form-empat-b`
--

CREATE TABLE `form-empat-b` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(50) NOT NULL,
  `_1a` varchar(50) DEFAULT NULL,
  `_1b` varchar(50) DEFAULT NULL,
  `_1d` varchar(50) DEFAULT NULL,
  `_2a` varchar(50) DEFAULT NULL,
  `_2b` varchar(50) DEFAULT NULL,
  `_2c` varchar(50) DEFAULT NULL,
  `_2d` varchar(50) DEFAULT NULL,
  `_2e` varchar(50) DEFAULT NULL,
  `_2f` varchar(50) DEFAULT NULL,
  `_2g` varchar(50) DEFAULT NULL,
  `_2h` varchar(50) DEFAULT NULL,
  `_2i` varchar(50) DEFAULT NULL,
  `_2j` varchar(50) DEFAULT NULL,
  `_2k` varchar(50) DEFAULT NULL,
  `_3a` varchar(50) DEFAULT NULL,
  `_3b` varchar(50) DEFAULT NULL,
  `_3c` varchar(50) DEFAULT NULL,
  `_4a` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-empat-b`
--

INSERT INTO `form-empat-b` (`id`, `npwp_user`, `_1a`, `_1b`, `_1d`, `_2a`, `_2b`, `_2c`, `_2d`, `_2e`, `_2f`, `_2g`, `_2h`, `_2i`, `_2j`, `_2k`, `_3a`, `_3b`, `_3c`, `_4a`) VALUES
(5, '123451234512345', '100000', '10000', '20000', '50000', '80000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '40000', '60000', '0', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `form-lima-b`
--

CREATE TABLE `form-lima-b` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(50) NOT NULL,
  `jenis_usaha` varchar(100) NOT NULL,
  `perederan_usaha` varchar(100) NOT NULL,
  `norma` varchar(100) NOT NULL,
  `penghasilan_neto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-lima-b`
--

INSERT INTO `form-lima-b` (`id`, `npwp_user`, `jenis_usaha`, `perederan_usaha`, `norma`, `penghasilan_neto`) VALUES
(696, '123451234512345', 'DAGANG', '0', '', '0'),
(697, '123451234512345', 'INDUSTRI', '0', '', '0'),
(698, '123451234512345', 'JASA', '0', '', '0'),
(699, '123451234512345', 'PEKERJAAN BEBAS', '0', '', '0'),
(700, '123451234512345', 'USAHA LAINNYA', '0', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `form-lima-c`
--

CREATE TABLE `form-lima-c` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(50) NOT NULL,
  `npwp_pemberi_kerja` varchar(50) NOT NULL,
  `nama_pemberi_kerja` varchar(50) NOT NULL,
  `penghasilan_bruto` varchar(50) DEFAULT NULL,
  `pengurangan_penghasilan_bruto` varchar(50) DEFAULT NULL,
  `penghasilan_neto_c` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-lima-c`
--

INSERT INTO `form-lima-c` (`id`, `npwp_user`, `npwp_pemberi_kerja`, `nama_pemberi_kerja`, `penghasilan_bruto`, `pengurangan_penghasilan_bruto`, `penghasilan_neto_c`) VALUES
(8, '123451234512345', '255555555555555', 'saiko', '200000', '150000', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `form-lima-d`
--

CREATE TABLE `form-lima-d` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(50) NOT NULL,
  `jenis_usaha_d` varchar(100) NOT NULL,
  `penghasilan_neto_d` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-lima-d`
--

INSERT INTO `form-lima-d` (`id`, `npwp_user`, `jenis_usaha_d`, `penghasilan_neto_d`) VALUES
(853, '123451234512345', 'BUNGA', '30000'),
(854, '123451234512345', 'ROYALTI', '20000'),
(855, '123451234512345', 'SEWA', '50000'),
(856, '123451234512345', 'PENGHARGAAN DAN HADIAH', '0'),
(857, '123451234512345', 'KEUNTUNGAN DARI PENJUALAN/PENGALIHAN HARTA', '0'),
(858, '123451234512345', 'PENGHASILAN LAINNYA', '0');

-- --------------------------------------------------------

--
-- Table structure for table `form-pp`
--

CREATE TABLE `form-pp` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(30) NOT NULL,
  `npwp` varchar(30) NOT NULL,
  `masa_pajak` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `perederan_bruto` varchar(50) NOT NULL,
  `jumlah_pph` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-pp`
--

INSERT INTO `form-pp` (`id`, `npwp_user`, `npwp`, `masa_pajak`, `alamat`, `perederan_bruto`, `jumlah_pph`) VALUES
(4, '123451234512345', '123451234512345', 'Januari', 'semarang', '3000000', '15000'),
(6, '123451234512345', '123451234512345', 'Januari', 'kudus', '2000000', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `form-pp-kirim`
--

CREATE TABLE `form-pp-kirim` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(50) NOT NULL,
  `kirim` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-pp-kirim`
--

INSERT INTO `form-pp-kirim` (`id`, `npwp_user`, `kirim`) VALUES
(1, '123451234512345', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `form-satu-a`
--

CREATE TABLE `form-satu-a` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(50) NOT NULL,
  `kode_harta` varchar(50) NOT NULL,
  `nama_harta` varchar(100) NOT NULL,
  `tahun_perolehan` varchar(100) NOT NULL,
  `harga_perolehan` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-satu-a`
--

INSERT INTO `form-satu-a` (`id`, `npwp_user`, `kode_harta`, `nama_harta`, `tahun_perolehan`, `harga_perolehan`, `keterangan`) VALUES
(12, '123451234512345', '043 - Mobil', 'honda brio', '2018', '160000000', 'milik pribadi'),
(13, '123451234512345', '012 - Tabungan', 'reksadana', '2022', '5000000', 'pribadi'),
(15, '123451234512345', '012 - Tabungan', 'tabungan', '2021', '2000000', 'milik pribadi');

-- --------------------------------------------------------

--
-- Table structure for table `form-satu-b`
--

CREATE TABLE `form-satu-b` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(100) NOT NULL,
  `kode_utang` varchar(100) NOT NULL,
  `nama_pemberi_pinjaman` varchar(100) NOT NULL,
  `alamat_pemberi_pinjaman` varchar(100) NOT NULL,
  `tahun_peminjaman` varchar(100) NOT NULL,
  `jumlah_peminjaman` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-satu-b`
--

INSERT INTO `form-satu-b` (`id`, `npwp_user`, `kode_utang`, `nama_pemberi_pinjaman`, `alamat_pemberi_pinjaman`, `tahun_peminjaman`, `jumlah_peminjaman`) VALUES
(4, '123451234512345', '102 - Kartu Kredit', 'yanto', 'semarang', '2020', '100000'),
(5, '123451234512345', '103 - Utang Afiliasi', 'syukur', 'kudus', '2022', '200000');

-- --------------------------------------------------------

--
-- Table structure for table `form-satu-c`
--

CREATE TABLE `form-satu-c` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(100) NOT NULL,
  `nama_anggota_keluarga` varchar(200) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `hubungan` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-satu-c`
--

INSERT INTO `form-satu-c` (`id`, `npwp_user`, `nama_anggota_keluarga`, `nik`, `hubungan`, `pekerjaan`) VALUES
(4, '123451234512345', 'sukiman', '1111111111111111', 'kakak kandung', 'designer');

-- --------------------------------------------------------

--
-- Table structure for table `form-tiga`
--

CREATE TABLE `form-tiga` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(40) NOT NULL,
  `nama_pemotong` varchar(50) NOT NULL,
  `npwp_pemotong` varchar(50) NOT NULL,
  `bukti_pemotongan_nomor` varchar(50) NOT NULL,
  `bukti_pemotongan_tanggal` varchar(50) NOT NULL,
  `jenis_pajak` varchar(50) NOT NULL,
  `jumlah_pph_yang_dipotong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form-tiga`
--

INSERT INTO `form-tiga` (`id`, `npwp_user`, `nama_pemotong`, `npwp_pemotong`, `bukti_pemotongan_nomor`, `bukti_pemotongan_tanggal`, `jenis_pajak`, `jumlah_pph_yang_dipotong`) VALUES
(4, '123451234512345', 'rizky', '333333333333333', '3', '2025-02-21', 'Pasal 24', 100000),
(5, '123451234512345', 'dagot', '433333333333333', '4', '2025-02-21', 'Pasal DTP', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `form_index_a`
--

CREATE TABLE `form_index_a` (
  `id` int(11) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `nama_wajib_pajak` varchar(100) NOT NULL,
  `jenis_usaha_pekerjaan_bebas` varchar(100) NOT NULL,
  `klu` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `no_telepon_faksimili` varchar(50) NOT NULL,
  `status_kewajiban_perpajakan` varchar(10) NOT NULL,
  `npwp_suami_istri` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_index_a`
--

INSERT INTO `form_index_a` (`id`, `npwp`, `nama_wajib_pajak`, `jenis_usaha_pekerjaan_bebas`, `klu`, `fax`, `no_telepon_faksimili`, `status_kewajiban_perpajakan`, `npwp_suami_istri`) VALUES
(1, '123451234512345', 'Tri Kusumawardana', 'GITARIS', '96303', '903', '11', 'HB', ''),
(2, '222222222222222', 'Sukijan', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `form_index_b`
--

CREATE TABLE `form_index_b` (
  `id` int(11) NOT NULL,
  `npwp_user` varchar(50) NOT NULL,
  `a1` varchar(50) NOT NULL,
  `a2` varchar(50) NOT NULL,
  `a3` varchar(50) NOT NULL,
  `a4` varchar(50) NOT NULL,
  `a5` varchar(50) NOT NULL,
  `a6` varchar(50) NOT NULL,
  `a7` varchar(50) NOT NULL,
  `b8` varchar(50) NOT NULL,
  `b9` varchar(50) NOT NULL,
  `b10` varchar(50) NOT NULL,
  `b10_radio` varchar(255) NOT NULL,
  `b11` varchar(50) NOT NULL,
  `b11_option` varchar(255) NOT NULL,
  `c12` varchar(50) NOT NULL,
  `c12_checkbox` varchar(255) NOT NULL,
  `c13` varchar(50) NOT NULL,
  `c14` varchar(50) NOT NULL,
  `d15` varchar(50) NOT NULL,
  `d16` varchar(50) NOT NULL,
  `d16_option` varchar(255) NOT NULL,
  `d17_a` varchar(50) NOT NULL,
  `d17_b` varchar(50) NOT NULL,
  `d18` varchar(50) NOT NULL,
  `e19` varchar(50) NOT NULL,
  `e19_option` varchar(255) NOT NULL,
  `tgl_lunas` date NOT NULL,
  `e20_checkbox_a` tinyint(1) NOT NULL,
  `e20_checkbox_b` tinyint(1) NOT NULL,
  `e20_checkbox_c` tinyint(1) NOT NULL,
  `e20_checkbox_d` tinyint(1) NOT NULL,
  `f21` varchar(50) NOT NULL,
  `f21_checkbox_a` tinyint(1) NOT NULL,
  `f21_checkbox_b` tinyint(1) NOT NULL,
  `f21_checkbox_c` tinyint(1) NOT NULL,
  `g_checkbox_a` tinyint(1) NOT NULL,
  `g_checkbox_b` tinyint(1) DEFAULT NULL,
  `g_checkbox_c` tinyint(1) DEFAULT NULL,
  `g_checkbox_d` tinyint(1) DEFAULT NULL,
  `g_checkbox_e` tinyint(1) DEFAULT NULL,
  `g_checkbox_f` tinyint(1) DEFAULT NULL,
  `g_checkbox_g` tinyint(1) DEFAULT NULL,
  `g_checkbox_h` tinyint(1) DEFAULT NULL,
  `g_checkbox_i` tinyint(1) DEFAULT NULL,
  `g_checkbox_j` tinyint(1) DEFAULT NULL,
  `g_checkbox_k` tinyint(1) DEFAULT NULL,
  `g_checkbox_l` tinyint(1) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_index_b`
--

INSERT INTO `form_index_b` (`id`, `npwp_user`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `b8`, `b9`, `b10`, `b10_radio`, `b11`, `b11_option`, `c12`, `c12_checkbox`, `c13`, `c14`, `d15`, `d16`, `d16_option`, `d17_a`, `d17_b`, `d18`, `e19`, `e19_option`, `tgl_lunas`, `e20_checkbox_a`, `e20_checkbox_b`, `e20_checkbox_c`, `e20_checkbox_d`, `f21`, `f21_checkbox_a`, `f21_checkbox_b`, `f21_checkbox_c`, `g_checkbox_a`, `g_checkbox_b`, `g_checkbox_c`, `g_checkbox_d`, `g_checkbox_e`, `g_checkbox_f`, `g_checkbox_g`, `g_checkbox_h`, `g_checkbox_i`, `g_checkbox_j`, `g_checkbox_k`, `g_checkbox_l`, `tanggal`) VALUES
(1, '222222222222222', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 0, 0, 0, 0, '', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '123451234512345', '100000', '50000', '100000', '5000', '255000', '20000', '235000', '200000', '35000', '58500000', 'K', '0', '0', '10000', '1', '5000', '15000', '2100000', '2085000', '', '100000', '200000', '300000', '2385000', '', '0000-00-00', 1, 0, 0, 0, '173750.00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `kode_harta`
--

CREATE TABLE `kode_harta` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kode_harta`
--

INSERT INTO `kode_harta` (`id`, `kode`, `nama`) VALUES
(1, '011', 'Uang Tunai'),
(2, '012', 'Tabungan'),
(3, '013', 'Giru'),
(4, '014', 'Deposito'),
(5, '019', 'Setara Kas Lainnya'),
(6, '021', 'Piutang'),
(7, '022', 'Piutang Afiliasi'),
(8, '029', 'Piutang Lainnya'),
(9, '031', 'Saham yang Dibeli Untuk Dijual Kembali'),
(10, '032', 'Saham'),
(11, '033', 'Obligasi Perusahaan'),
(12, '034', 'Obligasi Pemerintah Indonesia'),
(13, '035', 'Surat Utang Lainnya'),
(14, '036', 'Reksadana'),
(15, '037', 'Instrumen Derivatif'),
(16, '038', 'Penyertaan Modal Dalam Perusahaan Lain yang Tidak atas Saham'),
(17, '039', 'Investasi Lainnya'),
(18, '041', 'Sepeda'),
(19, '042', 'Sepeda Motor'),
(20, '043', 'Mobil'),
(21, '049', 'Alat Transportasi Lainnya'),
(22, '051', 'Logam Mulia'),
(23, '052', 'Batu Mulia'),
(24, '053', 'Barang Seni dan Antik'),
(25, '054', 'Kapal Pesiar, Pesawat Terbang, Helikopter, Jetski, Peralatan Olahraga Khusus'),
(26, '055', 'Peralatan Elektronik, Furniture'),
(27, '059', 'Harta Bergerak Lainnya'),
(28, '061', 'Tanah dan/atau Bangunan Untuk Tempat Tinggal'),
(29, '062', 'Tanah dan/atau Bangunan Untuk Usaha'),
(30, '063', 'Tanah atau Lahan Untuk Usaha'),
(31, '064', 'Harta Tidak Bergerak Lainnya'),
(32, '071', 'Paten'),
(33, '072', 'Royalti'),
(34, '073', 'Merek Dagang'),
(35, '079', 'Harta Tidak Berwujud Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `kode_utang`
--

CREATE TABLE `kode_utang` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kode_utang`
--

INSERT INTO `kode_utang` (`id`, `kode`, `nama`) VALUES
(1, '101', 'Utang Bank /Lembaga Keuangan Bukan Bank'),
(2, '102', 'Kartu Kredit'),
(3, '103', 'Utang Afiliasi'),
(4, '104', 'Utang Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `nama_lengkap`, `tanggal`, `status`) VALUES
(1, 'Madalyne', '2024-06-13', 'NIHIL');

-- --------------------------------------------------------

--
-- Table structure for table `page1`
--

CREATE TABLE `page1` (
  `id` int(11) NOT NULL,
  `kode` int(10) NOT NULL,
  `harta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `efin` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `npwp`, `efin`, `nama_lengkap`, `email`, `alamat`, `no_telpon`, `password`) VALUES
(5, '457863300424000', '1234567123', 'Fajar Nurdin', 'fajar@gmail.com', 'Semarang', '08973232', '$2y$10$dsRwzXfiiKJDCbjLVXUWNODwRmpdtmGtgM4Gt2WjhnljZVRss9Pty'),
(6, '123451234512345', '1234567123', 'Tri Kusumawardana', 'tri@gmail.com', 'Sei Buluh', '089636412824', '$2y$10$PVjlQzJuSu348kl1uP08J.Q9iOftD5DtBeGGa7pdhbWkyNh4HcGX.'),
(7, '222222222222222', '1234567123', 'Sukijan', 'ijan@gmail.com', 'Kudus', '1233441242', '$2y$10$lOr6/DtD.ZHogb0eA6JYS.zlbNJkWvRXW5E2a7mfqihpI9v/Zdemm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form-dua-a`
--
ALTER TABLE `form-dua-a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-dua-b`
--
ALTER TABLE `form-dua-b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-dua-checkbox`
--
ALTER TABLE `form-dua-checkbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-empat-a`
--
ALTER TABLE `form-empat-a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-empat-b`
--
ALTER TABLE `form-empat-b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-lima-b`
--
ALTER TABLE `form-lima-b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-lima-c`
--
ALTER TABLE `form-lima-c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-lima-d`
--
ALTER TABLE `form-lima-d`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-pp`
--
ALTER TABLE `form-pp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-pp-kirim`
--
ALTER TABLE `form-pp-kirim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-satu-a`
--
ALTER TABLE `form-satu-a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-satu-b`
--
ALTER TABLE `form-satu-b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-satu-c`
--
ALTER TABLE `form-satu-c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form-tiga`
--
ALTER TABLE `form-tiga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_index_a`
--
ALTER TABLE `form_index_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_index_b`
--
ALTER TABLE `form_index_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode_harta`
--
ALTER TABLE `kode_harta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode_utang`
--
ALTER TABLE `kode_utang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `page1`
--
ALTER TABLE `page1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form-dua-a`
--
ALTER TABLE `form-dua-a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2565;

--
-- AUTO_INCREMENT for table `form-dua-b`
--
ALTER TABLE `form-dua-b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=934;

--
-- AUTO_INCREMENT for table `form-dua-checkbox`
--
ALTER TABLE `form-dua-checkbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `form-empat-a`
--
ALTER TABLE `form-empat-a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form-empat-b`
--
ALTER TABLE `form-empat-b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form-lima-b`
--
ALTER TABLE `form-lima-b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=701;

--
-- AUTO_INCREMENT for table `form-lima-c`
--
ALTER TABLE `form-lima-c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `form-lima-d`
--
ALTER TABLE `form-lima-d`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=859;

--
-- AUTO_INCREMENT for table `form-pp`
--
ALTER TABLE `form-pp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `form-pp-kirim`
--
ALTER TABLE `form-pp-kirim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form-satu-a`
--
ALTER TABLE `form-satu-a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `form-satu-b`
--
ALTER TABLE `form-satu-b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form-satu-c`
--
ALTER TABLE `form-satu-c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `form-tiga`
--
ALTER TABLE `form-tiga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form_index_a`
--
ALTER TABLE `form_index_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form_index_b`
--
ALTER TABLE `form_index_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kode_harta`
--
ALTER TABLE `kode_harta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `kode_utang`
--
ALTER TABLE `kode_utang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page1`
--
ALTER TABLE `page1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
