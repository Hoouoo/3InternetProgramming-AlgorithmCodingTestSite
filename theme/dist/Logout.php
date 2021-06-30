<?php

    include('db.php');    
    include('LoginCheck.php');

    if (is_login()){

        unset($_SESSION['user_id']);
        session_destroy();
    }

    header("Location: index.php");
?>