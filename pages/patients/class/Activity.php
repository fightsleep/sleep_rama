<?php

// class Activity {
	// SQL activity
//     public function getAllActivity(){
	$sql_activity = ("SELECT * FROM tbl_activity as activity
	-- LEFT JOIN tbl_staff AS staff ON activity.staff_activity=staff.staff_id
  WHERE activity.hn_activity = :hn_patient ; ");
	$stmt_activity = $connection->prepare($sql_activity);
	$stmt_activity->execute(array(":hn_patient" => $_GET['hn_patient']));
	$result_activity = $stmt_activity->fetchAll();
    return $result_activity;
//     }
// 	// END SQL
// }
?>