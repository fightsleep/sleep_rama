<?php
include '../../connect_db.php';
// echo 'Preecha10564';
// require_once '../connect.php';
// include('../../patients/my_function/function.php');
include('function_cpap.php');
	if(isset($_POST["cpap_id"]))
	{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM list_cpap
		WHERE cpap_id = '".$_POST["cpap_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["cpap_id"] = $row["cpap_id"];
		$output["cpap_code"] = $row["cpap_code"];
		$output["cpap_name"] = $row["cpap_name"];
		$output["cpap_model"] = $row["cpap_model"];
		$output["cpap_type"] = $row["cpap_type"];
		$output["cpap_download_type"] = $row["cpap_download_type"];
		$output["cpap_type_pap"] = $row["cpap_type_pap"];
		$output["cpap_detail_model"] = $row["cpap_detail_model"];
		$output["cpap_selling_price"] = $row["cpap_selling_price"];
		$output["cpap_wholesale_price"] = $row["cpap_wholesale_price"];
		$output["cpap_company"] = $row["cpap_company"];
		$output["cpap_mask_type"] = $row["cpap_mask_type"];
		$output["cpap_mask_size"] = $row["cpap_mask_size"];
		$output["cpap_sales_status"] = $row["cpap_sales_status"];
		$output["cpap_update_date"] = $row["cpap_update_date"];
		$output["cpap_note"] = $row["cpap_note"];
		if($row["cpap_image"] != '')
		{
		$output["cpap_image"] = '<img src="../../service/sub_admin/cpap_list_script/cpap_image/'.$row["cpap_image"].'" class="img-fluid" width="300px" />
		
			<input type="text" name="hidden_cpap_image" value="'.$row["cpap_image"].'" />';
		}
		else
		{
			$output['cpap_image'] = '<input type="text" name="hidden_cpap_image" value="" />';
		}
	}
	echo json_encode($output);
}	
?>