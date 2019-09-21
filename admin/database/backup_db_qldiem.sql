DROP TABLE user;

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass_forgot` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(2) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO user VALUES("4","Trương Bá Nghĩa","nghia@gmail.com","e10adc3949ba59abbe56e057f20f883e","123456","1");
INSERT INTO user VALUES("6","Trần Thị Hảo","hao@gmail.com","e10adc3949ba59abbe56e057f20f883e","123456","2");
INSERT INTO user VALUES("7","Đào Xuân Thanh","thanh@gmail.com","e10adc3949ba59abbe56e057f20f883e","123456","2");
INSERT INTO user VALUES("8","admin","admin@gmail.com","e10adc3949ba59abbe56e057f20f883e","123456","1");
INSERT INTO user VALUES("9","test","test@gmail.com","fcea920f7412b5da7be0cf42b8c93759","1234567","2");



DROP TABLE hocsinh;

CREATE TABLE `hocsinh` (
  `MaHS` int(6) NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenHS` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `NoiSinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DanToc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenCha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenMe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaHS`),
  KEY `fk_hs_lh` (`MaLopHoc`),
  CONSTRAINT `fk_hs_lh` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO hocsinh VALUES("210001","1","Trương Bá Nghĩa","Nam","1997-09-11","Hà Nội","Kinh","Trương Bá","Lưu Thị");
INSERT INTO hocsinh VALUES("210002","1","Trần Thị Hảo","Nữ","1997-10-05","Bắc Giang","Kinh","Trần","Nguyễn");
INSERT INTO hocsinh VALUES("210003","2","Đào Xuân Thanh","Nam","1997-09-05","Hà Nội","Kinh","Đào","Nguyễn");
INSERT INTO hocsinh VALUES("210004","2","Trương Bá Nghĩa","Nam","1997-04-11","Hà Nội","Kinh","ABC","ABC");
INSERT INTO hocsinh VALUES("210005","1","Nguyễn Văn A","Nam","1997-04-11","Hà Nội","Kinh","Nguyễn","Nguyễn");
INSERT INTO hocsinh VALUES("210006","3","Chu Thị Trúc","Nữ","1997-06-11","Hà Nội","Kinh","Chu","Nguyễn");



DROP TABLE giaovien;

