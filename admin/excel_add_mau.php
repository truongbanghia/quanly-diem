<?php 
include_once('config/connect.php');
require_once('../Classes/PHPExcel.php');

if(isset($_POST['btnExport'])){
    $objPHPExcel = new PHPExcel();
    
        $objPHPExcel->getActiveSheet()->setTitle('DSHS');
        $objPHPExcel->createSheet();

        $numRow = 1;
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$numRow.'', 'Mã Học Sinh')->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$numRow.'', 'Họ và Tên')->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$numRow.'', 'Giới Tính')->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$numRow.'', 'Ngày Sinh')->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$numRow.'', 'Nơi Sinh')->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$numRow.'', 'Dân Tộc')->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$numRow.'', 'Họ Tên Cha')->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$numRow.'', 'Họ Tên Mẹ')->getColumnDimension('H')->setWidth(20);        
        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray(
            array(
             'fill' => array(
             'type' => PHPExcel_Style_Fill::FILL_SOLID,
             'color' => array('rgb' => 'c6f2c8')
             ),
            )
          ); //Đổ màu cho ô

          
          $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
          $objPHPExcel->getActiveSheet()->getStyle('A1:H100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); //Canh chữ ở giữa
        
    }
      
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Them_HS.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');


?>