<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
echo '<pre>';
print_r($_POST);
echo '</pre>';
// exit();
if (isset($_POST["operation_cpap_ed"]))
{
if ($_POST["operation_cpap_ed"] == "Add")
{
$sql_cpaped_insert = ("INSERT INTO tbl_cpap_ed(
cpaped_hn, 
cpaped_contactdate, 
cpaped_appointdate, 
cpaped_chanel,
cpaped_opd,   
cpaped_doctor, 
cpaped_order, 
cpaped_note, 
cpaped_staff) 
VALUES (
:cpaped_hn, 
:cpaped_contactdate, 
:cpaped_appointdate, 
:cpaped_chanel,  
:cpaped_opd, 
:cpaped_doctor, 
:cpaped_order, 
:cpaped_note, 
:cpaped_staff) 
");
$statement = $connection->prepare($sql_cpaped_insert);
$result = $statement->execute(array(
    ":cpaped_hn" => $_POST['cpaped_hn'],
    ":cpaped_contactdate" => $_POST['cpaped_contactdate'],
    ":cpaped_appointdate" => $_POST['cpaped_appointdate'],
    ":cpaped_chanel" => $_POST['cpaped_chanel'],
    ":cpaped_opd" => $_POST['cpaped_opd'],
    ":cpaped_doctor" => $_POST['cpaped_doctor'],
    ":cpaped_order" => $_POST['cpaped_order'],
    ":cpaped_note" => $_POST['cpaped_note'],
    ":cpaped_staff" => $_POST['cpaped_staff']
   )
);
if (!empty($result ))
{
    echo 'Inserted Success';
}else{
    echo 'Inserted Not Success';
}

}
    //------ Start ถ้า $_POST "operation" == Edit  
    if ($_POST["operation_cpap_ed"] == "Edit")
    {
        $sql_activity_update = "UPDATE tbl_activity
		SET  id_activity = :id_activity,  cpaped_contactdate = :cpaped_contactdate, cpaped_appointdate = :cpaped_appointdate, cpap_chanel_ed = :cpap_chanel_ed, cpap_ed_opd = :cpap_ed_opd, cpaped_doctor = :cpaped_doctor, cpaped_order = :cpaped_order, cpaped_note = :cpaped_note, cpaped_staff = :cpaped_staff
		WHERE id_activity = :id_activity";
        $statement = $connection->prepare( $sql_activity_update);
        $result = $statement->execute(
            array(
                ":id_activity" => $_POST['id_activity'],
                ":cpaped_contactdate" => $_POST['cpaped_contactdate'],
                ":cpaped_appointdate" => $_POST['cpaped_appointdate'],
                ":cpap_chanel_ed" => $_POST['cpap_chanel_ed'],
                ":cpap_ed_opd" => $_POST['cpap_ed_opd'],
                ":cpaped_doctor" => $_POST['cpaped_doctor'],
                ":cpaped_order" => $_POST['cpaped_order'],
                ":cpaped_note" => $_POST['cpaped_note'],
                ":cpaped_staff" => $_POST['cpaped_staff'],
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