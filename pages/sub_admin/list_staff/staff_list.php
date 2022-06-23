<?php

$sql_staff = ("SELECT * FROM tbl_staff as staff ; ");
$stmt_staff = $connection->prepare($sql_staff);
$stmt_staff->execute(array());
$result_staff = $stmt_staff->fetchAll();

    require 'staff_modal.php'; 
  ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 mb-4 ">
				<h4>
					<i class="fas fa-user"></i>
					รายชื่อเจ้าหน้าที่ศูนย์โรคการนอนหลับ
				</h4>
				<div align="left">
					<button name="add" id="add_staff" data-toggle="modal" data-target="#staff_modal" class="mb-2 btn btn-success add_data"><i class="fas fa-plus"></i> เพิ่มเจ้าหน้าที่ใหม่</button>
				</div>
			</div> <!--  col-12 -->
		</div> <!--  row -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table id="staff_data" class="table table-bordered table-striped table-hover" width="100%">
						<thead class="table-warning">
							<tr>
								<th width="5%">ลำดับ</th>
								<th width="5%">รหัสพนักงาน</th>
								<th width="5%">คำนำหน้า</th>
								<th width="10%">ชื่อ</th>
								<th width="10%">นามสกุล</th>
								<th width="20%">ตำแหน่ง</th>
								<th width="10%">Level</th>
								<th width="5%">status</th>
								<th width="5%">แก้ไข</th>
								<th width="5%">ลบ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($result_staff as $staff) {
								$i++;
							?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $staff['staff_no']; ?></td>
									<td><?= $staff['staff_prefix']; ?></td>
									<td><?= $staff['staff_name']; ?></td>
									<td><?= $staff['staff_lastname']; ?></td>
									<td><?= $staff['staff_position']; ?></td>
									<td><?= $staff['staff_level']; ?></td>
									<td><?= $staff['staff_status']; ?></td>
									<td>
										<button type="button" name="update_staff" class="btn btn-warning btn-block update_staff" id="update_staff" data-id=<?= $staff['staff_id']; ?>><i class="far fa-edit"></i></button>
									</td>
									<td><button type="button" name="delete_staff" class="btn btn-danger" id="delete_staff" data-id=<?= $staff['staff_id']; ?>><i class="far fa-trash-alt"></i></button></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div> <!--  row -->
		</div> <!--  cold-12 -->
	</div> <!--  container-fluid -->
<?php
require 'staff_script.php';
?>