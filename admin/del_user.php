<?php

    session_start();
    include_once('../admin/config/connect.php');
    $user_id = $_GET['user_id'];
    if (isset($_SESSION['mail_user']) && isset($_SESSION['pass_user'])) {
        $sql = "DELETE FROM user WHERE user_id = '$user_id'";
        $query = mysqli_query($conn,$sql);

        header('location: index.php?page=user');
    }
