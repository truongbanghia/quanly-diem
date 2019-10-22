<?php 
    if (!defined('TEMPLATE')) {
		die('bạn không có quyền truy cập trang này!');
    }
    $gv_mail = $_SESSION['mail_gv'];
    $sql = "SELECT * FROM giaovien WHERE gv_mail = '$gv_mail'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);

    if (isset($_POST['sbm'])) {
        $pass = md5($_POST['pass']);
        $sql_gv = "UPDATE giaovien SET gv_pass = '$pass' WHERE gv_mail = '$gv_mail'";
        $query_gv = mysqli_query($conn,$sql_gv);
        $_SESSION['thongBao'] = 'Đổi mật khẩu thành công!';
    }

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <?php
            if (isset($_SESSION['thongBao'])) {
                echo '<div class="alert alert-success" role="alert"> <strong>';
                     echo $_SESSION['thongBao'];
                echo '</strong></div>';
            }
        ?>
        <div class="col-lg-3">
            <figure style="margin: 20px;">
                <img src="../img/teacher/1.png" width="100%" height="auto">
            </figure>
        </div>
        <div class="col-lg-9 text-center list-group">
            <ul style="font-size: 35px; color: red; list-style: none;">
                <li>Mã Giáo Viên: <span style="color: blue;"><?php echo $row['MaGV'] ?></span></li>
                <li>Họ và Tên: <span style="color: blue;"><?php echo $row['TenGV'] ?></span></li>
                <li>Địa Chỉ: <span style="color: blue;"><?php echo $row['DiaChi'] ?></span></li>
                <li>Số Điện Thoại: <span style="color: blue;"><?php echo $row['SDT'] ?></span></li>
                <li>Chuyên Môn: <span style="color: blue;"><?php echo $row['MaMonHoc'] ?></span></li>
                <li>Lớp Giảng Dạy: <span style="color: blue;"><?php echo $row['MaGV'] ?></span></li>
                <li>Đổi Mật Khẩu: 
                    <form method="post"><input type="password" name="pass" minlength="6" placeholder=" Nhập mật khẩu mới"><button type="submit" name="sbm">Chấp Nhận</button></form>    
                </li>
            </ul>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->