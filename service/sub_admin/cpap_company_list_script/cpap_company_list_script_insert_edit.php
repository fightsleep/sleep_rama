<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
echo '<pre>';
print_r($_POST);
echo '</pre>';
// exit();
if (isset($_POST["operation_cpap_company"]))
{
if ($_POST["operation_cpap_company"] == "Add")
{
$sql_cpap_company_insert = ("INSERT INTO list_cpap_company ( cpap_company_list, cpap_company_note)
VALUES (:cpap_company_list, :cpap_company_note) 
");
$statement = $connection->prepare($sql_cpap_company_insert);
$result = $statement->execute(array(
    ":cpap_company_list" => $_POST['cpap_company_list'],
    ":cpap_company_note" => $_POST['cpap_company_note']
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
    if ($_POST["operation_cpap_company"] == "Edit")
    {
        $sql_cpap_company_update = "UPDATE list_cpap_company
		SET  
        cpap_company_id = :cpap_company_id,
        cpap_company_list = :cpap_company_list,
        cpap_company_note = :cpap_company_note
		WHERE cpap_company_id = :cpap_company_id";
        $statement = $connection->prepare( $sql_cpap_company_update);
        $result = $statement->execute(
            array(
                ":cpap_company_id" => $_POST['cpap_company_id'],
                ":cpap_company_list" => $_POST['cpap_company_list'],
                ":cpap_company_note" => $_POST['cpap_company_note']
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