<?php 
include_once('config/connect.php');
require_once('../Classes/PHPExcel.php');

if(isset($_POST['btnExport'])){
    $objPHPExcel = new PHPExcel();

    
    $numSheets = 0;
    $sql_lophoc = "SELECT * FROM lophoc";
    $query_lophoc = mysqli_query($conn,$sql_lophoc);
    while ($lophoc = mysqli_fetch_assoc($query_lophoc)) {

        
        $objPHPExcel->setActiveSheetIndex($numSheets);
        $objPHPExcel->getActiveSheet()->setTitle(''.$lophoc['Tenlophoc'].'');
        $numSheets++;
        $objPHPExcel->createSheet();

        $sql = "SELECT * FROM hocsinh WHERE MaLopHoc = $lophoc[MaLopHoc]";
        $result = mysqli_query($conn,$sql);
        $numRow = 1;
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$numRow.'', 'Mã Học Sinh');
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$numRow.'', 'Tên Học Sinh');
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$numRow.'', 'Giới Tính');
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$numRow.'', 'Ngày Sinh');

        while ($row = mysqli_fetch_assoc($result)) {
            $numRow++;
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$numRow.'', ''.$row['MaHS'].'');
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$numRow.'', ''.$row['TenHS'].'');
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$numRow.'', ''.$row['GioiTinh'].'');
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$numRow.'', ''.$row['NgaySinh'].'');
    }
    }
       

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="DSHS.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');


}

?>