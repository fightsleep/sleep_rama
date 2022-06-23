<script type="text/javascript" language="javascript">
	$(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
		//----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
		$('#add_cpap').click(function() {
			$('#cpap_form')[0].reset(); //ล้างข้อมูลก่อน
			$('.modal-title').text("เพิ่มข้อมูลอุปกรณ์ใหม่"); //text บน Modal title จะถูกกำหนดเป็น Add User
			$('#action_cpap').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
			$('#operation_cpap').val("Add"); //กำหนดให้ operation เป็น add
			$('#cpap_uploaded_image').html('');
			// $('#hn_cpap').attr('readonly', true).val(<?php echo $row->hn_patient;  ?>);
		});
		// --- END ADD
		$(document).ready(function() {
			$('#cpap_data').DataTable({
                "autoWidth": false,   //ปิด auto width คอลัมน์
				"aaSorting": [
					[0, 'desc']
				],
				"oLanguage": {
					"sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
					"sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
					"sInfo": "แสดง _START_ ถึง _END_ ของจำนวน _TOTAL_ รายการ",
					"sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
					"sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
					"sSearch": "ค้นหา :",
					"aaSorting": [
						[0, 'desc']
					],
					"oPaginate": {
						"sFirst": "หน้าแรก",
						"sPrevious": "ก่อนหน้า",
						"sNext": "ถัดไป",
						"sLast": "หน้าสุดท้าย"
					},
				},
			});
		});

		//----------- start เมื่อคลิกปุ่ม Submit บน Modal Form  ----------------------------
		$(document).on('submit', '#cpap_form', function(event) {
			event.preventDefault();
			// window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
			var cpap_code = $('#cpap_code').val();
			var cpap_company = $('#cpap_company').val();
			var cpap_name = $('#cpap_name').val();
			var cpap_model = $('#cpap_model').val();
			var cpap_type = $('#cpap_type').val();
			var cpap_position = $('#cpap_download_type').val();
			var cpap_type_pap = $('#cpap_type_pap').val();
			var cpap_detail_model = $('#cpap_detail_model').val();
			var cpap_selling_price = $('#cpap_selling_price').val();
			var cpap_wholesale_price = $('#cpap_wholesale_price').val();
			var cpap_mask_type = $('#cpap_mask_type').val();
			var cpap_mask_size = $('#cpap_mask_size').val();
			var cpap_sales_status = $('#cpap_sales_status').val();
			var cpap_update_date = $('#cpap_update_date').val();
			var cpap_note = $('#cpap_note').val();
			var extension = $('#cpap_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#cpap_image').val('');
				return false;
			}
		}	

			$.ajax({
				url: "../../service/sub_admin/cpap_list_script/cpap_list_script_insert_edit.php",
				// url: "../../service/patients/physical_script/physical_script_insert_edit.php",
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(data) {
					Swal.fire({
						text: 'เพิ่มข้อมูลเจ้าหน้าที่เรียบร้อย',
						icon: 'success',
						confirmButtonText: 'ตกลงจ้าา',
					})
					$('#cpap_form')[0].reset();
					$('#cpap_modal').modal('hide');
					// dataTable.ajax.reload();
					setTimeout(location.reload.bind(location), 1200); // refresh หน้า
				}
			});
		});
		// ---- END Submit ----------------------------
		//----- UPDATE !!! ----------------------------
		$(document).on('click','#update_cpap', function() {
			// window.alert("ไว้เช็ค");
			var cpap_id = $(this).attr("data-id");
			$.ajax({
				url: "../../service/sub_admin/cpap_list_script/cpap_list_fetch_update.php",
				method: "POST",
				data: {
					cpap_id: cpap_id
				},
				dataType: "json",
				success: function(data) {
					$('#cpap_modal').modal('show');
					$('#cpap_id').val(data.cpap_id);
					$('#cpap_code').val(data.cpap_code);
					$('#cpap_name').val(data.cpap_name);
					$('#cpap_model').val(data.cpap_model);
					$('#cpap_type').val(data.cpap_type);
					$('#cpap_download_type').val(data.cpap_download_type);
					$('#cpap_type_pap').val(data.cpap_type_pap);
					$('#cpap_detail_model').val(data.cpap_detail_model);
					$('#cpap_selling_price').val(data.cpap_selling_price);
					$('#cpap_wholesale_price').val(data.cpap_wholesale_price);
					$('#cpap_company').val(data.cpap_company);
					$('#cpap_mask_type').val(data.cpap_mask_type);
					$('#cpap_mask_size').val(data.cpap_mask_size);
					$('#cpap_sales_status').val(data.cpap_sales_status);
					$('#cpap_update_date').val(data.cpap_update_date);
					$('#cpap_note').val(data.cpap_note);
					// $('#cpap_image').val(data.cpap_image);
					$('#cpap_uploaded_image').html(data.cpap_image);
					$('#action_cpap').val("Edit");
					$('#operation_cpap').val("Edit");
					$('.modal-title').text("Edit cpap");
				}
			})
		});
		//-----END UPDATE !!! ----------------------------
		//----- Delete !!! ----------------------------
		$(document).on('click', '#delete_cpap', function() {
			var cpap_id = $(this).attr("data-id");
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
						url: "../../service/sub_admin/cpap_list_script/cpap_list_script_delete.php",
						data: {
							cpap_id : cpap_id
						}
					}).done(function() {
						Swal.fire({
								text: 'รายการของคุณถูกลบเรียบร้อย',
								icon: 'success',
								confirmButtonText: 'ตกลง',
							})
							.then((result) => {
								location.reload();
							})
					})
				}
			})
		})
		//-----END Delete !!! ----------------------------
	});
</script>