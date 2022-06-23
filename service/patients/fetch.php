<?php
include('../connect_db.php');
// require_once '../connect.php';
include('my_function/function.php');
require('my_function/function_date.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_patient ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE firstname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR lastname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR hn_patient LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id_auto_patient DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row["hn_patient"];
	$sub_array[] = $row["prefix"];
	$sub_array[] = $row["firstname"];
	$sub_array[] = $row["lastname"];
	$sub_array[] = $row["claim"];
	// $sub_array[] = $row['birthdate'];
	$sub_array[] = DateBirth($row['birthdate']);
	$sub_array[] = '<a href=profile.php?hn_patient='.$row['hn_patient'].' class="btn btn-success" >
	<i class="fas fa-user"></i> ประวัติ </a>';   
	$sub_array[] = '<button type="button" name="update" id="'.$row["id_auto_patient"].'" class="btn btn-warning btn-block update"><i class="fas fa-stethoscope"></i>แก้ไข</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id_auto_patient"].'" class="btn btn-danger btn-block delete">
	<i class="fas fa-trash"></i>ลบ</button>';
	$data[] = $sub_array;
}

//test csv
// function count_all_data($connection)
// {
//  $query = "SELECT * FROM tbl_patient";
//  $statement = $connection->prepare($query);
//  $statement->execute();
//  return $statement->rowCount();
// }
//

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>