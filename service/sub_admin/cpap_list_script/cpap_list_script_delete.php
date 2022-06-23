<?php
include('../../connect_db.php');
include('function_cpap.php');
// require_once '../connect.php';
// include("function.php");
// print_r($_POST);
if(isset($_POST["cpap_id"]))
{
	$cpap_image  = get_image_name($_POST["cpap_id"]);
	if($cpap_image != '')
	{
		unlink("cpap_image/".$cpap_image);
	}

	$sql_delete_cpap = "DELETE FROM list_cpap WHERE cpap_id = :cpap_id";
	$statement = $connection->prepare($sql_delete_cpap);
	$result = $statement->execute(
		array(
			':cpap_id'	=>	$_POST["cpap_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
