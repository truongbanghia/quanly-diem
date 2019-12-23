<?php
   session_start();
   include_once('../admin/config/connect.php');
   $maMonHoc = $_GET['monhoc_id'];
   if (isset($_SESSION['mail_user']) && isset($_SESSION['pass_user'])) {
       $sql = "DELETE FROM monhoc WHERE MaMonHoc = '$maMonHoc'";
       $query = mysqli_query($conn,$sql);

       header('location: index.php?page=monhoc');
   }
