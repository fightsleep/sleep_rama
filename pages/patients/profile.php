<?php require_once '../authen.php';
$hn_patient = $_GET['hn_patient'];
// if ($hn_patient) //สำหรับไว้เช็คว่า มีการส่งค่า HN มาด้วยหรือไม่  ไว้เผื่อต้องใช้ในอนาคต
// {
require 'class/select_profile.php';  //sql Profile
// }
?>
<?php include '../includes/header.php'; ?>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include '../includes/sidebar.php'; ?>
    <div class="pt-3 content-wrapper" id="content_profile">
      <div class="content"></div>
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <!-- ข้อมูลพื้นฐานคนไข้ -->
              <?php include_once 'base_info/base_info.php' ?>
              <?php require '../../service/patients/my_function/function_date.php' ?>
              <div class="shadow card">
                <!-- start tab -->
                <div class="col-md-12" <div class="card">
                  <div class="p-2 card-header">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab" style="font-size: 18px;">
                          <i class="fas fa-diagnoses text-green"></i> Activity </a></li>
                      <li class="nav-item"><a class="nav-link " href="#appointment" data-toggle="tab" style="font-size: 18px;">
                          <i class="far fa-calendar-check text-pink"></i> Appointment </a></li>
                      <li class="nav-item"><a class="nav-link" href="#physical" data-toggle="tab" style="font-size: 18px;">
                          <i class="fas fa-weight text-blue"></i> Physical </a></li>
                      <li class="nav-item"><a class="nav-link" href="#psg" data-toggle="tab" style="font-size: 18px;">
                          <i class="fas fa-bed text-purple"></i> SleepTest </a></li>
                      <li class="nav-item"><a class="nav-link " href="#cpap_ed" data-toggle="tab" style="font-size: 18px;">
                          <i class="fas fa-head-side-mask text-yellow"></i> CPAP Education </a></li>
                      <li class="nav-item"><a class="nav-link " href="#order_cpap" data-toggle="tab" style="font-size: 18px;">
                          <i class="fas fa-luggage-cart text-red"></i> Order CPAP </a></li>
                      <li class="nav-item"><a class="nav-link " href="#compliance" data-toggle="tab" style="font-size: 18px;">
                          <i class="fas fa-stethoscope text-lightblue"></i> ฺBorrow  </a></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <?php
                      require 'activity/activity.php';
                      require 'appointment/appointment.php';
                      require 'physical/physical.php';
                      require 'psg/psg.php';
                      require 'cpap_ed/cpaped.php';
                      require 'order_cpap/order.php';
                      require 'compliance/compliance.php';
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include '../includes/footer.php'; ?>
  </div>
</body>
</html>
<script>
  $(function() { //Keep active pill on refresh  ให้ tab อยู่ tab เดิมหลังจาก refresh
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
      localStorage.setItem('lastTab', $(this).attr('href'));
    });
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
      $('[href="' + lastTab + '"]').tab('show');
    }
  });
</script>