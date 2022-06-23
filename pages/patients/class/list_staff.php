<?php
$sql_list_staff = ("SELECT * FROM tbl_staff ");
$stmt_list_staff = $connection->prepare($sql_list_staff);
$stmt_list_staff->execute();
$result_list_staff = $stmt_list_staff->fetchAll();
?>