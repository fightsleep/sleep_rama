<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
if (isset($_POST["operation_activity"]))
{
if ($_POST["operation_activity"] == "Add")
{
$sql_activity_insert = ("INSERT INTO tbl_activity (hn_activity, contact_activity, date_activity, time_activity, opd_activity, note_activity, staff_activity, consultant_activity, channel_activity) 
VALUES (:hn_activity, :contact_activity, :date_activity, :time_activity, :opd_activity, :note_activity, :staff_activity, :consultant_activity, :channel_activity) 
");
$statement = $connection->prepare($sql_activity_insert);
$result = $statement->execute(array(
    ":hn_activity" => $_POST['hn_activity'],
    ":contact_activity" => $_POST['contact_activity'],
    ":date_activity" => $_POST['date_activity'],
    ":time_activity" => $_POST['time_activity'],
    ":opd_activity" => $_POST['opd_activity'],
    ":note_activity" => $_POST['note_activity'],
    ":staff_activity" => $_POST['staff_activity'],
    ":consultant_activity" => $_POST['consultant_activity'],
    ":channel_activity" => $_POST['channel_activity'],
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
    if ($_POST["operation_activity"] == "Edit")
    {
        $sql_activity_update = "UPDATE tbl_activity
		SET  
        id_activity = :id_activity,  
        contact_activity = :contact_activity, 
        date_activity = :date_activity, 
        time_activity = :time_activity, 
        opd_activity = :opd_activity, 
        note_activity = :note_activity, 
        staff_activity = :staff_activity, 
        consultant_activity = :consultant_activity, 
        channel_activity = :channel_activity
		WHERE id_activity = :id_activity";
        $statement = $connection->prepare( $sql_activity_update);
        $result = $statement->execute(
            array(
                ":id_activity" => $_POST['id_activity'],
                ":contact_activity" => $_POST['contact_activity'],
                ":date_activity" => $_POST['date_activity'],
                ":time_activity" => $_POST['time_activity'],
                ":opd_activity" => $_POST['opd_activity'],
                ":note_activity" => $_POST['note_activity'],
                ":staff_activity" => $_POST['staff_activity'],
                ":consultant_activity" => $_POST['consultant_activity'],
                ":channel_activity" => $_POST['channel_activity'],
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