

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
INSERT INTO dayhoc VALUES("3","Ti","3","1","20191","");
INSERT INTO dayhoc VALUES("4","CN","5","2","20191","abc");
INSERT INTO dayhoc VALUES("5","H","6","1","20191","ád");
INSERT INTO dayhoc VALUES("7","T","9","1","20191","A");
INSERT INTO dayhoc VALUES("8","V","8","1","20191","abc");
INSERT INTO dayhoc VALUES("14","A","1","1","20191","Cô giáo xinh đẹp");
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
) ENGINE=InnoDB AUTO_INCREMENT=37732 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO diem VALUES("420","20191","A","210001","1","10","10","7.5","6","8","9","8.3");
INSERT INTO diem VALUES("421","20192","A","210001","1","","","","","","","0");
INSERT INTO diem VALUES("422","20191","CN","210001","1","7","8","6","8","9","10","8.5");
INSERT INTO diem VALUES("423","20192","CN","210001","1","","","","","","","0");
INSERT INTO diem VALUES("424","20191","GD","210001","1","7","8","4.5","6","8","7.5","7");
INSERT INTO diem VALUES("425","20192","GD","210001","1","","","","","","","0");
INSERT INTO diem VALUES("426","20191","H","210001","1","4.5","6","8","9.5","6","7","7.1");
INSERT INTO diem VALUES("427","20192","H","210001","1","","","","","","","0");
INSERT INTO diem VALUES("428","20191","S","210001","1","5.5","6","7","9","4","5","6");
INSERT INTO diem VALUES("429","20192","S","210001","1","","","","","","","0");
INSERT INTO diem VALUES("430","20191","T","210001","1","4.5","6.5","7","8","9","10","8.2");
INSERT INTO diem VALUES("431","20192","T","210001","1","","","","","","","0");
INSERT INTO diem VALUES("432","20191","Ti","210001","1","8","9","8.5","7","7.5","9","8.2");
INSERT INTO diem VALUES("433","20192","Ti","210001","1","","","","","","","0");
INSERT INTO diem VALUES("434","20191","V","210001","1","10","10","8","8","10","10","9.4");
INSERT INTO diem VALUES("435","20192","V","210001","1","","","","","","","0");
INSERT INTO diem VALUES("436","20191","A","210002","1","7.5","6","7.5","8","7","8","7.5");
INSERT INTO diem VALUES("437","20192","A","210002","1","","","","","","","0");
INSERT INTO diem VALUES("438","20191","CN","210002","1","4.5","6","8","7.5","8.5","9","7.8");
INSERT INTO diem VALUES("439","20192","CN","210002","1","","","","","","","0");
INSERT INTO diem VALUES("440","20191","GD","210002","1","6","8","6.5","7.5","8","9","7.9");
INSERT INTO diem VALUES("441","20192","GD","210002","1","","","","","","","0");
INSERT INTO diem VALUES("442","20191","H","210002","1","5.5","6","7","8","9","10","8.3");
INSERT INTO diem VALUES("443","20192","H","210002","1","","","","","","","0");
INSERT INTO diem VALUES("444","20191","S","210002","1","4","5","6","7.5","9","4.5","6.2");
INSERT INTO diem VALUES("445","20192","S","210002","1","","","","","","","0");
INSERT INTO diem VALUES("446","20191","T","210002","1","4.5","6","8","4","1","9","5.6");
INSERT INTO diem VALUES("447","20192","T","210002","1","","","","","","","0");
INSERT INTO diem VALUES("448","20191","Ti","210002","1","10","8","7.5","8","9","10","9");
INSERT INTO diem VALUES("449","20192","Ti","210002","1","","","","","","","0");
INSERT INTO diem VALUES("450","20191","V","210002","1","8","10","5","","","","2.3");
INSERT INTO diem VALUES("451","20192","V","210002","1","","","","","","","0");
INSERT INTO diem VALUES("452","20191","A","210003","1","7.5","6","9","4.5","5","3","5.1");
INSERT INTO diem VALUES("453","20192","A","210003","1","","","","","","","0");
INSERT INTO diem VALUES("454","20191","CN","210003","1","9.5","7","8","6","4","5.5","6.1");
INSERT INTO diem VALUES("455","20192","CN","210003","1","","","","","","","0");
INSERT INTO diem VALUES("456","20191","GD","210003","1","4.5","6","7","4.5","5","5","5.2");
INSERT INTO diem VALUES("457","20192","GD","210003","1","","","","","","","0");
INSERT INTO diem VALUES("458","20191","H","210003","1","1.5","2","3","3.5","4.5","5","3.8");
INSERT INTO diem VALUES("459","20192","H","210003","1","","","","","","","0");
INSERT INTO diem VALUES("460","20191","S","210003","1","5","6","5.5","7","8","9","7.4");
INSERT INTO diem VALUES("461","20192","S","210003","1","","","","","","","0");
INSERT INTO diem VALUES("462","20191","T","210003","1","1","2","3","4","5","6","4.2");
INSERT INTO diem VALUES("463","20192","T","210003","1","","","","","","","0");
INSERT INTO diem VALUES("464","20191","Ti","210003","1","5.5","6","8.5","7.5","8","9","7.8");
INSERT INTO diem VALUES("465","20192","Ti","210003","1","","","","","","","0");
INSERT INTO diem VALUES("466","20191","V","210003","1","8","10","10","8","5","10","8.4");
INSERT INTO diem VALUES("467","20192","V","210003","1","","","","","","","0");
INSERT INTO diem VALUES("468","20191","A","210004","2","","","","","","","0");
INSERT INTO diem VALUES("469","20192","A","210004","2","","","","","","","0");
INSERT INTO diem VALUES("470","20191","CN","210004","2","","","","","","","0");
INSERT INTO diem VALUES("471","20192","CN","210004","2","","","","","","","0");
INSERT INTO diem VALUES("472","20191","GD","210004","2","","","","","","","0");
INSERT INTO diem VALUES("473","20192","GD","210004","2","","","","","","","0");
INSERT INTO diem VALUES("474","20191","H","210004","2","","","","","","","0");
INSERT INTO diem VALUES("475","20192","H","210004","2","","","","","","","0");
INSERT INTO diem VALUES("476","20191","S","210004","2","","","","","","","0");
INSERT INTO diem VALUES("477","20192","S","210004","2","","","","","","","0");
INSERT INTO diem VALUES("478","20191","T","210004","2","","","","","","","0");
INSERT INTO diem VALUES("479","20192","T","210004","2","","","","","","","0");
INSERT INTO diem VALUES("480","20191","Ti","210004","2","10","10","8","9","10","9","9.3");
INSERT INTO diem VALUES("481","20192","Ti","210004","2","","","","","","","0");
INSERT INTO diem VALUES("482","20191","V","210004","2","","","","","","","0");
INSERT INTO diem VALUES("483","20192","V","210004","2","","","","","","","0");
INSERT INTO diem VALUES("484","20191","A","210005","2","","","","","","","0");
INSERT INTO diem VALUES("485","20192","A","210005","2","","","","","","","0");
INSERT INTO diem VALUES("486","20191","CN","210005","2","","","","","","","0");
INSERT INTO diem VALUES("487","20192","CN","210005","2","","","","","","","0");
INSERT INTO diem VALUES("488","20191","GD","210005","2","","","","","","","0");
INSERT INTO diem VALUES("489","20192","GD","210005","2","","","","","","","0");
INSERT INTO diem VALUES("490","20191","H","210005","2","","","","","","","0");
INSERT INTO diem VALUES("491","20192","H","210005","2","","","","","","","0");
INSERT INTO diem VALUES("492","20191","S","210005","2","","","","","","","0");
INSERT INTO diem VALUES("493","20192","S","210005","2","","","","","","","0");
INSERT INTO diem VALUES("494","20191","T","210005","2","","","","","","","0");
INSERT INTO diem VALUES("495","20192","T","210005","2","","","","","","","0");
INSERT INTO diem VALUES("496","20191","Ti","210005","2","10","8","9","10","9","10","9.5");
INSERT INTO diem VALUES("497","20192","Ti","210005","2","","","","","","","0");
INSERT INTO diem VALUES("498","20191","V","210005","2","8","","","","","","0.8");
INSERT INTO diem VALUES("499","20192","V","210005","2","","","","","","","0");
INSERT INTO diem VALUES("500","20191","A","210006","3","","","","","","","0");
INSERT INTO diem VALUES("501","20192","A","210006","3","","","","","","","0");
INSERT INTO diem VALUES("502","20191","CN","210006","3","","","","","","","0");
INSERT INTO diem VALUES("503","20192","CN","210006","3","","","","","","","0");
INSERT INTO diem VALUES("504","20191","GD","210006","3","","","","","","","0");
INSERT INTO diem VALUES("505","20192","GD","210006","3","","","","","","","0");
INSERT INTO diem VALUES("506","20191","H","210006","3","","","","","","","0");
INSERT INTO diem VALUES("507","20192","H","210006","3","","","","","","","0");
INSERT INTO diem VALUES("508","20191","S","210006","3","","","","","","","0");
INSERT INTO diem VALUES("509","20192","S","210006","3","","","","","","","0");
INSERT INTO diem VALUES("510","20191","T","210006","3","","","","","","","0");
INSERT INTO diem VALUES("511","20192","T","210006","3","","","","","","","0");
INSERT INTO diem VALUES("512","20191","Ti","210006","3","10","8","9","7","7.5","8","8");
INSERT INTO diem VALUES("513","20192","Ti","210006","3","","","","","","","0");
INSERT INTO diem VALUES("514","20191","V","210006","3","","","","","","","0");
INSERT INTO diem VALUES("515","20192","V","210006","3","","","","","","","0");
INSERT INTO diem VALUES("516","20191","A","210007","3","","","","","","","0");
INSERT INTO diem VALUES("517","20192","A","210007","3","","","","","","","0");
INSERT INTO diem VALUES("518","20191","CN","210007","3","","","","","","","0");
INSERT INTO diem VALUES("519","20192","CN","210007","3","","","","","","","0");
INSERT INTO diem VALUES("520","20191","GD","210007","3","","","","","","","0");
INSERT INTO diem VALUES("521","20192","GD","210007","3","","","","","","","0");
INSERT INTO diem VALUES("522","20191","H","210007","3","","","","","","","0");
INSERT INTO diem VALUES("523","20192","H","210007","3","","","","","","","0");
INSERT INTO diem VALUES("524","20191","S","210007","3","","","","","","","0");
INSERT INTO diem VALUES("525","20192","S","210007","3","","","","","","","0");
INSERT INTO diem VALUES("526","20191","T","210007","3","","","","","","","0");
INSERT INTO diem VALUES("527","20192","T","210007","3","","","","","","","0");
INSERT INTO diem VALUES("528","20191","Ti","210007","3","8","5","6","7","5","9","7");
INSERT INTO diem VALUES("529","20192","Ti","210007","3","","","","","","","0");
INSERT INTO diem VALUES("530","20191","V","210007","3","","","","","","","0");
INSERT INTO diem VALUES("531","20192","V","210007","3","","","","","","","0");
INSERT INTO diem VALUES("532","20191","A","210008","2","","","","","","","0");
INSERT INTO diem VALUES("533","20192","A","210008","2","","","","","","","0");
INSERT INTO diem VALUES("534","20191","CN","210008","2","","","","","","","0");
INSERT INTO diem VALUES("535","20192","CN","210008","2","","","","","","","0");
INSERT INTO diem VALUES("536","20191","GD","210008","2","","","","","","","0");
INSERT INTO diem VALUES("537","20192","GD","210008","2","","","","","","","0");
INSERT INTO diem VALUES("538","20191","H","210008","2","","","","","","","0");
INSERT INTO diem VALUES("539","20192","H","210008","2","","","","","","","0");
INSERT INTO diem VALUES("540","20191","S","210008","2","","","","","","","0");
INSERT INTO diem VALUES("541","20192","S","210008","2","","","","","","","0");
INSERT INTO diem VALUES("542","20191","T","210008","2","","","","","","","0");
INSERT INTO diem VALUES("543","20192","T","210008","2","","","","","","","0");
INSERT INTO diem VALUES("544","20191","Ti","210008","2","","","","","","","0");
INSERT INTO diem VALUES("545","20192","Ti","210008","2","","","","","","","0");
INSERT INTO diem VALUES("546","20191","V","210008","2","","","","","","","0");
INSERT INTO diem VALUES("547","20192","V","210008","2","","","","","","","0");
INSERT INTO diem VALUES("548","20191","A","210009","2","","","","","","","0");
INSERT INTO diem VALUES("549","20192","A","210009","2","","","","","","","0");
INSERT INTO diem VALUES("550","20191","CN","210009","2","","","","","","","0");
INSERT INTO diem VALUES("551","20192","CN","210009","2","","","","","","","0");
INSERT INTO diem VALUES("552","20191","GD","210009","2","","","","","","","0");
INSERT INTO diem VALUES("553","20192","GD","210009","2","","","","","","","0");
INSERT INTO diem VALUES("554","20191","H","210009","2","","","","","","","0");
INSERT INTO diem VALUES("555","20192","H","210009","2","","","","","","","0");
INSERT INTO diem VALUES("556","20191","S","210009","2","","","","","","","0");
INSERT INTO diem VALUES("557","20192","S","210009","2","","","","","","","0");
INSERT INTO diem VALUES("558","20191","T","210009","2","","","","","","","0");
INSERT INTO diem VALUES("559","20192","T","210009","2","","","","","","","0");
INSERT INTO diem VALUES("560","20191","Ti","210009","2","","","","","","","0");
INSERT INTO diem VALUES("561","20192","Ti","210009","2","","","","","","","0");
INSERT INTO diem VALUES("562","20191","V","210009","2","","","","","","","0");
INSERT INTO diem VALUES("563","20192","V","210009","2","","","","","","","0");
INSERT INTO diem VALUES("23348","20191","A","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23349","20192","A","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23350","20191","CN","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23351","20192","CN","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23352","20191","GD","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23353","20192","GD","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23354","20191","H","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23355","20192","H","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23356","20191","S","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23357","20192","S","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23358","20191","T","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23359","20192","T","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23360","20191","Ti","210010","1","10","8","8","8","10","","6.2");
INSERT INTO diem VALUES("23361","20192","Ti","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23362","20191","V","210010","1","8","10","","","","","1.8");
INSERT INTO diem VALUES("23363","20192","V","210010","1","","","","","","","0");
INSERT INTO diem VALUES("23364","20191","A","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23365","20192","A","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23366","20191","CN","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23367","20192","CN","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23368","20191","GD","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23369","20192","GD","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23370","20191","H","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23371","20192","H","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23372","20191","S","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23373","20192","S","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23374","20191","T","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23375","20192","T","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23376","20191","Ti","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23377","20192","Ti","210011","1","","","","","","","0");
INSERT INTO diem VALUES("23378","20191","V","210011","1","8","10","","","","","1.8");
INSERT INTO diem VALUES("23379","20192","V","210011","1","","","","","","","0");
INSERT INTO diem VALUES("24980","20191","A","210014","1","","","","","","","0");
INSERT INTO diem VALUES("24981","20192","A","210014","1","","","","","","","0");
INSERT INTO diem VALUES("24982","20191","CN","210014","1","","","","","","","0");
INSERT INTO diem VALUES("24983","20192","CN","210014","1","","","","","","","0");
INSERT INTO diem VALUES("24984","20191","GD","210014","1","","","","","","","0");
INSERT INTO diem VALUES("24985","20192","GD","210014","1","","","","","","","0");
INSERT INTO diem VALUES("24986","20191","H","210014","1","","","","","","","0");
INSERT INTO diem VALUES("24987","20192","H","210014","1","","","","","","","0");
INSERT INTO diem VALUES("24988","20191","S","210014","1","","","","","","","0");
INSERT INTO diem VALUES("24989","20192","S","210014","1","","","","","","","0");
INSERT INTO diem VALUES("24990","20191","T","210014","1","","","","","","","0");
INSERT INTO diem VALUES("24991","20192","T","210014","1","","","","","","","0");
INSERT INTO diem VALUES("24992","20191","Ti","210014","1","10","","","","","","1");
INSERT INTO diem VALUES("24993","20192","Ti","210014","1","","","","","","","0");
INSERT INTO diem VALUES("24994","20191","V","210014","1","8","10","","","","","1.8");
INSERT INTO diem VALUES("24995","20192","V","210014","1","","","","","","","0");
INSERT INTO diem VALUES("25012","20191","A","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25013","20192","A","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25014","20191","CN","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25015","20192","CN","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25016","20191","GD","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25017","20192","GD","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25018","20191","H","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25019","20192","H","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25020","20191","S","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25021","20192","S","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25022","20191","T","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25023","20192","T","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25024","20191","Ti","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25025","20192","Ti","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25026","20191","V","210016","1","8","10","","","","","1.8");
INSERT INTO diem VALUES("25027","20192","V","210016","1","","","","","","","0");
INSERT INTO diem VALUES("25044","20191","A","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25045","20192","A","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25046","20191","CN","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25047","20192","CN","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25048","20191","GD","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25049","20192","GD","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25050","20191","H","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25051","20192","H","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25052","20191","S","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25053","20192","S","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25054","20191","T","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25055","20192","T","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25056","20191","Ti","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25057","20192","Ti","210018","1","","","","","","","0");
INSERT INTO diem VALUES("25058","20191","V","210018","1","8","10","","","","","1.8");
INSERT INTO diem VALUES("25059","20192","V","210018","1","","","","","","","0");





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
  PRIMARY KEY (`MaHocKy`),
  KEY `NamHoc` (`NamHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO hocky VALUES("20191","Hoc Ky I","1","19-20");
INSERT INTO hocky VALUES("20192","Hoc Ky II","2","19-20");
INSERT INTO hocky VALUES("20211","Học Kỳ I","1","21-22");
INSERT INTO hocky VALUES("20212","Học Kỳ II","2","21-22");





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
INSERT INTO hocsinh VALUES("210002","1","Trần Thị Hảo","Nữ","1997-10-05","Bắc Giang","Kinh","A","B");
INSERT INTO hocsinh VALUES("210003","1","Đào Xuân Thanh","Nam","1997-06-26","Hà Nội","Kinh","A ","B");
INSERT INTO hocsinh VALUES("210004","2","Nguyễn Duy Hiếu","Nam","1997-06-26","Hà Nội","Kinh","A","B");
INSERT INTO hocsinh VALUES("210005","2","Mai Xuân Tùng","Nam","1996-11-11","Bắc Ninh","Kinh","A","B");
INSERT INTO hocsinh VALUES("210006","3","Nhâm Thị Hương","Nữ","1997-03-07","Thái Binh","Kinh","A","B");
INSERT INTO hocsinh VALUES("210007","3","Lê Thu Hiền","Nữ","1997-07-03","Ninh Bình","Kinh","A","B");
INSERT INTO hocsinh VALUES("210008","2","Lê Đức Tiến","Nam","1997-07-27","Hải Phòng","Kinh","A","B");
INSERT INTO hocsinh VALUES("210009","2","Trương Văn A","Nam","1997-05-11","Hà Nội","Kinh","A","B");
INSERT INTO hocsinh VALUES("210010","1","Nam","Nam","2474-12-25","Hà Nội","Kinh","A","B");
INSERT INTO hocsinh VALUES("210011","1","Nữ","Nữ","2474-12-25","Hà Nội","Kinh","A","B");
INSERT INTO hocsinh VALUES("210014","1","Quang","Nam","1999-03-12","HN","Kinh","A","B");
INSERT INTO hocsinh VALUES("210016","1","Nghĩa","ahsd","1997-04-11","khád","khád","kjhád","khsad");
INSERT INTO hocsinh VALUES("210018","1","Nghĩa ABC","Nam","1997-05-11","HN","Kinh","A","B");





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





CREATE TABLE `namhoc` (
  `MaNamHoc` int(6) NOT NULL AUTO_INCREMENT,
  `NamHoc` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaNamHoc`),
  UNIQUE KEY `NamHoc` (`NamHoc`),
  CONSTRAINT `namhoc_ibfk_1` FOREIGN KEY (`NamHoc`) REFERENCES `hocky` (`NamHoc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO namhoc VALUES("1","19-20");
INSERT INTO namhoc VALUES("3","21-22");





CREATE TABLE `thongke` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `MaHS` int(6) NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NamHoc` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `TbNamHoc` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `MaHS` (`MaHS`),
  KEY `MaLopHoc` (`MaLopHoc`),
  KEY `NamHoc` (`NamHoc`),
  CONSTRAINT `thongke_ibfk_1` FOREIGN KEY (`MaHS`) REFERENCES `hocsinh` (`MaHS`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `thongke_ibfk_2` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `thongke_ibfk_3` FOREIGN KEY (`NamHoc`) REFERENCES `namhoc` (`NamHoc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2366 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO thongke VALUES("34","210001","1","19-20","2.6");
INSERT INTO thongke VALUES("35","210002","1","19-20","2.3");
INSERT INTO thongke VALUES("36","210003","1","19-20","2");
INSERT INTO thongke VALUES("37","210004","2","19-20","0.4");
INSERT INTO thongke VALUES("38","210005","2","19-20","0.4");
INSERT INTO thongke VALUES("39","210006","3","19-20","0");
INSERT INTO thongke VALUES("40","210007","3","19-20","0");
INSERT INTO thongke VALUES("41","210008","2","19-20","0");
INSERT INTO thongke VALUES("42","210009","2","19-20","0");
INSERT INTO thongke VALUES("1467","210010","1","19-20","0.3");
INSERT INTO thongke VALUES("1468","210011","1","19-20","0.1");
INSERT INTO thongke VALUES("1569","210014","1","19-20","0.1");
INSERT INTO thongke VALUES("1571","210016","1","19-20","0.1");
INSERT INTO thongke VALUES("1573","210018","1","19-20","0.1");





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



