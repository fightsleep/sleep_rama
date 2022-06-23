<?php
  // SQL CPAP Ed
  $sql_cpap_ed = ("SELECT * FROM tbl_cpap_ed as cpap_ed
  WHERE cpap_ed.cpaped_hn = :hn_patient
  ; ");
  $stmt_cpap_ed = $connection->prepare($sql_cpap_ed);
  $stmt_cpap_ed->execute(array(":hn_patient" => $_GET['hn_patient']));
  $result_cpap_ed = $stmt_cpap_ed->fetchAll();
