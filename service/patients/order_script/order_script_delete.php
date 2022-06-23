<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
// print_r($_POST);
if(isset($_POST["id_order"]))
{
	$sql_delete_order = "DELETE FROM tbl_order WHERE id_order = :id_order";
	$statement = $connection->prepare($sql_delete_order);
	$result = $statement->execute(
		array(
			':id_order'	=>	$_POST["id_order"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
