<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
print_r($_POST);
if(isset($_POST["claim_id"]))
{
	$sql_delete_staff = "DELETE FROM list_claim WHERE claim_id = :claim_id";
	$statement = $connection->prepare($sql_delete_staff);
	$result = $statement->execute(
		array(
			':claim_id'	=>	$_POST["claim_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
