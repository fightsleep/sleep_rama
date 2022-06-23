<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
echo '<pre>';
print_r($_POST);
echo '</pre>';
// exit();
if (isset($_POST["operation_staff"]))
{
if ($_POST["operation_staff"] == "Add")
{
$sql_staff_insert = ("INSERT INTO tbl_staff (staff_no, staff_prefix, staff_name, staff_lastname, staff_position, staff_level, staff_status) 
VALUES (:staff_no, :staff_prefix, :staff_name, :staff_lastname, :staff_position, :staff_level, :staff_status) 
");
$statement = $connection->prepare($sql_staff_insert);
$result = $statement->execute(array(
    ":staff_no" => $_POST['staff_no'],
    ":staff_prefix" => $_POST['staff_prefix'],
    ":staff_name" => $_POST['staff_name'],
    ":staff_lastname" => $_POST['staff_lastname'],
    ":staff_position" => $_POST['staff_position'],
    ":staff_level" => $_POST['staff_level'],
    ":staff_status" => $_POST['staff_status'],
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
    if ($_POST["operation_staff"] == "Edit")
    {
        $sql_staff_update = "UPDATE tbl_staff
		SET  
        staff_id = :staff_id,
        staff_no = :staff_no,
        staff_prefix = :staff_prefix,
        staff_name = :staff_name,
        staff_lastname = :staff_lastname, 
        staff_position = :staff_position, 
        staff_level = :staff_level, 
        staff_status = :staff_status
		WHERE staff_id = :staff_id";
        $statement = $connection->prepare( $sql_staff_update);
        $result = $statement->execute(
            array(
                ":staff_id" => $_POST['staff_id'],
                ":staff_no" => $_POST['staff_no'],
                ":staff_prefix" => $_POST['staff_prefix'],
                ":staff_name" => $_POST['staff_name'],
                ":staff_lastname" => $_POST['staff_lastname'],
                ":staff_position" => $_POST['staff_position'],
                ":staff_level" => $_POST['staff_level'],
                ":staff_status" => $_POST['staff_status'],
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