-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 06:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlttn`
--

-- --------------------------------------------------------

--
-- Table structure for table `bailam`
--

CREATE TABLE `bailam` (
  `maTaiKhoan` varchar(255) NOT NULL,
  `maDe` varchar(255) NOT NULL,
  `diem` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bode`
--

CREATE TABLE `bode` (
  `maDe` int(255) NOT NULL,
  `tenDe` varchar(255) NOT NULL,
  `maLop` varchar(255) NOT NULL,
  `thoiGianLamBai` int(11) NOT NULL,
  `ngayThi` datetime NOT NULL,
  `daoCauHoi` varchar(11) NOT NULL,
  `xemDiem` varchar(255) NOT NULL,
  `xemDapAn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `bode`
--
DELIMITER $$
CREATE TRIGGER `xóa bài làm` AFTER DELETE ON `bode` FOR EACH ROW DELETE FROM bailam WHERE bailam.maDe not IN (SELECT maDe from bode )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `xóa chi tiết bài làm` AFTER DELETE ON `bode` FOR EACH ROW DELETE FROM chitietbailam WHERE chitietbailam.maDe not IN (SELECT maDe from bode )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `xóa chi tiết bộ đề` AFTER DELETE ON `bode` FOR EACH ROW DELETE FROM chitietbode WHERE chitietbode.maBoDe not IN (SELECT maDe from bode )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cauhoi_nganhang`
--

CREATE TABLE `cauhoi_nganhang` (
  `maCau` int(11) NOT NULL,
  `maNhom` varchar(255) DEFAULT NULL,
  `noiDung` varchar(255) DEFAULT NULL,
  `dapAn` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cauhoi_nganhang`
--

INSERT INTO `cauhoi_nganhang` (`maCau`, `maNhom`, `noiDung`, `dapAn`) VALUES
(12001, '42001', 'Phương pháp nhanh nhất để trao đổi dữ liệu giữa các tiến trình là:', 'a'),
(12002, '42001', 'Hai chức năng chính của hệ điều hành là gì?', 'c'),
(12003, '42003', 'Mô hình chức năng của hệ thống (BFD) cho biết?', 'a'),
(12004, '42003', 'Loại biểu đồ nhằm diễn tả một quá trình xử lý thông tin ở mức logic, nhằm trả lời câu hỏi \"Làm gì?\" mà bỏ qua câu hỏi là \"Làm như thế nào\"… là?', 'b'),
(12005, '42003', 'Trong phát triển phần mềm, yếu tố nào quan trọng nhất?', 'a'),
(12006, '42003', 'Kỹ sư phần mềm không cần', 'c'),
(12007, '42004', 'Nguyên nhân cơ bản nào dẫn đến sự  ra đời của mạng máy tính', 'd'),
(12008, '42004', 'Ý nghĩa cơ bản nhất của mạng máy tính là gì?', 'b'),
(12009, '42005', 'Một biến được gọi là biến toàn cục nếu:', 'b'),
(12010, '42005', 'Một biến được gọi là một biến địa phương nếu:', 'a');

--
-- Triggers `cauhoi_nganhang`
--
DELIMITER $$
CREATE TRIGGER `question` AFTER DELETE ON `cauhoi_nganhang` FOR EACH ROW DELETE FROM luachon WHERE maCau not IN (SELECT maCau from cauhoi_nganhang )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chitietbailam`
--

CREATE TABLE `chitietbailam` (
  `maTaiKhoan` varchar(255) NOT NULL,
  `maCau` varchar(255) NOT NULL,
  `maDe` varchar(255) NOT NULL,
  `dapAnChon` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chitietbode`
--

CREATE TABLE `chitietbode` (
  `maCau` varchar(255) NOT NULL,
  `maBoDe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chitietlop`
--

CREATE TABLE `chitietlop` (
  `maLop` varchar(255) NOT NULL,
  `maTaiKhoan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietlop`
--

INSERT INTO `chitietlop` (`maLop`, `maTaiKhoan`) VALUES
('8b0xJP5c', 'sv11@gmail.com'),
('8b0xJP5c', 'sv123@gmail.com'),
('8b0xJP5c', 'sv12@gmail.com'),
('8b0xJP5c', 'sv2@gmail.com'),
('8b0xJP5c', 'sv3@gmail.com'),
('8b0xJP5c', 'sv4@gmail.com'),
('8b0xJP5c', 'sv5@gmail.com'),
('8b0xJP5c', 'sv6@gmail.com'),
('8b0xJP5c', 'sv7@gmail.com'),
('8b0xJP5c', 'sv8@gmail.com'),
('8b0xJP5c', 'sv9@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loaitaikhoai`
--

CREATE TABLE `loaitaikhoai` (
  `maLoai` varchar(255) NOT NULL,
  `tenLoai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `maLop` varchar(255) NOT NULL,
  `tenLop` varchar(255) DEFAULT NULL,
  `ThongTin` varchar(255) NOT NULL,
  `maGiangVien` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`maLop`, `tenLop`, `ThongTin`, `maGiangVien`) VALUES
('8b0xJP5c', 'Lớp 2', 'Lớp 2', 'nguyntrung291@gmail.com');

--
-- Triggers `lop`
--
DELIMITER $$
CREATE TRIGGER `test` AFTER DELETE ON `lop` FOR EACH ROW DELETE FROM chitietlop WHERE maLop not IN (SELECT maLop from lop )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `luachon`
--

CREATE TABLE `luachon` (
  `maLuaChon` varchar(255) NOT NULL,
  `maCau` varchar(255) NOT NULL,
  `noiDung` varchar(255) DEFAULT NULL,
  `laDapAn` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `luachon`
--

INSERT INTO `luachon` (`maLuaChon`, `maCau`, `noiDung`, `laDapAn`) VALUES
('a', '12001', 'A.Vùng nhớ chia sẽ', 1),
('a', '12002', 'A.Quản lý; phân phối tài nguyên đảm bảo đồng nhất dữ liệu', 0),
('a', '12003', 'A.Hệ thống thực hiện những công việc gì?', 1),
('a', '12004', 'A. Biểu đồ phân tích', 0),
('a', '12005', 'A. Con người.', 1),
('a', '12006', 'A. Kiến thức về phân tích thiết kế hệ thống.', 0),
('a', '12007', 'A. Nhu cầu trao đổi thông tin ngày càng tăng', 0),
('a', '12008', 'A. Nâng cao độ tin cậy của hệ thống máy tính', 0),
('a', '12009', 'A. Nó được khai báo tất cả các hàm, ngoại trừ hàm main ().', 0),
('a', '12010', 'A. Nó được khai báo bên trong các hàm hoặc thủ tục, kể cả hàm main ().', 1),
('b', '12001', 'B. Trao đổi thông điệp', 0),
('b', '12002', 'B.Quản lý; chia sẻ tài nguyên', 0),
('b', '12003', 'B.Mô hình dữ liệu của hệ thống?', 0),
('b', '12004', 'B. Biểu đồ luồng dữ liệu ', 1),
('b', '12005', 'B. Quy trình', 0),
('b', '12006', 'B. Kiến thức về cơ sở dữ liệu.', 0),
('b', '12007', 'B. Khối lượng thông tin lưu trên máy tính ngày càng tăng', 0),
('b', '12008', 'B. Trao đổi và chia sẻ thông tin', 1),
('b', '12009', 'B. Nó được khai báo ngoài tất cả các hàm kể cả hàm main ().', 1),
('b', '12010', 'B. Nó đươc khai báo bên trong các hàm ngoại trừ hàm main ().', 0),
('c', '12001', 'C. Pipe', 0),
('c', '12002', 'C.Quản lý; chia sẻ tài nguyên; giả lập một máy tính mở rộng', 1),
('c', '12003', 'C.Qúa trình xử lý của hệ thống?', 0),
('c', '12004', 'C. Biểu đồ tổng quát', 0),
('c', '12005', 'C. Sản phầm.', 0),
('c', '12006', 'C. Lập trình thành thạo bằng một ngôn ngữ lập trình. ', 1),
('c', '12007', 'C. Khoa học và công nghệ về lĩnh vực máy tính và truyền thông phát triển', 0),
('c', '12008', 'C. Phát triển ứng dụng trên máy tính ', 0),
('c', '12009', 'C. Nó được khai báo bên ngoài hàm main ().', 0),
('c', '12010', 'C. Nó được khai báo bên trong hàm main ().', 0),
('d', '12001', 'D. Sockets', 0),
('d', '12002', 'D.Che dấu các chi tiết phần cứng; cung cấp một máy tính mở rộng', 0),
('d', '12003', 'D.Lựa chọn khác', 0),
('d', '12004', 'D. Biểu đồ thực thể kết hợp', 0),
('d', '12005', 'D. Thời gian.', 0),
('d', '12006', 'D. Kinh nghiệm quản lý dự án phần mềm.', 0),
('d', '12007', 'D. Cả ba câu trên đúng', 1),
('d', '12008', 'D. Nâng cao chất lượng khai thác thông tin', 0),
('d', '12009', 'D.  Nó được khai báo bên trong hàm main ().', 0),
('d', '12010', 'D. Nó được khai báo bên ngoài các hàm kể cả hàm main ().', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhomcauhoi`
--

CREATE TABLE `nhomcauhoi` (
  `maNhomCauHoi` int(11) NOT NULL,
  `tenNhomCauHoi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhomcauhoi`
--

INSERT INTO `nhomcauhoi` (`maNhomCauHoi`, `tenNhomCauHoi`) VALUES
(42001, 'Hệ điều hành'),
(42003, 'Phân tích thiết kế hệ thống thông tin'),
(42004, 'Công nghệ phần mềm'),
(42005, 'Mạng máy tính'),
(42006, 'Kỹ thuật lập trình'),
(42013, 'tesst');

--
-- Triggers `nhomcauhoi`
--
DELIMITER $$
CREATE TRIGGER `QuestionGroup` AFTER DELETE ON `nhomcauhoi` FOR EACH ROW DELETE FROM cauhoi_nganhang WHERE cauhoi_nganhang.maNhom not in (SELECT maNhomCauHoi FROM nhomcauhoi)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `loaiTk` varchar(255) DEFAULT NULL,
  `hoten` varchar(255) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `sdt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`mail`, `password`, `loaiTk`, `hoten`, `ngaysinh`, `sdt`) VALUES
('abc123@gmail.com', '11111111', 'gv', 'Thành Trung', '2022-05-03', '0774112237'),
('abc@gmail.com', '12345678', 'gv', 'abc', '2022-05-10', '0909626952'),
('admin@gmail.com', '12345678', 'admin', 'admin', NULL, NULL),
('hocsinh1@gmail.com', '11111111', 'sv', 'Nguyễn Thành trung', '2022-04-26', '0774112237'),
('nguyntrung222291@gmail.com', '11111111', 'gv', 'Thành Trung', '2022-04-05', '0774112237'),
('nguyntrung291@gmail.com', '11111111', 'gv', 'trung', '2022-03-28', '0774112237'),
('nguyntrung2922322231@gmail.com', '11111111', 'sv', 'trung', '2022-04-09', '0774112237'),
('nguyntrung2922331@gmail.com', '11111111', 'sv', 'trung', '2022-04-09', '0774112237'),
('nguyntrung2rrrrr91@gmail.com', '11111111', 'sv', 'ẻgerge', '2022-04-13', '0774112237'),
('nguyntrung@gmail.com', '11111111', 'sv', 'trung', '2022-04-12', '0774112237'),
('sv10@gmail.com', '11111111', 'sv', 'sv10', '2022-04-21', '0774112237'),
('sv11@gmail.com', '11111111', 'sv', 'sv11', '2022-04-21', '0774112237'),
('sv123@gmail.com', '11111111', 'sv', 'Thành Trung', '2022-05-10', '0774112237'),
('sv12@gmail.com', '11111111', 'sv', 'sv12', '2022-04-21', '0774112237'),
('sv1@gmail.com', '11111111', 'sv', 'sv1', '2022-04-21', '0774112237'),
('sv2@gmail.com', '11111111', 'sv', 'sv2', '2022-04-21', '0774112237'),
('sv3@gmail.com', '11111111', 'sv', 'sv3', '2022-04-21', '0774112237'),
('sv4@gmail.com', '11111111', 'sv', 'sv4', '2022-04-21', '0774112237'),
('sv5@gmail.com', '11111111', 'sv', 'sv5', '2022-04-21', '0774112237'),
('sv6@gmail.com', '11111111', 'sv', 'sv6', '2022-04-21', '0774112237'),
('sv7@gmail.com', '11111111', 'sv', 'sv7', '2022-04-21', '0774112237'),
('sv8@gmail.com', '11111111', 'sv', 'sv8', '2022-04-21', '0774112237'),
('sv9@gmail.com', '11111111', 'sv', 'sv9', '2022-04-21', '0774112237');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bailam`
--
ALTER TABLE `bailam`
  ADD PRIMARY KEY (`maTaiKhoan`,`maDe`);

--
-- Indexes for table `bode`
--
ALTER TABLE `bode`
  ADD PRIMARY KEY (`maDe`);

--
-- Indexes for table `cauhoi_nganhang`
--
ALTER TABLE `cauhoi_nganhang`
  ADD PRIMARY KEY (`maCau`);

--
-- Indexes for table `chitietbailam`
--
ALTER TABLE `chitietbailam`
  ADD PRIMARY KEY (`maTaiKhoan`,`maCau`,`maDe`);

--
-- Indexes for table `chitietlop`
--
ALTER TABLE `chitietlop`
  ADD PRIMARY KEY (`maTaiKhoan`,`maLop`) USING BTREE;

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`maLop`);

--
-- Indexes for table `luachon`
--
ALTER TABLE `luachon`
  ADD PRIMARY KEY (`maLuaChon`,`maCau`);

--
-- Indexes for table `nhomcauhoi`
--
ALTER TABLE `nhomcauhoi`
  ADD PRIMARY KEY (`maNhomCauHoi`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bode`
--
ALTER TABLE `bode`
  MODIFY `maDe` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54032;

--
-- AUTO_INCREMENT for table `cauhoi_nganhang`
--
ALTER TABLE `cauhoi_nganhang`
  MODIFY `maCau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12029;

--
-- AUTO_INCREMENT for table `nhomcauhoi`
--
ALTER TABLE `nhomcauhoi`
  MODIFY `maNhomCauHoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42015;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
