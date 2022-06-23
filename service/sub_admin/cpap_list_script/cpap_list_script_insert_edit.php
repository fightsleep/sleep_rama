<?php
// header('Content-Type: application/json');
include '../../connect_db.php';
include 'function_cpap.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
if (isset($_POST["operation_cpap"]))
{

    $cpap_image = '';
    if($_FILES["cpap_image"]["name"] != '')
    {
        $cpap_image = upload_image();
    }

if ($_POST["operation_cpap"] == "Add")
{
$sql_cpap_insert = ("INSERT INTO list_cpap 
(
cpap_code, 
cpap_name, 
cpap_model , 
cpap_type, 
cpap_download_type, 
cpap_type_pap, 
cpap_detail_model, 
cpap_selling_price,
cpap_wholesale_price,
cpap_company,
cpap_mask_type,
cpap_mask_size,
cpap_sales_status,
cpap_update_date,
cpap_note,
cpap_image
) 
VALUES 
(:cpap_code, 
:cpap_name, 
:cpap_model, 
:cpap_type, 
:cpap_download_type, 
:cpap_type_pap, 
:cpap_detail_model, 
:cpap_selling_price,
:cpap_wholesale_price, 
:cpap_company, 
:cpap_mask_type,
:cpap_mask_size,
:cpap_sales_status,
:cpap_update_date,
:cpap_note,
:cpap_image
) 
");
$statement = $connection->prepare($sql_cpap_insert);
$result = $statement->execute(array(
    ":cpap_code" => $_POST['cpap_code'],
    ":cpap_name" => $_POST['cpap_name'],
    ":cpap_model" => $_POST['cpap_model'],
    ":cpap_type" => $_POST['cpap_type'],
    ":cpap_download_type" => $_POST['cpap_download_type'],
    ":cpap_type_pap" => $_POST['cpap_type_pap'],
    ":cpap_detail_model" => $_POST['cpap_detail_model'],
    ":cpap_selling_price" => $_POST['cpap_selling_price '],
    ":cpap_wholesale_price" => $_POST['cpap_wholesale_price'],
    ":cpap_company" => $_POST['cpap_company'],
    ":cpap_mask_type" => $_POST['cpap_mask_type'],
    ":cpap_mask_size" => $_POST['cpap_mask_size'],
    ":cpap_sales_status" => $_POST['cpap_sales_status'],
    ":cpap_update_date" => $_POST['cpap_update_date'],
    ":cpap_note" => $_POST['cpap_note'],
    ":cpap_image" => $cpap_image
   )
);
if (!empty($result))
{
    echo 'Inserted Success';
}else{
    echo 'Inserted Not Success';
}
}
    //------ Start ถ้า $_POST "operation" == Edit    <img src="../../service/sub_admin/cpap_list_script/cpap_image/'.$cpap["cpap_image"].
    if ($_POST["operation_cpap"] == "Edit")
    {
        $cpap_image = '';
		 if($_FILES["cpap_image"]["name"] != '')
      //  if($_FILES["../../service/sub_admin/cpap_list_script/cpap_image/"]["name"] != '')
		{
            $cpap_image = $_POST["hidden_cpap_image"];
			//$cpap_image = upload_image();
		}
		else
		{
			$cpap_image = $_POST["hidden_cpap_image"];
		}


        $sql_cpap_update = "UPDATE list_cpap
		SET  
        cpap_id = :cpap_id,
        cpap_code = :cpap_code,
        cpap_name  = :cpap_name,
        cpap_model = :cpap_model,
        cpap_type = :cpap_type, 
        cpap_download_type = :cpap_download_type, 
        cpap_type_pap  = :cpap_type_pap , 
        cpap_detail_model = :cpap_detail_model,
        cpap_selling_price = :cpap_selling_price,
        cpap_wholesale_price = :cpap_wholesale_price,
        cpap_company = :cpap_company,
        cpap_mask_type = :cpap_mask_type,
        cpap_mask_size = :cpap_mask_size,
        cpap_sales_status = :cpap_sales_status,
        cpap_update_date = :cpap_update_date,
        cpap_note = :cpap_note,
        cpap_image = :cpap_image
		WHERE cpap_id = :cpap_id";
        $statement = $connection->prepare( $sql_cpap_update);
        $result = $statement->execute(
            array(
                ":cpap_id" => $_POST['cpap_id'],
                ":cpap_code" => $_POST['cpap_code'],
                ":cpap_name" => $_POST['cpap_name'],
                ":cpap_model" => $_POST['cpap_model'],
                ":cpap_type" => $_POST['cpap_type'],
                ":cpap_download_type" => $_POST['cpap_download_type'],
                ":cpap_type_pap" => $_POST['cpap_type_pap'],
                ":cpap_detail_model" => $_POST['cpap_detail_model'],
                ":cpap_selling_price" => $_POST['cpap_selling_price'],
                ":cpap_wholesale_price" => $_POST['cpap_wholesale_price'],
                ":cpap_company" => $_POST['cpap_company'],
                ":cpap_mask_type" => $_POST['cpap_mask_type'],
                ":cpap_mask_size" => $_POST['cpap_mask_size'],
                ":cpap_sales_status" => $_POST['cpap_sales_status'],
                ":cpap_update_date" => $_POST['cpap_update_date'],
                ":cpap_note" => $_POST['cpap_note'],
                ":cpap_image" => $cpap_image
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
