<div class="tab-pane" id="cpap_ed">
	<?php
	require 'class/list_staff.php';
	require 'class/opd_list.php';
    require 'cpaped_modal.php'; 
	require 'cpaped_select.php';
	//  echo '<pre>';
	// print_r($result_list_opd);
	// echo '</pre>';
	// exit();
  ?>
	<!-- <div class="content"> -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 mb-4 ">
				<h4>
					<i class="fas fa-user"></i>
					รายการ CPAP EDUCATION ของผู้ป่วย
				</h4>
				<div align="left">
					<button name="add" id="add_cpap_ed" data-toggle="modal" data-target="#cpap_ed_modal" class="mb-2 btn btn-success add_data"><i class="fas fa-plus"></i> เพิ่มข้อมูล cpap_ed </button>
				</div>
			</div> <!--  col-12 -->
		</div> <!--  row -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table id="cpap_ed_data" class="table table-bordered table-striped table-hover" width="100%">
						<thead class="table-warning">
							<tr>
								<th width="5%">ลำดับ</th>
								<th width="30%">HN</th>
								<th width="10%">วันที่ติดต่อ</th>
								<th width="10%">วันที่ได้คิว</th>
								<th width="10%">OPD</th>
								<th width="30%">CPAP Note</th>
								<th width="5%">แก้ไข</th>
								<th width="5%">ลบ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($result_cpap_ed as $cpap_ed) {
								$i++;
							?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $cpap_ed['cpaped_hn']; ?></td>
									<td><?= DateThai($cpap_ed['cpaped_contactdate']); ?></td>
									<td><?= DateThai($cpap_ed['cpaped_appointdate']); ?></td>
									<td><?= $cpap_ed['cpaped_opd']; ?></td>
									<td><?= $cpap_ed['cpaped_note']; ?></td>
									<td>
										<button type="button" name="update_cpap_ed" class="btn btn-warning btn-block update_cpap_ed" id="update_cpap_ed" data-id=<?= $cpap_ed['cpaped_id']; ?>><i class="far fa-edit"></i></button>
									</td>
									<td><button type="button" name="delete_cpap_ed" class="btn btn-danger" id="delete_cpap_ed" data-id=<?= $cpap_ed['cpaped_id']; ?>><i class="far fa-trash-alt"></i></button></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div> <!--  row -->
		</div> <!--  cold-12 -->
	</div> <!--  container-fluid -->
	<!-- </div>   content -->
</div> <!--  tab -->
<?php
require 'cpaped_script.php';
?>