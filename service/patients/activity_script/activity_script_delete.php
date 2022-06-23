<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
// print_r($_POST);
if(isset($_POST["id_activity"]))
{
	$sql_delete_activity = "DELETE FROM tbl_activity WHERE id_activity = :id_activity";
	$statement = $connection->prepare($sql_delete_activity);
	$result = $statement->execute(
		array(
			':id_activity'	=>	$_POST["id_activity"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
