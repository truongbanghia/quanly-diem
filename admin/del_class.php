<?php
    
    session_start();
    include_once('../admin/config/connect.php');
    $maLopHoc = $_GET['id_lop'];
    if (isset($_SESSION['mail_user']) && isset($_SESSION['pass_user'])) {
        $sql = "DELETE FROM lophoc WHERE MaLopHoc = '$maLopHoc'";
        $query = mysqli_query($conn,$sql);

        header('location: index.php?page=class');
    }
