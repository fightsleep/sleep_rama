<?php
$sql_claim = ("SELECT * FROM list_claim as claim ; ");
$stmt_claim = $connection->prepare($sql_claim);
$stmt_claim->execute(array());
$result_claim = $stmt_claim->fetchAll();

    require 'claim_modal.php'; 
  ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 mb-4 ">
				<h4>
					<i class="fas fa-user"></i>
					รายการสิทธิการรักษา
				</h4>
				<div align="left">
					<button name="add" id="add_claim" data-toggle="modal" data-target="#claim_modal" class="mb-2 btn btn-warning add_data"><i class="fas fa-plus"></i> เพิ่มสิทธิการรักษา </button>
				</div>
			</div> <!--  col-12 -->
		</div> <!--  row -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table id="claim_data" class="table table-bordered table-striped table-hover" width="100%">
						<thead class="table-warning">
							<tr>
								<th width="5%">ลำดับ</th>
								<th width="30%">สิทธิการรักษา</th>
								<th width="40%">หมายเหตุ</th>
								<th width="10%">แก้ไข</th>
								<th width="10%">ลบ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($result_claim as $claim) {
								$i++;
							?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $claim['claim_list']; ?></td>
									<td><?= $claim['claim_note']; ?></td>
									<td>
										<button type="button" name="update_claim" class="btn btn-warning btn-block update_claim" id="update_claim" data-id=<?= $claim['claim_id']; ?>><i class="far fa-edit"></i></button>
									</td>
									<td><button type="button" name="delete_claim" class="btn btn-danger" id="delete_claim" data-id=<?= $claim['claim_id']; ?>><i class="far fa-trash-alt"></i></button></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div> <!--  row -->
		</div> <!--  cold-12 -->
	</div> <!--  container-fluid -->
<?php
require 'claim_script.php';
?>