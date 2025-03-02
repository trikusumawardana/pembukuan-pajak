-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 08:56 AM
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
(1, '12345678', '1234567123', 'Tri Kusumawardana', 'trikusumawardana6@gmail.com', 'Solo', '089636412824', '$2y$10$5Cs7glkORkcB..ZCORVO/OWMB92MagVVhqanD1TM9CJOYpI/Ozd2e'),
(2, '102938', '1234567123', 'Madalyne', 'madalyne@gmail.com', 'Semarang', '089737242293', '$2y$10$OnVeBisNrP9LNwmx8P4EuOkJhLgchyiyAVbApz.5p/GuQvk3CMCOi'),
(3, '10389232', '1234567123', 'John Cena', 'john1@gmail.com', 'Balikpapan', '08973234232', '$2y$10$nr50.0ilB8yp7VeoRUmTjuiFiIuDAy508A91KrahjRZqS0Nwt6686'),
(5, '45.786.330.0-424.000', '1234567123', 'Fajar Nurdin', 'fajar@gmail.com', 'Semarang', '08973232', '$2y$10$dsRwzXfiiKJDCbjLVXUWNODwRmpdtmGtgM4Gt2WjhnljZVRss9Pty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
