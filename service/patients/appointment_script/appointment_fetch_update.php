<?php
include '../../connect_db.php';
// echo 'Preecha10564';
// require_once '../connect.php';
include('../my_function/function.php');
if(isset($_POST["appointment_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_appointment 
		WHERE appointment_id = '".$_POST["appointment_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["appointment_id"] = $row["appointment_id"];
		$output["appointment_hn"] = $row["appointment_hn"];
		$output["appointment_contact_date"] = $row["appointment_contact_date"];
		$output["appointment_psgdate"] = $row["appointment_psgdate"];
		$output["appointment_opd"] = $row["appointment_opd"];
		$output["appointment_bill_id"] = $row["appointment_bill_id"];
		$output["appointment_namecontact"] = $row["appointment_namecontact"];
		$output["appointment_note"] = $row["appointment_note"];
		$output["appointment_recipient"] = $row["appointment_recipient"];
		$output["appointment_risk"] = $row["appointment_risk"];
		// $output["blood_pressure"] = $row["blood_pressure"];
	}
	echo json_encode($output);
}
?>