<?php  
    // $root = $_SERVER['DOCUMENT_ROOT'];
    // $path = '/my_project/sleeprama_systems/service/connect_db.php';
    // require_once("$root.$path");  //แบบนี้ก็ได้
    require_once '../../service/connect_db.php' ; 

    if( !isset($_SESSION['AD_ID'] ) ){      //มีการ check ว่ามี session id หรือยัง ถ้าไม่มีให้เด้งกลับไปที่หน้า login
        header('Location: ../../login.php');  
    }
?>