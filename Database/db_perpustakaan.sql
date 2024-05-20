-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 02:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `isbn` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `sinopsis` text NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `sampul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`isbn`, `judul`, `penulis`, `sinopsis`, `penerbit`, `tanggal_terbit`, `sampul`) VALUES
('9786020822341', 'Tentang Kamu', 'Tere Liye', 'Terima kasih untuk kesempatan mengenalmu, itu adalah salah satu anugerah terbesar hidupku. Cinta memang tidak perlu ditemukan, cintalah yang akan menemukan kita. Terima kasih. Nasihat lama itu benar sekali, aku tidak akan menangis karena sesuatu telah berakhir, tapi aku akan tersenyum karena sesuatu itu pernah terjadi. Masa lalu. Rasa sakit. Masa depan. Mimpi-mimpi. Semua akan berlalu, seperti sungai yang mengalir. Maka biarlah hidupku mengalir seperti sungai kehidupan.', 'Republika', '2016-10-27', '9786020822341.jpg'),
('9786239726263', 'Bumi', 'Tere Liye', '“Namaku Raib, usiaku 15 tahun, kelas sepuluh. Aku anak perempuan seperti kalian, adik-adik kalian, tetangga kalian. Aku punya dua kucing, namanya si Putih dan si Hitam. Mama dan papaku menyenangkan. Guru-guru di sekolahku seru. Teman-temanku baik dan kompak.”', 'SABAKGRIP', '2022-08-30', '9786239726263.jpg'),
('9789792248616', 'Negeri 5 Menara', 'Ahmad Fuadi', 'Seumur hidupnya Alif tidak pernah menginjak tanah di luar ranah Minangkabau. Masa kecilnya dilalui dengan berburu durian runtuh di rimba Bukit Maninjau. Tiba-tiba dia harus melintas punggung Sumatera menuju sebuah desa di pelosok Jawa Timur. Ibunya ingin dia menjadi Buya Hamika walau Alif ingin menjadi Habibie. Dengan setengah hati dia mengikuti perintah ibunya: belajar di pondok.', 'Gramedia Pustaka Utama', '2017-06-14', '9789792248616.jpg'),
('9789792747843', 'Why? Computer - Komputer', 'Yearim Dang', 'Hari ini, yuk melihat-lihat komputer yang ada di mana-mana. Kita menggunakan komputer di rumah, di perusahaan dalam pembuatan produk, di rumah sakit untuk pelayanan pengobatan pasien. Selain itu komputer juga dipakai di mobil, pesawat, angkatan bersenjata, satelit ruang angkasa, stasiun tenaga nuklir, stasiun siaran, dan peneliti cuaca. Di mana-mana orang menggunakan komputer. Nah, sebaiknya kita tahu kemampuan dari komputer secara menyeluruh. Setuju?', 'Elex Media Komputindo', '2017-05-30', '9789792747843.jpg'),
('SCOOPG200336', 'Rumah Tanpa Jendela', 'Asma Nadia', 'Bukan besarnya rumah atau luas halaman dari balik pagar rendah yang memesona Rara, melainkan jajaran pot-pot cantik yang ditaruh di depan jendela-jendela besar rumah tersebut.', 'Republika Penerbit', '2020-06-04', 'SCOOPG200336.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` varchar(25) DEFAULT NULL,
  `kode` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `kode`) VALUES
('1716174806', 'DAF');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kode` varchar(5) DEFAULT NULL,
  `isbn` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_tenggat` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjaman`, `kode`, `isbn`, `judul`, `nisn`, `nama`, `tanggal_pinjam`, `tanggal_tenggat`, `tanggal_kembali`, `status`) VALUES
(34, 'ZKA', '9789792747843', 'Why? Computer - Komputer', '1103223227', 'Muhamad Ardiyansah', '2024-05-15', '2024-05-22', NULL, 'keluar'),
(35, 'ZKA', '9789792248616', 'Negeri 5 Menara', '1103220037', 'Ahmad Zaki Mutashim', '2024-05-01', '2024-05-08', '2024-05-20', 'masuk'),
(36, 'ZKA', '9789792747843', 'Why? Computer - Komputer', '1103220150', 'Muhammad Akhtar Perwira', '2024-05-20', '2024-05-27', NULL, 'keluar'),
(37, 'DAF', '9786020822341', 'Tentang Kamu', '1103223211', 'Azmi Abdurrahman Kautsar', '2024-05-18', '2024-05-25', NULL, 'keluar'),
(38, 'DAF', '9789792248616', 'Negeri 5 Menara', '1103220150', 'Muhammad Akhtar Perwira', '2024-05-11', '2024-05-18', NULL, 'keluar'),
(39, 'DAF', 'SCOOPG200336', 'Rumah Tanpa Jendela', '1103223097', 'Muhammad Aizar Yazid', '2024-05-20', '2024-05-27', NULL, 'keluar'),
(40, 'DAF', 'SCOOPG200336', 'Rumah Tanpa Jendela', '1103223027', 'Muhammad Iqbal Al-Amin', '2024-05-16', '2024-05-23', NULL, 'keluar'),
(41, 'DAF', 'SCOOPG200336', 'Rumah Tanpa Jendela', '1103223163', 'Chandra Aulia Haswangga', '2024-05-20', '2024-05-27', NULL, 'keluar'),
(42, 'ZKA', '9789792747843', 'Why? Computer - Komputer', '1103220037', 'Ahmad Zaki Mutashim', '2024-05-15', '2024-05-22', NULL, 'keluar'),
(43, 'ZKA', '9786239726263', 'Bumi', '1103223097', 'Muhammad Aizar Yazid', '2024-05-10', '2024-05-17', NULL, 'keluar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaturan`
--

