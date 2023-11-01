-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2023 at 07:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `IdAdmin` int NOT NULL,
  `NamaAdmin` varchar(25) NOT NULL,
  `NoTelp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `IdBarang` int NOT NULL,
  `NamaBarang` varchar(50) NOT NULL,
  `DeskripsiBarang` varchar(225) NOT NULL,
  `HargaSatuan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `IdDetailTransaksi` int NOT NULL,
  `IdTransaksi` int NOT NULL,
  `TglWaktu` datetime NOT NULL,
  `IdPembeli` int NOT NULL,
  `NoTelp` char(15) NOT NULL,
  `Alamat` varchar(150) NOT NULL,
  `IdBarang` int NOT NULL,
  `IdKategori` int NOT NULL,
  `HargaSatuan` int NOT NULL,
  `JumlahBarang` char(5) NOT NULL,
  `HargaTotal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoribarang`
--

CREATE TABLE `kategoribarang` (
  `IdKategori` int NOT NULL,
  `KategoriBarang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `onlineshop`
--

CREATE TABLE `onlineshop` (
  `NoToko` int NOT NULL,
  `NamaToko` varchar(10) NOT NULL,
  `WebsiteToko` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `IdPembeli` int NOT NULL,
  `NamaPembeli` varchar(25) NOT NULL,
  `Alamat` varchar(150) NOT NULL,
  `NoTelp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `IdTransaksi` int NOT NULL,
  `TglWaktu` datetime NOT NULL,
  `JumlahBarang` char(5) NOT NULL,
  `HargaTotal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IdAdmin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`IdBarang`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`IdDetailTransaksi`);

--
-- Indexes for table `kategoribarang`
--
ALTER TABLE `kategoribarang`
  ADD PRIMARY KEY (`IdKategori`);

--
-- Indexes for table `onlineshop`
--
ALTER TABLE `onlineshop`
  ADD PRIMARY KEY (`NoToko`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`IdPembeli`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`IdTransaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
