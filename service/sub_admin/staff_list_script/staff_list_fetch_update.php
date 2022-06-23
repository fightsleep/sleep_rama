<?php
include '../../connect_db.php';
// echo 'Preecha10564';
// require_once '../connect.php';
include('../../patients/my_function/function.php');

	if(isset($_POST["staff_id"]))
	{

	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_staff
		WHERE staff_id = '".$_POST["staff_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["staff_id"] = $row["staff_id"];
		$output["staff_no"] = $row["staff_no"];
		$output["staff_prefix"] = $row["staff_prefix"];
		$output["staff_name"] = $row["staff_name"];
		$output["staff_lastname"] = $row["staff_lastname"];
		$output["staff_position"] = $row["staff_position"];
		$output["staff_level"] = $row["staff_level"];
		$output["staff_status"] = $row["staff_status"];
	}
	echo json_encode($output);
}	
?>