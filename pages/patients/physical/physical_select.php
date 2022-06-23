<?php
    // SQL Physical
    $sql_physical = ("SELECT * FROM tbl_physical as physical
  WHERE physical.hn_physical = :hn_patient
  ORDER BY date_physical DESC; ");
    $stmt_physical = $connection->prepare($sql_physical);
    $stmt_physical->execute(array(":hn_patient" => $_GET['hn_patient']));
    $result_physical = $stmt_physical->fetchAll();
    // END SQL
    ?>

    