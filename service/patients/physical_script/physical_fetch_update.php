<?php
include '../../connect_db.php';
// echo 'Preecha10564';
// require_once '../connect.php';
include('../my_function/function.php');
if(isset($_POST["id_physical"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_physical 
		WHERE id_physical = '".$_POST["id_physical"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["id_physical"] = $row["id_physical"];
		$output["hn_physical"] = $row["hn_physical"];
		$output["date_physical"] = $row["date_physical"];
		$output["weight1"] = $row["weight"];
		$output["height"] = $row["height"];
		$output["neck"] = $row["neck"];
		$output["waist"] = $row["waist"];
		$output["hip"] = $row["hip"];
		$output["pulse_rate"] = $row["pulse"];
		$output["blood_pressure"] = $row["blood_pressure"];
		// $output["blood_pressure"] = $row["blood_pressure"];
	}
	echo json_encode($output);
}
?>