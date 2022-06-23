<div class="tab-pane" id="appointment">
  <?php
  require 'class/opd_list.php';   // รายชื่อ OPD
  require 'appointment_select.php';   //script SQL
  require 'appointment_modal.php';
 
  ?>
  <!-- Post -->
  <h3>ข้อมูลเกี่ยวกับ Appointment ทั้งหมด <?php echo $stmt_count_appointment->rowCount();  ?> ครั้ง</h3>
  
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="next_appointment-tab" data-toggle="tab" href="#appointment_current" role="tab" aria-controls="next_appointment" aria-selected="true">นัดหมายปัจจุบัน</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="allappointment-tab" data-toggle="tab" href="#allappointment" role="tab" aria-controls="allappointment" aria-selected="false">นัดหมายทั้งหมด</a>
    </li>
  </ul>
  <!-- Tab Content ---------->
  <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="appointment_current" role="tabpanel" aria-labelledby="home-tab">
      <?php
       require 'appointment_current.php';
      ?>
    </div>
    <div class="tab-pane fade" id="allappointment" role="tabpanel" aria-labelledby="allappointment-tab">
      <?php 
      require 'appointment_all.php';
      ?>
    </div>
  </div>
  <!-- ----------เลื่อนนัด------------------- -->
  <ul class="nav nav-tabs" id="myTab2" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="next_appointment-tab" data-toggle="tab" href="#next_appointment" role="tab" aria-controls="next_appointment" aria-selected="true">เลื่อนนัด</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">การโทรตาม</a>
    </li>
  </ul>
  <!-- Tab Content ---------->
  <div class="tab-content" id="myTabContent2">
  <div class="tab-pane fade show active" id="next_appointment" role="tabpanel" aria-labelledby="home-tab">
      <?php
       require 'appointment_next.php';
      ?>
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">..รอใสการโทรตาม.</div>
  </div>

</div>
<?php require 'appointment_script.php'; ?>
