<?php 
include_once('config/connect.php');
require_once('../Classes/PHPExcel.php');

if(isset($_POST['btnExport'])){
    $objPHPExcel = new PHPExcel();
    
        $objPHPExcel->getActiveSheet()->setTitle('Thống Kê - Báo Cáo');
        $objPHPExcel->createSheet();

        $sql = "SELECT * FROM thongke JOIN hocsinh ON thongke.MaHS = hocsinh.MaHS";
        $result = mysqli_query($conn,$sql);
        $numRow = 1;
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$numRow.'', 'Mã Học Sinh')->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$numRow.'', 'Tên Học Sinh')->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$numRow.'', 'Điểm Trung Bình')->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$numRow.'', 'Xếp Loại')->getColumnDimension('D')->setWidth(20);
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
          $objPHPExcel->getActiveSheet()->getStyle('A1:D100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); //Canh chữ ở giữa
        
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['TbNamHoc'] >= 0 && $row['TbNamHoc'] <= 3.9) {
                $xepLoai = 'Kém';
            }elseif($row['TbNamHoc'] >= 4 && $row['TbNamHoc'] <= 4.9){
                $xepLoai = 'Yếu';
            }elseif($row['TbNamHoc'] >= 5 && $row['TbNamHoc'] <= 6.4){
                $xepLoai = 'Trung Bình';
            }elseif($row['TbNamHoc'] >= 6.5 && $row['TbNamHoc'] <= 7.9){
                $xepLoai = 'Khá';
            }elseif($row['TbNamHoc'] >= 8){
                $xepLoai = 'Giỏi';
            }
            $numRow++;
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$numRow.'', ''.$row['MaHS'].'');
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$numRow.'', ''.$row['TenHS'].'');
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$numRow.'', ''.$row['TbNamHoc'].'');
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$numRow.'', ''.$xepLoai.'');
    }
    }
       
    $objPHPExcel->getActiveSheet()->getStyle('D2:D'.$numRow.'')->applyFromArray(
        array(
         'fill' => array(
         'type' => PHPExcel_Style_Fill::FILL_SOLID,
         'color' => array('rgb' => '50A625')
         ),
         'font'  => array(
            'bold'  => true,
            'color' => array('rgb' => 'DF0029'),
            'size'  => 12,
            'name'  => 'arial'
        )
        )
      ); //Đổ màu cho ô
      
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="ThongKe.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');


?>