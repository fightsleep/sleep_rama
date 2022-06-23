<?php
require_once '../authen.php';
include('../includes/header.php');  ?>
<div class="wrapper">
	<?php include_once '../includes/sidebar.php' ?>
	<div class="pt-3 content-wrapper">
		<!-- Main content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="shadow card">
							<div class="border-0 card-header">
								<h4>
									<i class="fas fa-user"></i>
									แก้ไขข้อมูลระบบ
								</h4>	
								<!-- <div class="col-md-3">
									<a href="/sleeprama_systems/pages/test_csv" class="mt-3 btn btn-info">
										<i class="fas fa-tools"></i>
										CSV </a>

								</div> -->
							</div>
							<div class="card-body">
							<div class="row">
  <div class="col-2">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link id="v-pills-claim-tab" data-toggle="pill" href="#v-pills-claim" role="tab" aria-controls="v-pills-claim" aria-selected="false">แก้ไขสิทธิการรักษา</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">แก้ไขรายชื่อแผนก</a>
  
      <a class="nav-link" id="v-pills-staff-tab" data-toggle="pill" href="#v-pills-staff" role="tab" aria-controls="v-pills-staff" aria-selected="false">แก้ไขรายชื่อเจ้าหน้าที่</a>
	  <li class="nav-header">สำหรับ CPAP </li>
	  <a class="nav-link  active" id="v-pills-cpap-tab" data-toggle="pill" href="#v-pills-cpap" role="tab" aria-controls="v-pills-cpap" aria-selected="true">แก้ไขรายชื่ออุปกรณ์ CPAP</a>
	  <a class="nav-link" id="v-pills-cpap_company-tab" data-toggle="pill" href="#v-pills-cpap_company" role="tab" aria-controls="v-pills-cpap_company" aria-selected="false">แก้ไขรายชื่อบริษัท CPAP</a>

    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade" id="v-pills-claim" role="tabpanel" aria-labelledby="v-pills-claim-tab"><?php require 'list_claim/claim_list.php' ;  ?></div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
      <div class="tab-pane fade show active" id="v-pills-cpap" role="tabpanel" aria-labelledby="v-pills-cpap-tab">
		  <?php require 'list_cpap/cpap_list.php' ;  ?></div>
      <div class="tab-pane fade" id="v-pills-staff" role="tabpanel" aria-labelledby="v-pills-staff-tab"> <?php require 'list_staff/staff_list.php' ;  ?>   </div>
	  <div class="tab-pane fade" id="v-pills-cpap_company" role="tabpanel" aria-labelledby="v-pills-cpap_company-tab"> <?php require 'list_cpap_company/cpap_company_list.php' ;  ?>  </div>
	
    </div>
  </div>
</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include_once '../includes/footer.php' ?>
</div>
</body>

</html>
