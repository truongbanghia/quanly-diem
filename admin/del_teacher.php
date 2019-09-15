<?php

    session_start();
    include_once('config/connect.php');
    $teacher_id = $_GET['teacher_id'];

    if (isset($_SESSION['mail_user']) && isset($_SESSION['pass_user'])) {
        $sql = "DELETE FROM giaovien WHERE MaGV = '$teacher_id'";
        $query = mysqli_query($conn,$sql);

        header('location: index.php?page=teacher');
    }
