<?php
include '../connect_db.php';
include 'function.php';
if (isset($_POST["operation"]))
{
    //----------------------------- Start ถ้า $_POST "operation" == add  ---------------------------------
    if ($_POST["operation"] == "Add")
    {
        $sql_insert = ("
		INSERT INTO tbl_patient (hn_patient, prefix, firstname, lastname, claim, birthdate)
		VALUES (:hn_patient, :prefix, :firstname, :lastname, :claim, :birthdate)");
        $statement = $connection->prepare($sql_insert);
        $result    = $statement->execute(
            array(
                ':hn_patient' => $_POST["hn_patient"],
                ':prefix'     => $_POST["prefix"],
                ':firstname'  => $_POST["firstname"],
                ':lastname'   => $_POST["lastname"],
                ':claim'      => $_POST["claim"],
                ':birthdate'  => $_POST["birthdate"],
            )
        );
        if (!empty($result))
        {
            echo 'Inserted';
        }
    }
    //----------------------------- Start ถ้า $_POST "operation" == Edit  ---------------------------------
    if ($_POST["operation"] == "Edit")
    {
        $sql_update = "UPDATE tbl_patient
		SET hn_patient = :hn_patient, prefix = :prefix, firstname = :firstname, lastname = :lastname, claim = :claim, birthdate = :birthdate
		WHERE hn_patient = :hn_patient";
        $statement = $connection->prepare($sql_update);
        $result    = $statement->execute(
            array(
                ':hn_patient' => $_POST["hn_patient"],
                ':prefix'     => $_POST["prefix"],
                ':firstname'  => $_POST["firstname"],
                ':lastname'   => $_POST["lastname"],
                ':claim'      => $_POST["claim"],
                ':birthdate'  => $_POST["birthdate"],
            )
        );
        if (!empty($result))
        {
            echo 'Updated';
        }
    }
}
