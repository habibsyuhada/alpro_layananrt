-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2023 pada 14.03
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alpro_layananrt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `no_kk` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nik`, `no_kk`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `status_perkawinan`, `agama`, `pekerjaan`, `kewarganegaraan`) VALUES
(1, '1231231231231230', 'kk_123', 'Habib Syuhada', 'Sumedang', '1998-09-11', 'Pria', 'Perum Purna Yudha Indah Blok N No 7', 'Lajang', 'Islam', 'Karyawan Swasta', 'WNI'),
(2, '1', '1', '1', '1', '2023-01-08', 'Pria', '1', 'Lajang', '1', '1', '1'),
(5, '2', '2', '2', '2', '2023-01-15', 'Pria', '2', 'Lajang', '2', '2', '2'),
(6, '111111', 'kk_123', 'Habib Warga', 'Sumedang', '2023-01-15', 'Pria', 'Perum Purna Yudha Indah Blok N No 7', 'Lajang', 'Islam', 'Mahasiswa', 'WNI'),
(7, '222222', 'kk_123', 'Habib RT', 'Sumedang', '2023-01-15', 'Pria', 'Perum Purna Yudha Indah Blok N No 7', 'Lajang', 'Islam', 'Mahasiswa', 'WNI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_pengantar`
--

CREATE TABLE `surat_pengantar` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `alasan` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` text NOT NULL,
  `status` enum('Permintaan','Disetujui','Ditolak') NOT NULL DEFAULT 'Permintaan',
  `approve_by` int(11) NOT NULL,
  `approve_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_pengantar`
--

INSERT INTO `surat_pengantar` (`id`, `nik`, `alasan`, `created_by`, `created_date`, `keterangan`, `status`, `approve_by`, `approve_date`) VALUES
(1, '1', '1222', 5, '2023-01-15 06:31:48', '111', 'Ditolak', 8, '2023-01-15 00:31:48'),
(4, '111111', 'Sebagai Syarat Pembuatan KTP', 7, '2023-01-15 06:32:12', '-', 'Disetujui', 8, '2023-01-15 00:32:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `nik`, `level`) VALUES
(1, 'habib', '202cb962ac59075b964b07152d234b70', 'Habib Syuhada', '1231231231231230', 'RT'),
(5, '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', '1', 'WARGA'),
(7, 'habib_warga', '202cb962ac59075b964b07152d234b70', 'Habib Warga', '111111', 'WARGA'),
(8, 'habib_rt', '202cb962ac59075b964b07152d234b70', 'Habib RT', '222222', 'RT');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
