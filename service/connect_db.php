<?php
//connect database
 //PDO จะมี Object  ทั้งหมด 3 parameter ได้แก่ dbhost , dbname , dbpassword
session_start();
$dbhost = 'localhost';
$dbname = 'sleepdb';
$username = 'root';
$password = '';
$connection = new PDO("mysql:host={$dbhost};
dbname={$dbname}", 
$username, 
$password ) ;
try{
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');
 } catch (PDOException $e){
                echo "การเชื่อมต่อฐานข้อมูลล้มเหลว : ". $e->getMessage();
                exit();
            }

?>


<?php   //by appzstory
// $database = "Sleep Center";
// PDO  ย่อมาจาก PHP Data Object
// $DB_HOST = 'localhost';
// $DB_USERNAME = 'root';
// $DB_PASSWORD = '';
// $DB_NAME = 'basic1_crud';
//   //PDO จะมี Object  ทั้งหมด 3 parameter ได้แก่ dbhost , dbname , dbpassword
//   try{
// $conn = new PDO("mysql:host={$DB_HOST};  
//                 dbname={$DB_NAME};
//                 charset=utf8",
//                 $DB_USERNAME,
//                 $DB_PASSWORD);   
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//             } catch (PDOException $e){
//                 echo "การเชื่อมต่อฐานข้อมูลล้มเหลว : ". $e->getMessage();
//                 exit();
//             }