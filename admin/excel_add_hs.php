<?php 
include_once('config/connect.php');
require_once('../Classes/PHPExcel.php');

// $sql = "SELECT * FROM lophoc WHERE MaLopHoc = '$gv_mail'";
// $query = mysqli_query($conn,$sql);
// $row = mysqli_fetch_assoc($query);
// $Ma_GV = $row['MaGV'] ;
if(isset($_POST['btnImport'])){
    $class_id = $_POST['class_id'];
    $file = $_FILES['file']['tmp_name'];
	$objReader = PHPExcel_IOFactory::createReaderForFile($file);
	$listWorkSheets = $objReader->listWorksheetNames($file);
   
	
		// $sql_lop = "SELECT * FROM dayhoc JOIN lophoc ON dayhoc.MaLopHoc = lophoc.MaLopHoc  WHERE dayhoc.MaGV = '$Ma_GV'";
		// $query_lop = mysqli_query($conn,$sql_lop);
		// while ($row_lop = mysqli_fetch_assoc($query_lop)) {
            $objReader->setLoadSheetsOnly('DSHS');
        // }       
            // $sql_hs = "SELECT MaHS FROM hocsinh WHERE MaLopHoc = '$id_lop'";
            // $query_hs = mysqli_query($conn,$sql_hs);

            $objExcel = $objReader->load($file);
            $sheetData = $objExcel->getActiveSheet()->toArray(null, true, true, true);
            $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
            for($row = 2; $row <= $highestRow; $row++){                
                $stu_id = $sheetData[$row]['A'];
                $stu_name = $sheetData[$row]['B'];
                $stu_sex = $sheetData[$row]['C'];
                $stu_birth = $sheetData[$row]['D'];
                $stu_place_birth = $sheetData[$row]['E'];
                $stu_nation = $sheetData[$row]['F'];
                $stu_name_dad = $sheetData[$row]['G'];
                $stu_name_mother = $sheetData[$row]['H'];
                // echo '<pre>';
                //     print_r($Diem15Phut1);
                //     echo '</pre>';
                if(!empty($stu_id)){
                    $sql_add = "INSERT INTO hocsinh (MaHS, MaLopHoc, TenHS, GioiTinh, NgaySinh, NoiSinh, DanToc, HoTenCha, HoTenMe) VALUES ('$stu_id','$class_id','$stu_name','$stu_sex','$stu_birth','$stu_place_birth','$stu_nation','$stu_name_dad','$stu_name_mother')";
                    $result = mysqli_query($conn,$sql_add);
                }
        
                $sql_mon = "SELECT MaMonHoc FROM monhoc";
                $query_mon=mysqli_query($conn,$sql_mon);
                while ($row_mon = mysqli_fetch_assoc($query_mon)) {
                    $id_mon = $row_mon['MaMonHoc'];
                    $sql_add_diem="INSERT INTO diem(MaHocKy, MaMonHoc, MaHS, MaLopHoc) VALUES('20191','$id_mon','$stu_id','$class_id')";
                    $query_add_diem = mysqli_query($conn,$sql_add_diem);
        
                    $sql_add_diem_2="INSERT INTO diem(MaHocKy, MaMonHoc, MaHS, MaLopHoc) VALUES('20192','$id_mon','$stu_id','$class_id')";
                    $query_add_diem_2 = mysqli_query($conn,$sql_add_diem_2);
        
                    
                }
                $query_thongke = mysqli_query($conn,"INSERT INTO thongke(MaHS,MaLopHoc,NamHoc) VALUES('$stu_id','$class_id','19-20')");
                header('location: index.php?page=list_stu&id_class='.$class_id.'');
            }
}

