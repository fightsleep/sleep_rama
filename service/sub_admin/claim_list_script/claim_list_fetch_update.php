<?php
include '../../connect_db.php';
// echo 'Preecha10564';
// require_once '../connect.php';
include('../../patients/my_function/function.php');

	if(isset($_POST["claim_id"]))
	{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM list_claim
		WHERE claim_id = '".$_POST["claim_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["claim_id"] = $row["claim_id"];
		$output["claim_list"] = $row["claim_list"];
		$output["claim_note"] = $row["claim_note"];
	}
	echo json_encode($output);
}	
?>

