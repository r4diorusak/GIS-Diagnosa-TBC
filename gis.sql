-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2022 pada 15.45
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasyankes`
--

CREATE TABLE `fasyankes` (
  `ID` int(11) NOT NULL,
  `name` varchar(75) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `kecamatan` int(55) NOT NULL,
  `tingkat` int(55) NOT NULL,
  `SO2020` int(55) NOT NULL,
  `RO2020` int(55) NOT NULL,
  `SO2021` int(55) NOT NULL,
  `RO2021` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasyankes`
--

INSERT INTO `fasyankes` (`ID`, `name`, `latitude`, `longitude`, `address`, `photo`, `description`, `kecamatan`, `tingkat`, `SO2020`, `RO2020`, `SO2021`, `RO2021`) VALUES
(1, 'Puskesmas Batunadua', '1.4151495', '99.2865995', 'Jl. Raja Inal Siregar, Batunadua Julu, Padangsidimpuan Batunadua, Kota Padang Sidempuan, Sumatera Utara 22733, Indonesia', 'UPTP.jpg', '', 1, 2, 47, 0, 41, 0),
(2, 'Puskesmas Hutaimbaru', '1.405291', '99.2415066', 'Jln. Makam Harondak (Hutaimbaru), PadangSidimpuan, SumatraUtara 21899, Indonesia', 'Puskesmas_Hutaimbaru.jpg', '', 2, 2, 29, 0, 8, 0),
(3, 'Puskesmas Labuhan Rasoki', '1.3248495', '99.3434984', 'Labuhan Rasoki, Kec. Padangsidimpuan Tenggara, Kota Padang Sidempuan, Sumatera Utara 22733', 'rasoki.jpg', NULL, 3, 1, 19, 0, 2, 0),
(4, 'Puskesmas Padangmatinggi', '1.3611595', '99.2830462', 'Aek Tampang, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22711', 'padangma.jpg', NULL, 4, 3, 104, 3, 123, 1),
(5, 'Puskesmas Pijarkoling', '1.3345607', '99.303629', 'Kecamatan Padangsidimpuan Tenggara, Kota Padangsidimpuan', 'pijar.jpg', NULL, 3, 2, 26, 1, 44, 1),
(6, 'Puskesmas Pintu Langit', '1.4722822', '99.2472685', 'Pargarutan Batu, Kec. Angkola Tim., Kabupaten Tapanuli Selatan, Sumatera Utara 22733', 'pintu.jpg', NULL, 5, 1, 1, 0, 1, 0),
(7, 'Puskesmas Pokenjior', '1.4523381', '99.2549119', 'Simasom, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22733', 'pokin.jpg', NULL, 3, 1, 8, 0, 5, 0),
(8, 'Puskesmas Sadabuan', '1.392813', '99.2560027', 'Jl. Sutan Sori Pada Mulia No.17, Sadabuan, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22733', 'sada.jpg', NULL, 6, 3, 96, 3, 86, 4),
(9, 'Puskesmas Sidangkal', '1.3722125', '99.2708201', 'Kantin, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22711', 'sidangkal.jpg', NULL, 4, 1, 24, 0, 0, 0),
(10, 'Puskesmas Wek I', '1.3824796', '99.2631841', 'Jl.H. Abdul Jalil Nasution, Timbangan, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22711', 'wek.jpg', NULL, 6, 2, 28, 1, 31, 0),
(11, 'RS Metta Medika', '1.3822558', '99.2740759', 'Jl. Sisingamangaraja No.113, Sitamiang, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22711', 'meta.jpg', NULL, 4, 1, 0, 0, 6, 0),
(12, 'RS TNI', '1.3966406', '99.2498864', 'Jalan Losung Batu, Padangsidimpuan Utara, Kota Padang Sidempuan City, Sumatera Utara 22733', 'tni.jpg', NULL, 6, 1, 0, 0, 0, 0),
(13, 'RSUD PSP', '1.372332', '99.2722088', 'JL. Dr. F.L. Tobing, Kantin, Kec. Padangsidimpuan Utara, Kota Padang Sidempuan, Sumatera Utara 22719', 'RSUD-PSP.jpg', NULL, 6, 1, 0, 0, 5, 6),
(14, 'RS Inanta', '1.381099', '99.2740042', 'Jl. Sisingamangaraja No.85-87, Sitamiang, Kec. Padangsidimpuan Sel., Kota Padang Sidempuan, Sumatera Utara 22711', 'inanta.jpg', NULL, 4, 1, 2, 0, 14, 0),
(15, 'RS Lapas', '1.3317752', '99.3021576', 'Purbatua PK, Kec. Padangsidimpuan Tenggara, Kota Padang Sidempuan, Sumatera Utara 22733', 'lapas.jpg', NULL, 3, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(225) NOT NULL,
  `tingkat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `tingkat`) VALUES
(1, 'Padangsidimpuan Batunadua\n', 2),
(2, 'Padangsidimpuan Hutaimbaru\r\n', 2),
(3, 'Padangsidimpuan Tenggara\r\n', 2),
(4, 'Padangsidimpuan Selatan\n', 3),
(5, 'Padangsidmpuan Angkola Julu\n', 1),
(6, 'Padangsidmpuan Utara\n', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(55) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `umur` int(55) NOT NULL,
  `jenis_kelamin` varchar(55) NOT NULL,
  `batuk` int(55) NOT NULL,
  `penurunan_bb` varchar(55) NOT NULL,
  `sesak_nafas` varchar(55) NOT NULL,
  `berkeringat_malam` varchar(55) NOT NULL,
  `batuk_darah` varchar(55) NOT NULL,
  `demam` varchar(55) NOT NULL,
  `tbc` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `umur`, `jenis_kelamin`, `batuk`, `penurunan_bb`, `sesak_nafas`, `berkeringat_malam`, `batuk_darah`, `demam`, `tbc`) VALUES
(1, 'Irene Sibarani', 11, 'Perempuan', 15, 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Positif'),
(2, 'Akbar Qamar', 14, 'Laki - Laki', 30, 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Positif'),
(3, 'Sri Wahyuni', 19, 'Perempuan', 19, 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Positif'),
(4, 'Herlinawati', 42, 'Perempuan', 18, 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Positif'),
(5, 'Riko Pandapora', 35, 'Laki - Laki', 15, 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Positif'),
(6, 'Zainal Marpaung', 53, 'Laki - Laki', 19, 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Positif'),
(7, 'Ade Hara', 11, 'Perempuan', 10, 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Negatif'),
(8, 'Jelita', 18, 'Perempuan', 8, 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Negatif'),
(9, 'Rifki Afrizal', 16, 'Laki - Laki', 16, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Negatif'),
(10, 'Rizki Sopia', 20, 'Perempuan', 14, 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Positif'),
(11, 'Putri Andini', 13, 'Perempuan', 17, 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Positif'),
(12, 'Nanda Saliputra', 18, 'Laki - Laki', 18, 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Positif'),
(13, 'Ramdan Siregar', 29, 'Laki - Laki', 16, 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Positif'),
(14, 'Supri Sandi', 39, 'Laki - Laki', 30, 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Negatif'),
(15, 'Vinansen', 59, 'Laki - Laki', 16, 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Negatif'),
(16, 'Putri Khairunnisa', 24, 'Perempuan', 20, 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Positif'),
(17, 'Bilqis Rosyana', 7, 'Perempuan', 20, 'Ya', 'Ya', 'YA', 'Tidak', 'Ya', 'Positif'),
(18, 'Alfin', 18, 'Laki - Laki', 24, 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Negatif'),
(19, 'Jul Anoi', 55, 'Laki - Laki', 30, 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Negatif'),
(20, 'Unma Ufairah', 7, 'Perempuan', 14, 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Positif'),
(21, 'Roy Sandi', 17, 'Laki - Laki', 26, 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Positif'),
(22, 'Ridoan Nasution', 47, 'Laki - Laki', 23, 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Positif'),
(23, 'Zonathan', 17, 'Laki - Laki', 14, 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Negatif'),
(24, 'Alfin helmi', 12, 'Laki - Laki', 16, 'YA', 'Ya', 'Ya', 'Tidak', 'Ya', 'Positif'),
(25, 'Horjani Sisi', 63, 'Perempuan', 28, 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Negatif'),
(26, 'Ade Wilda', 22, 'Perempuan', 13, 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Negatif'),
(27, 'Hasanuddin', 63, 'Laki - Laki', 31, 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Positif'),
(28, 'Pardamean Lubis', 59, 'Laki - Laki', 20, 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Positif'),
(29, 'Nando Saputra', 17, 'Laki - Laki', 19, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Negatif'),
(30, 'Erlina Wati', 63, 'Perempuan', 32, 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Positif'),
(31, 'Micha Almeyda', 18, 'Perempuan', 15, 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Negatif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat`
--

CREATE TABLE `tingkat` (
  `id_tingkat` int(55) NOT NULL,
  `tingkat` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tingkat`
--

INSERT INTO `tingkat` (`id_tingkat`, `tingkat`) VALUES
(1, 'Rendah'),
(2, 'Sedang'),
(3, 'Tinggi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`ID`, `fullname`, `username`, `email`, `password`) VALUES
(1, 'adha', 'admin', 'r4dioz.88@gmail.com', '$2y$10$nmUbswA0hxRJbuFQd0ogoOTRgxl1NbnZ0jgigHz9v9wSkgBQNSiVS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasyankes`
--
ALTER TABLE `fasyankes`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasyankes`
--
ALTER TABLE `fasyankes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id_tingkat` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
