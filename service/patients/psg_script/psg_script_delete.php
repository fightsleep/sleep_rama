<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
// print_r($_POST);
if(isset($_POST["id_psg"]))
{
	$sql_delete_psg = "DELETE FROM tbl_psg WHERE id_psg = :id_psg";
	$statement = $connection->prepare($sql_delete_psg);
	$result = $statement->execute(
		array(
			':id_psg'	=>	$_POST["id_psg"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
