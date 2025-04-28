-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 11:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlynhansu`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `maNV` varchar(10) NOT NULL,
  `hoTen` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ngaySinh` date DEFAULT NULL,
  `gioiTinh` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `diaChi` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `soDienThoai` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `donViTrucThuoc` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `chucVu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ngayVaoLam` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`maNV`, `hoTen`, `ngaySinh`, `gioiTinh`, `diaChi`, `soDienThoai`, `email`, `donViTrucThuoc`, `chucVu`, `ngayVaoLam`) VALUES
('NV001', 'Nguyễn Văn An', '1990-05-15', 'Nam', '123 Đường Láng, Hà Nội', '0912345678', 'an.nguyen@email.com', 'Khoa KT & CN', 'Giảng viên', '2015-03-01'),
('NV002', 'Trần Thị Bình', '1988-12-20', 'Nữ', '45 Nguyễn Huệ, TP.HCM', '0987654321', 'binh.tran@email.com', 'Khoa Sư phạm', 'Trưởng khoa', '2013-07-15'),
('NV003', 'Lê Minh Châu', '1995-03-10', 'Nam', '78 Lê Lợi, Đà Nẵng', '0935123456', 'chau.le@email.com', 'Khoa NN & TS', 'Nhân viên', '2020-01-10'),
('NV004', 'Phạm Thị Duyên', '1992-07-25', 'Nữ', '56 Trần Phú, Nha Trang', '0908765432', 'duyen.pham@email.com', 'Khoa Kinh tế và luật', 'Kế toán', '2018-09-20'),
('NV005', 'Hoàng Văn Em', '1985-11-30', 'Nam', '101 Phạm Ngũ Lão, Hà Nội', '0971234567', 'em.hoang@email.com', 'Khoa KT & CN', 'Phó khoa', '2010-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `quanlytienluong`
--

CREATE TABLE `quanlytienluong` (
  `maLuong` int(11) NOT NULL,
  `maNV` varchar(10) DEFAULT NULL,
  `luongCoBan` decimal(15,2) NOT NULL,
  `tienThuong` decimal(15,2) DEFAULT 0.00,
  `thangLuong` int(11) NOT NULL,
  `namLuong` int(11) NOT NULL,
  `ghiChu` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quanlytienluong`
--

INSERT INTO `quanlytienluong` (`maLuong`, `maNV`, `luongCoBan`, `tienThuong`, `thangLuong`, `namLuong`, `ghiChu`) VALUES
(1, 'NV001', 15000000.00, 2000000.00, 4, 2025, 'Thưởng hiệu suất tốt'),
(2, 'NV001', 15000000.00, 1000000.00, 3, 2025, 'Thưởng dự án'),
(3, 'NV002', 20000000.00, 3000000.00, 4, 2025, 'Thưởng lãnh đạo xuất sắc'),
(4, 'NV003', 10000000.00, 500000.00, 4, 2025, 'Thưởng hoàn thành công việc'),
(5, 'NV004', 12000000.00, 1500000.00, 4, 2025, 'Thưởng báo cáo tài chính'),
(6, 'NV005', 18000000.00, 2500000.00, 4, 2025, 'Thưởng đóng góp lâu năm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`maNV`);

--
-- Indexes for table `quanlytienluong`
--
ALTER TABLE `quanlytienluong`
  ADD PRIMARY KEY (`maLuong`),
  ADD KEY `maNV` (`maNV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quanlytienluong`
--
ALTER TABLE `quanlytienluong`
  MODIFY `maLuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quanlytienluong`
--
ALTER TABLE `quanlytienluong`
  ADD CONSTRAINT `quanlytienluong_ibfk_1` FOREIGN KEY (`maNV`) REFERENCES `nhanvien` (`maNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
