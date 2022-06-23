<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
print_r($_POST);
if(isset($_POST["staff_id"]))
{
	$sql_delete_staff = "DELETE FROM tbl_staff WHERE staff_id = :staff_id";
	$statement = $connection->prepare($sql_delete_staff);
	$result = $statement->execute(
		array(
			':staff_id'	=>	$_POST["staff_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
