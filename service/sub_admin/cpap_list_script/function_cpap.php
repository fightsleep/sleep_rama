<?php

function upload_image()
{
	if(isset($_FILES["cpap_image"]))
	{
		$extension = explode('.', $_FILES['cpap_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './cpap_image/' . $new_name;
		move_uploaded_file($_FILES['cpap_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($cpap_id)
{
	include('../../connect_db.php');
	$statement = $connection->prepare("SELECT cpap_image FROM list_cpap WHERE cpap_id = '$cpap_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["cpap_image"];
	}
}

function get_total_all_records()
{
	include('../../connect_db.php');
	// require_once '../connect.php';
	$statement = $connection->prepare("SELECT * FROM list_cpap");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>