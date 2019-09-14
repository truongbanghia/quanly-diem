<?php
    session_start();
    define('TEMPLATE',true);
    include_once ('config/connect.php');
    
    if (isset($_SESSION['mail_user'])) {
        // if($_SESSION['user_level']==1) {
            include_once ('admin.php');
        // }else{
        //     include_once ('../teacher/home_gv.php');
        // } 
    }elseif(isset($_SESSION['mail_gv'])){
        include_once ('../teacher/home_gv.php');
    }
    else {
        include_once ('login.php');
    }
?>