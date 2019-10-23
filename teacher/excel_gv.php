<?php 
include_once('../admin/config/connect.php');
require_once('../Classes/PHPExcel.php');
$gv_mail = $_POST['mail'];
if(isset($_POST['btnExport'])){
    $objPHPExcel = new PHPExcel();

    
    $numSheets = 0;
    $sql_lophoc = "SELECT * FROM giaovien JOIN dayhoc ON giaovien.MaGV = dayhoc.MaGV JOIN lophoc ON lophoc.MaLopHoc = dayhoc.MaLopHoc WHERE giaovien.gv_mail = '$gv_mail'";
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
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$numRow.'', 'Điểm Miệng')->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$numRow.'', 'Điểm 15 phút 1')->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$numRow.'', 'Điểm 15 phút 2')->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$numRow.'', 'Điểm 1 Tiết 1')->getColumnDimension('H')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$numRow.'', 'Điểm 1 Tiết 2')->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$numRow.'', 'Điểm Thi')->getColumnDimension('J')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray(
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
    header('Content-Disposition: attachment;filename="DSHS_theo_lop.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');


}

?>