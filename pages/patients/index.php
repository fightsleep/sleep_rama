<?php
require_once '../authen.php';
include('../includes/header.php');  ?>
<div class="wrapper">
	<?php include_once '../includes/sidebar.php' ?>
	<?php require 'insert-modal.php' ?>
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
									รายชื่อผู้ป่วยศูนย์โรคการนอนหลับ
								</h4>
								<div align="left">
									<button name="add" id="add_button" data-toggle="modal" data-target="#patient_modal" class="mt-3 btn btn-success add_data"><i class="fas fa-plus"></i> เพิ่มข้อมูล</button>
								</div>
								<!-- <div class="col-md-3">
									<a href="/sleeprama_systems/pages/test_csv" class="mt-3 btn btn-info">
										<i class="fas fa-tools"></i>
										CSV </a>
								</div> -->
							</div>
							<div class="card-body">
								<table id="user_data" class="table table-bordered table-striped table-hover" width="100%">
									<thead>
										<tr>
											<th width="15%">HN</th>
											<th width="10%">คำนำหน้า</th>
											<th width="20%">ชื่อ</th>
											<th width="20%">นามสกุล</th>
											<th width="10%">สิทธิการรักษา</th>
											<th width="10%">วันเกิด</th>
											<th width="5%">ประวัติ</th>
											<th width="5%">Edit</th>
											<th width="5%">Delete</th>
										</tr>
									</thead>
								</table>
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
<!-- scripts -->
<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		//----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล
		$('#add_button').click(function() {
			$('#patient_form')[0].reset();
			$('.modal-title').text("New Patient"); //text บน Modal title จะถูกกำหนดเป็น Add User
			$('#action').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
			$('#operation').val("Add"); //กำหนดให้ operation เป็น add
		});


		//-----------start Data table setting  ------
		// var dataTable = $('#user_data').DataTable({ 
			var dataTable = $('#user_data').DataTable({ // <-- ความสามารถการนำข้อมูลไปสร้างเป็นตารางให้ของ datatable
			"processing": true, //<-- แสดงข้อความกำลังดำเนินการ กรณีข้อมูลมากๆจะสังเกตุเห็น่ง่ายๆ
			"serverSide": true, //<-- เปิดใช้งาน server-side เหมาะกับการจัดการกับข้อมูลมาก (ทำให้ระบบไม่อืด)
			"order": [], //<-- กำหนดให้ไม่ต้องการส่งการเรียงข้อมูลค่าเริ่มต้น จะใช้ค่าเริ่มต้นตามที่กำหนดในไฟล์ php
			"ajax": {
				url: "../../service/patients/fetch.php", //<-- ไฟล์ script url end point
				type: "POST"
			},
			dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
   
			"columnDefs": [ //กำหนดลักษณะพิเศษเฉพาะสำหรับคอลัมน์ที่ต้องการ
				{
					"targets": ['0, 1'], //เราต้องการกำหนดคอลัมน์แรกค่าเริ่มที่ 0
					"orderable": false, //ให้ไม่ต้องสามารถเรียงข้อมูลได้ เพราะเป็นลำดับรายการเฉยๆ
				},
			],
			"oLanguage": {
		"sLengthMenu": "แสดง _MENU_ รายชื่อ ต่อหน้า",
		"sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
		"sInfo": "แสดง _START_ ถึง _END_ ของจำนวน _TOTAL_ รายการ",
		"sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
		"sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
		"sSearch": "ค้นหา :",
		"aaSorting" :[[0,'desc']],
		"oPaginate": {
		"sFirst":    "หน้าแรก",
		"sPrevious": "ก่อนหน้า",
		"sNext":     "ถัดไป",
		"sLast":     "หน้าสุดท้าย"
		},
		}
		});
		//-----------end Data table setting  ------
		//----------- start เมื่อคลิกปุ่ม Submit บน Modal Form เพื่อส่งข้อมูล หลังจากกรอกข้อมูลเสร็จแล้ว
		$(document).on('submit', '#patient_form', function(event) {
			event.preventDefault();
			var hn_patient = $('#hn_patient').val();
			var prefix = $('#prefix').val();
			var firstName = $('#firstname').val();
			var lastName = $('#lastname').val();
			var claim = $('#claim').val();
			var birthdate = $('#birthdate').val();
			if (firstName != '' && lastName != '') {
				$.ajax({
					url: "../../service/patients/insert.php",
					method: 'POST',
					data: new FormData(this),
					contentType: false,
					processData: false,
					success: function(data) {
						Swal.fire({
							text: 'เพิ่มข้อมูลเรียบร้อย',
							icon: 'success',
							confirmButtonText: 'ตกลงจ้าา',
						})
						$('#patient_form')[0].reset();
						$('#patient_modal').modal('hide');
						dataTable.ajax.reload(); // refresh หน้า
					}
				});
			} else {
				alert("Both Fields are Required");
			}
		});
			//----------- start เมื่อคลิกปุ่ม Update บน ตารางแสดงข้อมูล
			$(document).on('click', '.update', function() {
			var id_auto_patient = $(this).attr("id");
			$.ajax({
				url: "../../service/patients/fetch_single.php",
				method: "POST",
				data: {
					id_auto_patient: id_auto_patient
				},
				dataType: "json",
				success: function(data) {
					$('#patient_modal').modal('show');
					$('#id_auto_patient').val(data.id_auto_patient);
					$('#hn_patient').val(data.hn_patient);
					$('#prefix').val(data.prefix);
					$('#firstname').val(data.firstname);
					$('#lastname').val(data.lastname);
					$('#claim').val(data.claim);
					$('#birthdate').val(data.birthdate);
					$('.modal-title').text("Edit User");
					$('#user_id').val(hn_patient);
					$('#action').val("Edit");
					$('#operation').val("Edit");
				}
			})
		});
		//----------- start เมื่อคลิกปุ่ม delete บน ตารางแสดงข้อมูล
		$(document).on('click', '.delete', function() {
			var id_auto_patient = $(this).attr("id");
			Swal.fire({
				text: "คุณแน่ใจหรือไม่...ที่จะลบรายการนี้?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'ใช่! ลบเลย',
				cancelButtonText: 'ยกเลิก'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type: "POST",
						url: "../../service/patients/delete.php",
						data: {
							id_auto_patient: id_auto_patient
						}
					}).done(function() {
						Swal.fire({
								text: 'รายการของคุณถูกลบเรียบร้อย',
								icon: 'success',
								confirmButtonText: 'ตกลง',
							})
							.then((result) => {
								dataTable.ajax.reload();
							})
					})
				}
			})
		});
	});
	
</script>