CREATE TABLE `giaovien` (
  `MaGV` int(6) NOT NULL,
  `MaMonHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenGV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `gv_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gv_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaGV`),
  UNIQUE KEY `SDT` (`SDT`),
  KEY `fk_gv_mh` (`MaMonHoc`),
  CONSTRAINT `fk_gv_mh` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO giaovien VALUES("1","A","Trần Thị Hảo","Yên Dũng - Bắc Giang","0976404956","gv.hao@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("2","GD","Đào Xuân Thanh","Xuân Mai - Hà Nội","0976454151","gv.thanh@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("3","Ti","Trương Bá Nghĩa","Long Biên - Hà Nội","0363602696","gv.nghia@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("4","A","Giáo Viên A","Trâu Quỳ","0754545412","gv.a@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("5","CN","Nguyễn Văn B","Hưng Yên","0976454512","gv.b@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("6","H","Nguyễn Văn C","Thái Bình","0123456789","gv.c@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("7","S","Nguyễn Thị D","Hà Nội","0123456879","gv.d@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("8","V","Phan Văn Tuấn","Nghệ An","0123546789","gv.tuan@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("9","T","Cù Trọng Xoay","Việt Nam","0123454545","gv.xoay@gmail.com","e10adc3949ba59abbe56e057f20f883e");



DROP TABLE lophoc;

CREATE TABLE `lophoc` (
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Tenlophoc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `KhoiHoc` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`MaLopHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO lophoc VALUES("1","9A2","9");
INSERT INTO lophoc VALUES("2","9A1","9");
INSERT INTO lophoc VALUES("3","9A3","9");



DROP TABLE monhoc;

CREATE TABLE `monhoc` (
  `MaMonHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenMonHoc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoTiet` int(20) NOT NULL,
  `HeSoMonHoc` int(1) NOT NULL,
  PRIMARY KEY (`MaMonHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO monhoc VALUES("A","Tiếng Anh","105","1");
INSERT INTO monhoc VALUES("CN","Công Nghệ","52","1");
INSERT INTO monhoc VALUES("GD","Giáo Dục Công Dân","35","1");
INSERT INTO monhoc VALUES("H","Hóa Học","70","1");
INSERT INTO monhoc VALUES("S","Lịch Sử","105","1");
INSERT INTO monhoc VALUES("T","Toán","140","2");
INSERT INTO monhoc VALUES("Ti","Tin Học","35","1");
INSERT INTO monhoc VALUES("V","Văn","140","2");



DROP TABLE hocky;

CREATE TABLE `hocky` (
  `MaHocKy` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenHocKy` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `HeSoHK` int(1) NOT NULL,
  `NamHoc` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaHocKy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO hocky VALUES("20191","Hoc Ky I","1","19-20");
INSERT INTO hocky VALUES("20192","Hoc Ky II","2","19-20");



DROP TABLE diem;

CREATE TABLE `diem` (
  `MaDiem` int(6) NOT NULL AUTO_INCREMENT,
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
  `DiemTB` float NOT NULL,
  PRIMARY KEY (`MaDiem`),
  KEY `fk_diem_mahk` (`MaHocKy`),
  KEY `fk_diem_monhoc` (`MaMonHoc`),
  KEY `fk_diem_hocsinh` (`MaHS`),
  KEY `MaLopHoc` (`MaLopHoc`),
  CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  CONSTRAINT `fk_diem_hocsinh` FOREIGN KEY (`MaHS`) REFERENCES `hocsinh` (`MaHS`),
  CONSTRAINT `fk_diem_mahk` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`),
  CONSTRAINT `fk_diem_monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO diem VALUES("39","20191","CN","210003","2","5","5","5","5","5","5","5");
INSERT INTO diem VALUES("40","20191","CN","210004","2","5","5","5","5","5","5","5");



DROP TABLE dayhoc;

CREATE TABLE `dayhoc` (
  `MaDayHoc` int(5) NOT NULL AUTO_INCREMENT,
  `MaMonHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MaGV` int(6) NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocKy` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MoTaPhanCong` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaDayHoc`),
  KEY `fk_day_monhoc` (`MaMonHoc`),
  KEY `fk_day_gv` (`MaGV`),
  KEY `fk_day_hocky` (`MaHocKy`),
  KEY `fk_day_lophoc` (`MaLopHoc`),
  CONSTRAINT `fk_day_gv` FOREIGN KEY (`MaGV`) REFERENCES `giaovien` (`MaGV`),
  CONSTRAINT `fk_day_hocky` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`),
  CONSTRAINT `fk_day_lophoc` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  CONSTRAINT `fk_day_monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO dayhoc VALUES("1","A","4","2","20191","DEC");
INSERT INTO dayhoc VALUES("2","GD","2","1","20191","ádsad");
INSERT INTO dayhoc VALUES("3","Ti","3","1","20191","Nghĩa");
INSERT INTO dayhoc VALUES("4","CN","5","2","20191","abc");
INSERT INTO dayhoc VALUES("5","H","6","1","20191","ád");
INSERT INTO dayhoc VALUES("6","S","7","1","20191","ád");
INSERT INTO dayhoc VALUES("7","T","9","1","20191","Giáo sư");
INSERT INTO dayhoc VALUES("8","V","8","1","20191","abc");
INSERT INTO dayhoc VALUES("14","A","4","1","20191","ABC");



DROP TABLE dayhoc;

CREATE TABLE `dayhoc` (
  `MaDayHoc` int(5) NOT NULL AUTO_INCREMENT,
  `MaMonHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MaGV` int(6) NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocKy` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MoTaPhanCong` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaDayHoc`),
  KEY `fk_day_monhoc` (`MaMonHoc`),
  KEY `fk_day_gv` (`MaGV`),
  KEY `fk_day_hocky` (`MaHocKy`),
  KEY `fk_day_lophoc` (`MaLopHoc`),
  CONSTRAINT `fk_day_gv` FOREIGN KEY (`MaGV`) REFERENCES `giaovien` (`MaGV`),
  CONSTRAINT `fk_day_hocky` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`),
  CONSTRAINT `fk_day_lophoc` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  CONSTRAINT `fk_day_monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO dayhoc VALUES("1","A","4","2","20191","DEC");
INSERT INTO dayhoc VALUES("2","GD","2","1","20191","ádsad");
INSERT INTO dayhoc VALUES("3","Ti","3","1","20191","Nghĩa");
INSERT INTO dayhoc VALUES("4","CN","5","2","20191","abc");
INSERT INTO dayhoc VALUES("5","H","6","1","20191","ád");
INSERT INTO dayhoc VALUES("6","S","7","1","20191","ád");
INSERT INTO dayhoc VALUES("7","T","9","1","20191","Giáo sư");
INSERT INTO dayhoc VALUES("8","V","8","1","20191","abc");
INSERT INTO dayhoc VALUES("14","A","4","1","20191","ABC");



DROP TABLE diem;

CREATE TABLE `diem` (
  `MaDiem` int(6) NOT NULL AUTO_INCREMENT,
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
  `DiemTB` float NOT NULL,
  PRIMARY KEY (`MaDiem`),
  KEY `fk_diem_mahk` (`MaHocKy`),
  KEY `fk_diem_monhoc` (`MaMonHoc`),
  KEY `fk_diem_hocsinh` (`MaHS`),
  KEY `MaLopHoc` (`MaLopHoc`),
  CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  CONSTRAINT `fk_diem_hocsinh` FOREIGN KEY (`MaHS`) REFERENCES `hocsinh` (`MaHS`),
  CONSTRAINT `fk_diem_mahk` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`),
  CONSTRAINT `fk_diem_monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO diem VALUES("39","20191","CN","210003","2","5","5","5","5","5","5","5");
INSERT INTO diem VALUES("40","20191","CN","210004","2","5","5","5","5","5","5","5");



DROP TABLE giaovien;

CREATE TABLE `giaovien` (
  `MaGV` int(6) NOT NULL,
  `MaMonHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenGV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `gv_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gv_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaGV`),
  UNIQUE KEY `SDT` (`SDT`),
  KEY `fk_gv_mh` (`MaMonHoc`),
  CONSTRAINT `fk_gv_mh` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO giaovien VALUES("1","A","Trần Thị Hảo","Yên Dũng - Bắc Giang","0976404956","gv.hao@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("2","GD","Đào Xuân Thanh","Xuân Mai - Hà Nội","0976454151","gv.thanh@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("3","Ti","Trương Bá Nghĩa","Long Biên - Hà Nội","0363602696","gv.nghia@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("4","A","Giáo Viên A","Trâu Quỳ","0754545412","gv.a@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("5","CN","Nguyễn Văn B","Hưng Yên","0976454512","gv.b@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("6","H","Nguyễn Văn C","Thái Bình","0123456789","gv.c@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("7","S","Nguyễn Thị D","Hà Nội","0123456879","gv.d@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("8","V","Phan Văn Tuấn","Nghệ An","0123546789","gv.tuan@gmail.com","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO giaovien VALUES("9","T","Cù Trọng Xoay","Việt Nam","0123454545","gv.xoay@gmail.com","e10adc3949ba59abbe56e057f20f883e");



DROP TABLE hocky;

CREATE TABLE `hocky` (
  `MaHocKy` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenHocKy` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `HeSoHK` int(1) NOT NULL,
  `NamHoc` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaHocKy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO hocky VALUES("20191","Hoc Ky I","1","19-20");
INSERT INTO hocky VALUES("20192","Hoc Ky II","2","19-20");



DROP TABLE hocsinh;

CREATE TABLE `hocsinh` (
  `MaHS` int(6) NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenHS` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `NoiSinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DanToc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenCha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenMe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaHS`),
  KEY `fk_hs_lh` (`MaLopHoc`),
  CONSTRAINT `fk_hs_lh` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO hocsinh VALUES("210001","1","Trương Bá Nghĩa","Nam","1997-09-11","Hà Nội","Kinh","Trương Bá","Lưu Thị");
INSERT INTO hocsinh VALUES("210002","1","Trần Thị Hảo","Nữ","1997-10-05","Bắc Giang","Kinh","Trần","Nguyễn");
INSERT INTO hocsinh VALUES("210003","2","Đào Xuân Thanh","Nam","1997-09-05","Hà Nội","Kinh","Đào","Nguyễn");
INSERT INTO hocsinh VALUES("210004","2","Trương Bá Nghĩa","Nam","1997-04-11","Hà Nội","Kinh","ABC","ABC");
INSERT INTO hocsinh VALUES("210005","1","Nguyễn Văn A","Nam","1997-04-11","Hà Nội","Kinh","Nguyễn","Nguyễn");
INSERT INTO hocsinh VALUES("210006","3","Chu Thị Trúc","Nữ","1997-06-11","Hà Nội","Kinh","Chu","Nguyễn");



DROP TABLE lophoc;

CREATE TABLE `lophoc` (
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Tenlophoc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `KhoiHoc` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`MaLopHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO lophoc VALUES("1","9A2","9");
INSERT INTO lophoc VALUES("2","9A1","9");
INSERT INTO lophoc VALUES("3","9A3","9");



DROP TABLE monhoc;

CREATE TABLE `monhoc` (
  `MaMonHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenMonHoc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoTiet` int(20) NOT NULL,
  `HeSoMonHoc` int(1) NOT NULL,
  PRIMARY KEY (`MaMonHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO monhoc VALUES("A","Tiếng Anh","105","1");
INSERT INTO monhoc VALUES("CN","Công Nghệ","52","1");
INSERT INTO monhoc VALUES("GD","Giáo Dục Công Dân","35","1");
INSERT INTO monhoc VALUES("H","Hóa Học","70","1");
INSERT INTO monhoc VALUES("S","Lịch Sử","105","1");
INSERT INTO monhoc VALUES("T","Toán","140","2");
INSERT INTO monhoc VALUES("Ti","Tin Học","35","1");
INSERT INTO monhoc VALUES("V","Văn","140","2");



DROP TABLE user;

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass_forgot` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(2) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO user VALUES("4","Trương Bá Nghĩa","nghia@gmail.com","e10adc3949ba59abbe56e057f20f883e","123456","1");
INSERT INTO user VALUES("6","Trần Thị Hảo","hao@gmail.com","e10adc3949ba59abbe56e057f20f883e","123456","2");
INSERT INTO user VALUES("7","Đào Xuân Thanh","thanh@gmail.com","e10adc3949ba59abbe56e057f20f883e","123456","2");
INSERT INTO user VALUES("8","admin","admin@gmail.com","e10adc3949ba59abbe56e057f20f883e","123456","1");
INSERT INTO user VALUES("9","test","test@gmail.com","fcea920f7412b5da7be0cf42b8c93759","1234567","2");



