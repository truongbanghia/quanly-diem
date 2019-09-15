<?php 
    if (!defined('TEMPLATE')) {
		die('bạn không có quyền truy cập trang này!');
    }
    $gv_mail = $_SESSION['mail_gv'];
    $sql = "SELECT * FROM giaovien WHERE gv_mail = '$gv_mail'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-3">
            <figure>
                <img src="../img/teacher/1.png" width="100%" height="300px">
            </figure>
        </div>
        <div class="col-lg-9 text-justify">
            <ul style="font-size: 35px; color: red;">
                <li>Mã Giáo Viên: <span style="color: blue;"><?php echo $row['MaGV'] ?></span></li>
                <li>Họ và Tên: <span style="color: blue;"><?php echo $row['TenGV'] ?></span></li>
                <li>Địa Chỉ: <span style="color: blue;"><?php echo $row['DiaChi'] ?></span></li>
                <li>Số Điện Thoại: <span style="color: blue;"><?php echo $row['SDT'] ?></span></li>
                <li>Chuyên Môn: <span style="color: blue;"><?php echo $row['MaMonHoc'] ?></span></li>
                <li>Lớp Giảng Dạy: <span style="color: blue;"><?php echo $row['MaGV'] ?></span></li>
            </ul>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->