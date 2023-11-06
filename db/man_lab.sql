-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 02:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `man_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` smallint(4) NOT NULL,
  `id_pendanaan` smallint(4) NOT NULL,
  `id_ruangan` tinyint(4) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spek_barang` text NOT NULL,
  `gambar_barang` varchar(255) NOT NULL,
  `tahun_barang` year(4) NOT NULL,
  `kategori_barang` enum('Media','Alat','Perangkat','Furnitur') NOT NULL,
  `sub_kategori` enum('Cutter','Krimping','Set_Obeng','Toolbox','Air_Conditioner','Jam_Dinding','Kursi','Lemari','Loker','Meja','Rak','GPS_Mobile','Layar_Proyektor','Livecam','Papan_Tulis','Proyektor','Access_Point','Antena','Camera_CCTV','Camera_Eksternal','CPU','Hardisk','Kabel','Keyboard','Komputer','LAN_Card','LAN_Tester','Monitor','Modem','Mouse','Poe_Adapter','RAM','Router','Server','Speaker','Switch','UPS','USB_Adapter','USB_Wireless','Wireless_Card') NOT NULL,
  `kondisi` enum('Baik','Rusak','Hilang','Musnah','Tak_Layak_Pakai') NOT NULL,
  `tgl_masuk_barang` date NOT NULL,
  `waktu_input` time NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `user_input` varchar(100) NOT NULL,
  `user_edit` varchar(100) NOT NULL,
  `tgl_edit` date DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_pendanaan`, `id_ruangan`, `nama_barang`, `spek_barang`, `gambar_barang`, `tahun_barang`, `kategori_barang`, `sub_kategori`, `kondisi`, `tgl_masuk_barang`, `waktu_input`, `deskripsi`, `user_input`, `user_edit`, `tgl_edit`, `status`) VALUES
