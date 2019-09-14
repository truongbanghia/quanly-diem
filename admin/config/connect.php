<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'quanlydiem';

    $conn = mysqli_connect($host,$username,$password,$dbname);

    if ($conn) {
        //Tránh hiển thị nội dung trong csdl bị lỗi tiếng việt
        mysqli_query($conn, "SET NAMES 'utf8'");
    }else {
        die('Lỗi kết nối cơ sở dữ liệu');
    }
?>