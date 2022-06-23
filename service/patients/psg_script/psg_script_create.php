<?php
//การเพิ่มข้อมูลแบบเก่าของ appz story และแบบ modal ต่างก็ส่งข่อมูลมา run ที่นี่
header('Content-Type: application/json');
require_once '../../connect_db.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
$sql = ("INSERT INTO tbl_psg (hn_psg, date_psg, old_new_psg, opd_psg, opd_ipd_psg, doctor_refering, doctor_review, predx) 
VALUES (:hn_psg, :date_psg, :old_new_psg, :opd_psg, :opd_ipd_psg, :doctor_refering, :doctor_review, :predx)
");
$stmt = $connection->prepare($sql);
$stmt->execute(array(
    ":hn_psg" => $_POST['hn_psg'],
    ":date_psg" => $_POST['date_psg'],
    ":old_new_psg" => $_POST['old_new_psg'],
    ":opd_psg" => $_POST['opd_psg'],
    ":opd_ipd_psg" => $_POST['opd_ipd_psg'],
    ":doctor_refering" => $_POST['doctor_refering'],
    ":doctor_review" => $_POST['doctor_review'],
    ":predx" => $_POST['predx']
   )
);
if(!empty($result)){
    $response = array(
        'status' => true,
        'message' => 'Create Success'
    );    
 }else {
    $response = array(
        'status' => false,
        'message' => 'Not Success'
    ); 
}
     http_response_code(200);  //code เพิ่มข้อมูลสำเร็จ
     echo json_encode($response);

?>



