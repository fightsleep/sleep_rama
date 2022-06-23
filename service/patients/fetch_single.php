<?php
include('../connect_db.php');
include('my_function/function.php');
if(isset($_POST["id_auto_patient"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_patient 
		WHERE id_auto_patient = '".$_POST["id_auto_patient"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
	$output["id_auto_patient"] = $row["id_auto_patient"];
		$output["hn_patient"] = $row["hn_patient"];
		$output["prefix"] = $row["prefix"];
		$output["firstname"] = $row["firstname"];
		$output["lastname"] = $row["lastname"];
		$output["claim"] = $row["claim"];
		$output["birthdate"] = $row["birthdate"];
	}
	echo json_encode($output);
}
?>