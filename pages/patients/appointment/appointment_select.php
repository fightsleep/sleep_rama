<?php
  // SQL appointment
  $sql_appointment = ("SELECT * FROM tbl_appointment as appointment
  WHERE appointment.appointment_hn = :hn_patient
  ORDER BY appointment_contact_date DESC
  LIMIT 1
  ; ");
  $stmt_appointment = $connection->prepare($sql_appointment);
  $stmt_appointment->execute(array(":hn_patient" => $_GET['hn_patient']));
  $result_appointment = $stmt_appointment->fetchAll();

// SQL Count appointment
  $sql_count_appointment = ("SELECT * FROM tbl_appointment as appointment
  WHERE appointment.appointment_hn = :hn_patient
  ; ");
  $stmt_count_appointment = $connection->prepare($sql_count_appointment);
  $stmt_count_appointment->execute(array(":hn_patient" => $_GET['hn_patient']));
  $result_count_appointment = $stmt_count_appointment->fetchAll();
  // END SQL
  ?>