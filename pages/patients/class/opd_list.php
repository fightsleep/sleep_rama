<?php
$sql_list_opd = ("SELECT * FROM list_opd ");
$stmt_list_opd = $connection->prepare($sql_list_opd);
$stmt_list_opd->execute();
$result_list_opd = $stmt_list_opd->fetchAll();
?>