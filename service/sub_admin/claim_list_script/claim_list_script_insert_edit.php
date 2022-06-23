<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
echo '<pre>';
print_r($_POST);
echo '</pre>';
// exit();
if (isset($_POST["operation_claim"]))
{
if ($_POST["operation_claim"] == "Add")
{
$sql_claim_insert = ("INSERT INTO list_claim (claim_list, claim_note) 
VALUES (:claim_list, :claim_note) 
");
$statement = $connection->prepare($sql_claim_insert);
$result = $statement->execute(array(
    ":claim_list" => $_POST['claim_list'],
    ":claim_note" => $_POST['claim_note']
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
    if ($_POST["operation_claim"] == "Edit")
    {
        $sql_claim_update = "UPDATE list_claim
		SET  
        claim_id = :claim_id,
        claim_list = :claim_list,
        claim_note = :claim_note
		WHERE claim_id = :claim_id";
        $statement = $connection->prepare( $sql_claim_update);
        $result = $statement->execute(
            array(
                ":claim_id" => $_POST['claim_id'],
                ":claim_list" => $_POST['claim_list'],
                ":claim_note" => $_POST['claim_note']
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