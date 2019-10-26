<?php

    session_start();
    include_once('../admin/config/connect.php');
    $maHS = $_GET['id_hs'];
    if (isset($_SESSION['mail_user']) && isset($_SESSION['pass_user'])) {
        $sql_thongke= "DELETE FROM thongke WHERE MaHS = '$maHS'";
        $query_thongke = mysqli_query($conn,$sql_thongke);

        $sql_diem = "DELETE FROM diem WHERE MaHS = '$maHS'";
        $query_diem = mysqli_query($conn,$sql_diem);


        $sql = "DELETE FROM hocsinh WHERE MaHS = '$maHS'";
        $query = mysqli_query($conn,$sql);        
        

        header('location: index.php?page=list_stu&id_class='.$_GET['id_class'].'');
    }
