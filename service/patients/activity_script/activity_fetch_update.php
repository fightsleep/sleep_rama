<?php
include '../../connect_db.php';
// echo 'Preecha10564';
// require_once '../connect.php';
// include('../my_function/function.php');
require('../my_function/function_date.php');
if(isset($_POST["id_activity"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_activity 
		WHERE id_activity = '".$_POST["id_activity"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		// $sub_array[] = DateBirth($row['birthdate']);
		$output["id_activity"] = $row["id_activity"];
		$output["hn_activity"] = $row["hn_activity"];
		$output["contact_activity"] = $row["contact_activity"];
		$output["date_activity"] = $row['date_activity'];
		$output["time_activity"] = $row["time_activity"];
		$output["opd_activity"] = $row["opd_activity"];
		$output["note_activity"] = $row["note_activity"];
		$output["staff_activity"] = $row["staff_activity"];
		$output["consultant_activity"] = $row["consultant_activity"];
		$output["channel_activity"] = $row["channel_activity"];
		// $output["blood_pressure"] = $row["blood_pressure"];
	}
	echo json_encode($output);
}
?>
 