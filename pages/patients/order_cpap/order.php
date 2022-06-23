<div class="tab-pane" id="order_cpap">
	<?php
	// echo '<pre>';
	// print_r($result_order);
	// echo '</pre>';
	// exit();
	//require 'class/list_staff.php';
	// require 'class/opd_list.php';
	require 'order_select.php'; 
	// 	echo '<pre>';
	// print_r($result_order);
	// echo '</pre>';
	// exit();
  ?>
	<!-- <div class="content"> -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 mb-4 ">
				<h4>
					<i class="fas fa-user"></i>
					รายการ order ของผู้ป่วย
				</h4>
				  <a href="order_cpap/order_create.php?hn_order=<?php echo $row->hn_patient;  ?>" class="btn btn-success mt-3">
                                    <i class="fas fa-plus"></i>
                                    เพิ่มข้อมูล order 
                                </a>
								<a href="order_cpap/print_order.php?hn_order=<?php echo $row->hn_patient;?>" class="btn btn-info mt-3" >
								<i class="fa fa-print" aria-hidden="true"></i> Print ใบสั่งซื้อ </a>
			</div> <!--  col-12 -->
		</div> <!--  row -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table id="order_data" class="table table-bordered table-striped table-hover" width="100%">
						<thead class="table-warning">
							<tr>
								<th width="3%">ลำดับ</th>
								<!-- <th width="10%">HN</th> -->
								<th width="10%">Code</th>
								<th width="25%">รุ่น</th>
								<th width="10%">บริษัท</th>
								<th width="5%">ราคา</th>
								<th width="15%">วันที่ซื้อ</th>
								<th width="15%">วันที่รับ</th>
								<th width="30%">Print</th>
								<th width="5%">view</th>
								<th width="5%">แก้ไข</th>
								<th width="5%">ลบ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($result_order as $order) {
								$i++;
							?>
								<tr>
									<td><?= $i; ?></td>
									<!-- <td><?= $order['hn_order']; ?></td> -->
									<td><?= $order['cpap_code']; ?></td>
									<td><?= $order['cpap_name']." ".$order['cpap_model']; ?></td>
									<td><?= $order['cpap_company']; ?></td>
									<td><?= number_format($order['cpap_selling_price'],0); ?></td>
									<td><?= DateThai($order['date_cpap_order']); ?></td>
									<td><?= DateThai($order['date_receive_order']); ?></td>
									<td>
									<input class="toggle-event" data-id="1" type="checkbox" name="status" 
                            ${item.p_status ? 'checked': ''} data-toggle="toggle" data-on="Yes" 
                            data-off="No" data-onstyle="success" data-style="ios">
									</td>
									<td>
									<button type="button" name="view_order" class="btn btn-info btn-block view_order" id="view_order" data-id=<?= $order['id_order']; ?>><i class="fa fa-eye" aria-hidden="true"></i></button>
									</td>
									<td>
										<button type="button" name="update_order" class="btn btn-warning btn-block update_order" id="update_order" data-id=<?= $order['id_order']; ?>><i class="far fa-edit"></i></button>
									</td>
									<td><button type="button" name="delete_order" class="btn btn-danger" id="delete_order" data-id=<?= $order['id_order']; ?>><i class="far fa-trash-alt"></i></button></td>
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
require 'order_script.php';
?>