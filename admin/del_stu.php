<?php

    session_start();
    include_once('../admin/config/connect.php');
    $maHS = $_GET['id_hs'];
    if (isset($_SESSION['mail_user']) && isset($_SESSION['pass_user'])) {
        $sql = "DELETE FROM hocsinh WHERE MaHS = '$maHS'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
        header('location: index.php?page=list_stu&id_class='.$_GET['id_class'].'');
    }
