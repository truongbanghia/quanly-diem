<?php 
require_once('../admin/config/connect.php');
require_once('../Classes/PHPExcel.php');
$ten_lop = $_POST['ten_lop'];
$id_lop = $_POST['id_lop'];
$id_hk = $_POST['id_hk'];
$id_monhoc = $_POST['id_monhoc'];
// $sql = "SELECT * FROM lophoc WHERE MaLopHoc = '$gv_mail'";
// $query = mysqli_query($conn,$sql);
// $row = mysqli_fetch_assoc($query);
// $Ma_GV = $row['MaGV'] ;
if(isset($_POST['btnImport'])){
    $file = $_FILES['file']['tmp_name'];

	$objReader = PHPExcel_IOFactory::createReaderForFile($file);
	$listWorkSheets = $objReader->listWorksheetNames($file);
   
	
		// $sql_lop = "SELECT * FROM dayhoc JOIN lophoc ON dayhoc.MaLopHoc = lophoc.MaLopHoc  WHERE dayhoc.MaGV = '$Ma_GV'";
		// $query_lop = mysqli_query($conn,$sql_lop);
		// while ($row_lop = mysqli_fetch_assoc($query_lop)) {
            $objReader->setLoadSheetsOnly($ten_lop);
        // }       
            // $sql_hs = "SELECT MaHS FROM hocsinh WHERE MaLopHoc = '$id_lop'";
            // $query_hs = mysqli_query($conn,$sql_hs);

            $objExcel = $objReader->load($file);
            $sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true,true,true,true,true,true,true,true);
            $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
            for($row = 2; $row<=$highestRow; $row++){
                $MaHS = $sheetData[$row]['A'];
                $DiemMieng = $sheetData[$row]['E'];
                $Diem15Phut1 = $sheetData[$row]['F'];
                $Diem15Phut2 = $sheetData[$row]['G'];
                $Diem1Tiet1 = $sheetData[$row]['H'];
                $Diem1Tiet2 = $sheetData[$row]['I'];
                $DiemThi = $sheetData[$row]['J'];
                $DiemTB = round(($DiemMieng + $Diem15Phut1 + $Diem15Phut2 + $Diem1Tiet1*2 + $Diem1Tiet2*2 + $DiemThi*3)/10,1);
                // echo '<pre>';
                //     print_r($Diem15Phut1);
                //     echo '</pre>';
                $sql_update = "UPDATE diem SET DiemMieng = $DiemMieng, Diem15Phut1 = $Diem15Phut1, Diem15Phut2 = $Diem15Phut2, Diem1Tiet1 = $Diem1Tiet1, Diem1Tiet2 = $Diem1Tiet2, DiemThi = $DiemThi, DiemTB = $DiemTB WHERE MaHocKy = '$id_hk' AND MaMonHoc = '$id_monhoc' AND MaHS = '$MaHS' AND  MaLopHoc = '$id_lop'";
                $query = mysqli_query($conn,$sql_update);
                header('location: ../admin/index.php?page_gv=list_points&MaHocKy='.$id_hk.'&MaMonHoc='.$id_monhoc.'&MaLopHoc='.$id_lop.'');  
            }
            
           
            
            
    
}

