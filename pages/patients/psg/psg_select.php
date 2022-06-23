<?php
    // SQL PSG --------------------------
    $sql_psg = ("SELECT * FROM tbl_psg as psg
    LEFT JOIN tbl_patient AS patient ON psg.hn_psg=patient.hn_patient
     WHERE psg.hn_psg = :hn_patient
     ORDER BY date_psg DESC; ");
    $stmt_psg = $connection->prepare($sql_psg);
    $stmt_psg->execute(array(":hn_patient" => $_GET['hn_patient']));
    $result_psg = $stmt_psg->fetchAll();
    //END SQL PSG 
    
    ?>