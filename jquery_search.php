<?php 
    include_once('admin/config/connect.php');
    $id_hs = $_POST['maHS'];
    //Bóc tách keyWord thành mảng
    $arrKeyWord = explode(' ',$id_hs);
    //chuyển mảng thành xâu
    $endKeyWord = '%'.implode('%',$arrKeyWord).'%';
    $namHoc = $_POST['namHoc'];
    $sql = "SELECT * FROM hocky WHERE NamHoc = '$namHoc'";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query) == 0){
        echo "<script>alert(Không có kết quả hiển thị)</script>";
        die();
    }else{
        while($row_hk = mysqli_fetch_assoc($query)){
            $maHK[] = $row_hk['MaHocKy'];
        }
    }
?>
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
                $sql = "SELECT * FROM hocsinh JOIN diem ON hocsinh.MaHS = diem.MaHS JOIN monhoc ON diem.MaMonHoc = monhoc.MaMonHoc JOIN lophoc ON hocsinh.MaLopHoc = lophoc.MaLopHoc JOIN hocky ON diem.MaHocKy = hocky.MaHocKy WHERE hocsinh.MaHS LIKE '$endKeyWord'";
                $query = mysqli_query($conn,$sql);                  
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