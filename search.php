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

       if (mysqli_num_rows($query) == "") {
           echo '<script>';
           echo 'alert("Không tìm thấy mã vừa nhập !!!")';            
           echo '</script>'; 
           $err = 1;     
       }

       $sql_view = "SELECT * FROM hocsinh JOIN diem ON hocsinh.MaHS = diem.MaHS JOIN monhoc ON diem.MaMonHoc = monhoc.MaMonHoc JOIN lophoc ON hocsinh.MaLopHoc = lophoc.MaLopHoc JOIN hocky ON diem.MaHocKy = hocky.MaHocKy WHERE hocsinh.MaHS LIKE '$endKeyWord'";
       $query_view = mysqli_query($conn,$sql_view);
       $row_view = mysqli_fetch_assoc($query_view);
     }else{
        $id_hs = '';
     }

     $maHK = ['20191','20192']; 
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
    <script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</head>

<body id="search_main">
                    <nav class="main-menu text-lg-right" style="margin-right: 150px">
						<ul>
							<li ><a style="color: red;" href="index.php">Trang Chủ</a></li>							
						</ul>
					</nav>
    <table align="center" class="infor">
        <tr>
            <th style="padding-top: 15px;">Họ Và Tên: </th>
            <td><?php echo $row_view['TenHS'] ?></td>
        </tr>
        <tr>
            <th>Lớp:</th>
            <td><?php echo $row_view['Tenlophoc'] ?></td>
        </tr>
        <tr>
            <th style="padding-bottom: 15px;">Ngày Sinh: </th>
            <td><?php echo $row_view['NgaySinh'] ?></td>
        </tr>       
    </table>
    <?php 
        if(isset($_POST['sbm'])){
            $nam_hoc = $_POST['nam_hoc'];
            $sql_hk = "SELECT * FROM hocky WHERE NamHoc = '$nam_hoc'";
            $query_hk = mysqli_query($conn,$sql_hk);
            if(mysqli_num_rows($query_hk) == ""){                
                         
            }else{
                while($row_hk = mysqli_fetch_assoc($query_hk)){
                    $maHK[] = $row_hk['MaHocKy'];
                }
            }           
        }
    ?>
    <form method="post">
        <label><strong>Năm Học</strong></label>        
        <select name="nam_hoc" id="namHoc">
            <option value="18-19">18-19</option>          
            <option selected value="19-20">19-20</option>
            <option value="20-21">20-21</option>                   
        </select>
        <!-- <button style="height: 30px;" type="submit" name="sbm" >Chấp nhận</button> -->
    </form>
        
   <div id="ketqua">
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
                $tb_hk2 = 0;
                $i=0; 
                $j = 0;                          
                while($row = mysqli_fetch_assoc($query)){
                    if ($row['MaHocKy'] == $maHK[0]) {
                        $tb_hk += $row['DiemTB'];
                        $i++; 
                    }elseif($row['MaHocKy']== $maHK[1]) {
                        $tb_hk2 += $row['DiemTB'];
                        $j++; 
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
                <th colspan="2"><?php if(!isset($err)){if($tb_hk != 0 && $i != 0){echo $tb_hk=round($tb_hk/$i,1);}else{echo '---';}}else{echo '---';} ?></th>
            </tr>
            <tr>
                <th colspan="9">Điểm Trung Bình Học Kỳ II</th>
                <th colspan="2"><?php if(!isset($err)){if($tb_hk2 != 0 && $j != 0){echo $tb_hk2=round($tb_hk2/$j,1);}else{echo '---';}}else{echo '---';} ?></th>
            </tr>
            <tr>
                <?php 
                    if ($tb_hk != 0 && $tb_hk2 != 0) {
                        $dtb = round(($tb_hk+($tb_hk2*2))/3,1); 
                    }                 
                ?>
                <th colspan="9">Điểm Trung Bình Năm Học</th>
                <th colspan="2"><?php if(isset($dtb)){echo $dtb;}else{echo '---';} ?></th>
                
            </tr>
            <tr>                
                <th colspan="9">Xếp Loại</th>
                <th colspan="2"><?php if (isset($dtb)) {
                    if ($dtb >= 0 && $dtb <= 3.9) {
                        echo 'Kém';
                    }elseif($dtb >= 4 && $dtb <= 4.9){
                        echo 'Yếu';
                    }elseif($dtb >= 5 && $dtb <= 6.4){
                        echo 'Trung Bình';
                    }elseif($dtb >= 6.5 && $dtb <= 7.9){
                        echo 'Khá';
                    }elseif($dtb >= 8){
                        echo 'Giỏi';
                    }
                }?></th>
                
            </tr>
        </tfoot>
    </table>
   </div>

   <script>
        jQuery(document).ready(function($){
            $("#namHoc").change(function(event){
                namHoc =  $("#namHoc").val();
                $.post('jquery_search.php',{"namHoc": namHoc, "maHS": <?php echo $id_hs ?>}, function(data){
                    $("#ketqua").html(data);
                });
            });
        });
    </script>
</body>

</html>