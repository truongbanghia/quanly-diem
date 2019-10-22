

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO dayhoc VALUES("1","A","1","2","20191","DEC");
INSERT INTO dayhoc VALUES("2","GD","2","1","20191","ABC");
INSERT INTO dayhoc VALUES("3","Ti","3","1","20191","Tin");
INSERT INTO dayhoc VALUES("4","CN","5","2","20191","abc");
INSERT INTO dayhoc VALUES("5","H","6","1","20191","ád");
INSERT INTO dayhoc VALUES("7","T","9","1","20191","A");
INSERT INTO dayhoc VALUES("8","V","8","1","20191","abc");
INSERT INTO dayhoc VALUES("14","A","1","1","20191","ABC");
INSERT INTO dayhoc VALUES("16","H","6","2","20191","1");
INSERT INTO dayhoc VALUES("17","A","4","3","20191","ádá");
INSERT INTO dayhoc VALUES("18","CN","5","3","20191","1");
INSERT INTO dayhoc VALUES("19","GD","2","3","20191","1");
INSERT INTO dayhoc VALUES("20","H","6","3","20191","3");
INSERT INTO dayhoc VALUES("22","S","7","3","20191","1");
INSERT INTO dayhoc VALUES("23","T","9","3","20191","2");
INSERT INTO dayhoc VALUES("24","Ti","3","3","20191","1");
INSERT INTO dayhoc VALUES("25","V","8","3","20191","1");
INSERT INTO dayhoc VALUES("27","CN","5","1","20191","1234");
INSERT INTO dayhoc VALUES("28","S","7","1","20191","1234");
INSERT INTO dayhoc VALUES("29","V","8","2","20191","1");
INSERT INTO dayhoc VALUES("30","Ti","3","2","20191","");
INSERT INTO dayhoc VALUES("31","S","7","2","20191","");
INSERT INTO dayhoc VALUES("32","GD","2","2","20191","");
INSERT INTO dayhoc VALUES("33","T","9","2","20191","");





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
) ENGINE=InnoDB AUTO_INCREMENT=340 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO diem VALUES("228","20191","A","210001","1","8","8","8","9.5","7.5","9","8.5");
INSERT INTO diem VALUES("229","20192","A","210001","1","8","8","7.5","9.5","7.5","9","8.5");
INSERT INTO diem VALUES("230","20191","CN","210001","1","8","9","10","8","9","8","8.5");
INSERT INTO diem VALUES("231","20192","CN","210001","1","","","","","","","0");
INSERT INTO diem VALUES("232","20191","GD","210001","1","","","","","","","0");
INSERT INTO diem VALUES("233","20192","GD","210001","1","","","","","","","0");
INSERT INTO diem VALUES("234","20191","H","210001","1","","","","","","","0");
INSERT INTO diem VALUES("235","20192","H","210001","1","","","","","","","0");
INSERT INTO diem VALUES("236","20191","S","210001","1","","","","","","","0");
INSERT INTO diem VALUES("237","20192","S","210001","1","","","","","","","0");
INSERT INTO diem VALUES("238","20191","T","210001","1","","","","","","","0");
INSERT INTO diem VALUES("239","20192","T","210001","1","","","","","","","0");
INSERT INTO diem VALUES("240","20191","Ti","210001","1","5","6","7","8","9","10","8.2");
INSERT INTO diem VALUES("241","20192","Ti","210001","1","","","","","","","0");
INSERT INTO diem VALUES("242","20191","V","210001","1","","","","","","","0");
INSERT INTO diem VALUES("243","20192","V","210001","1","","","","","","","0");
INSERT INTO diem VALUES("244","20191","A","210002","1","","","","","","","0");
INSERT INTO diem VALUES("245","20192","A","210002","1","","","","","","","0");
INSERT INTO diem VALUES("246","20191","CN","210002","1","","","","","","","0");
INSERT INTO diem VALUES("247","20192","CN","210002","1","","","","","","","0");
INSERT INTO diem VALUES("248","20191","GD","210002","1","","","","","","","0");
INSERT INTO diem VALUES("249","20192","GD","210002","1","","","","","","","0");
INSERT INTO diem VALUES("250","20191","H","210002","1","","","","","","","0");
INSERT INTO diem VALUES("251","20192","H","210002","1","","","","","","","0");
INSERT INTO diem VALUES("252","20191","S","210002","1","","","","","","","0");
INSERT INTO diem VALUES("253","20192","S","210002","1","","","","","","","0");
INSERT INTO diem VALUES("254","20191","T","210002","1","","","","","","","0");
INSERT INTO diem VALUES("255","20192","T","210002","1","","","","","","","0");
INSERT INTO diem VALUES("256","20191","Ti","210002","1","5.5","4.5","7","8","6.5","8","7");
INSERT INTO diem VALUES("257","20192","Ti","210002","1","","","","","","","0");
INSERT INTO diem VALUES("258","20191","V","210002","1","","","","","","","0");
INSERT INTO diem VALUES("259","20192","V","210002","1","","","","","","","0");
INSERT INTO diem VALUES("260","20191","A","210003","1","","","","","","","0");
INSERT INTO diem VALUES("261","20192","A","210003","1","","","","","","","0");
INSERT INTO diem VALUES("262","20191","CN","210003","1","","","","","","","0");
INSERT INTO diem VALUES("263","20192","CN","210003","1","","","","","","","0");
INSERT INTO diem VALUES("264","20191","GD","210003","1","","","","","","","0");
INSERT INTO diem VALUES("265","20192","GD","210003","1","","","","","","","0");
INSERT INTO diem VALUES("266","20191","H","210003","1","","","","","","","0");
INSERT INTO diem VALUES("267","20192","H","210003","1","","","","","","","0");
INSERT INTO diem VALUES("268","20191","S","210003","1","","","","","","","0");
INSERT INTO diem VALUES("269","20192","S","210003","1","","","","","","","0");
INSERT INTO diem VALUES("270","20191","T","210003","1","","","","","","","0");
INSERT INTO diem VALUES("271","20192","T","210003","1","","","","","","","0");
INSERT INTO diem VALUES("272","20191","Ti","210003","1","7","8","5","6","9","10","8");
INSERT INTO diem VALUES("273","20192","Ti","210003","1","","","","","","","0");
INSERT INTO diem VALUES("274","20191","V","210003","1","","","","","","","0");
INSERT INTO diem VALUES("275","20192","V","210003","1","","","","","","","0");
INSERT INTO diem VALUES("276","20191","A","210004","2","","","","","","","0");
INSERT INTO diem VALUES("277","20192","A","210004","2","","","","","","","0");
INSERT INTO diem VALUES("278","20191","CN","210004","2","","","","","","","0");
INSERT INTO diem VALUES("279","20192","CN","210004","2","","","","","","","0");
INSERT INTO diem VALUES("280","20191","GD","210004","2","","","","","","","0");
INSERT INTO diem VALUES("281","20192","GD","210004","2","","","","","","","0");
INSERT INTO diem VALUES("282","20191","H","210004","2","","","","","","","0");
INSERT INTO diem VALUES("283","20192","H","210004","2","","","","","","","0");
INSERT INTO diem VALUES("284","20191","S","210004","2","","","","","","","0");
INSERT INTO diem VALUES("285","20192","S","210004","2","","","","","","","0");
INSERT INTO diem VALUES("286","20191","T","210004","2","","","","","","","0");
INSERT INTO diem VALUES("287","20192","T","210004","2","","","","","","","0");
INSERT INTO diem VALUES("288","20191","Ti","210004","2","","","","","","","0");
INSERT INTO diem VALUES("289","20192","Ti","210004","2","","","","","","","0");
INSERT INTO diem VALUES("290","20191","V","210004","2","","","","","","","0");
INSERT INTO diem VALUES("291","20192","V","210004","2","","","","","","","0");
INSERT INTO diem VALUES("292","20191","A","210005","2","","","","","","","0");
INSERT INTO diem VALUES("293","20192","A","210005","2","","","","","","","0");
INSERT INTO diem VALUES("294","20191","CN","210005","2","","","","","","","0");
INSERT INTO diem VALUES("295","20192","CN","210005","2","","","","","","","0");
INSERT INTO diem VALUES("296","20191","GD","210005","2","","","","","","","0");
INSERT INTO diem VALUES("297","20192","GD","210005","2","","","","","","","0");
INSERT INTO diem VALUES("298","20191","H","210005","2","","","","","","","0");
INSERT INTO diem VALUES("299","20192","H","210005","2","","","","","","","0");
INSERT INTO diem VALUES("300","20191","S","210005","2","","","","","","","0");
INSERT INTO diem VALUES("301","20192","S","210005","2","","","","","","","0");
INSERT INTO diem VALUES("302","20191","T","210005","2","","","","","","","0");
INSERT INTO diem VALUES("303","20192","T","210005","2","","","","","","","0");
INSERT INTO diem VALUES("304","20191","Ti","210005","2","","","","","","","0");
INSERT INTO diem VALUES("305","20192","Ti","210005","2","","","","","","","0");
INSERT INTO diem VALUES("306","20191","V","210005","2","","","","","","","0");
INSERT INTO diem VALUES("307","20192","V","210005","2","","","","","","","0");
INSERT INTO diem VALUES("308","20191","A","210006","3","","","","","","","0");
INSERT INTO diem VALUES("309","20192","A","210006","3","","","","","","","0");
INSERT INTO diem VALUES("310","20191","CN","210006","3","","","","","","","0");
INSERT INTO diem VALUES("311","20192","CN","210006","3","","","","","","","0");
INSERT INTO diem VALUES("312","20191","GD","210006","3","","","","","","","0");
INSERT INTO diem VALUES("313","20192","GD","210006","3","","","","","","","0");
INSERT INTO diem VALUES("314","20191","H","210006","3","","","","","","","0");
INSERT INTO diem VALUES("315","20192","H","210006","3","","","","","","","0");
INSERT INTO diem VALUES("316","20191","S","210006","3","","","","","","","0");
INSERT INTO diem VALUES("317","20192","S","210006","3","","","","","","","0");
INSERT INTO diem VALUES("318","20191","T","210006","3","","","","","","","0");
INSERT INTO diem VALUES("319","20192","T","210006","3","","","","","","","0");
INSERT INTO diem VALUES("320","20191","Ti","210006","3","","","","","","","0");
INSERT INTO diem VALUES("321","20192","Ti","210006","3","","","","","","","0");
INSERT INTO diem VALUES("322","20191","V","210006","3","","","","","","","0");
INSERT INTO diem VALUES("323","20192","V","210006","3","","","","","","","0");
INSERT INTO diem VALUES("324","20191","A","210007","3","","","","","","","0");
INSERT INTO diem VALUES("325","20192","A","210007","3","","","","","","","0");
INSERT INTO diem VALUES("326","20191","CN","210007","3","","","","","","","0");
INSERT INTO diem VALUES("327","20192","CN","210007","3","","","","","","","0");
INSERT INTO diem VALUES("328","20191","GD","210007","3","","","","","","","0");
INSERT INTO diem VALUES("329","20192","GD","210007","3","","","","","","","0");
INSERT INTO diem VALUES("330","20191","H","210007","3","","","","","","","0");
INSERT INTO diem VALUES("331","20192","H","210007","3","","","","","","","0");
INSERT INTO diem VALUES("332","20191","S","210007","3","","","","","","","0");
INSERT INTO diem VALUES("333","20192","S","210007","3","","","","","","","0");
INSERT INTO diem VALUES("334","20191","T","210007","3","","","","","","","0");
INSERT INTO diem VALUES("335","20192","T","210007","3","","","","","","","0");
INSERT INTO diem VALUES("336","20191","Ti","210007","3","","","","","","","0");
INSERT INTO diem VALUES("337","20192","Ti","210007","3","","","","","","","0");
INSERT INTO diem VALUES("338","20191","V","210007","3","","","","","","","0");
INSERT INTO diem VALUES("339","20192","V","210007","3","","","","","","","0");





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