CREATE TABLE `tbl_pengaturan` (
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengaturan`
--

INSERT INTO `tbl_pengaturan` (`denda`) VALUES
(1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `kode` varchar(5) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(25) NOT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`kode`, `kata_sandi`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `foto`, `role`) VALUES
('DAF', '$2y$10$D3.Vrd7KvDernb3WoTfEaOu0iyC2gZ7VvSogVNDqrY3CnSnhr9QyC', 'Muhammad Dafi Fathurrahman', 'Bandung', '2024-05-15', 'Laki-laki', 'Bandung', 'DAF.jpeg', 'petugas'),
('ZKA', '$2y$10$D3.Vrd7KvDernb3WoTfEaOu0iyC2gZ7VvSogVNDqrY3CnSnhr9QyC', 'Muhammad Azka Yasakha', 'Bekasi', '2000-01-01', 'Laki-laki', 'Bekasi', 'ZKA.jpeg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nisn` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nisn`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `foto`) VALUES
('1103220037', 'Ahmad Zaki Mutashim', 'Bogor', '2024-05-15', 'Laki-laki', 'Bogor', '1103220037.jpg'),
('1103220150', 'Muhammad Akhtar Perwira', 'Jakarta', '2024-05-14', 'Laki-laki', 'Jakarta', '1103220150.jpg'),
('1103223027', 'Muhammad Iqbal Al-Amin', 'Bogor', '2024-05-02', 'Laki-laki', 'Bogor', '1103223027.jpg'),
('1103223097', 'Muhammad Aizar Yazid', 'Bekasi', '2024-05-11', 'Laki-laki', 'Bekasi', '1103223097.jpg'),
('1103223163', 'Chandra Aulia Haswangga', 'Wonosobo', '2018-06-20', 'Laki-laki', 'Wonosobo', '1103223163.jpg'),
('1103223211', 'Azmi Abdurrahman Kautsar', 'Bandung', '2024-05-04', 'Laki-laki', 'Bandung', '1103223211.jpg'),
('1103223227', 'Muhamad Ardiyansah', 'Jakarta', '2016-02-17', 'Laki-laki', 'Jakarta', '1103223227.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok_buku`
--

CREATE TABLE `tbl_stok_buku` (
  `isbn` varchar(50) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `tersedia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stok_buku`
--

INSERT INTO `tbl_stok_buku` (`isbn`, `jumlah_buku`, `tersedia`) VALUES
('9786239726263', 25, 24),
('9786020822341', 10, 9),
('9789792248616', 25, 24),
('SCOOPG200336', 10, 7),
('9789792747843', 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_peminjaman` int(11) DEFAULT NULL,
  `nisn` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `biaya` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_peminjaman`, `nisn`, `tanggal`, `biaya`, `keterangan`) VALUES
(7, 35, '1103220037', '2024-05-20', 12000, 'Keterlambatan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `kode` (`kode`),
  ADD KEY `kode_2` (`kode`),
  ADD KEY `isbn` (`isbn`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `tbl_stok_buku`
--
ALTER TABLE `tbl_stok_buku`
  ADD KEY `isbn` (`isbn`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD CONSTRAINT `tbl_peminjaman_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `tbl_buku` (`isbn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_peminjaman_ibfk_2` FOREIGN KEY (`kode`) REFERENCES `tbl_petugas` (`kode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_peminjaman_ibfk_3` FOREIGN KEY (`nisn`) REFERENCES `tbl_siswa` (`nisn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_stok_buku`
--
ALTER TABLE `tbl_stok_buku`
  ADD CONSTRAINT `tbl_stok_buku_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `tbl_buku` (`isbn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `tbl_peminjaman` (`id_peminjaman`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
