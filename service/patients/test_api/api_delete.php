<?php
include('../connect_db.php');
// require_once '../connect.php';
include("function.php");
if(isset($_POST["hn_patient"]))
{
	$sql_delete = "DELETE FROM tbl_patient WHERE hn_patient = :hn";
	$statement = $connection->prepare($sql_delete);
	$result = $statement->execute(
		array(
			':hn'	=>	$_POST["hn_patient"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>