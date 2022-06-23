    <!-- Modal -->
    <?php
	// SQL Crate Order
	$sql_cpap = 'SELECT * FROM list_cpap
WHERE cpap_sales_status="พร้อมขาย"
';
	$stmt_cpap = $connection->query($sql_cpap);
	$result_cpap = $stmt_cpap->fetchAll(PDO::FETCH_ASSOC);
	// print_r($result_cpap);
	// exit();
	?>
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog modal-xl">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title" id="exampleModalLabel">รายการสินค้าทั้งหมด</h5>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
    			<div class="modal-body">
    				<table id="products" class="table table-bordered table-striped table-hover" width="100%">
    					<thead class="table-warning">
    						<tr>
    							<th width="2%">ลำดับ</th>
								<th width="5%">cpapcode</th>
    							<th width="40%">รูป</th>
								<th width="40%">cpap name</th>
    							<th width="10%">ประเภท</th>
    							<th width="5%">ราคา</th>
    							<th width="15%">บริษัท</th>
								<th width="10%"">จัดการ</th>
    						</tr>
    					</thead>
    					<tbody>
						<?php
							$i = 0;
							foreach ($result_cpap as $cpap) {
								$i++;
							?>
								<tr>
									<!-- <td><?= $i; ?></td> -->
									<td><?= $cpap['cpap_id']; ?></td>
									<td><?= $cpap['cpap_code']; ?></td>
									<td><?= '<img src="../../../service/sub_admin/cpap_list_script/cpap_image/'.$cpap["cpap_image"].'" class="img-fluid" width="100px" />'; ?></td>
									<td><?= $cpap['cpap_name']." ".$cpap['cpap_model']; ?></td>
									<td><?= $cpap['cpap_type']; ?></td>
									<td><?= $cpap['cpap_selling_price']; ?></td>
									<td><?= $cpap['cpap_company']; ?></td>
									<td>
									<button type="button" class="btn btn-outline-success" id="add<?= $cpap['cpap_id']; ?>">
                                เลือกสินค้า
                            </button>
									</td>
								</tr>
							<?php } ?>
    					</tbody>
    				</table>
    			</div>
    		</div>
    	</div>
    </div>