<?php
    session_start();
    require_once('config/db_backup.php');
    if (isset($_SESSION['mail_user']) || isset($_SESSION['mail_gv'])) {        
        session_destroy();
    }

    header('location: index.php');
?>