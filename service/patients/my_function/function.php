<?php
function get_total_all_records()
{
	include('../connect_db.php');
	// require_once '../connect.php';
	$statement = $connection->prepare("SELECT * FROM tbl_patient");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
?>