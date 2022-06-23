<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
echo '<pre>';
print_r($_POST);
echo '</pre>';
// exit();
if (isset($_POST["operation_appointment_next"]))
{
if ($_POST["operation_appointment_next"] == "Add")
{
$sql_appointment_next_insert = ("INSERT INTO tbl_next_appoint(
count_postpone_next, 
note_next_appoint, 
appointment_id_fornext,
next_appoint_datecontact, 
next_appoint_date, 
staff_postpone_next) 
VALUES(
:count_postpone_next, 
:note_next_appoint, 
:appointment_id_fornext, 
:next_appoint_datecontact, 
:next_appoint_date, 
:staff_postpone_next) 
");
$statement = $connection->prepare($sql_appointment_next_insert);
$result = $statement->execute(array(
    ":count_postpone_next" => $_POST['count_postpone_next'],
    ":note_next_appoint" => $_POST['note_next_appoint'],
    ":appointment_id_fornext" => $_POST['appointment_id_fornext'],
    ":next_appoint_datecontact" => $_POST['next_appoint_datecontact'],
    ":next_appoint_date" => $_POST['next_appoint_date'],
    ":staff_postpone_next" => $_POST['staff_postpone_next'],
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
    if ($_POST["operation_appointment_next"] == "Edit")
    {
        $sql_appointment_next_update = "UPDATE tbl_appointment_next
		SET  appointment_next_id = :appointment_next_id,  next_appoint_datecontact = :next_appoint_datecontact, next_appoint_date = :next_appoint_date, count_postpone_next = :count_postpone_next, note_next_appoint = :note_next_appoint,  = :, staff_postpone_next = :staff_postpone_next
		WHERE appointment_next_id = :appointment_next_id";
        $statement = $connection->prepare( $sql_appointment_next_update);
        $result = $statement->execute(
            array(
                ":appointment_next_id" => $_POST['appointment_next_id'],
                ":next_appoint_datecontact" => $_POST['next_appoint_datecontact'],
                ":next_appoint_date" => $_POST['next_appoint_date'],
                ":count_postpone_next" => $_POST['count_postpone_next'],
                ":note_next_appoint" => $_POST['note_next_appoint'],
                ":" => $_POST[''],
                ":staff_postpone_next" => $_POST['staff_postpone_next']
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