<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
print_r($_POST);
if(isset($_POST["next_appoint_id"]))
{
	$sql_delete_appointment = "DELETE FROM tbl_next_appoint WHERE next_appoint_id = :next_appoint_id";
	$statement = $connection->prepare($sql_delete_appointment);
	$result = $statement->execute(
		array(
			':next_appoint_id'	=>	$_POST["next_appoint_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
