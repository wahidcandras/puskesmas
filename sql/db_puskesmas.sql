-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 09:41 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_puskesmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `syscode`
--

CREATE TABLE `syscode` (
  `idgroup` varchar(255) DEFAULT NULL,
  `idcode` varchar(255) DEFAULT NULL,
  `bpjs_code` varchar(255) DEFAULT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `use_yn` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sysgroup`
--

CREATE TABLE `sysgroup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sysgroup`
--

INSERT INTO `sysgroup` (`id`, `name`) VALUES
(1, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `syslog`
--

CREATE TABLE `syslog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `description` text,
  `result` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syslog`
--

INSERT INTO `syslog` (`id`, `user_id`, `action`, `description`, `result`) VALUES
(1, 0, 'Login', 'Login Successful', '1'),
(2, 0, 'Logout', 'Logout', '0'),
(3, 0, 'Login', 'Login Successful', '1'),
(4, 0, 'Logout', 'Logout', '0'),
(5, 0, 'Login', 'Login Invalid', '0'),
(6, 0, 'Login', 'Login Invalid', '0'),
(7, 0, 'Login', 'Login Invalid', '0'),
(8, 0, 'Login', 'Login Invalid', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sysmodule`
--

CREATE TABLE `sysmodule` (
  `program_id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sysregion`
--

CREATE TABLE `sysregion` (
  `id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sysrole`
--

CREATE TABLE `sysrole` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `program_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sysuser`
--

CREATE TABLE `sysuser` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_group` int(11) DEFAULT NULL,
  `user_hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sysuser`
--

INSERT INTO `sysuser` (`id`, `username`, `password`, `name`, `user_group`, `user_hospital`) VALUES
(1, 'administrator', '$2y$10$.1smmN9pcnKu7RPSA7lhpOda5.TlkafzUoQHSdES0Zvn7mthjWrVy', 'Administrator', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldiagnosa`
--

CREATE TABLE `tbldiagnosa` (
  `id` int(11) DEFAULT NULL,
  `diag_cd` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nonspesialis` int(11) DEFAULT NULL,
  `bpjsblock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblhospital`
--

CREATE TABLE `tblhospital` (
  `id` int(11) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `phone` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `jadwal` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblobat`
--

CREATE TABLE `tblobat` (
  `id` varchar(255) DEFAULT NULL,
  `bpjs_code` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `unit_cd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblobatclosing`
--

CREATE TABLE `tblobatclosing` (
  `id` int(11) DEFAULT NULL,
  `close_dt` varchar(255) DEFAULT NULL,
  `puskesmas_id` int(11) DEFAULT NULL,
  `obat_id` int(11) DEFAULT NULL,
  `stock_awal` decimal(10,0) DEFAULT NULL,
  `masuk` decimal(10,0) DEFAULT NULL,
  `keluar` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblobatmasuk`
--

CREATE TABLE `tblobatmasuk` (
  `id` int(11) DEFAULT NULL,
  `puskesmas_id` int(11) DEFAULT NULL,
  `dt` date DEFAULT NULL,
  `obat_id` varchar(255) DEFAULT NULL,
  `qty` decimal(10,0) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `ins_id` varchar(255) DEFAULT NULL,
  `ins_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpasien`
--

CREATE TABLE `tblpasien` (
  `id` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `bpjs_no` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `pasien_type` varchar(255) DEFAULT NULL,
  `blood_type` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `orchard_id` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `birth_dt` date DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `work` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpuskesmas`
--

CREATE TABLE `tblpuskesmas` (
  `id` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `notelp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblresep`
--

CREATE TABLE `tblresep` (
  `id` int(11) DEFAULT NULL,
  `visit_id` int(11) DEFAULT NULL,
  `obat_id` varchar(255) DEFAULT NULL,
  `qty` decimal(10,0) DEFAULT NULL,
  `dosis` varchar(255) DEFAULT NULL,
  `unit_cd` varchar(255) DEFAULT NULL,
  `ins_id` int(11) DEFAULT NULL,
  `ins_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbltindakan`
--

CREATE TABLE `tbltindakan` (
  `id` int(11) DEFAULT NULL,
  `group_id` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `js` decimal(10,0) DEFAULT NULL,
  `jp` decimal(10,0) DEFAULT NULL,
  `jb` decimal(10,0) DEFAULT NULL,
  `bpjs_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblvisits`
--

CREATE TABLE `tblvisits` (
  `id` int(11) DEFAULT NULL,
  `pasien_id` varchar(255) DEFAULT NULL,
  `visit_dt` date DEFAULT NULL,
  `visit_type` varchar(255) DEFAULT NULL,
  `inap_yn` varchar(255) DEFAULT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `kunj_sakit` int(11) DEFAULT NULL,
  `puskesmas_id` int(11) DEFAULT NULL,
  `poli_cd` varchar(255) DEFAULT NULL,
  `bpjs_kunj` varchar(255) DEFAULT NULL,
  `bpjs_no` varchar(255) DEFAULT NULL,
  `keluhan` text,
  `sadar_cd` varchar(255) DEFAULT NULL,
  `sistole` decimal(10,0) DEFAULT NULL,
  `diastole` decimal(10,0) DEFAULT NULL,
  `bb` decimal(10,0) DEFAULT NULL,
  `tb` decimal(10,0) DEFAULT NULL,
  `resprate` decimal(10,0) DEFAULT NULL,
  `heartrate` decimal(10,0) DEFAULT NULL,
  `rujukan_provider` varchar(255) DEFAULT NULL,
  `pulang_cd` varchar(255) DEFAULT NULL,
  `pulang_dt` date DEFAULT NULL,
  `dokter_cd` varchar(255) DEFAULT NULL,
  `diag_1` varchar(255) DEFAULT NULL,
  `diag_2` varchar(255) DEFAULT NULL,
  `diag_3` varchar(255) DEFAULT NULL,
  `action_id` varchar(255) DEFAULT NULL,
  `rujukan_poli` varchar(255) DEFAULT NULL,
  `rujuk_lanjut` varchar(255) DEFAULT NULL,
  `ins_id` int(11) DEFAULT NULL,
  `ins_dt` datetime DEFAULT NULL,
  `del_yn` varchar(255) DEFAULT NULL,
  `del_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblvisits_log`
--

CREATE TABLE `tblvisits_log` (
  `id` int(11) DEFAULT NULL,
  `log_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `step` int(11) DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sysgroup`
--
ALTER TABLE `sysgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syslog`
--
ALTER TABLE `syslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sysmodule`
--
ALTER TABLE `sysmodule`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `sysrole`
--
ALTER TABLE `sysrole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sysuser`
--
ALTER TABLE `sysuser`
  ADD PRIMARY KEY (`id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `syslog`
--
ALTER TABLE `syslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sysuser`
--
ALTER TABLE `sysuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
