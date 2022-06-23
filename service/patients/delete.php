<?php
include('../connect_db.php');
// require_once '../connect.php';
//include("function.php");
if(isset($_POST["id_auto_patient"]))
{
	$sql_delete = "DELETE FROM tbl_patient WHERE id_auto_patient = :id_auto_patient";
	$statement = $connection->prepare($sql_delete);
	$result = $statement->execute(
		array(
			':id_auto_patient'	=>	$_POST["id_auto_patient"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>