<?php
// SQL Profile
$sql_profile = ("SELECT * FROM tbl_patient as p
-- LEFT JOIN tbl_psg AS psg ON p.hn_patient=psg.hn_psg
-- LEFT JOIN tbl_physical as a ON p.hn_patient=a.hn_physical
 WHERE p.hn_patient = :hn_patient ");
$stmt = $connection->prepare($sql_profile);
$stmt->execute(array(":hn_patient" => $_GET['hn_patient']));
$row = $stmt->fetch(PDO::FETCH_OBJ);

?>