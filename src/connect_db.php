<?php
//connect database
session_start();
$dbname = 'sleepdb';
$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=sleepdb', $username, $password ) ;
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');

?>
