<?php
header('Content-Type: application/json');
include '../../connect_db.php';
// require_once '../connect.php';
$sql = 'SELECT * FROM list_cpap
WHERE cpap_sales_status="พร้อมขาย"';
    $stmt = $connection->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($result);
    if(count($result)){
        $response = array(
            'status' => true,
            'response' => $result,
            'message' => 'Get Data Success'
        );
        echo json_encode($response);     
     }else {
         $response = array(
             'status' => false,
             'message' => 'Get Data Not Success '
         );
         http_response_code(200);
         echo json_encode($response);
     }
     ?>
     
     