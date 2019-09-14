<?php
    session_start();

    if (isset($_SESSION['mail_user']) || isset($_SESSION['mail_gv'])) {
        session_destroy();
    }

    header('location: index.php');
?>