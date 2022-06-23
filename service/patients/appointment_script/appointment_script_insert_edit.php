<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
if (isset($_POST["operation_appointment"]))
{
if ($_POST["operation_appointment"] == "Add")
{
$sql_appointment_insert = ("INSERT INTO tbl_appointment (appointment_hn, appointment_contact_date, appointment_bill_id, appointment_risk, appointment_opd, appointment_note, appointment_recipient) 
VALUES (:appointment_hn, :appointment_contact_date, :appointment_bill_id, :appointment_risk, :appointment_opd, :appointment_note, :appointment_recipient) 
");
$statement = $connection->prepare($sql_appointment_insert);
$result = $statement->execute(array(
    ":appointment_hn" => $_POST['appointment_hn'],
    ":appointment_contact_date" => $_POST['appointment_contact_date'],
    ":appointment_bill_id" => $_POST['appointment_bill_id'],
    ":appointment_risk" => $_POST['appointment_risk'],
    ":appointment_opd" => $_POST['appointment_opd'],
    ":appointment_note" => $_POST['appointment_note'],
    ":appointment_recipient" => $_POST['appointment_recipient']
  
   )
);
if (!empty($result))
{
    echo 'Inserted Success';
}else{
    echo 'Inserted Not Success';
}

}
    //------ Start ถ้า $_POST "operation" == Edit  
    if ($_POST["operation_appointment"] == "Edit")
    {
        $sql_appointment_update = "UPDATE tbl_appointment
		SET  appointment_id = :appointment_id,  appointment_contact_date = :appointment_contact_date, appointment_bill_id = :appointment_bill_id, appointment_risk = :appointment_risk, appointment_opd = :appointment_opd, appointment_note = :appointment_note, appointment_recipient = :appointment_recipient
		WHERE appointment_id = :appointment_id";
        $statement = $connection->prepare( $sql_appointment_update);
        $result = $statement->execute(
            array(
                ":appointment_id" => $_POST['appointment_id'],
                ":appointment_contact_date" => $_POST['appointment_contact_date'],
                ":appointment_bill_id" => $_POST['appointment_bill_id'],
                ":appointment_risk" => $_POST['appointment_risk'],
                ":appointment_opd" => $_POST['appointment_opd'],
                ":appointment_note" => $_POST['appointment_note'],
                ":appointment_recipient" => $_POST['appointment_recipient']
            )
        );
        if (!empty($result))
        {
            echo 'Updated Success';
        }else{
            echo 'Updated Not Success';
        } 
    }
    http_response_code(200);  //code เพิ่มข้อมูลสำเร็จ
    echo json_encode($response);
}