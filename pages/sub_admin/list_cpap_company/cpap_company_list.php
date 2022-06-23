<?php
$sql_cpap_company = ("SELECT * FROM list_cpap_company as cpap_company ; ");
$stmt_cpap_company = $connection->prepare($sql_cpap_company);
$stmt_cpap_company->execute(array());
$result_cpap_company = $stmt_cpap_company->fetchAll();

    require 'cpap_company_modal.php'; 
  ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 mb-4 ">
				<h4 align="center">
					<i class="fas fa-user"></i>
					รายชื่อบริษัทตัวแทนจำหน่าย CPAP
				</h4>
				<div align="right">
					<button name="add" id="add_cpap_company" data-toggle="modal" data-target="#cpap_company_modal" class="mb-2 btn btn-info add_data"><i class="fas fa-plus"></i> เพิ่มบริษัทตัวแทน </button>
				</div>
			</div> <!--  col-12 -->
		</div> <!--  row -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table id="cpap_company_data" class="table table-bordered table-striped table-hover" width="100%">
						<thead class="table-warning" align="center">
							<tr>
								<th width="2%">ลำดับ</th>
								<th width="20%">บริษัท</th>
						
								<th width="5%">แก้ไข</th>
								<th width="5%">ลบ</th>
							</tr>
						</thead>
						<tbody  align="center">
							<?php
							$i = 0;
							foreach ($result_cpap_company as $cpap_company) {
								$i++;
							?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $cpap_company['cpap_company_list']; ?></td>
							
									<td>
										<button type="button" name="update_cpap_company" class="btn btn-warning btn-block update_cpap_company" id="update_cpap_company" data-id=<?= $cpap_company['cpap_company_id']; ?>><i class="far fa-edit"></i></button>
									</td>
									<td><button type="button" name="delete_cpap_company" class="btn btn-danger btn-block delete_cpap_company" id="delete_cpap_company" data-id=<?= $cpap_company['cpap_company_id']; ?>><i class="far fa-trash-alt"></i></button></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div> <!--  row -->
		</div> <!--  cold-12 -->
	</div> <!--  container-fluid -->
<?php
require 'cpap_company_script.php';
?>