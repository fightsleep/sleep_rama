<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
$arr = $_POST['arrOrders'];   //รับข้อมูล
$name = $_POST['dataset']['name'];
$email = $_POST['dataset']['email'];
$date_buy = $_POST['dataset']['date_buy'];
$hn_order = $_POST['hn_order'];

// echo '<pre>';
// print_r ($_POST);
// echo '</pre>';

// exit();
foreach($arr as $row){
    $params = array(
     'hn_order' => $hn_order,
     'cpap_code' => $row['cpap_code'],
     'doctor_order' => $name,
     'serial_cpap_order' => $row['serial_no'],
     'date_cpap_order' => $date_buy,
    );
    $stmt = $connection->prepare('INSERT INTO tbl_order (hn_order, cpap_code, date_cpap_order, serial_cpap_order, doctor_order) 
    VALUES ( :hn_order, :cpap_code, :date_cpap_order, :serial_cpap_order, :doctor_order)');
    $stmt->execute($params);       

	// foreach($stmt as $row)
	// {
	// 	// $sub_array[] = DateBirth($row['birthdate']);
	// 	$output["id_order"] = $row["id_order"];
	// 	$output["cpap_code"] = $row["cpap_code"];
	// }
    $output = array();
	$statement = $connection->prepare(
		"SELECT id_order, hn_order, cpap_code  FROM tbl_order 
		WHERE hn_order = '".$_POST["hn_order"]."' AND DATE(date_cpap_order) = DATE(NOW()) 
        ORDER BY id_order DESC 
        "
    
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		// $sub_array[] = DateBirth($row['birthdate']);
		// $output["id_order"] = $row["id_order"];
		$output["hn_order"] = $row["hn_order"];
		// $output["cpap_code"] = $row["cpap_code"];
	}
if (!empty($stmt))
{
    $response = array(
        'status' => true,
        'message' => 'Create Success',
        // 'cpap_code' => $row['cpap_code'],
        'hn_order' => $hn_order,
        // 'id_order' =>  $row["id_order"],
        
    ); 
    http_response_code(200); 
    echo json_encode($response);
}else{
    $response = array(
        'status' => false,
        'message' => 'Not Success'
    ); 
    http_response_code(400);
    echo json_encode($response);
}

}
   
