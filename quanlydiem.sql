-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 15, 2019 lúc 09:37 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydiem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `day`
--

CREATE TABLE `day` (
  `MaDayHoc` int(5) NOT NULL,
  `MaMonHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MaGV` int(6) NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocKy` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MoTaPhanCong` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `day`
--

INSERT INTO `day` (`MaDayHoc`, `MaMonHoc`, `MaGV`, `MaLopHoc`, `MaHocKy`, `MoTaPhanCong`) VALUES
(1, 'A', 1, '1', '20191', 'Dạy lớp 9A2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `MaDiem` int(6) NOT NULL,
  `MaHocKy` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MaHS` int(6) NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DiemMieng` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Diem15Phut1` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Diem15Phut2` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Diem1Tiet1` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Diem1Tiet2` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `DiemThi` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `DiemTB` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`MaDiem`, `MaHocKy`, `MaMonHoc`, `MaHS`, `MaLopHoc`, `DiemMieng`, `Diem15Phut1`, `Diem15Phut2`, `Diem1Tiet1`, `Diem1Tiet2`, `DiemThi`, `DiemTB`) VALUES
(1, '20191', 'A', 210001, '1', '8', '9.5', '7.5', '8', '9.25', '8.75', 8.6),
(2, '20191', 'CN', 210001, '1', '9', '8.5', '7', '8', '6.5', '7', 7.5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `MaGV` int(6) NOT NULL,
  `MaMonHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenGV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `gv_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gv_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`MaGV`, `MaMonHoc`, `TenGV`, `DiaChi`, `SDT`, `gv_mail`, `gv_pass`) VALUES
(1, 'A', 'Trần Thị Hảo', 'Yên Dũng - Bắc Giang', '0976404956', 'gv.hao@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'GD', 'Đào Xuân Thanh', 'Xuân Mai - Hà Nội', '0976454151', 'gv.thanh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Ti', 'Trương Bá Nghĩa', 'Long Biên - Hà Nội', '0363602696', 'gv.nghia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocky`
--

CREATE TABLE `hocky` (
  `MaHocKy` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenHocKy` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `HeSoHK` int(1) NOT NULL,
  `NamHoc` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocky`
--

INSERT INTO `hocky` (`MaHocKy`, `TenHocKy`, `HeSoHK`, `NamHoc`) VALUES
('20191', 'Hoc Ky I', 1, '19-20'),
('20192', 'Hoc Ky II', 2, '19-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `MaHS` int(6) NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenHS` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `NoiSinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DanToc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenCha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenMe` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocsinh`
--

INSERT INTO `hocsinh` (`MaHS`, `MaLopHoc`, `TenHS`, `GioiTinh`, `NgaySinh`, `NoiSinh`, `DanToc`, `HoTenCha`, `HoTenMe`) VALUES
(210001, '1', 'Trương Bá Nghĩa', 'Nam', '1997-09-11', 'Hà Nội', 'Kinh', 'Trương Bá', 'Lưu Thị'),
(210002, '1', 'Trần Thị Hảo', 'Nữ', '1997-10-05', 'Bắc Giang', 'Kinh', 'Trần', 'Nguyễn'),
(210003, '2', 'Đào Xuân Thanh', 'Nam', '1997-09-05', 'Hà Nội', 'Kinh', 'Đào', 'Nguyễn'),
(210004, '2', 'Trương Bá Nghĩa', 'Nam', '1997-04-11', 'Hà Nội', 'Kinh', 'ABC', 'ABC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Tenlophoc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `KhoiHoc` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`MaLopHoc`, `Tenlophoc`, `KhoiHoc`) VALUES
('1', '9A2', '9'),
('2', '9A1', '9');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMonHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenMonHoc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoTiet` int(20) NOT NULL,
  `HeSoMonHoc` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`MaMonHoc`, `TenMonHoc`, `SoTiet`, `HeSoMonHoc`) VALUES
('A', 'Tiếng Anh', 105, 1),
('CN', 'Công Nghệ', 52, 1),
('GD', 'Giáo Dục Công Dân', 35, 1),
('H', 'Hóa Học', 70, 1),
('S', 'Lịch Sử', 105, 1),
('T', 'Toán', 140, 2),
('Ti', 'Tin Học', 35, 1),
('V', 'Văn', 140, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass_forgot` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_mail`, `user_pass`, `pass_forgot`, `user_level`) VALUES
(4, 'Trương Bá Nghĩa', 'nghia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 1),
(6, 'Trần Thị Hảo', 'hao@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 2),
(7, 'Đào Xuân Thanh', 'thanh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 2),
(8, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 1),
(9, 'test', 'test@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '1234567', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`MaDayHoc`),
  ADD KEY `fk_day_monhoc` (`MaMonHoc`),
  ADD KEY `fk_day_gv` (`MaGV`),
  ADD KEY `fk_day_hocky` (`MaHocKy`),
  ADD KEY `fk_day_lophoc` (`MaLopHoc`);

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`MaDiem`),
  ADD KEY `fk_diem_mahk` (`MaHocKy`),
  ADD KEY `fk_diem_monhoc` (`MaMonHoc`),
  ADD KEY `fk_diem_hocsinh` (`MaHS`),
  ADD KEY `MaLopHoc` (`MaLopHoc`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`MaGV`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD KEY `fk_gv_mh` (`MaMonHoc`);

--
-- Chỉ mục cho bảng `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`MaHocKy`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`MaHS`),
  ADD KEY `fk_hs_lh` (`MaLopHoc`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`MaLopHoc`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMonHoc`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `day`
--
ALTER TABLE `day`
  MODIFY `MaDayHoc` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `MaDiem` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `day`
--
ALTER TABLE `day`
  ADD CONSTRAINT `fk_day_gv` FOREIGN KEY (`MaGV`) REFERENCES `giaovien` (`MaGV`),
  ADD CONSTRAINT `fk_day_hocky` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`),
  ADD CONSTRAINT `fk_day_lophoc` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  ADD CONSTRAINT `fk_day_monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`);

--
-- Các ràng buộc cho bảng `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  ADD CONSTRAINT `fk_diem_hocsinh` FOREIGN KEY (`MaHS`) REFERENCES `hocsinh` (`MaHS`),
  ADD CONSTRAINT `fk_diem_mahk` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`),
  ADD CONSTRAINT `fk_diem_monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`);

--
-- Các ràng buộc cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD CONSTRAINT `fk_gv_mh` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`);

--
-- Các ràng buộc cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `fk_hs_lh` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
