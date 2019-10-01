<?php
    if (!defined('TEMPLATE')) {
        die('bạn không có quyền truy cập trang này!');
    }
    if (isset($_GET['id_hs'])) {
        $id_hs = $_GET['id_hs'];
        //Bóc tách keyWord thành mảng
       $arrKeyWord = explode(' ',$id_hs);
       //chuyển mảng thành xâu
       $endKeyWord = '%'.implode('%',$arrKeyWord).'%';
   
       $sql = "SELECT * FROM hocsinh JOIN diem ON hocsinh.MaHS = diem.MaHS JOIN monhoc ON diem.MaMonHoc = monhoc.MaMonHoc JOIN lophoc ON hocsinh.MaLopHoc = lophoc.MaLopHoc JOIN hocky ON diem.MaHocKy = hocky.MaHocKy WHERE hocsinh.MaHS LIKE '$endKeyWord'";
       $query = mysqli_query($conn,$sql);

       $sql_view = "SELECT * FROM hocsinh JOIN diem ON hocsinh.MaHS = diem.MaHS JOIN monhoc ON diem.MaMonHoc = monhoc.MaMonHoc JOIN lophoc ON hocsinh.MaLopHoc = lophoc.MaLopHoc JOIN hocky ON diem.MaHocKy = hocky.MaHocKy WHERE hocsinh.MaHS LIKE '$endKeyWord'";
       $query_view = mysqli_query($conn,$sql);
       $row_view = mysqli_fetch_assoc($query_view);
     }else{
        $id_hs = '';
     }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bảng Điểm</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="search_main">
                    <nav class="main-menu text-lg-right" style="margin-right: 150px">
						<ul>
							<li ><a style="color: red;" href="index.php">Trang Chủ</a></li>							
						</ul>
					</nav>
    <table align="center" class="infor">
        <tr>
            <th>Họ Và Tên: </th>
            <td><?php echo $row_view['TenHS'] ?></td>
        </tr>
        <tr>
            <th>Lớp:</th>
            <td><?php echo $row_view['Tenlophoc'] ?></td>
        </tr>
        <tr>
            <th>Ngày Sinh: </th>
            <td><?php echo $row_view['NgaySinh'] ?></td>
        </tr>
        <tr>
            <th>Năm Học: </th>
            <td><?php echo $row_view['NamHoc'] ?></td>
        </tr>
    </table>
    <form action="">
        <label><strong>Năm Học</strong></label>
        <select name="nam_hoc" id="">
            <option selected value="1">2019-2020</option>
        </select>
    </form>
    <table align="center" class="result_sr">
        <thead>
            <tr>
                <th colspan="11">
                    <h2>Bảng kết quả học tập</h2>
                </th>
            </tr>
            <tr>
                
                <th>Mã Môn Học</th>
                <th>Tên Môn Học</th>
                <th>Điểm Miệng</th>
                <th>Điểm 15 Phút</th>
                <th>Điểm 15 Phút</th>
                <th>Điểm 1 Tiết</th>
                <th>Điểm 1 Tiết</th>
                <th>Điểm Thi</th>
                <th>Điểm Trung Bình</th>
                <th>Học Kỳ</th>
            </tr>
        </thead>
        <tbody align="center">
            <?php
                $tb_hk = 0;
                $i=0;                            
                while($row = mysqli_fetch_assoc($query)){
                    if ($row['MaHocKy']=='20191') {
                        $tb_hk += $row['DiemTB'];
                        $i++; 
                    }elseif($row['MaHocKy']=='20192') {
                        $tb_hk2 += $row['DiemTB'];
                        $i++; 
                    }                    
                                                       
            ?>
            <tr>
                
                <td><?php echo $row['MaMonHoc'] ?></td>
                <td><?php echo $row['TenMonHoc'] ?></td>
                <td><?php echo $row['DiemMieng'] ?></td>
                <td><?php echo $row['Diem15Phut1'] ?></td>
                <td><?php echo $row['Diem15Phut2'] ?></td>
                <td><?php echo $row['Diem1Tiet1'] ?></td>
                <td><?php echo $row['Diem1Tiet2'] ?></td>
                <td><?php echo $row['DiemThi'] ?></td>
                <td><?php echo $row['DiemTB'] ?></td>
                <td><?php echo $row['MaHocKy'] ?></td>
            </tr>
                <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="9">Điểm Trung Bình Học Kỳ I</th>
                <th colspan="2"><?php echo round($tb_hk/$i,1); ?></th>
            </tr>
            <tr>
                <th colspan="9">Điểm Trung Bình Học Kỳ II</th>
                <th colspan="2">8.0</th>
            </tr>
            <tr>
                <th colspan="9">Điểm Trung Bình Năm Học</th>
                <th colspan="2">8.0</th>
            </tr>
        </tfoot>
    </table>
</body>

</html>