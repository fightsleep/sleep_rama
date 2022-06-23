<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
print_r($_POST);
if(isset($_POST["id_physical"]))
{
	$sql_delete_physical = "DELETE FROM tbl_physical WHERE id_physical = :id_physical";
	$statement = $connection->prepare($sql_delete_physical);
	$result = $statement->execute(
		array(
			':id_physical'	=>	$_POST["id_physical"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
