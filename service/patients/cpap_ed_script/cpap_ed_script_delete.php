<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
// print_r($_POST);
if(isset($_POST["cpaped_id"]))
{
	$sql_delete_activity = "DELETE FROM tbl_cpap_ed WHERE cpaped_id = :cpaped_id";
	$statement = $connection->prepare($sql_delete_activity);
	$result = $statement->execute(
		array(
			':cpaped_id'	=>	$_POST["cpaped_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>