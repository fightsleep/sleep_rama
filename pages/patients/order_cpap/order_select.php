<?php
  $sql_order = 
  "SELECT * FROM tbl_order 
  LEFT JOIN list_cpap ON tbl_order.cpap_code=list_cpap.cpap_code
  WHERE tbl_order.hn_order = :hn_patient";
 $stmt_order = $connection->prepare($sql_order);
$stmt_order->execute(array(":hn_patient" => $_GET['hn_patient']));
 $result_order = $stmt_order->fetchAll();

    ?>

<!-- AS buy
  LEFT JOIN list_cpap AS cpap ON buy.code_cpap_order=cpap.cpap_code -->