(3, 1, 1, 'Lenovo 2019-1.KOM.HZ1', 'Intel ® CoreTM i5-7400T, 2.4GHz, RAM 8 GB, HDD 1 TB, All-in-one', '1695374094Komp 1 RSI.jpeg', 2019, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:14:00', 'Komputer All-in-one (Monitor Lenovo, CPU Lenovo, Mouse Lenovo, Keyboard Lenovo)', 'Indah Nirwana', 'Hafiz Aryan Siregar', '2023-11-03', ''),
(4, 1, 1, 'Lenovo 2019-1.KOM.JC9', 'Intel ® CoreTM i5-7400T, 2.4GHz, RAM 8 GB, HDD 1 TB, All-in-one', '1694594297Komp 2 RSI.jpeg', 2019, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:14:00', 'Komputer All-in-one (Monitor Lenovo, CPU Lenovo, Mouse Logitech, Keyboard IBM)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(5, 1, 1, 'Lenovo 2019-1.KOM.UK4', 'Intel ® CoreTM i5-7400T, 2.4GHz, RAM 8 GB, HDD 1 TB, All-in-one', '1694594352Komp 3 RSI.jpeg', 2019, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:15:00', 'Komputer All-in-one (Monitor Lenovo, CPU Lenovo, Mouse Lenovo, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(6, 1, 1, 'Lenovo 2019-1.KOM.DI6', 'Intel ® CoreTM i5-7400T, 2.4GHz, RAM 8 GB, HDD 1 TB, All-in-one', '1694594678Komp 4 RSI.jpeg', 2019, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:16:00', 'Komputer All-in-one (Monitor Lenovo, CPU Lenovo, Mouse Genius, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(7, 1, 1, 'Lenovo 2019-1.KOM.DJ0', 'Intel ® CoreTM i5-7400T, 2.4GHz, RAM 8 GB, HDD 1 TB, All-in-one', '1694594713Komp 5 RSI.jpeg', 2019, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:16:00', 'Komputer All-in-one (Monitor Lenovo, CPU Lenovo, Mouse Genius, Keyboard Eyota)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(8, 1, 1, 'Lenovo  2019-1.KOM.ZE2', 'Intel ® CoreTM i5-7400T, 2.4GHz, RAM 8 GB, HDD 1 TB, All-in-one', '1694594772Komp 6 RSI.jpeg', 2019, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:19:00', 'Komputer All-in-one (Monitor Lenovo, CPU Lenovo, Mouse Logitech, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(9, 1, 1, 'Lenovo  2019-1.KOM.JV8', 'Intel ® CoreTM i5-7400T, 2.4GHz, RAM 8 GB, HDD 1 TB, All-in-one', '1694594815Komp 7 RSI.jpeg', 2019, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:20:00', 'Komputer All-in-one (Monitor Lenovo, CPU Lenovo, Mouse Logitech, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(10, 1, 1, 'Lenovo  2019-1.KOM.SL9', 'Intel ® CoreTM i5-7400T, 2.4GHz, RAM 8 GB, HDD 1 TB, All-in-one', '1694594846Komp 8 RSI.jpeg', 2019, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:21:00', 'Komputer All-in-one (Monitor Lenovo, CPU Lenovo, Mouse Acer, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(11, 1, 1, 'Lenovo  2019-1.KOM.LX1', 'Intel ® CoreTM i5-7400T, 2.4GHz, RAM 8 GB, HDD 1 TB, All-in-one', '1695374387Komp 9 RSI.jpeg', 2019, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:21:00', 'Monitor Lenovo, CPU Lenovo, Mouse Acer, Keyboard Eyota', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(12, 1, 1, 'Lenovo  2015-1.KOM.NC7', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1694595199Komp 9 RSI.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:23:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Acer, Keyboard Eyota)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(13, 1, 1, 'Lenovo  2015-1.KOM.FG8', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1694595255Komp 10 RSI.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:25:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Lenovo, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(14, 1, 1, 'Lenovo  2015-1.KOM.UP3', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1694595307Komp 11 RSI.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:32:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Lenovo, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(15, 1, 1, 'Lenovo  2015-1.KOM.JY1', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1694595350Komp 12 RSI.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:33:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Lenovo, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(16, 1, 1, 'Lenovo  2015-1.KOM.IY5', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1694595400Komp 13 RSI.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:35:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Lenovo, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(17, 1, 1, 'Lenovo  2015-1.KOM.MC1', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1694595441Komp 14 RSI.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:35:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Lenovo, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(18, 1, 1, 'Lenovo  2015-1.KOM.EL6', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1694595481Komp 15 RSI.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:37:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Acer, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(19, 1, 1, 'Lenovo  2015-1.KOM.AW9', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1694595527Komp 16 RSI.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:39:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Lenovo, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(20, 1, 1, 'Lenovo  2015-1.KOM.OJ3', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1694595675Komp 17 RSI.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:39:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Genius, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(21, 1, 1, 'Lenovo  2015-1.KOM.LY1', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1694595729Komp 18 RSI.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:40:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Eyota, Keyboard Eyota)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(22, 1, 1, 'Lenovo  2015-1.KOM.KQ3', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1694595773Komp 19 RSI.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:49:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Lenovo, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(23, 1, 1, 'Lenovo  2015-1.KOM.EN2', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1694595814Komp 20 RSI.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:50:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Genius, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(24, 1, 1, 'Lenovo  2015-1.KOM.SD4', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1694595877Komp 21 RSI.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-08', '15:50:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Lenovo, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(30, 1, 3, 'Lenovo  2021-1.KOM.BT5', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695026430All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:18:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(31, 1, 3, 'Lenovo  2021-1.KOM.PY4', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695026614All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:21:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(32, 1, 3, 'Lenovo  2021-1.KOM.JU1', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695026640All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:22:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(33, 1, 3, 'Lenovo  2021-1.KOM.GP7', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695026673All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:23:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(34, 1, 3, 'Lenovo  2021-1.KOM.QW1', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695026707All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:23:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(35, 1, 3, 'Lenovo  2021-1.KOM.LL2', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695026737All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:23:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(36, 1, 3, 'Lenovo  2021-1.KOM.RF4', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695026785All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:24:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(37, 1, 3, 'Lenovo  2021-1.KOM.AR4', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695026854All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:24:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(38, 1, 3, 'Lenovo  2021-1.KOM.BW7', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695026903All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:25:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(39, 1, 3, 'Lenovo  2021-1.KOM.WU9', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695026939All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:25:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(40, 1, 3, 'Lenovo 2021-1.KOM.VS1', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695026969All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:27:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(41, 1, 3, 'Lenovo 2021-1.KOM.XB4', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695027016All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:29:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(42, 1, 3, 'Lenovo 2021-1.KOM.SO2', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695027183All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:30:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(43, 1, 3, 'Lenovo 2021-1.KOM.NU0', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695027231All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:31:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(44, 1, 3, 'Lenovo 2021-1.KOM.AQ2', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695027268All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:32:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(45, 1, 3, 'Lenovo 2021-1.KOM.EN3', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695027306All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:33:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(46, 1, 3, 'Lenovo 2021-1.KOM.CU8', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695027377All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:33:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(47, 1, 3, 'Lenovo 2021-1.KOM.ON0', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695027443All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:33:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(48, 1, 3, 'Lenovo 2021-1.KOM.AM1', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695027495All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-08-09', '16:34:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(51, 1, 1, 'Lenovo 2021-1.KOM.UJ6', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '1695027693All-in-one SE.jpeg', 2021, 'Perangkat', 'Komputer', 'Rusak', '2023-08-09', '16:36:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(52, 1, 2, 'Acer 2015-1.KOM.IO3', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i5, HDD 1 TB, RAM 8 GB', '1694677386Komp 1INT.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:38:00', 'Monitor Acer, Mouse Wearnes, Keyboard Acer, CPU Lenovo', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(53, 1, 2, 'Lenovo 2015-1.KOM.MF1', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i5, HDD 1 TB, RAM 8 GB', '1694677430Komp 2 INT (2).jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:41:00', 'Monitor Acer, Mouse Wearnes, Keyboard Acer, CPU Lenovo', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(54, 1, 2, 'Lenovo 2015-1.KOM.CP2', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i5, HDD 1 TB, RAM 8 GB', '1694677575Komp 3 INT (2).jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:41:00', 'Monitor Acer, Mouse Genius, Keyboard Acer, CPU Lenovo', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(55, 1, 2, 'Lenovo 2015-1.KOM.WT1', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i5, HDD 1 TB, RAM 8 GB', '1694677640Komp 4 INT (2).jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:42:00', 'Monitor Acer, Mouse Genius, Keyboard Genius, CPU Lenovo', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(56, 1, 2, 'Lenovo 2015-1.KOM.FD1', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i5, HDD 1 TB, RAM 8 GB', '1694678070Komp 5 INT (2).jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:43:00', 'Monitor Acer, Mouse Wearnes, Keyboard Acer, CPU Lenovo', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(57, 1, 2, 'Lenovo 2015-1.KOM.PF6', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i5, HDD 1 TB, RAM 8 GB', '1694678143Komp 6 INT (2).jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:43:00', 'Monitor Acer, Mouse Unique, Keyboard Lenovo, CPU Lenovo', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(58, 1, 2, 'Lenovo 2015-1.KOM.DM6', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i5, HDD 1 TB, RAM 8 GB', '1694678219Komp 7 INT.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:44:00', 'Monitor Acer, Mouse Acer, Keyboard Acer, CPU Lenovo', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(59, 1, 2, 'Lenovo 2015-1.KOM.KU8', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i5, HDD 1 TB, RAM 8 GB', '1694678442Komp 8 INT.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:44:00', 'Monitor Acer, Mouse Unique, Keyboard Lenovo, CPU Lenovo', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(60, 1, 2, 'Lenovo 2015-1.KOM.FN4', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i5, HDD 1 TB, RAM 8 GB', '1694678551KOMP 9 INT.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:44:00', 'Monitor Acer, Mouse Wearnes, Keyboard Lenovo, CPU Lenovo', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(61, 1, 2, 'Lenovo 2015-1.KOM.AS7', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i5, HDD 1 TB, RAM 8 GB', '1694678716Komp 10 INT.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:45:00', 'Monitor Acer, Mouse Wearnes, Keyboard Lenovo, CPU Lenovo', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(62, 1, 2, 'Lenovo 2015-1.KOM.UU8', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB ', '1694678918Komp 11 INT.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:45:00', 'Monitor Acer, Mouse Wearnes, Keyboard Lenovo, CPU Lenovo', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(63, 1, 2, 'Lenovo 2015-1.KOM.LZ8', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB ', '1694679174Komp 12 INT.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:46:00', 'Monitor Acer, Mouse Lenovo, Keyboard Acer, CPU Lenovo', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(64, 1, 2, 'Acer 2012-1.KOM.RC4', 'Monitor Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB  OS Debian/Mubaarik; CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB ', '1695367883Komp 13 INT.jpeg', 2012, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:47:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(65, 1, 2, 'Acer 2012-1.KOM.SR8', 'Monitor Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB  OS Debian/Mubaarik; CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB ', '1695367953Komp 14 INT.jpeg', 2012, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:49:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(66, 1, 2, 'Acer 2012-1.KOM.TK2', 'Monitor Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB  OS Debian/Mubaarik; CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB', '1695367995Komp 15 INT.jpeg', 2012, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:49:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(67, 1, 2, 'Acer 2012-1.KOM.DR4', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB', '1695368045Komp 16 INT.jpeg', 2012, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:50:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(68, 1, 2, 'Acer 2012-1.KOM.RI4', 'Monitor Acer P166HQL Display 39.62 cm (15.6 inch) LED Backlit Display, LED Backlit, TN Panel, 1366 x 768 pixels Screen Resolution Type, HD; CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB', '1695368090Komp 17 INT.jpeg', 2012, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:50:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(69, 1, 2, 'Acer 2012-1.KOM.UZ6', 'Monitor Lenovo Lenovo ThinkVision E1922S 18.5-inch LED Backlit LCD Monitor, Maximum Brightness : 200cd/m2 Minimum Brightness : 160cd/m2, EPEAT Gold,Energy Star 6.0 ,China RoHS, LED Backlit, HD LED; CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB', '1695368142Komp 18 INT.jpeg', 2012, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:51:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(70, 1, 2, 'Acer 2012-1.KOM.NR8', 'Monitor Lenovo ThinkVision E2054A 19.5\" WXGA+ LCD Wide Flat Panel Monitor 250nits, LED Backlit, 60DFAAR1WW; CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB', '1695368198Komp 19 INT.jpeg', 2012, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:52:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(71, 1, 2, 'Acer 2012-1.KOM.WQ0', 'Monitor Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB  OS Debian/Mubaarik; CPU Processor Intel Core i5, HDD 1 TB, RAM 8 GB', '1695368239Komp 20 INT.jpeg', 2012, 'Perangkat', 'Komputer', 'Baik', '2023-08-10', '09:52:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(85, 4, 3, 'Meja Komputer 2021-4.MEJ.BB5', '-', '1693200551Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-24', '00:00:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(89, 4, 3, 'Meja Komputer 2021-4.MEJ.FQ6', '-', '1693200520Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:17:00', '-', 'Indah Nirwana', 'Sitaris Developer', '2023-08-28', ''),
(90, 4, 3, 'Meja Komputer 2021-4.MEJ.TF1', '-', '1693200610Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:29:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(91, 4, 3, 'Meja Komputer 2021-4.MEJ.CM1', '-', '1693200660Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:30:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(92, 4, 3, 'Meja Komputer 2021-4.MEJ.RC9', '-', '1693200709Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:31:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(93, 4, 3, 'Meja Komputer 2021-4.MEJ.NV9', '-', '1693200777Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:32:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(94, 4, 3, 'Meja Komputer 2021-4.MEJ.MJ0', '-', '1693200807Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:33:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(95, 4, 3, 'Meja Komputer 2021-4.MEJ.BN5', '-', '1693200839Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:33:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(96, 4, 3, 'Meja Komputer 2021-4.MEJ.CP3', '-', '1693200880Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:34:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(97, 4, 3, 'Meja Komputer 2021-4.MEJ.ZL7', '-', '1693200913Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:34:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(98, 4, 3, 'Meja Komputer 2021-4.MEJ.TS9', '-', '1693200943Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:35:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(99, 4, 3, 'Meja Komputer 2021-4.MEJ.NA6', '-', '1693200995Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:35:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(100, 4, 3, 'Meja Komputer 2021-4.MEJ.BX2', '-', '1693201022Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:36:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(101, 4, 3, 'Meja Komputer 2021-4.MEJ.OW4', '-', '1693201050Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:37:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(102, 4, 3, 'Meja Komputer 2021-4.MEJ.XU5', '-', '1693201091Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:37:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(103, 4, 3, 'Meja Komputer 2021-4.MEJ.LO3', '-', '1693201221Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:39:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(104, 4, 3, 'Meja Komputer 2021-4.MEJ.QV5', '-', '1693201322Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:41:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(105, 4, 3, 'Meja Komputer 2021-4.MEJ.TU6', '-', '1693201369Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:42:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(106, 4, 3, 'Meja Komputer 2021-4.MEJ.BF6', '-', '1693201406Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:42:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(107, 4, 3, 'Meja Komputer 2021-4.MEJ.HS7', '-', '1693201509Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:43:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(108, 4, 3, 'Meja Komputer 2021-4.MEJ.NA0', '-', '1693201620Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:46:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(109, 4, 3, 'Meja Komputer 2021-4.MEJ.AL9', '-', '1693201659Meja Komputer.jpeg', 2021, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '12:47:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(110, 4, 3, 'Meja Dosen 2008-4.MEJ.TP4', '-', '1693205839Meja Dosen.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-08-28', '13:49:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(112, 4, 3, 'Switch 2021-4.SWI.PQ5', '48-Port 10/100, 2 Dual-Port SFP (3C-BLSF50H)', '1693208774Switch HP Lab Se.jpeg', 2021, 'Perangkat', 'Switch', 'Baik', '2023-08-28', '14:44:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(113, 4, 3, 'Layar Proyektor 2023-4.LAY.AJ4', '-', '1693208998Layar Proyektor.jpeg', 2023, 'Media', 'Layar_Proyektor', 'Baik', '2023-08-28', '14:48:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(114, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.GJ7', '-', '1693209116Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-28', '14:51:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(116, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.NR7', '-', '1693209996Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-28', '15:05:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(117, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.LA2', '-', '1693210051Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-28', '15:06:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(118, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.SO6', '-', '1693210091Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-28', '15:07:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(119, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.RK8', '-', '1693210128Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-28', '15:08:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-28', ''),
(120, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.XP5', '-', '1693282742Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:17:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(121, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.YR7', '-', '1693282935Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:21:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(122, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.MN5', '-', '1693283013Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:22:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(123, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.JZ6', '-', '1693283069Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:23:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(124, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.VC6', '-', '1693283109Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:24:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(125, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.EW7', '-', '1693283178Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:25:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(126, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.GR4', '-', '1693283304Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:27:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(127, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.KY2', '-', '1693283357Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:28:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(128, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.VM8', '-', '1693283505Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:30:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(129, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.NU4', '-', '1693283554Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:31:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(130, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.FQ7', '-', '1693283699Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:33:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(131, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.KG0', '-', '1693283736Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:35:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(132, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.AZ3', '-', '1693283836Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:36:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(133, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.CA5', '-', '1693284095Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:39:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(134, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.YC8', '-', '1693284133Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:41:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(135, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.JL5', '-', '1693284186Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:42:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(136, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.TS3', '-', '1693284227Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:43:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(137, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.GD7', '-', '1693284376Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:44:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(138, 4, 3, 'Kursi Mahasiswa 2021-4.KUR.MC2', '-', '1693284410Kursi Mahasiswa.jpeg', 2021, 'Furnitur', 'Kursi', 'Baik', '2023-08-29', '11:46:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(139, 4, 3, 'Papan Tulis 2008-4.PAP.GI6', '-', '1693285036Papan Tulis.jpeg', 2008, 'Media', 'Papan_Tulis', 'Baik', '2023-08-29', '11:56:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-03', ''),
(140, 4, 3, 'Lemari Kaca 2008-4.LEM.DT3', '-', '1693285121Lemari.jpeg', 2008, 'Furnitur', 'Lemari', 'Baik', '2023-08-29', '11:57:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(141, 4, 3, 'Sharp 2021-4.AIR.XV4', 'Sharp J-Tech inverter', '1693286393AC.jpeg', 2021, 'Furnitur', 'Air_Conditioner', 'Baik', '2023-08-29', '12:18:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(142, 4, 3, 'Sharp 2021-4.AIR.WV3', 'Sharp J-Tech Inverter', '1693286454AC.jpeg', 2021, 'Furnitur', 'Air_Conditioner', 'Baik', '2023-08-29', '12:20:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-29', ''),
(143, 4, 3, 'Sharp 2021-4.AIR.PF5', 'Sharp J-Tech Inverter', '1693286519AC.jpeg', 2021, 'Furnitur', 'Air_Conditioner', 'Baik', '2023-08-29', '12:20:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(144, 4, 3, 'Kursi Dosen 2021-4.KUR.YB8', '-', '1693294186Kursi Dosen.jpeg', 2021, 'Furnitur', 'Kursi', 'Rusak', '2023-08-29', '14:29:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(145, 1, 2, 'Daikin 2019-1.AIR.EW1', 'Daikin FTV50CXV14  Split 2PK Standard', '1693456196AC.jpeg', 2019, 'Furnitur', 'Air_Conditioner', 'Baik', '2023-08-29', '16:02:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(146, 1, 2, 'Daikin 2019-1.AIR.ZS2', 'Daikin FTV50CXV14  Split 2PK Standard', '1693455997AC 2.jpeg', 2019, 'Furnitur', 'Air_Conditioner', 'Baik', '2023-08-29', '16:04:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(148, 4, 2, 'Meja Dosen 2006-4.MEJ.VJ2', '-', '1693457099Meja dosen.jpeg', 2006, 'Furnitur', 'Meja', 'Baik', '2023-08-31', '11:34:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(150, 4, 2, 'Meja Kunjungan 2012-4.MEJ.SV7', '-', '1693457160Meja kunjungan.jpeg', 2012, 'Furnitur', 'Meja', 'Baik', '2023-08-31', '11:45:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(151, 4, 2, 'Meja Laci 2006-4.MEJ.KO1', '-', '1693457353Meja simpanan.jpeg', 2006, 'Furnitur', 'Meja', 'Baik', '2023-08-31', '11:46:00', '1 laci tarek rusak, laci engsel rusak.', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(152, 4, 2, 'Meja Kayu Kuning 2003-4.MEJ.XD6', '-', '1693457594Meja kayu kuning.jpeg', 2003, 'Furnitur', 'Meja', 'Baik', '2023-08-31', '11:51:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(154, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.CV0', '-', '1693458041Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '11:59:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(157, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.HQ3', '-', '1693458376Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:05:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(158, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.GK6', '-', '1693458481Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:07:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(159, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.GF4', '-', '1693458837Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:12:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(160, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.TX0', '-', '1693458883Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:14:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(161, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.SS2', '-', '1693458941Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:14:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(163, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.QV9', '-', '1693459009Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:15:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(165, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.PU6', '-', '1693459072Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:16:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(167, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.ZQ7', '-', '1693459152Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:18:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(168, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.AH0', '-', '1693459197Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:19:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(169, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.PN3', '-', '1693459247Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:20:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(170, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.HQ4', '-', '1693459302Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:21:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(171, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.XK8', '-', '1693459379Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:22:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(174, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.RX9', '-', '1693459855Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:29:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(175, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.PR4', '-', '1693459952Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '12:31:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(178, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.UZ4', '-', '1693463482Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '13:30:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(179, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.CR3', '-', '1693463518Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '13:31:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(180, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.EN1', '-', '1693463568Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '13:32:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(181, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.IT5', '-', '1693463626Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '13:33:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(182, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.NU6', '-', '1693463940Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '13:38:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(183, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.AV3', '-', '1693464000Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '13:39:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(184, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.GM6', '-', '1693464037Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '13:40:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(185, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.CO1', '-', '1693464242Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '13:41:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(186, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.FL0', '-', '1693464279Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '13:44:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(187, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.MU1', '-', '1693464314Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '13:44:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(188, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.SH1', '-', '1693464649Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '13:50:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(189, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.DG8', '-', '1693464776Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '13:52:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(190, 4, 2, 'Kursi Mahasiswa 2008-4.KUR.DK3', '-', '1693464847Kursi mahasiswa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '13:53:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(191, 4, 2, 'Kursi Dosen 2006-4.KUR.BI9', '-', '1693475180Kursi dosen.jpeg', 2006, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '16:45:00', 'Rodanya macet.', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(192, 4, 2, 'Kursi Profesor 2006-4.KUR.RT0', '-', '1693475247Kursi Prof.jpeg', 2006, 'Furnitur', 'Kursi', 'Baik', '2023-08-31', '16:46:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(193, 4, 2, 'Layar Proyektor 2008-4.LAY.FG0', '', '1693475390Layar Proyektor.jpeg', 2008, 'Media', 'Layar_Proyektor', 'Baik', '2023-08-31', '16:48:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(194, 4, 2, 'Proyektor Toshiba 2008-4.PRO.VA7', 'Proyektor Toshiba TLP-X3000. 3000 Lumens, XGA (1024x768), Contrast 400:1', '1693475921Proyektor.jpeg', 2008, 'Media', 'Proyektor', 'Baik', '2023-08-31', '16:57:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(195, 4, 2, 'Papan Tulis 2008-4.PAP.UF2', '', '1693475992Papan tulis.jpeg', 2008, 'Media', 'Papan_Tulis', 'Baik', '2023-08-31', '16:59:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(196, 4, 2, 'Rak Barang 2011-4.RAK.FU7', '-', '1693798319Rak Barang2.jpeg', 2011, 'Furnitur', 'Rak', 'Baik', '2023-08-31', '17:03:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(197, 4, 2, 'Lemari Panjang 2008-4.LEM.UM1', '-', '1693476515Lemari.jpeg', 2008, 'Furnitur', 'Lemari', 'Baik', '2023-08-31', '17:07:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(198, 4, 2, 'Switch 3Com 2008-4.SWI.AH0', 'Manageable 3Com Baseline Switch 2226-SFP Plus. Port 1-24n10/100M, Port 25 & 26 1', '1693476597Switch 3Com.jpeg', 2008, 'Perangkat', 'Switch', 'Baik', '2023-08-31', '17:08:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(199, 4, 2, 'Rak Gantung Server 2008-4.RAK.VL2', '-', '1693476774Rak gantung server.jpeg', 2008, 'Furnitur', 'Rak', 'Baik', '2023-08-31', '17:10:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(200, 4, 2, 'Meja Komputer 2009-4.MEJ.IJ0', '-', '1693479029Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-08-31', '17:49:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(201, 4, 2, 'Meja Komputer 2009-4.MEJ.ON3', '-', '1693479082Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-08-31', '17:50:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-08-31', ''),
(202, 4, 2, 'Meja Komputer 2009-4.MEJ.ZZ4', '-', '1693798696Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-08-31', '17:51:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(203, 4, 2, 'Meja Komputer 2009-4.MEJ.AO5', '-', '1693537311Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:00:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(204, 4, 2, 'Meja Komputer 2009-4.MEJ.CE7', '-', '1693537853Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:10:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(205, 4, 2, 'Meja Komputer 2009-4.MEJ.OI8', '-', '1693537924Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:11:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(206, 4, 2, 'Meja Komputer 2009-4.MEJ.AY9', '-', '1693537962Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:12:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(207, 4, 2, 'Meja Komputer 2009-4.MEJ.AU8', '-', '1693538004Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:12:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(208, 4, 2, 'Meja Komputer 2009-4.MEJ.JX6', '-', '1693538042Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:13:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(209, 4, 2, 'Meja Komputer 2009-4.MEJ.KE3', '-', '1693538084Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:14:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(210, 4, 2, 'Meja Komputer 2009-4.MEJ.YG9', '-', '1693538123Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:14:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(211, 4, 2, 'Meja Komputer 2009-4.MEJ.MM9', '-', '1693538159Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:15:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(212, 4, 2, 'Meja Komputer 2009-4.MEJ.VZ2', '-', '1693538204Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:16:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(213, 4, 2, 'Meja Komputer 2009-4.MEJ.AA4', '-', '1693538239Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:16:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(214, 4, 2, 'Meja Komputer 2009-4.MEJ.UB8', '-', '1693538278Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:17:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(215, 4, 2, 'Meja Komputer 2009-4.MEJ.EF0', '-', '1693538325Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:18:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(216, 4, 2, 'Meja Komputer 2009-4.MEJ.LR4', '-', '1693538362Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:18:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(217, 4, 2, 'Meja Komputer 2009-4.MEJ.IZ5', '-', '1693538406Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:19:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(218, 4, 2, 'Meja Komputer 2009-4.MEJ.PP3', '-', '1693538448Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:20:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(219, 4, 2, 'Meja Komputer 2009-4.MEJ.EQ3', '-', '1693538484Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:20:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(220, 4, 2, 'Meja Komputer 2009-4.MEJ.XE1', '-', '1693538528Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:21:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(221, 4, 2, 'Meja Komputer 2009-4.MEJ.SC8', '-', '1693538588Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:22:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(222, 4, 2, 'Meja Komputer 2009-4.MEJ.UX8', '-', '1693538637Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:23:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(223, 4, 2, 'Meja Komputer 2009-4.MEJ.AC8', '-', '1693538678Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:24:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(224, 4, 2, 'Meja Komputer 2009-4.MEJ.KB4', '-', '1693538715Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:24:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(225, 4, 2, 'Meja Komputer 2009-4.MEJ.HJ8', '-', '1693538752Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:25:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(226, 4, 2, 'Meja Komputer 2009-4.MEJ.HA4', '-', '1693538796Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:25:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(227, 4, 2, 'Meja Komputer 2009-4.MEJ.CZ2', '-', '1693538833Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:26:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(228, 4, 2, 'Meja Komputer 2009-4.MEJ.ZV7', '-', '1693538871Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:27:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(229, 4, 2, 'Meja Komputer 2009-4.MEJ.NE6', '-', '1693539016Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:27:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-01', ''),
(230, 4, 2, 'Meja Komputer 2009-4.MEJ.ZN7', '-', '1693539050Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:30:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-03', ''),
(231, 4, 2, 'Meja Komputer 2009-4.MEJ.ZE0', '-', '1693539099Meja Komputer.jpeg', 2009, 'Furnitur', 'Meja', 'Baik', '2023-09-01', '10:30:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-03', ''),
(232, 4, 2, 'Switch 3Com 2008-4.SWI.RC1', 'Manageable 3Com Baseline Switch 2226-SFP Plus. Port 1-24n10/100M, Port 25 & 26 1', '1693629420Switch 3Com.jpeg', 2008, 'Perangkat', 'Switch', 'Baik', '2023-09-01', '10:35:00', '-', 'Indah Nirwana', 'Sitaris Developer', '2023-09-02', ''),
(240, 4, 2, 'Kursi Merah 2004-4.KUR.FL6', '-', '6ffc.jpeg', 2004, 'Furnitur', 'Kursi', 'Tak_Layak_Pakai', '2023-09-03', '14:20:00', 'Sudah patah tapi diikat menggunakan plastik', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(244, 4, 1, 'Polytron 2023-4.AIR.QC3', 'Ac Polytron Deluxe Turbo 1/2 PK 390 Watt PAC 05VH ', '3fed.jpeg', 2023, 'Furnitur', 'Air_Conditioner', 'Baik', '2023-09-04', '13:52:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-19', ''),
(245, 4, 1, 'Polytron 2023-4.AIR.EU9', 'Ac Polytron Deluxe Turbo 1/2 PK 390 Watt PAC 05VH', '64f5.jpeg', 2023, 'Furnitur', 'Air_Conditioner', 'Baik', '2023-09-04', '13:54:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(247, 1, 1, 'Panasonic 2010-1.AIR.BE2', '-', '6956.jpeg', 2010, 'Furnitur', 'Air_Conditioner', 'Rusak', '2023-09-04', '13:57:00', 'Ada komponen hilang', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(248, 1, 1, 'Panasonic 2010-1.AIR.LB5', '-', '798b.jpeg', 2010, 'Furnitur', 'Air_Conditioner', 'Baik', '2023-09-04', '13:58:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(249, 4, 1, 'Meja Dosen 2008-4.MEJ.AS2', '-', 'bd0e.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-04', '13:59:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(252, 4, 1, 'Kursi Dosen 2008-4.KUR.YD8', '-', '102c.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '14:03:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(253, 4, 1, 'Layar Proyektor 2008-4.LAY.CK9', '-', '3eab.jpeg', 2008, 'Media', 'Layar_Proyektor', 'Baik', '2023-09-04', '14:03:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(254, 4, 1, 'Papan Tulis 2008-4.PAP.XV8', '-', 'f3d2.jpeg', 2008, 'Media', 'Papan_Tulis', 'Baik', '2023-09-04', '14:05:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(255, 1, 1, 'Stell Land 2011-1.LOK.EX6', '-', 'b5ed.jpeg', 2011, 'Furnitur', 'Loker', 'Baik', '2023-09-04', '14:28:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(256, 1, 1, 'Stell Land 2011-1.LOK.ZZ0', '-', 'abe7.jpeg', 2011, 'Furnitur', 'Loker', 'Baik', '2023-09-04', '14:31:00', 'Kunci hilang', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(257, 1, 1, 'Stell Land 2011-1.LOK.SB8', '-', '156c.jpeg', 2011, 'Furnitur', 'Loker', 'Baik', '2023-09-04', '14:32:00', 'Kunci hilang', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(258, 1, 1, 'Stell Land 2011-1.LOK.DC6', '-', '0cb4.jpeg', 2011, 'Furnitur', 'Loker', 'Baik', '2023-09-04', '14:33:00', 'Kunci hilang', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', '');
INSERT INTO `barang` (`id_barang`, `id_pendanaan`, `id_ruangan`, `nama_barang`, `spek_barang`, `gambar_barang`, `tahun_barang`, `kategori_barang`, `sub_kategori`, `kondisi`, `tgl_masuk_barang`, `waktu_input`, `deskripsi`, `user_input`, `user_edit`, `tgl_edit`, `status`) VALUES
(259, 1, 1, 'Stell Land 2011-1.LOK.JC2', '-', 'ab14.jpeg', 2011, 'Furnitur', 'Loker', 'Baik', '2023-09-04', '14:34:00', 'Kunci hilang', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(260, 1, 1, 'Stell Land 2011-1.LOK.JC2', '-', '6108.jpeg', 2011, 'Furnitur', 'Loker', 'Baik', '2023-09-04', '14:34:00', 'Kunci hilang', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(261, 4, 1, 'Kursi Besi 2008-4.KUR.MH7', '-', '6d78.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '14:42:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(262, 4, 1, 'Ikea 2008-4.KUR.XS7', '-', '4582.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '14:43:00', 'IKEA SKALBERG', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(263, 4, 1, 'Ikea 2008-4.KUR.EN6', '-', 'ac95.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '14:47:00', 'IKEA SKALBERG', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(264, 4, 1, 'Ikea 2008-4.KUR.II2', '-', 'f11e.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '14:48:00', 'IKEA SKALBERG', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(265, 4, 1, 'Ikea 2008-4.KUR.TW0', '-', 'cfd5.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '14:49:00', 'IKEA SKALBERG', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(266, 4, 1, 'Ikea 2008-4.KUR.XV9', '-', '67ba.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '14:49:00', 'IKEA SKALBERG', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(267, 4, 1, 'Ikea 2008-4.KUR.AX8', '-', 'dc73.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '14:51:00', 'IKEA SKALBERG', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(268, 4, 1, 'Ikea 2008-4.KUR.ZJ7', '-', '82c5.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '14:52:00', 'IKEA SKALBERG', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(269, 4, 1, 'Ikea 2008-4.KUR.PA5', '-', 'cf9d.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '14:53:00', 'IKEA SKALBERG', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(270, 4, 1, 'Ikea 2008-4.KUR.SQ6', '-', 'e47c.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '14:54:00', 'IKEA SKALBERG', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(271, 4, 1, 'Ikea 2008-4.KUR.MW2', '-', '62b5.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '14:54:00', 'IKEA SKALBERG', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(272, 4, 1, 'Ikea 2008-4.KUR.DG4', '-', '3183.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '14:55:00', 'IKEA SKALBERG', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(273, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.HE9', '-', 'cdd5.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:27:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(274, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.CJ7', '-', '74dd.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:30:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(275, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.TW9', '-', 'a8dd.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:30:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(276, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.TO3', '-', 'd9ad.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:32:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(277, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.HA7', '-', '78aa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:32:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(278, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.YG5', '-', 'd626.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:34:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(279, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.OP0', '-', 'ae7f.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:34:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(280, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.KE1', '-', '7997.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:35:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(281, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.ZE0', '-', '8e44.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:36:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(282, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.OY1', '-', '1039.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:37:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(283, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.CG4', '-', 'f6c1.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:37:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(284, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.XM8', '-', '3faa.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:38:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(285, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.ZQ7', '-', '0d99.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:41:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(286, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.PX8', '-', '57d3.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:41:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-04', ''),
(287, 4, 1, 'Kursi Mahasiswa 2008-4.KUR.DH8', '-', '8a0d.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-04', '15:43:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-19', ''),
(288, 4, 1, 'APC 2015-4.UPS.LE7', 'APC Smart-UPS XL 3000VA RM 3U 230V', '1a65.jpeg', 2015, 'Perangkat', 'UPS', 'Baik', '2023-09-11', '15:47:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(289, 4, 1, 'Meja Komputer 2008-4.MEJ.MA3', '-', '030b.jpeg', 2008, 'Furnitur', 'Meja', 'Rusak', '2023-09-11', '15:50:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(290, 4, 1, 'Meja Komputer 2008-4.MEJ.UJ6', '-', '49c2.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '15:52:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(291, 4, 1, 'Meja Komputer 2008-4.MEJ.IV1', '-', '8b31.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '15:53:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(292, 4, 1, 'Meja Komputer 2008-4.MEJ.ZW9', '-', '42fe.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '15:54:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(293, 4, 1, 'Meja Komputer 2008-4.MEJ.KB9', '-', 'cf9c.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '15:55:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(294, 4, 1, 'Meja Komputer 2008-4.MEJ.SA6', '-', 'f0dd.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '15:56:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(295, 4, 1, 'Meja Komputer 2008-4.MEJ.TS2', '-', '1c84.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '15:57:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(296, 4, 1, 'Meja Komputer 2008-4.MEJ.YU8', '-', 'c481.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '15:58:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(297, 4, 1, 'Meja Komputer 2008-4.MEJ.BZ5', '-', 'eed4.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '15:58:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(298, 4, 1, 'Meja Komputer 2008-4.MEJ.ZQ0', '-', 'b7db.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '15:59:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(299, 4, 1, 'Meja Komputer 2008-4.MEJ.JV4', '-', '5a89.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:00:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(300, 4, 1, 'Meja Komputer 2008-4.MEJ.ZF0', '-', '6dfe.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:00:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(301, 4, 1, 'Meja Komputer 2008-4.MEJ.LQ9', '-', '6892.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:01:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(302, 4, 1, 'Meja Komputer 2008-4.MEJ.YW0', '-', '08a8.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:02:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(303, 4, 1, 'Meja Komputer 2008-4.MEJ.ZC2', '-', 'fe99.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:04:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(304, 4, 1, 'Meja Komputer 2008-4.MEJ.KN0', '-', 'f897.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:05:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(305, 4, 1, 'Meja Komputer 2008-4.MEJ.LS5', '-', '9903.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:05:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(306, 4, 1, 'Meja Komputer 2008-4.MEJ.GB1', '-', '7c7a.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:08:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(307, 4, 1, 'Meja Komputer 2008-4.MEJ.TT3', '-', '5b7b.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:09:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(308, 4, 1, 'Meja Komputer 2008-4.MEJ.KI5', '-', '8d32.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:09:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(309, 4, 1, 'Meja Komputer 2008-4.MEJ.GQ2', '-', '4487.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:10:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(310, 4, 1, 'Meja Komputer 2008-4.MEJ.OD8', '-', '5f7f.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:11:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(311, 4, 1, 'Meja Komputer 2008-4.MEJ.OF1', '-', '144c.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:12:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(312, 4, 1, 'Meja Komputer 2008-4.MEJ.ST4', '-', '8840.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:13:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(313, 4, 1, 'Meja Komputer 2008-4.MEJ.WX7', '-', 'b3d3.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:14:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(314, 4, 1, 'Meja Komputer 2008-4.MEJ.IA4', '-', 'd540.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:15:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(315, 4, 1, 'Meja Komputer 2008-4.MEJ.TD8', '-', '0a25.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:16:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(316, 4, 1, 'Meja Komputer 2008-4.MEJ.OQ4', '-', '1381.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:17:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(317, 4, 1, 'Meja Komputer 2008-4.MEJ.DO9', '-', 'a691.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:18:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(318, 4, 1, 'Meja Komputer 2008-4.MEJ.AJ3', '-', '48bc.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:19:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(319, 4, 1, 'Meja Komputer 2008-4.MEJ.GZ9', '-', 'a08e.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:20:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(320, 4, 1, 'Meja Komputer 2008-4.MEJ.VI6', '-', 'dc5e.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:21:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(321, 4, 1, 'Wearnes 2009-4.MON.ZI4', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', '8206.jpeg', 2009, 'Perangkat', 'Monitor', 'Rusak', '2023-09-11', '16:23:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(322, 4, 1, 'Wearnes 2009-4.MON.GO0', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', '4f3a.jpeg', 2009, 'Perangkat', 'Monitor', 'Rusak', '2023-09-11', '16:24:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(323, 1, 1, 'Lenovo 2015-1.MON.ZZ4', '-', '3b40.jpeg', 2015, 'Perangkat', 'Monitor', 'Rusak', '2023-09-11', '16:25:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(324, 1, 1, 'Lenovo 2015-1.MON.JC1', 'ThinkVision E1922S 18.5\" LED Backlit LCD ', 'b275.jpeg', 2015, 'Perangkat', 'Monitor', 'Rusak', '2023-09-11', '16:28:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(325, 4, 1, 'Kursi Dosen 2008-4.KUR.DQ6', '-', '32b5.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-11', '16:30:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(326, 4, 1, 'Kursi Kalab 2008-4.KUR.NM9', '-', 'c4ef.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-11', '16:32:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(327, 4, 1, 'Lemari Kecil 2008-4.LEM.ZO0', '-', '49ab.jpeg', 2008, 'Furnitur', 'Lemari', 'Baik', '2023-09-11', '16:35:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(328, 4, 1, 'Lemari Kecil 2008-4.LEM.SY1', '-', '5de9.jpeg', 2008, 'Furnitur', 'Lemari', 'Baik', '2023-09-11', '16:40:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(329, 4, 1, 'Meja Dosen 2008-4.MEJ.LC1', '-', '8258.jpeg', 2008, 'Furnitur', 'Meja', 'Baik', '2023-09-11', '16:41:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-11', ''),
(330, 4, 1, 'Lemari Besar 2008-4.MEJ.LD1', '-', '2a79.jpeg', 2008, 'Furnitur', 'Lemari', 'Baik', '2023-09-11', '16:42:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-19', ''),
(331, 4, 1, 'Tp-Link 2018-4.USB.UE8', 'TL-WN725N 150Mbps Wireless N Nano USB Adapter TL-WN725N', '6bd8.jpeg', 2018, 'Perangkat', 'USB_Wireless', 'Baik', '2023-09-12', '13:26:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(332, 4, 1, 'Tp-Link 2018-4.USB.RN6', 'TL-WN725N 150Mbps Wireless N Nano USB Adapter TL-WN725N', 'eed5.jpeg', 2018, 'Perangkat', 'USB_Wireless', 'Baik', '2023-09-12', '13:29:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(333, 4, 1, 'Tp-Link 2018-4.USB.EN0', 'TL-WN725N 150Mbps Wireless N Nano USB Adapter TL-WN725N', '219c.jpeg', 2018, 'Perangkat', 'USB_Wireless', 'Baik', '2023-09-12', '13:49:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(334, 4, 1, 'Tp-Link 2018-4.USB.IU6', 'TL-WN725N 150Mbps Wireless N Nano USB Adapter TL-WN725N', '0e15.jpeg', 2018, 'Perangkat', 'USB_Wireless', 'Baik', '2023-09-12', '13:50:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(335, 4, 1, 'Tp-Link 2018-4.USB.KJ5', 'TL-WN725N 150Mbps Wireless N Nano USB Adapter TL-WN725N', '7952.jpeg', 2018, 'Perangkat', 'USB_Wireless', 'Baik', '2023-09-12', '13:51:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(336, 4, 1, 'D-Link 2018-4.WIR.IH6', 'Wireless Desktop Adapter D-Link DWA-510', '4f3f.jpeg', 2018, 'Perangkat', 'Wireless_Card', 'Baik', '2023-09-12', '13:53:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(337, 4, 1, 'D-Link 2018-4.WIR.FK9', 'Wireless Desktop Adapter D-Link DWA-510', '17f3.jpeg', 2018, 'Perangkat', 'Wireless_Card', 'Baik', '2023-09-12', '13:54:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(338, 4, 1, 'D-Link 2018-4.WIR.XN9', 'Wireless Desktop Adapter D-Link DWA-510', '87a9.jpeg', 2018, 'Perangkat', 'Wireless_Card', 'Baik', '2023-09-12', '13:57:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(339, 4, 1, 'D-Link 2018-4.WIR.QE3', 'Wireless Desktop Adapter D-Link DWA-510', 'b731.jpeg', 2018, 'Perangkat', 'Wireless_Card', 'Baik', '2023-09-12', '13:58:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(340, 4, 1, 'D-Link 2018-4.WIR.GP9', 'Wireless Desktop Adapter D-Link DWA-510', '5408.jpeg', 2018, 'Perangkat', 'Wireless_Card', 'Baik', '2023-09-12', '13:59:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(341, 4, 1, 'Multi-Tech 2018-4.LAN.HE9', 'Multi-Tech MT5634ZPX-PCI MultiModem ZPX 5600Kbps Internal V.92 Data-Fax World Mo', '36e4.jpeg', 2018, 'Perangkat', 'LAN_Card', 'Baik', '2023-09-12', '14:00:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(343, 4, 1, 'Tp-Link 2015-4.ACC.KB3', '-', '602e.jpeg', 2015, 'Perangkat', 'Access_Point', 'Baik', '2023-09-12', '14:02:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(344, 4, 1, 'Tp-Link 2015-4.ACC.QR7', '-', '70e0.jpeg', 2015, 'Perangkat', 'Access_Point', 'Baik', '2023-09-12', '14:04:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(345, 4, 1, 'Mikrotik 2018-4.ROU.ZT6', 'RB960PGS, Product Code: RB960PGS, Architecture: MIPS-BE, CPU: QCA9557 800, Current Monitor: Yes, Main Storage/NAND: 16MB, RAM: 128MB, SFP Ports: 1, LAN Ports: 5, Gigabit: Yes, Switch Chip: 1, MiniPCI: 0, Integrated Wireless: No, MiniPCIe: 0, SIM Card Slots: No, USB: 1, Power on USB: Yes, Memory Cards: No, Power Jack: 12-57V, 802.3af Support: Yes (ether 2-5), POE Input: 12-57V, POE Output: Yes, Serial Port: No, Voltage Monitor: Yes, Temperature Sensor: Yes, Dimensions: 114 x 137 x 29mm, Operating System: RouterOS, Temperature Range: -30°C .. +60°C, RouterOS License: Level 4.', 'c3e0.jpeg', 2018, 'Perangkat', 'Router', 'Baik', '2023-09-12', '14:05:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(346, 4, 1, 'GARMIN 2018-.GPS.IZ8', 'Dimensions, WxHxD: 2.4\" x 6.3\" x 1.4\" (6.1 x 16.0 x 3.6 cm), Display size, WxH: 1.43\" x 2.15\" (3.6 x 5.5 cm); 2.6\" diag (6.6 cm), Display resolution, WxH: 160 x 240 pixels, Display type: transflective, 65-K color TFT, Weight: 9.2 oz (260.1 g) with batteries, Battery: 2 AA batteries (not included); NiMH or Lithium recommended, Battery life: 20 hours, Waterproof: yes (IPX7), Floats: no, High-sensitivity receiver: yes, Interface: high-speed USB and NMEA 0183 compatible.', '3b51.jpeg', 2018, 'Media', 'GPS_Mobile', 'Baik', '2023-09-12', '14:34:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(347, 4, 1, 'Creative 2018-4.LIV.YX8', '-', '8813.jpeg', 2018, 'Media', 'Livecam', 'Baik', '2023-09-12', '14:36:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(348, 4, 1, 'Cisco 2018-4.ROU.KB5', 'Cisco RV042G-K9-EU Gigabit Dual WAN VPN Router 6 Port', '7ce7.jpeg', 2018, 'Perangkat', 'Router', 'Baik', '2023-09-12', '14:37:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(349, 1, 1, 'D-Link 2010-1.SWI.KU8', 'Cisco RV042G-K9-EU Gigabit Dual WAN VPN Router 6 Port', '3531.jpeg', 2010, 'Perangkat', 'Switch', 'Baik', '2023-09-12', '14:41:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(350, 1, 1, 'D-Link 2010-1.SWI.PJ6', 'Cisco RV042G-K9-EU Gigabit Dual WAN VPN Router 6 Port', '4b24.jpeg', 2010, 'Perangkat', 'Switch', 'Baik', '2023-09-12', '14:43:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(351, 4, 1, 'Cisco 2018-4.SWI.ML4', 'SG95-24/ 24-Port Gigabit Switch', 'd5ef.jpeg', 2018, 'Perangkat', 'Switch', 'Baik', '2023-09-12', '14:45:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(352, 4, 1, 'D-Link 2018-4.SWI.CD6', 'D-Link 16-port 10/100 Switch - DES-1016A', '2116.jpeg', 2018, 'Perangkat', 'Switch', 'Baik', '2023-09-12', '14:46:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(353, 4, 1, 'Tenda 2018-4.ACC.TK3', 'TENDA N300 WiFi Router 300Mbps - N301', 'f4e0.jpeg', 2018, 'Perangkat', 'Access_Point', 'Baik', '2023-09-12', '14:48:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(354, 4, 1, 'Mikrotik 2018-4.ROU.LO6', 'RouterBoard 2011UiAS-2HnD (desktop case + SFP Port + Wireless)', 'c19b.jpeg', 2018, 'Perangkat', 'Router', 'Baik', '2023-09-12', '14:49:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(355, 4, 1, 'Tp-Link 2018-4.POE.YH6', 'TP-LINK Passive Poe Injector', '2e1d.jpeg', 2018, 'Perangkat', 'Poe_Adapter', 'Baik', '2023-09-12', '14:51:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(356, 4, 1, 'Acer 2018-4.SPE.GL8', '-', '7235.jpeg', 2018, 'Perangkat', 'Speaker', 'Baik', '2023-09-12', '14:52:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(357, 4, 1, 'Lemari Besi VIP 2012-4.LEM.ZP6', '-', '0181.jpeg', 2012, 'Furnitur', 'Lemari', 'Baik', '2023-09-12', '16:50:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(359, 4, 1, 'Kursi Dosen 2015-4.KUR.SG1', '-', 'd298.jpeg', 2015, 'Furnitur', 'Kursi', 'Baik', '2023-09-12', '16:54:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(360, 4, 1, 'Linksys Wi-Fi Router 2023-4.ROU.PO2', 'Linksys E5600 AC1200 WiFi 5 Router 1.2Gbps Dual-Band 802.11AC, Mencakup Hingga 1000 Kaki Persegi, Menangani 10 + Perangkat', '2097.jpeg', 2023, 'Perangkat', 'Router', 'Baik', '2023-09-12', '16:56:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(361, 4, 1, 'Linksys Wi-Fi Router 2023-4.ROU.QP0', 'Linksys E5600 AC1200 WiFi 5 Router 1.2Gbps Dual-Band 802.11AC, Mencakup Hingga 1000 Kaki Persegi, Menangani 10 + Perangkat', 'd431.jpeg', 2023, 'Perangkat', 'Router', 'Baik', '2023-09-12', '16:58:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(362, 4, 1, 'Linksys Wi-Fi Router 2023-4.ROU.UM4', 'Linksys E5600 AC1200 WiFi 5 Router 1.2Gbps Dual-Band 802.11AC, Mencakup Hingga 1000 Kaki Persegi, Menangani 10 + Perangkat', 'd96e.jpeg', 2023, 'Perangkat', 'Router', 'Baik', '2023-09-12', '17:00:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(363, 4, 1, 'Linksys Wi-Fi Router 2023-4.ROU.SR9', 'Linksys E5600 AC1200 WiFi 5 Router 1.2Gbps Dual-Band 802.11AC, Mencakup Hingga 1000 Kaki Persegi, Menangani 10 + Perangkat', '175d.jpeg', 2023, 'Perangkat', 'Router', 'Baik', '2023-09-12', '17:00:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(364, 4, 1, 'Tp-Link Antena 2023-4.ANT.DI4', '5GHz N300 Outdoor CPE, Qualcomm, 25dBm, 2T2R, 23dBi Directional Antenna, 30+ km, 1 FE Ports, IP65 Weatherproof, Passive PoE, MAXtream TDMA, Centralized Management, Spectrum Analyzer, AP/Client/AP Router/AP Client Router/Repeater/Bridge mode', 'c14b.jpg', 2023, 'Perangkat', 'Antena', 'Baik', '2023-09-12', '17:05:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(365, 4, 1, 'Tp-Link Antena 2023-4.ANT.QN7', '5GHz N300 Outdoor CPE, Qualcomm, 25dBm, 2T2R, 23dBi Directional Antenna, 30+ km, 1 FE Ports, IP65 Weatherproof, Passive PoE, MAXtream TDMA, Centralized Management, Spectrum Analyzer, AP/Client/AP Router/AP Client Router/Repeater/Bridge mode', 'f0da.jpg', 2023, 'Perangkat', 'Antena', 'Baik', '2023-09-12', '17:07:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(366, 4, 1, 'Tp-Link Antena 2023-4.ANT.LM4', '5GHz N300 Outdoor CPE, Qualcomm, 25dBm, 2T2R, 23dBi Directional Antenna, 30+ km, 1 FE Ports, IP65 Weatherproof, Passive PoE, MAXtream TDMA, Centralized Management, Spectrum Analyzer, AP/Client/AP Router/AP Client Router/Repeater/Bridge mode', '1fc3.jpg', 2023, 'Perangkat', 'Antena', 'Baik', '2023-09-12', '17:10:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(367, 4, 1, 'Tp-Link Antena 2023-4.ANT.GI0', '5GHz N300 Outdoor CPE, Qualcomm, 25dBm, 2T2R, 23dBi Directional Antenna, 30+ km, 1 FE Ports, IP65 Weatherproof, Passive PoE, MAXtream TDMA, Centralized Management, Spectrum Analyzer, AP/Client/AP Router/AP Client Router/Repeater/Bridge mode', '68c6.jpg', 2023, 'Perangkat', 'Antena', 'Baik', '2023-09-12', '17:11:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(368, 4, 1, 'Tp-Link Switch 2023-4.SWI.PA0', 'LS108G, 8 10/100/1000Mbps, Auto-Negotiation, Auto-MDI/MDIX Ports, Packet Forwarding Rate 11.9 Mpps, MAC Address Table 4K, Packet Buffer Memory 1.5 Mb, Jumbo Frame 16 KB', '3fcc.jpeg', 2023, 'Perangkat', 'Switch', 'Baik', '2023-09-12', '17:13:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(369, 4, 1, 'Tp-Link Switch 2023-4.SWI.FD2', 'LS108G, 8 10/100/1000Mbps, Auto-Negotiation, Auto-MDI/MDIX Ports, Packet Forwarding Rate 11.9 Mpps, MAC Address Table 4K, Packet Buffer Memory 1.5 Mb, Jumbo Frame 16 KB', '517e.jpeg', 2023, 'Perangkat', 'Switch', 'Baik', '2023-09-12', '17:15:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(370, 4, 1, 'Tp-Link Switch 2023-4.SWI.GC8', 'LS108G, 8 10/100/1000Mbps, Auto-Negotiation, Auto-MDI/MDIX Ports, Packet Forwarding Rate 11.9 Mpps, MAC Address Table 4K, Packet Buffer Memory 1.5 Mb, Jumbo Frame 16 KB', '9215.jpeg', 2023, 'Perangkat', 'Switch', 'Baik', '2023-09-12', '17:16:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(371, 4, 1, 'Tp-Link Switch 2023-4.SWI.SF4', 'LS108G, 8 10/100/1000Mbps, Auto-Negotiation, Auto-MDI/MDIX Ports, Packet Forwarding Rate 11.9 Mpps, MAC Address Table 4K, Packet Buffer Memory 1.5 Mb, Jumbo Frame 16 KB', 'f2e9.jpeg', 2023, 'Perangkat', 'Switch', 'Baik', '2023-09-12', '17:17:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(372, 4, 1, 'Cisco Switch 2023-4.SWI.NK0', 'Cisco Business CBS110-24T-D Unmanaged Switch | 24 Port GE | 2x1G SFP Shared | Limited Lifetime Protection (CBS110-24T-NA)', '2139.jpeg', 2023, 'Perangkat', 'Switch', 'Baik', '2023-09-12', '17:18:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(373, 1, 1, 'Style Diamond Jam Dinding 2010-1.JAM.HI2', '-', 'a858.jpeg', 2010, 'Furnitur', 'Jam_Dinding', 'Rusak', '2023-09-12', '17:20:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(374, 4, 1, 'HP Keyboard 2023-4.KEY.NA5', '-', '6250.jpeg', 2023, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-12', '17:23:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(375, 4, 1, 'Genius Keyboard 2023-4.KEY.PK9', '-', '1aa8.jpeg', 2023, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-12', '17:24:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(376, 4, 1, 'Genius Keyboard 2023-4.KEY.CW3', '-', '358a.jpeg', 2023, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-12', '17:25:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(377, 4, 1, 'CPU Wearnes 2023-4.CPU.PB2', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', '1876.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:28:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(378, 4, 1, 'CPU Wearnes 2009-4.CPU.LC5', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', '0bd8.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:32:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(379, 4, 1, 'CPU Wearnes 2009-4.CPU.SB5', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', '1a70.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:33:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(380, 4, 1, 'CPU Wearnes 2009-4.CPU.RZ8', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', '465b.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:33:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(381, 4, 1, 'CPU Wearnes 2009-4.CPU.OJ0', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', '567a.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:36:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(382, 4, 1, 'CPU Wearnes 2009-4.CPU.YZ1', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', '5fc1.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:37:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(383, 4, 1, 'CPU Wearnes 2009-4.CPU.KE7', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', 'e6fa.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:38:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(384, 4, 1, 'CPU Wearnes 2009-4.CPU.QN0', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', 'e1dd.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:39:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(385, 4, 1, 'CPU Wearnes 2009-4.CPU.WW1', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', '7f7c.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:39:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(386, 4, 1, 'CPU Wearnes 2009-4.CPU.TG7', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', 'f412.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:40:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(387, 4, 1, 'CPU Wearnes 2009-4.CPU.KB9', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', 'dba1.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:41:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(388, 4, 1, 'CPU Wearnes 2009-4.CPU.VT3', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', 'e7a1.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:42:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(389, 4, 1, 'CPU Wearnes 2009-4.CPU.NU6', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', 'c18c.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:43:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(390, 4, 1, 'CPU Wearnes 2009-4.CPU.VA8', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', 'b5d9.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:44:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(391, 4, 1, 'CPU Wearnes 2009-4.CPU.YK2', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', '3452.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:45:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(392, 4, 1, 'CPU Wearnes 2009-4.CPU.NH3', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', '79d1.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:45:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-12', ''),
(393, 4, 1, 'CPU Wearnes 2009-4.CPU.HS2', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', 'b31c.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-12', '17:46:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-19', ''),
(394, 4, 1, 'Wearnes 2009-4.KEY.IG9', '-', '1d47.jpeg', 2009, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-13', '11:13:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(395, 4, 1, 'Wearnes 2009-4.KEY.BL9', '-', '13c7.jpeg', 2009, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-13', '11:18:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(396, 4, 1, 'Wearnes 2009-4.KEY.RX1', '-', '6036.jpeg', 2009, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-13', '11:19:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(397, 4, 1, 'Wearnes 2009-4.KEY.OZ2', '-', 'b2b8.jpeg', 2009, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-13', '11:19:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(398, 4, 1, 'Wearnes 2009-4.KEY.EH2', '-', '3bd4.jpeg', 2009, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-13', '11:20:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(399, 4, 1, 'Wearnes 2009-4.KEY.KS5', '-', '9cb7.jpeg', 2009, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-13', '11:21:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(400, 4, 1, 'Wearnes 2009-4.KEY.KM0', '-', '1ba8.jpeg', 2009, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-13', '11:22:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(401, 4, 1, 'Wearnes 2009-4.KEY.IP0', '-', '40d5.jpeg', 2009, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-13', '11:23:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(402, 4, 1, 'Wearnes 2009-4.KEY.AI9', '-', '4345.jpeg', 2009, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-13', '11:24:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(403, 1, 1, 'Acer 2012-1.CPU.NU0', 'Aspire M3985 i3-2120 Mini Tower Intel® Core™ i3 4 GB DDR3-SDRAM 500 GB HDD Windows 7', 'd218.jpeg', 2012, 'Perangkat', 'CPU', 'Rusak', '2023-09-13', '11:26:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(404, 4, 1, 'APC Back-UPS 650 VA 2009-4.UPS.MK8', 'Back-UPS 650VA, 230V, AVR, Soket Universal', '2cd2.JPG', 2009, 'Perangkat', 'UPS', 'Rusak', '2023-09-13', '11:27:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(405, 4, 1, 'APC Back-UPS 650 VA 2009-4.UPS.EU2', 'Back-UPS 650VA, 230V, AVR, Soket Universal', '1044.JPG', 2009, 'Perangkat', 'UPS', 'Rusak', '2023-09-13', '11:29:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(406, 4, 1, 'APC UPS Line-R 600 2009-4.UPS.QP6', 'Line-R 600VA Automatic Voltage Regulator LE600I', '9fa7.jpeg', 2009, 'Perangkat', 'UPS', 'Rusak', '2023-09-13', '11:30:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(407, 4, 1, 'APC UPS Line-R 600 2009-4.UPS.EJ8', 'Line-R 600VA Automatic Voltage Regulator LE600I', 'dd6f.jpeg', 2009, 'Perangkat', 'UPS', 'Rusak', '2023-09-13', '11:31:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(408, 4, 1, 'APC Back-UPS ES500 2009-4.UPS.DU7', 'APC BE500R-AS Back-UPS ES 500VA 230V', '8565.JPG', 2009, 'Perangkat', 'UPS', 'Rusak', '2023-09-13', '11:33:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(409, 4, 1, 'APC Back-UPS ES500 2009-4.UPS.GN0', 'APC BE500R-AS Back-UPS ES 500VA 230V', 'acbb.JPG', 2009, 'Perangkat', 'UPS', 'Rusak', '2023-09-13', '11:36:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(410, 4, 1, 'APC Back-UPS ES500 2009-4.UPS.DY9', 'APC BE500R-AS Back-UPS ES 500VA 230V', '60f0.JPG', 2009, 'Perangkat', 'UPS', 'Rusak', '2023-09-13', '11:37:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(411, 4, 1, 'Rak Server 2009-4.RAK.BW4', '-', '7f16.jpeg', 2009, 'Furnitur', 'Rak', 'Baik', '2023-09-13', '11:37:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(412, 4, 1, 'Tp-Link Switch 2023-4.SWI.VT4', 'Model TL-SF1024D, 24 10/100M RJ45 ports, Green Ethernet technology saves power consumption, Supports MAC address self-learning and auto MDI/MDIX, Standard 13-inch steel case.', '0994.jpg', 2023, 'Perangkat', 'Switch', 'Baik', '2023-09-13', '11:39:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(413, 4, 1, 'Tp-Link Switch 2023-4.SWI.QC0', 'Model TL-SF1024D, 24 10/100M RJ45 ports, Green Ethernet technology saves power consumption, Supports MAC address self-learning and auto MDI/MDIX, Standard 13-inch steel case.', '5797.jpg', 2023, 'Perangkat', 'Switch', 'Baik', '2023-09-13', '11:40:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(414, 4, 1, '3Com Switch 2023-4.SWI.UA0', '3COM Baseline 2250 Plus Switch 48 Port 10/100 + 2 Gigabit / 2 SFP - 3CBLSF50H', '5a6d.jpg', 2023, 'Perangkat', 'Switch', 'Baik', '2023-09-13', '11:41:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(415, 4, 1, 'D-Link Switch 2023-4.SWI.VD1', 'Number of Ports : 24 10/100Mbps Fast Ethernet ports, Topology Star, Network Cables, 10BASE-T:\r\nUTP CAT 3/4/5/5e (100 m max.), EIA/TIA-586 100-ohm STP (100 m max.), 100BASE-TX, UTP CAT 5/5e (100 m max.), EIA/TIA-568 100-ohm STP (100 m max.), Media Interface Exchange, Auto MDI/MDIX adjustment for all ports LED Indicators', '8733.jpg', 2023, 'Perangkat', 'Switch', 'Baik', '2023-09-13', '11:50:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(416, 4, 1, 'Wearnes 2009-4.KEY.XZ1', '-', '50c9.jpeg', 2009, 'Perangkat', 'Keyboard', 'Baik', '2023-09-13', '12:03:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(417, 4, 1, 'Genius 2009-4.KEY.VR1', '-', '01a2.jpeg', 2009, 'Perangkat', 'Keyboard', 'Baik', '2023-09-13', '12:04:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(418, 4, 1, 'Keyboard Lenovo 2009-4.KEY.LE7', '-', '5893.jpg', 2009, 'Perangkat', 'Keyboard', 'Baik', '2023-09-13', '12:11:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(419, 1, 1, 'Panasonic 2014-1.AIR.NT6', '-', 'bf86.jpeg', 2014, 'Furnitur', 'Air_Conditioner', 'Baik', '2023-09-13', '12:12:00', 'Kurang dingin', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(420, 1, 1, 'Lenovo 2015-1.CPU.VP3', 'Intel Core i3 win 7', 'b9d6.jpeg', 2015, 'Perangkat', 'CPU', 'Rusak', '2023-09-13', '12:17:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(421, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.GN6', '-', '1545.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:19:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(422, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.EE1', '-', '9f0f.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:28:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(423, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.QC7', '-', '65ac.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:31:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(424, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.BL0', '-', 'c7d9.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:32:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(425, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.TJ4', '-', '8c85.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:33:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(426, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.QG5', '-', 'ded4.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:34:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(427, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.PL9', '-', '3889.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:35:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(428, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.JC1', '-', 'bdb9.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:36:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(429, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.XT7', '-', 'b2dc.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:36:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(430, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.KV4', '-', 'a1ba.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:38:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(431, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.GU5', '-', 'fffb.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:38:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(432, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.XS4', '-', '27ca.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:39:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(433, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.JZ9', '-', '88b4.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:39:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(434, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.MW6', '-', '8ff4.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:40:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(435, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.MZ4', '-', 'c9e9.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:41:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(436, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.FS1', '-', '6b30.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:42:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(437, 4, 1, 'Cable Tester RJ45 & RJ11 2023-4.LAN.OP2', '-', 'f52b.jpeg', 2023, 'Perangkat', 'LAN_Tester', 'Baik', '2023-09-13', '12:42:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(438, 4, 1, 'Krimping 2023-4.KRI.NW8', '-', 'f90a.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:44:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(439, 4, 1, 'Krimping 2023-4.KRI.FO0', '-', 'c9ef.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:46:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(440, 4, 1, 'Krimping 2023-4.KRI.VR1', '-', 'de09.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:46:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(441, 4, 1, 'Krimping 2023-4.KRI.YT1', '-', '4d84.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:47:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(442, 4, 1, 'Krimping 2023-4.KRI.TK1', '-', 'e55a.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:48:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(443, 4, 1, 'Krimping 2023-4.KRI.HC7', '-', '2ba5.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:49:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(444, 4, 1, 'Krimping 2023-4.KRI.ON2', '-', '8597.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:50:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(445, 4, 1, 'Krimping 2023-4.KRI.BZ8', '-', '2dc0.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:51:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(446, 4, 1, 'Krimping 2023-4.KRI.BM4', '-', '9b78.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:52:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(447, 4, 1, 'Krimping 2023-4.KRI.KF3', '-', '596e.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:53:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(448, 4, 1, 'Krimping 2023-4.KRI.KC0', '-', 'e486.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:54:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(449, 4, 1, 'Krimping 2023-4.KRI.OJ3', '-', '79da.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:54:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(450, 4, 1, 'Krimping 2023-4.KRI.GX9', '-', 'd6fe.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:55:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(451, 4, 1, 'Krimping 2023-4.KRI.HX3', '-', '1905.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:55:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(452, 4, 1, 'Krimping 2023-4.KRI.RV4', '-', 'f518.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:56:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(453, 4, 1, 'Krimping 2023-4.KRI.WD0', '-', 'f652.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:57:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(454, 4, 1, 'Krimping 2023-4.KRI.SM4', '-', '1792.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '12:59:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(455, 4, 1, 'Krimping 2023-4.KRI.SV7', '-', '214c.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '13:00:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(456, 4, 1, 'Krimping 2023-4.KRI.TV9', '-', '8a24.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '13:01:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(457, 4, 1, 'Krimping 2023-4.KRI.MT9', '-', '7494.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '13:01:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(458, 4, 1, 'Krimping 2023-4.KRI.TR0', '-', '29cb.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '13:03:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(459, 4, 1, 'Krimping 2023-4.KRI.EE0', '-', 'e7a2.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '13:04:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(460, 4, 1, 'Krimping 2023-4.KRI.UT2', '-', '1a34.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '13:05:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(461, 4, 1, 'Krimping 2023-4.KRI.YC0', '-', 'cba2.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '13:12:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(462, 4, 1, 'Krimping 2023-4.KRI.QE9', '-', '8eb4.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '13:12:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(463, 4, 1, 'Krimping 2023-4.KRI.JO6', '-', 'f324.jpeg', 2023, 'Alat', 'Krimping', 'Baik', '2023-09-13', '13:13:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(465, 1, 1, 'KENMASTER 2023-1.TOO.GQ9', 'Toolbox 18\"', 'ea1e.jpeg', 2023, 'Alat', 'Toolbox', 'Baik', '2023-09-13', '13:15:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(466, 1, 1, 'KENMASTER 2023-1.TOO.RT0', 'Toolbox 18\"', 'e04a.jpeg', 2023, 'Alat', 'Toolbox', 'Baik', '2023-09-13', '13:15:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(467, 1, 1, 'KENMASTER 2023-1.TOO.GD2', 'Toolbox 18\"', '33a1.jpeg', 2023, 'Alat', 'Toolbox', 'Baik', '2023-09-13', '13:16:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(468, 1, 1, 'CXH 2023-1.SET.UW3', '-', 'd2ab.jpeg', 2023, 'Alat', 'Set_Obeng', 'Baik', '2023-09-13', '13:17:00', 'Obeng 4 pc dan 5 pc kunci L', 'Indah Nirwana', 'Indah Nirwana', '2023-09-19', ''),
(469, 1, 1, 'CXH 2023-1.SET.IF3', '-', '9a86.jpeg', 2023, 'Alat', 'Set_Obeng', 'Baik', '2023-09-13', '13:18:00', 'Obeng 4 pc dan 5 pc kunci L', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(470, 1, 1, 'CXH 2023-1.SET.DX7', '-', '3e37.jpeg', 2023, 'Alat', 'Server', 'Baik', '2023-09-13', '13:18:00', 'Obeng 4 pc dan 5 pc kunci L', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(471, 1, 1, 'Cutter 2023-1.CUT.AZ2', '-', 'bf6a.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '13:50:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(472, 1, 1, 'Cutter 2023-1.CUT.DK0', '-', 'cbc1.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '13:53:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(473, 1, 1, 'Cutter 2023-1.CUT.WO1', '-', 'fa12.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '13:56:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(474, 1, 1, 'Cutter 2023-1.CUT.DK0', '-', '19f2.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '13:57:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(475, 1, 1, 'Cutter 2023-1.CUT.UB4', '-', '6cc7.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '13:57:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(476, 1, 1, 'Cutter 2023-1.CUT.PQ8', '-', '9b29.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '13:59:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(477, 1, 1, 'Cutter 2023-1.CUT.LW3', '-', 'f6da.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '13:59:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(478, 1, 1, 'Cutter 2023-1.CUT.TB4', '-', 'c928.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:00:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(479, 1, 1, 'Cutter 2023-1.CUT.IG1', '-', '76eb.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:00:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(480, 1, 1, 'Cutter 2023-1.CUT.LF5', '-', '930e.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:01:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(481, 1, 1, 'Cutter 2023-1.CUT.VG4', '-', 'd938.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:03:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(482, 1, 1, 'Cutter 2023-1.CUT.GZ4', '-', '8a21.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:04:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(483, 1, 1, 'Cutter 2023-1.CUT.YV9', '-', '3b7f.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:04:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(484, 1, 1, 'Cutter 2023-1.CUT.VG8', '-', 'fa67.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:05:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(485, 1, 1, 'Cutter 2023-1.CUT.PR5', '-', '536b.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:08:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(486, 1, 1, 'Cutter 2023-1.CUT.QK8', '-', '0db0.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:08:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(487, 1, 1, 'Cutter 2023-1.CUT.UK6', '-', '787f.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:09:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(488, 1, 1, 'Cutter 2023-1.CUT.OE2', '-', 'ccbc.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:10:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(489, 1, 1, 'Cutter 2023-1.CUT.KV1', '-', 'a7e2.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:10:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(490, 1, 1, 'Cutter 2023-1.CUT.WK8', '-', '0699.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:11:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(491, 1, 1, 'Cutter 2023-1.CUT.WD7', '-', 'ac63.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:12:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(492, 1, 1, 'Cutter 2023-1.CUT.VI2', '-', '1b6a.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:12:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(493, 1, 1, 'Cutter 2023-1.CUT.DN7', '-', 'df99.jpeg', 2023, 'Alat', 'Cutter', 'Baik', '2023-09-13', '14:13:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(494, 4, 1, 'Kursi Besi 2009-4.KUR.SU7', '-', 'd74f.jpeg', 2009, 'Furnitur', 'Kursi', 'Baik', '2023-09-13', '14:14:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(495, 4, 1, 'Kursi Dosen 2008-4.KUR.JK0', '-', '23e3.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-13', '14:15:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(496, 4, 1, 'Kursi Dosen 2008-4.KUR.AG6', '-', '3b50.jpeg', 2008, 'Furnitur', 'Kursi', 'Rusak', '2023-09-13', '14:16:00', 'Tangannya patah', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(497, 1, 1, 'Monitor ThinkVision E1922S  2015-1.MON.ST6', 'ThinkVision E1922S 18.5\" LED Backlit LCD', 'bc95.jpg', 2015, 'Perangkat', 'Monitor', 'Rusak', '2023-09-13', '14:18:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(498, 1, 1, 'Monitor ThinkVision E1922S 2015-1.MON.DH0', 'ThinkVision E1922S 18.5\" LED Backlit LCD', 'c792.jpg', 2015, 'Perangkat', 'Monitor', 'Rusak', '2023-09-13', '14:19:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(499, 1, 1, 'Monitor ThinkVision E2054 2015-1.MON.AI7', 'ThinkVision E2054 LCD LED Backlit 19,5\"', '18bd.jpg', 2015, 'Perangkat', 'Monitor', 'Rusak', '2023-09-13', '14:20:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(500, 4, 1, 'Wearnes 2009-4.MON.TB0', '17\" TFT LCD Monitor, Model WX17W', '5dbd.jpeg', 2009, 'Perangkat', 'Monitor', 'Rusak', '2023-09-13', '14:26:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', '');
INSERT INTO `barang` (`id_barang`, `id_pendanaan`, `id_ruangan`, `nama_barang`, `spek_barang`, `gambar_barang`, `tahun_barang`, `kategori_barang`, `sub_kategori`, `kondisi`, `tgl_masuk_barang`, `waktu_input`, `deskripsi`, `user_input`, `user_edit`, `tgl_edit`, `status`) VALUES
(501, 4, 1, 'Wearnes 2009-4.MON.NI5', '17\" TFT LCD Monitor, Model WX17W', 'ecd8.jpeg', 2009, 'Perangkat', 'Monitor', 'Rusak', '2023-09-13', '14:27:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(502, 4, 1, 'Acer 2009-4.MON.FP5', 'Acer P166HQL 15.6\" LED Backlit LCD', '6ca5.jpeg', 2009, 'Perangkat', 'Monitor', 'Rusak', '2023-09-13', '14:29:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(503, 4, 1, 'Lenovo All-in-one 2023-4.KOM.IB9', 'Lenovo All-in-one ThinkCentre V510z Intel Core I7-7700T, RAM 8 GB, HDD 1 TB, Win10Pro', '8657.jpeg', 2023, 'Perangkat', 'Komputer', 'Rusak', '2023-09-13', '14:30:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(504, 4, 1, 'Lenovo All-in-one 2023-4.KOM.HY9', 'Intel Core i7-10700T, 2.0GHz, RAM 8GB, HDD 1TB', '63f6.jpeg', 2023, 'Perangkat', 'Komputer', 'Rusak', '2023-09-13', '14:32:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(505, 4, 1, 'Wearnes 2009-4.CPU.YT1', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', 'bb29.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-13', '14:36:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(506, 4, 1, 'Wearnes 2009-4.CPU.PC3', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', 'b8c9.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-13', '14:36:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(507, 4, 1, 'Wearnes 2009-4.CPU.DQ1', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', '9981.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-13', '14:37:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(508, 4, 1, 'Wearnes 2009-4.CPU.OY6', 'Wearnes WX18W Intel Pentium Dual CPU RAM 4096 MB, OS Debian/Mubaarik', '71ec.jpeg', 2009, 'Perangkat', 'CPU', 'Rusak', '2023-09-13', '14:38:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(509, 2, 1, 'Acer 2014-2.CPU.MT6', 'Aspire Intel Core i3 ', '2de1.jpeg', 2014, 'Perangkat', 'CPU', 'Rusak', '2023-09-13', '14:39:00', 'Power supply ', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(510, 1, 1, 'Acer 2014-1.CPU.CU6', 'Aspire Intel Core i3 ', 'b58c.jpeg', 2014, 'Perangkat', 'CPU', 'Rusak', '2023-09-13', '14:44:00', '1. RAM tidak ada\r\n2. Power supply beda', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(511, 1, 1, 'Acer 2014-1.CPU.VY8', 'Aspire Intel Core i3 ', '40f3.jpeg', 2014, 'Perangkat', 'CPU', 'Rusak', '2023-09-13', '14:45:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(512, 1, 1, 'Lenovo 2015-1.CPU.SR3', 'Intel Core i3 win 7', '5545.jpeg', 2015, 'Perangkat', 'UPS', 'Rusak', '2023-09-13', '14:46:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(513, 1, 1, 'Lenovo 2015-1.CPU.WC5', 'Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, CPU Lenovo', '321c.jpeg', 2015, 'Perangkat', 'CPU', 'Rusak', '2023-09-13', '14:47:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(514, 1, 1, 'Lenovo 2015-1.KOM.VB7', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', '1aec.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-09-13', '16:05:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Lenovo, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(515, 1, 1, 'Lenovo 2015-1.KOM.EG3', 'Lenovo Intel ® CoreTM i5-6500, 3.20GHz, RAM 4 GB, HDD 1 TB, Monitor Lenovo', 'd291.jpeg', 2015, 'Perangkat', 'Komputer', 'Baik', '2023-09-13', '16:06:00', 'Komputer (Monitor Lenovo, CPU Lenovo, Mouse Genius, Keyboard Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-13', ''),
(516, 4, 2, 'Wearnes 2023-4.KOM.UW4', 'CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB ', '2eac.jpeg', 2023, 'Perangkat', 'Komputer', 'Baik', '2023-09-18', '13:21:00', 'Komputer (Monitor Wearnes, Mouse Wearnes, Keyboard Genius, CPU Acer)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(517, 4, 2, 'Wearnes 2023-4.KOM.IY2', 'CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB ', 'c51c.jpeg', 2023, 'Perangkat', 'Komputer', 'Baik', '2023-09-18', '13:23:00', 'Komputer (Monitor Wearnes, Mouse Wearnes, Keyboard Genius, CPU Acer)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(518, 4, 2, 'Wearnes 2023-4.KOM.UD1', 'CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB ', '9ff2.jpeg', 2023, 'Perangkat', 'Komputer', 'Baik', '2023-09-18', '13:24:00', 'Komputer (Monitor Wearnes, Mouse Logitech, Keyboard Genius, CPU Acer)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(519, 4, 2, 'Acer 2023-4.KOM.XH6', 'CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB ', 'd33e.jpeg', 2023, 'Perangkat', 'Komputer', 'Baik', '2023-09-18', '13:25:00', 'Komputer (Monitor Acer, Mouse Wearnes, Keyboard Acer, CPU Acer)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(520, 4, 2, 'Acer 2023-4.KOM.CY3', 'CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB ', 'a6ca.jpeg', 2023, 'Perangkat', 'Komputer', 'Baik', '2023-09-18', '13:26:00', 'Komputer (Monitor Acer, Mouse Wearnes, Keyboard Acer, CPU Acer)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(521, 4, 2, 'Lenovo 2023-4.KOM.TZ5', 'CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB ', 'cf3f.jpeg', 2023, 'Perangkat', 'Komputer', 'Baik', '2023-09-18', '13:28:00', 'Komputer (Monitor Lenovo, Mouse Wearnes, Keyboard Acer, CPU Acer)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(522, 4, 2, 'Acer 2023-4.KOM.HA1', 'CPU Processor Intel Core i3-4160, 3.60GHz, RAM 2 GB, HDD 512 GB ', 'd925.jpeg', 2023, 'Perangkat', 'Komputer', 'Baik', '2023-09-18', '13:29:00', 'Komputer (Monitor Acer, Mouse Wearnes, Keyboard Genius, CPU Acer)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(523, 4, 2, 'Wearnes 2023-4.KOM.PV8', 'CPU Processor Intel Core i5, HDD 1 TB, RAM 8 GB', '7bfe.jpeg', 2023, 'Perangkat', 'Komputer', 'Baik', '2023-09-18', '13:30:00', 'Komputer (Monitor Wearnes, Mouse Wearnes, Keyboard Genius, CPU Lenovo)', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(524, 1, 1, 'Panasonic 2014-1.AIR.JB4', '-', '3c96.jpeg', 2014, 'Furnitur', 'Air_Conditioner', 'Baik', '2023-09-18', '13:51:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(525, 4, 1, 'CCTV 2023-4.CAM.JP1', '-', 'b24c.jpeg', 2023, 'Perangkat', 'Camera_CCTV', 'Baik', '2023-09-18', '14:37:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(526, 4, 2, 'CCTV 2023-4.CAM.JY5', '-', '26dc.jpeg', 2023, 'Perangkat', 'Camera_CCTV', 'Rusak', '2023-09-18', '14:38:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(527, 4, 3, 'CCTV 2023-4.CAM.ZM4', '-', '6bba.jpeg', 2023, 'Perangkat', 'Camera_CCTV', 'Rusak', '2023-09-18', '14:39:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(529, 4, 1, 'Kursi Dosen 2008-4.KUR.IH3', '-', 'e5bc.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-18', '14:52:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(530, 4, 1, 'Kursi Dosen 2008-4.KUR.TM9', '-', '62c4.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-18', '14:52:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(531, 1, 3, 'Lenovo 2021-1.KOM.DD8', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', '3854.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-09-18', '16:05:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(532, 1, 4, 'Lenovo 2021-1.KOM.YH8', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', 'e5c3.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-09-18', '16:06:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(533, 1, 4, 'Lenovo 2021-1.KOM.BP3', 'Intel ® CoreTM i7-10700T, 2.0GHz, RAM 8 GB, HDD 1,16 TB, All-in-one', 'fb4a.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-09-18', '16:07:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(534, 4, 3, 'CCTV 2023-4.CAM.YX0', '-', '7913.jpeg', 2023, 'Perangkat', 'Camera_CCTV', 'Rusak', '2023-09-18', '16:14:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(535, 4, 1, 'IKEA 2008-4.KUR.CA1', '-', '6bd9.jpeg', 2008, 'Furnitur', 'Kursi', 'Baik', '2023-09-18', '16:50:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-18', ''),
(537, 4, 3, 'Kursi Meja Hitam 2016-4.KUR.PA3', '-', '911d.jpeg', 2016, 'Furnitur', 'Kursi', 'Baik', '2023-09-20', '16:15:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-20', ''),
(538, 4, 3, 'Kursi Meja Biru 2006-4.KUR.UB4', '-', '632e.jpeg', 2006, 'Furnitur', 'Kursi', 'Baik', '2023-09-20', '16:20:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-20', ''),
(539, 4, 3, 'Kursi Meja Biru 2006-4.KUR.AQ5', '-', '60d1.jpeg', 2006, 'Furnitur', 'Kursi', 'Baik', '2023-09-20', '16:22:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-20', ''),
(540, 4, 3, 'Kursi Meja Biru 2006-4.KUR.YK7', '-', '7960.jpeg', 2006, 'Furnitur', 'Kursi', 'Baik', '2023-09-20', '16:23:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-20', ''),
(541, 4, 3, 'Lenovo 2021-4.KOM.ZA1', 'ThinkCentre V510z Intel Core I7-7700T, RAM 8 GB, HDD 1 TB, Win10Pro', '082d.jpeg', 2021, 'Perangkat', 'Komputer', 'Baik', '2023-09-22', '14:00:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-22', ''),
(543, 4, 2, 'Keyboard Wearnes 2015-4.KEY.QR6', '-', 'c802.jpeg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:41:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(544, 4, 2, 'Keyboard Wearnes 2015-4.KEY.IH3', '-', '78e3.jpeg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:44:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(545, 4, 2, 'Keyboard Wearnes 2015-4.KEY.XY7', '-', 'e830.jpeg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:46:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(546, 4, 2, 'Keyboard Wearnes 2015-4.KEY.PM9', '-', 'd7dd.jpeg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:46:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(547, 4, 2, 'Keyboard Wearnes 2015-4.KEY.RW4', '-', 'f722.jpeg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:47:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(548, 4, 2, 'Keyboard Wearnes 2015-4.KEY.TE2', '-', '7ef9.jpeg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:47:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(549, 4, 2, 'Keyboard Wearnes 2015-4.KEY.GU4', '-', '162a.jpeg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:48:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(550, 4, 2, 'Keyboard Wearnes 2015-4.KEY.KH1', '-', 'e3d3.jpeg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:48:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(551, 4, 2, 'Keyboard Wearnes 2015-4.KEY.BN2', '-', 'd709.jpeg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:49:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(552, 4, 2, 'Keyboard Wearnes 2015-4.KEY.FM5', '-', '0bc4.jpeg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:49:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(553, 4, 2, 'Keyboard Wearnes 2015-4.KEY.KP7', '-', '5bb9.jpeg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:50:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(554, 4, 2, 'Keyboard Wearnes 2015-4.KEY.ZA0', '-', 'b9f1.jpeg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:51:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(555, 4, 2, 'Mouse Wearnes 2015-4.MOU.LZ9', '-', 'b293.jpeg', 2015, 'Perangkat', 'Mouse', 'Rusak', '2023-09-25', '12:51:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(556, 4, 2, 'Mouse Wearnes 2015-4.MOU.IX2', '-', 'a73c.jpeg', 2015, 'Perangkat', 'Mouse', 'Rusak', '2023-09-25', '12:53:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(557, 4, 2, 'Mouse Acer 2015-4.MOU.ZW1', '-', 'da42.jpeg', 2015, 'Perangkat', 'Mouse', 'Rusak', '2023-09-25', '12:54:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(558, 4, 2, 'Mouse Acer 2015-4.MOU.AN5', '-', '73dc.jpeg', 2015, 'Perangkat', 'Mouse', 'Rusak', '2023-09-25', '12:55:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(559, 4, 2, 'Mouse Logitech 2015-4.MOU.RO5', '-', '1695621738Mouse Logitech.jpg', 2015, 'Perangkat', 'Mouse', 'Rusak', '2023-09-25', '12:56:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(560, 4, 2, 'Keyboard Lenovo 2015-4.KEY.IS3', '-', '1695621725Keyboard Lenovo.jpg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:57:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-25', ''),
(561, 4, 2, 'Keyboard Lenovo 2015-4.KEY.AW9', '-', '1695621712Keyboard Lenovo.jpg', 2015, 'Perangkat', 'Keyboard', 'Rusak', '2023-09-25', '12:58:00', '-', 'Indah Nirwana', 'Indah Nirwana', '2023-09-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id_file` smallint(4) NOT NULL,
  `kategori_dokumentasi` enum('Foto','Dokumen') NOT NULL,
  `nama_dokumentasi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `upload_dokumentasi` varchar(255) NOT NULL,
  `tgl_upload` date NOT NULL,
  `waktu_upload` time NOT NULL,
  `user_upload` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` tinyint(4) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Tarbiyah dan Keguruan'),
(2, 'Ushuluddin'),
(3, 'Psikologi'),
(4, 'Ekonomi dan Ilmu Sosial'),
(5, 'Pascasarjana'),
(6, 'Syariah dan Ilmu Hukum'),
(7, 'Dakwah dan Ilmu Komunikasi'),
(8, 'Sains dan Teknologi'),
(9, 'Pertanian dan Peternakan');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` tinyint(4) NOT NULL,
  `id_fakultas` tinyint(4) NOT NULL,
  `nama_gedung` varchar(100) NOT NULL,
  `deskripsi_gedung` text NOT NULL,
  `gambar_gedung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `id_fakultas`, `nama_gedung`, `deskripsi_gedung`, `gambar_gedung`) VALUES
(1, 9, 'Gedung Fakultas Sains dan Teknologi', 'Fakultas Sains dan Teknologi didirikan pada akhir tahun 2001 sebagai persiapan perubahan status dari Institut Agama Islam Negeri Sultan Syarif Qasim (IAIN SUSQA) Pekanbaru menjadi Universitas Islam Negeri Sultan Syarif Kasim Riau (UIN Suska) Riau. Cikal bakal berdirinya Fakultas Sains dan Teknologi bermula dibukanya Jurusan Teknik Informatika pada tahun 1999 dan jurusan Teknik Industri pada tahun 2001. Kedua jurusan tersebut berada di bawah naungan Fakultas Dakwah. Dengan adanya kedua jurusan tersebut, maka dibentuklah Fakultas Sains dan Teknologi. ', '1691725702Gedung FST.jpg'),
(2, 9, 'Gedung Laboratorium Fakultas Sains dan Teknologi', 'Gedung Laboratorium FST merupakan pusatnya mahasiswa melakukan praktikum atau penelitian terkait bidang studinya. Di dalam Laboratorium FST ini terdapat 16 ruang laboratorium, dengan luas rata-rata 50 m2, yang dilengkapi dengan AC, papan tulis, dan LCD projector, dan perangkat furniture. Setiap harinya laboratorium dapat digunakan untuk 4 shift praktikum, maka setiap minggu (6 hari) akan tersedia 360 shift, atau 8640 shift setiap semesternya. Saat ini, setiap semesternya, terdapat kurang lebih 1200 shift praktikum, sehingga laboratorium yang dimiliki sudah sangat mencukupi untuk menyelenggarakan praktikum.', '1691727823LAB FST.jpeg'),
(3, 9, 'Gedung Baru', 'Gedung Baru (GB) merupakan gedung tambahan untuk kegiatan perkuliahan yang terletak di sebelah gedung Fakultas Sains dan Teknologi. Gedung ini memiliki 3 lantai yang dipergunakan oleh 5 program studi yang ada di Fakultas Sains dan Teknologi serta 1 ruang laboratorium milik Fakultas Tarbiyah. Selain itu, gedung ini juga digunakan untuk kegiatan Seminar Proposal dan sidang Tugas Akhir mahasiswa. Selain digunakan untuk perkuliahan dan kegiatan Tugas Akhir mahasiswa, di gedung ini juga terdapat sekretariat ISNC Research yang merupakan salah satu pusat riset mahasiswa yang dikekola di bawah Program Studi Sistem Informasi. Kelebihan gedung ini memiliki area parkir yang luas yang di khususkan bagi seluruh mahasiswa Fakultas Sains dan Teknologi. ', '1691722348Gedung Baru.jpeg'),
(4, 9, 'Gedung Laboratorium Terpadu UIN Suska Riau', 'Gedung Laboratorium merupakan gedung baru yang ada di UIN Suska Riau yang digunakan sebagai laboratorium oleh beberapa fakultas. Ada tiga fakultas yang menggunakan gedung tersebut sebagai laboratorium dasar, diantaranya Fakultas Sains dan Teknologi (FST), Fakultas Tarbiyah dan Keguruan (FTK) dan Fakultas Pertanian dan Peternakan (FPP). Salah satu program studi yang memiliki laboratorium di gedung ini adalah Program Studi Sistem Informasi. Gedung laboratorium terpadu UIN Suska Riau sudah mulai digunakan sejak awal perkuliahan semester genap tahun ajaran 2021-2022.', '1692078838Gedung Lab Terpadu.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `keperluan` varchar(50) DEFAULT NULL,
  `id_pengunjung` int(11) DEFAULT NULL,
  `id_ruangan` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id_maintenance` smallint(4) NOT NULL,
  `id_barang` smallint(4) NOT NULL,
  `tgl_maintenance` datetime NOT NULL,
  `kategori_maintenance` enum('Perbaikan','Perawatan') NOT NULL,
  `biaya` varchar(50) NOT NULL,
  `deskripsi_maintenance` text NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status` enum('Selesai','Sedang_Proses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_barang`
--

CREATE TABLE `peminjaman_barang` (
  `id_peminjaman_barang` smallint(4) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_fakultas` tinyint(4) DEFAULT NULL,
  `id_prodi` tinyint(4) DEFAULT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `asal_peminjam` enum('Internal','Eksternal') NOT NULL,
  `organisasi` varchar(255) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `email_peminjam` varchar(255) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `bukti_peminjaman` varchar(255) DEFAULT NULL,
  `biaya_peminjaman` varchar(50) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_ruangan`
--

CREATE TABLE `peminjaman_ruangan` (
  `id_peminjaman_ruangan` smallint(4) NOT NULL,
  `id_fakultas` tinyint(4) DEFAULT NULL,
  `id_prodi` tinyint(4) DEFAULT NULL,
  `id_ruangan` tinyint(4) NOT NULL,
  `asal_peminjam` enum('Internal','Eksternal') DEFAULT NULL,
  `organisasi` varchar(255) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `email_peminjam` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `tgl_peminjaman` timestamp NULL DEFAULT current_timestamp(),
  `nik_ktp` varchar(100) NOT NULL,
  `lama_peminjaman` varchar(50) NOT NULL,
  `biaya_peminjaman` varchar(50) DEFAULT NULL,
  `bukti_peminjaman` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemusnahan_barang`
--

CREATE TABLE `pemusnahan_barang` (
  `id_musnah` smallint(4) NOT NULL,
  `id_barang` smallint(4) NOT NULL,
  `tgl_pemusnahan` date NOT NULL,
  `bukti_pemusnahan` varchar(255) NOT NULL,
  `waktu` time NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendanaan`
--

CREATE TABLE `pendanaan` (
  `id_pendanaan` smallint(4) NOT NULL,
  `jenis_pendanaan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendanaan`
--

INSERT INTO `pendanaan` (`id_pendanaan`, `jenis_pendanaan`, `keterangan`) VALUES
(1, 'POK Fakultas Sains dan Teknologi', 'Sumber Pendanaan dari POK Fakultas Sains dan Teknologi'),
(2, 'POK Program Studi Sistem Informasi', 'Sumber Pendanaan dari POK Program Studi Sistem Informasi'),
(3, 'Hibah', 'Dana Hibah'),
(4, 'UIN SUSKA', 'Sumber Pendanaan dari UIN SUSKA RIAU');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `nama_pengunjung` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `asal` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` tinyint(4) NOT NULL,
  `id_fakultas` tinyint(4) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`) VALUES
(1, 1, 'Pendidikan Agama Islam'),
(2, 1, 'Pendidikan Bahasa Arab'),
(3, 1, 'Jurusan Kependidikan Islam'),
(4, 1, 'Jurusan Pendidikan Bahasa Inggris'),
(5, 1, 'Pendidikan Matematika'),
(6, 1, 'Pendidikan Guru Madrasah Ibtidaiyah'),
(7, 1, 'Pendidikan Kimia'),
(8, 1, 'Pendidikan Bahasa Indonesia'),
(9, 1, 'Tadris IPA'),
(10, 1, 'Pendidikan Geografi'),
(11, 1, 'Pendidikan IPS Ekonomi'),
(12, 2, 'Jurusan Aqidah dan Filsafat'),
(13, 2, 'Jurusan Tafsir Hadits'),
(14, 2, 'Ilmu Hadis'),
(15, 2, 'Jurusan Perbandingan Agama'),
(16, 3, 'S1 Psikologi'),
(17, 3, 'S2 Psikologi'),
(18, 4, 'Manajemen S1'),
(19, 4, 'Administrasi Negara S1'),
(20, 4, 'Akuntansi S1'),
(21, 3, 'Diploma III Manajemen Perusahaan'),
(22, 4, 'Diploma III Akuntansi'),
(23, 4, 'Diploma III Administrasi Perpajakan'),
(24, 5, 'S2 Pendidikan Agama Islam (PAI)'),
(25, 5, 'S2 Manajemen Pendidikan Islam (MPI)'),
(26, 5, 'S2 Pendidikan Bahasa Arab (PBA)'),
(27, 5, 'S2 Pendidikan Bahasa Inggris (PBI)'),
(28, 5, 'S2 Hukum Islam (HI)'),
(29, 5, 'S2 Tafsir Hadis (TH)'),
(30, 5, 'S2 Ekonomi Islam (EI)'),
(31, 5, 'S3 Pendidikan Agama Islam (PAI)'),
(32, 5, 'S3 Hukum Islam (HI)'),
(33, 6, 'Ahwal Al-Syakhshiyyah'),
(34, 6, 'Jinayah Siyasah'),
(35, 6, 'Perbandingan Mazhab dan Hukum'),
(36, 6, 'Muammalah'),
(37, 6, 'Ekonomi Islam'),
(38, 6, 'Ilmu Hukum'),
(39, 6, 'DIII Perbankan Syariah'),
(40, 7, 'Ilmu Komunikasi'),
(41, 7, 'Pengembangan Masyarakat Islam'),
(42, 7, 'Manajemen Dakwah'),
(43, 7, 'Bimbingan dan Konseling Islam'),
(44, 8, 'Teknik Informatika'),
(45, 8, 'Sistem Informasi'),
(46, 8, 'Teknik Industri'),
(47, 8, 'Teknik Elektro'),
(48, 8, 'Matematika Terapan'),
(49, 9, 'Jurusan Peternakan'),
(50, 9, 'Jurusan Argoteknologi'),
(51, 9, 'Gizi');

-- --------------------------------------------------------

--
-- Table structure for table `referensi`
--

CREATE TABLE `referensi` (
  `id_referensi` smallint(4) NOT NULL,
  `biaya` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referensi`
--

INSERT INTO `referensi` (`id_referensi`, `biaya`) VALUES
(0, '100000');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` tinyint(4) NOT NULL,
  `id_gedung` tinyint(4) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL,
  `deskripsi_ruangan` text NOT NULL,
  `gambar_ruangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `id_gedung`, `nama_ruangan`, `deskripsi_ruangan`, `gambar_ruangan`) VALUES
(1, 2, 'Laboratorium Rekayasa Sistem Informasi', 'Laboratorium Rekayasa sistem Informasi atau yang disingkat dengan nama Laboratorium RSI merupakan laboratorium pertama yang dimiliki oleh Program Studi Sistem Informasi sejak pindahnya aktivitas perkuliahan kampus dari kampus Sukajadi ke kampus utama Panam Pekanbaru Riau pada tahun 2007. Fungsi utama dari laboratorium ini adalah sebagai fasilitas infrastruktur pendukung untuk pelaksanaan kegiatan perkuliahan praktikum bagi mahasiswa Program Studi Sistem Informasi terkait bidang Rekayasa Sistem Informasi. Bidang Rekayasa Sistem Informasi merupakan bidang yang paling dominan yang ada di Program Studi Sistem Informasi.', '1691726787LAB RSI.jpg'),
(2, 1, 'Laboratorium Internet', 'Laboratorium Internet atau yang disingkat dengan nama Laboratorium INT merupakan laboratorium milik Program Studi Sistem Informasi di bawah Fakultas Sains dan Teknologi kedua yang aktivitas perkuliahannya berada di kampus utama Panam Pekanbaru Riau. Secara spesifik, laboratorium ini lebih dioperasikan untuk kebutuhan perkuliahan terkait matakuliah praktikum dasar, seperti matakuliah Jaringan Komputer dan Pemrograman Dasar.', '1691726979LAB INTERNET.jpg'),
(3, 1, 'Laboratorium Software Engineering', 'Laboratorium ke tiga yang dimiliki oleh Program Studi Sistem Informasi adalah Laboratorium Software Engineering atau yang disingkat dengan nama Laboratorium SE. Laboratorium ini merupakan laboratorium terbaru milik yang dikelola oleh Program Studi dari usulan pengadaan barang tahun anggaran 2021 di bawah naungan Fakultas Sains dan Teknologi UIN Suska Riau. Adapun laboratorium SE sebagai pendukung dalam pelaksanaan kegiatan perkuliahan praktikum bagi mahasiswa Program Studi Sistem Informasi yang terkait dengan bidang keilmuan seperti Praktikum Basis Data, Pemrograman Beorientasi Objek (PBO), dan matakuliah wajib praktikum lainnya.', '1691727178LAB SE.jpg'),
(4, 1, 'Kantor Program Studi Sistem Informasi', 'Program Studi Sistem Informasi merupakan salah satu program studi yang ada di Fakultas Sains dan Teknologi UIN Suska Riau. Program Studi ini didirikan pada tahun 2002 sejalan dengan rencana untuk meningkatkan status IAIN menjadi Universitas Islam Negeri (UIN) Riau, yang saat ini telah terlaksana. Program Studi ini merupakan Program Studi ketiga yang didirikan di Fakultas Sains dan Teknologi setelah Teknik Informatika dan Teknik Industri. Saat ini Program Studi Sistem Informasi telah berusia 21 tahun sejak didirikan dan telah meluluskan ribuan alumni nya. ', '1691727106PRODI.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` smallint(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `no_identitas` varchar(50) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role_user` enum('Kalab','Admin','Kaprodi','Sekprodi','Peminjam','Aslab') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `foto`, `no_identitas`, `username`, `password_hash`, `email`, `role_user`) VALUES
(1, 'Hafiz Aryan Siregar', '0b2.jpeg', 'NIM. 12150310904', 'hafizaryan', '$2y$10$gwNIeBJ180XTB2o5qWAH1ubS985hZRWj70D4EyBTH9ZjqHrWOQCx.', 'hafizaryansiregar@gmail.com', 'Admin'),
(2, 'Tengku Khairil Ahsyar, S.Kom., M.Kom.', '97f.png', 'NIP. 198505202023211020', 'kalab', '$2y$10$/P0NdFUYFqBhfq8ChIFmTunNvVmIvMGQG/6pmHBc55OvTXEX63l9e', 'tengkukhairil@uin-suska.ac.id', 'Kalab'),
(3, 'Eki Saputra, S.Kom, M.Kom.', '31e.png', 'NIP. 198307162011011008', 'kaprodi', '$2y$10$msyrU6EkpFQ305hM242.HepUL7qU6ThpfGUMFcAlPUJmqkV1dJwjC', 'eki.saputra@uin-suska.ac.id', 'Kaprodi'),
(6, 'Siti Monalisa, S.T., M.Kom.', '2a7.png', 'NIP: 198502142015032004', 'sekprodi', '$2y$10$hgDAELdHNmvq6vm/s3aWH.k587a97Ycf2n5QLrSVr6gnextfEPpFC', 'monalisa_138@yahoo.com', 'Sekprodi'),
(7, 'Indah Nirwana', '45d.jpg', 'NIM. 12150320177', 'admin2', '$2y$10$bo9vBIBr2uiKzz7NeL8EZeeoTwMnDlxnRtSI9geRnF9AUNthW/Tp.', 'indahnirwana30@gmail.com', 'Aslab'),
(8, 'Nasya Amirah Melyani', '295.png', 'NIM. 12150323859', 'admin1', '$2y$10$jWhDpiz.GiB2C9JFqEBtmu2zPgoFTd15SOkKpMwTwnHXNVeJCS1YC', 'nasyaamirah30@gmail.com', 'Aslab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk_barang` (`id_pendanaan`),
  ADD KEY `fk_barang_ruangan` (`id_ruangan`);

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id_maintenance`),
  ADD KEY `fk_maintenance` (`id_barang`);

--
-- Indexes for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  ADD PRIMARY KEY (`id_peminjaman_barang`),
  ADD KEY `fk_peminjaman_barang` (`id_fakultas`),
  ADD KEY `fk_peminjaman_barang_prodi` (`id_prodi`);

--
-- Indexes for table `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  ADD PRIMARY KEY (`id_peminjaman_ruangan`),
  ADD KEY `fk_peminjaman_ruangan_prodi` (`id_prodi`),
  ADD KEY `fk_peminjaman_ruangan_ruangan` (`id_ruangan`),
  ADD KEY `fk_peminjaman_ruangan` (`id_fakultas`);

--
-- Indexes for table `pemusnahan_barang`
--
ALTER TABLE `pemusnahan_barang`
  ADD PRIMARY KEY (`id_musnah`),
  ADD KEY `fk_pemusnahan_barang` (`id_barang`);

--
-- Indexes for table `pendanaan`
--
ALTER TABLE `pendanaan`
  ADD PRIMARY KEY (`id_pendanaan`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `fk_prodi` (`id_fakultas`);

--
-- Indexes for table `referensi`
--
ALTER TABLE `referensi`
  ADD PRIMARY KEY (`id_referensi`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `fk_ruangan` (`id_gedung`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=563;

--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_file` smallint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id_maintenance` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  MODIFY `id_peminjaman_barang` smallint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  MODIFY `id_peminjaman_ruangan` smallint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemusnahan_barang`
--
ALTER TABLE `pemusnahan_barang`
  MODIFY `id_musnah` smallint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendanaan`
--
ALTER TABLE `pendanaan`
  MODIFY `id_pendanaan` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang` FOREIGN KEY (`id_pendanaan`) REFERENCES `pendanaan` (`id_pendanaan`),
  ADD CONSTRAINT `fk_barang_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `fk_maintenance` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  ADD CONSTRAINT `fk_peminjaman_barang` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`),
  ADD CONSTRAINT `fk_peminjaman_barang_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  ADD CONSTRAINT `fk_peminjaman_ruangan` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`),
  ADD CONSTRAINT `fk_peminjaman_ruangan_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `peminjaman_ruangan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Constraints for table `pemusnahan_barang`
--
ALTER TABLE `pemusnahan_barang`
  ADD CONSTRAINT `fk_pemusnahan_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `fk_prodi` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Constraints for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `fk_ruangan` FOREIGN KEY (`id_gedung`) REFERENCES `gedung` (`id_gedung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
