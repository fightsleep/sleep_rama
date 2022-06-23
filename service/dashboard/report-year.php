<?php
header('Content-Type: application/json');
require_once '../connect_db.php';

$sql_order = '
SELECT cpap_company ,CAST(COUNT(hn_order) AS INT) AS count_order  FROM `tbl_order`
LEFT JOIN list_cpap ON tbl_order.cpap_code = list_cpap.cpap_code
WHERE cpap_type = "CPAP ครบชุด" OR cpap_type = "CPAP เฉพาะเครื่องและสาย"
GROUP BY cpap_company
';

    $stmt_order = $connection->query($sql_order);
    $result_order = $stmt_order->fetchAll(PDO::FETCH_ASSOC);
    $label = array();
    $data = array();
   
    // exit();
    foreach($result_order as $key => $value){
      $label[] = $value['cpap_company'];
      $data[] = (int)$value['count_order'];
    }
  //  $data = implode("/", $data);
//  print_r($label);
//  print_r($data);
    //  exit();
$response = [
    'status' => true,
    'response' => [
        'label' => 'ยอดขายเฉพาะเครื่อง CPAP ทั้งหมด',
        'labels' => $label, 
        'results' => $data
    ],
    'message' => 'OK'
];
http_response_code(200);
echo json_encode($response);
