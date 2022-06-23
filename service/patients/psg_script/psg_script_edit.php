<?php
//การเพิ่มข้อมูลแบบเก่าของ appz story และแบบ modal ต่างก็ส่งข่อมูลมา run ที่นี่
header('Content-Type: application/json');
require_once '../../connect_db.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
$sql_update = "UPDATE tbl_psg
SET id_psg = :id_psg, date_psg = :date_psg, old_new_psg = :old_new_psg, opd_psg = :opd_psg, opd_ipd_psg = :opd_ipd_psg, doctor_refering = :doctor_refering, doctor_review = :doctor_review, predx = :predx
WHERE id_psg = :id_psg";
$stmt = $connection->prepare($sql_update);
$stmt->execute(
    array(
        ':id_psg' => $_POST["id_psg"],
        ':date_psg' => $_POST["date_psg"],
        ':old_new_psg'     => $_POST["old_new_psg"],
        ':opd_psg'  => $_POST["opd_psg"],
        ':opd_ipd_psg'   => $_POST["opd_ipd_psg"],
        ':doctor_refering'      => $_POST["doctor_refering"],
        ':doctor_review'  => $_POST["doctor_review"],
        ':predx'  => $_POST["predx"],

    )
);


$sql_update_log = ("INSERT INTO tbl_psg_update_log (ref_psg_id, log_edit_psg) 
VALUES (:id_psg, :user_edit_psg)
");
$stmt2 = $connection->prepare($sql_update_log);
$stmt2->execute(array(
    ":id_psg" => $_POST['id_psg'],
    ":user_edit_psg" => $_POST['user_edit_psg']
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
     http_response_code(200);  //code เพิ่มข้อมูลสำเร็จ
     echo json_encode($response);
 }
?>