CREATE TABLE `hocky` (
  `MaHocKy` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenHocKy` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `HeSoHK` int(1) NOT NULL,
  `NamHoc` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaHocKy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO hocky VALUES("20191","Hoc Ky I","1","19-20");
INSERT INTO hocky VALUES("20192","Hoc Ky II","2","19-20");





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

INSERT INTO hocsinh VALUES("210001","1","Trương Bá Nghĩa","Nam","1997-04-11","Hà Nội","Kinh","A","B");
INSERT INTO hocsinh VALUES("210002","1","Đào Xuân Thanh","Nam","1997-04-11","Hà Nội","Kinh","A ","B");
INSERT INTO hocsinh VALUES("210003","1","Trần Thị Hảo","Nữ","1997-10-05","Bắc Giang","Kinh","A","B");
INSERT INTO hocsinh VALUES("210004","2","Lê Đức Tiến","Nam","1997-07-27","Hải Phòng","Kinh","A","B");
INSERT INTO hocsinh VALUES("210005","2","Nhâm Thị Hương","Nữ","1997-05-15","Thái Bình","Kinh","A","B");
INSERT INTO hocsinh VALUES("210006","3","Lê Thu Hiền","Nữ","1997-03-07","Ninh Bình","Kinh","A","B");
INSERT INTO hocsinh VALUES("210007","3","Nguyễn Duy Hiếu","Nam","1997-06-26","Hà Nội","Kinh","A","B");





CREATE TABLE `lophoc` (
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Tenlophoc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `KhoiHoc` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`MaLopHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO lophoc VALUES("1","9A2","9");
INSERT INTO lophoc VALUES("2","9A1","9");
INSERT INTO lophoc VALUES("3","9A3","9");





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



