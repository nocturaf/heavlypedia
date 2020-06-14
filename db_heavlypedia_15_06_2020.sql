-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2020 at 01:41 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_heavlypedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `latitude` double NOT NULL,
  `longtitude` double NOT NULL,
  `gambar` varchar(50) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_admin`
--

INSERT INTO `akun_admin` (`id_admin`, `username`, `password`, `nama_admin`, `alamat`, `no_telp`, `email`, `latitude`, `longtitude`, `gambar`) VALUES
(6, 'rswahidin', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'RS Wahidin Sudirohusodo', 'Jl. Perintis Kemerdekaan KM 11 Kecamatan Makassar Kota Makassar, Sulawesi Selatan 90245, Tamalanrea Indah, Kec. Tamalanrea, Kota Makassar, Sulawesi Selatan 90245', '0411584677', 'rswahidin@noemail.com', -5.1348915, 119.4917125, 'default.png'),
(7, 'rsdayamakassar', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'RSUD Daya Makassar', 'Jl. Perintis Kemerdekaan No.KM.14, Daya, Kec. Biringkanaya, Kota Makassar, Sulawesi Selatan 90243', '0411525244', 'rsdaya@noemail.com', -5.1138767, 119.5087473, 'default.png'),
(8, 'rsunhasmakassar', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'RS Universitas Hasanuddin', 'Jl. Perintis Kemerdekaan No.KM 10, Tamalanrea Indah, Kec. Tamalanrea, Kota Makassar, Sulawesi Selatan 90245', '0411591331', 'rsunhas@noemail.com', -5.1204841, 119.4930482, 'default.png'),
(9, 'rsibnusina', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'RS Ibnu Sina', 'Jl. Urip Sumoharjo KM.5 No.264, Karampuang, Kec. Panakkukang, Kota Makassar, Sulawesi Selatan 90231', '0411452917', 'rsibnusina@noemail.com', -5.1396892, 119.4440453, 'default.png'),
(10, 'rsawalbros', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'RS Awal Bros', 'Jl. Urip Sumoharjo No.43, Karuwisi Utara, Kec. Panakkukang, Kota Makassar, Sulawesi Selatan 90232', '62411457456', 'rsawalbros@noemail.com', -5.134889, 119.432935, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `akun_pasien`
--

CREATE TABLE `akun_pasien` (
  `id_pasien` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gambar` varchar(50) NOT NULL DEFAULT 'default.png',
  `otp` int(5) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_pasien`
--

INSERT INTO `akun_pasien` (`id_pasien`, `username`, `password`, `nama_pasien`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `email`, `gambar`, `otp`) VALUES
(1, 'aaa', 'ed02457b5c41d964dbd2f2a609d63fe1bb7528dbe55e1abf5b52c249cd735797', 'Fikri Sabriansyah', 'Thursday 16 January 2020', 'Laki-laki', 'Tes alamat', '081123456789', 'briansabriansyah@gmail.com', 'default.png', NULL),
(2, 'bbb', 'bbbbbb', 'bbb', '2010-10-28', 'Perempuan', 'bbb', '111', 'bbb@gmail.com', 'default.png', NULL),
(3, 'ccc', 'cccccc', 'ccc', '2020-02-05', 'Perempuan', 'ccc', '000', 'ccc@gmail.com', 'default.png', NULL),
(4, 'ddd', 'dddddd', 'ddd', '14/03/1996', 'Laki-laki', 'ddd', '0123', 'ddd@gmail.com', 'default.png', NULL),
(5, 'eee', 'eeeeee', 'eee', 'Thursday 02 January 1977', 'Laki-laki', 'eee', '012', 'eee@gmail.com', 'default.png', NULL),
(6, 'testes1', '65ab74e238af04a5d2ed2f0197cc30237b87d2e2cf973224ffd93865df39cbe1', 'testes', 'Thursday 05 January 2020', 'Laki-laki', 'testes', '122', 'testes1@gmail.com', 'foto_pasien_id_6.jpg', NULL),
(30, 'nocturaf', '', 'Rafli Syam', '', '', '', '085156166752', 'nocturaf@gmail.com', '', 6452),
(31, 'isnanar', '0d25ffc72c115b6497a4e0e873bb01d6b737ca6e626a034aefd82bb9e6fd6dbf', 'Isnan', 'Thursday 31 January 2020', 'Laki-laki', 'BTN Aura', '081223816007', 'isnan@gmail.com', 'default.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `akun_superadmin`
--

CREATE TABLE `akun_superadmin` (
  `id_superadmin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_superadmin`
--

INSERT INTO `akun_superadmin` (`id_superadmin`, `username`, `password`) VALUES
(1, 'heavlypedia', '969d3c45cfeb018f0595d21e8cff81c9a2d77be8cb9fd1b0304babeca5e0230f');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` varchar(32) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `tgl_booking` varchar(50) NOT NULL,
  `jam_booking` time NOT NULL,
  `poli` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Menunggu Konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_admin`, `nama_dokter`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
(8, 6, 'dr. Ardimansah Nurdin', 'Monday 15 June 1998', 'Laki-laki', 'Makassar', '08123456789'),
(9, 6, 'dr. Fika Angelina Haliem', 'Wednesday 10 June 2020', 'Laki-laki', 'Makassar', '08123456789'),
(10, 6, 'dr. Illona Putri Pertiwi', 'Monday 15 June 2020', 'Perempuan', 'Makassar', '0812345678'),
(11, 6, 'dr. Yahaziel Yason Wijaya', 'Monday 15 June 2020', 'Laki-laki', 'Makassar', '08123456789'),
(12, 6, 'dr. Radian Pandhika', 'Monday 15 June 2020', 'Laki-laki', 'Makassar', '081234567');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id_jadwal` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `poli` varchar(100) NOT NULL,
  `hari_praktek` varchar(20) NOT NULL,
  `mulai_praktek` time NOT NULL,
  `selesai_praktek` time NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id_jadwal`, `id_dokter`, `id_admin`, `nama_dokter`, `poli`, `hari_praktek`, `mulai_praktek`, `selesai_praktek`, `kuota`) VALUES
(8, 8, 6, 'dr. Ardimansah Nurdin', 'Umum', 'Wednesday', '09:00:00', '14:00:00', 5),
(9, 9, 6, 'dr. Fika Angelina Haliem', 'Umum', 'Monday', '08:00:00', '12:00:00', 5),
(10, 10, 6, 'dr. Illona Putri Pertiwi', 'Umum', 'Monday', '09:00:00', '12:00:00', 3),
(11, 11, 6, 'dr. Yahaziel Yason Wijaya', 'Umum', 'Monday', '14:00:00', '17:00:00', 5),
(12, 12, 6, 'dr. Radian Pandhika', 'Umum', 'Monday', '10:00:00', '14:00:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`) VALUES
(3, 'Umum'),
(4, 'Anak'),
(5, 'THT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akun_pasien`
--
ALTER TABLE `akun_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `akun_superadmin`
--
ALTER TABLE `akun_superadmin`
  ADD PRIMARY KEY (`id_superadmin`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `akun_pasien`
--
ALTER TABLE `akun_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `akun_superadmin`
--
ALTER TABLE `akun_superadmin`
  MODIFY `id_superadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
