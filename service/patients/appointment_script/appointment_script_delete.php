<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
print_r($_POST);
if(isset($_POST["appointment_id"]))
{
	$sql_delete_appointment = "DELETE FROM tbl_appointment WHERE appointment_id = :appointment_id";
	$statement = $connection->prepare($sql_delete_appointment);
	$result = $statement->execute(
		array(
			':appointment_id'	=>	$_POST["appointment_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
