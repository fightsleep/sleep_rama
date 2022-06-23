<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
print_r($_POST);
if(isset($_POST["cpap_company_id"]))
{
	$sql_delete_cpap_company = "DELETE FROM list_cpap_company WHERE cpap_company_id = :cpap_company_id";
	$statement = $connection->prepare($sql_delete_cpap_company);
	$result = $statement->execute(
		array(
			':cpap_company_id'	=>	$_POST["cpap_company_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
