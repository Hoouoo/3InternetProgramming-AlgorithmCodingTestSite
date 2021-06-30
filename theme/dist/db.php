<?php

    $host = 'localhost';  // host 정보 입력
    $db_username = 'cse';  // 사용자 이름 
    $db_password = 'cse2021';  // 사용자 비밀번호 
    $db_name = 'cseWeb';  // 데이터 베이스

    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
	
    try {

        $con = new PDO("mysql:host={$host};dbname={$db_name};charset=utf8",$db_username, $db_password);
    } catch(PDOException $e) {

        die("Failed to connect to the database: " . $e->getMessage()); 
    }


    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) { 
        function undo_magic_quotes_gpc(&$array) { 
            foreach($array as &$value) { 
                if(is_array($value)) { 
                    undo_magic_quotes_gpc($value); 
                } 
                else { 
                    $value = stripslashes($value); 
                } 
            } 
        } 
 
        undo_magic_quotes_gpc($_POST); 
        undo_magic_quotes_gpc($_GET); 
        undo_magic_quotes_gpc($_COOKIE); 
    } 
 
    header('Content-Type: text/html; charset=utf-8'); 
    session_start();
?>