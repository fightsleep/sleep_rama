<?php
include '../../connect_db.php';
// echo 'Preecha10564';
// require_once '../connect.php';
include('../../patients/my_function/function.php');

	if(isset($_POST["cpap_company_id"]))
	{

	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM list_cpap_company
		WHERE cpap_company_id = '".$_POST["cpap_company_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["cpap_company_id"] = $row["cpap_company_id"];
		$output["cpap_company_list"] = $row["cpap_company_list"];
		$output["cpap_company_note"] = $row["cpap_company_note"];
	}
	echo json_encode($output);
}	
?>
