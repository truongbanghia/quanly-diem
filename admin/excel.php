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
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$numRow.'', 'Mã Học Sinh')->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$numRow.'', 'Tên Học Sinh')->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$numRow.'', 'Giới Tính')->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$numRow.'', 'Ngày Sinh')->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray(
            array(
             'fill' => array(
             'type' => PHPExcel_Style_Fill::FILL_SOLID,
             'color' => array('rgb' => 'c6f2c8')
             ),
            )
          ); //Đổ màu cho ô
          $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
          $objPHPExcel->getActiveSheet()->getStyle('A1:J100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); //Canh chữ ở giữa
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