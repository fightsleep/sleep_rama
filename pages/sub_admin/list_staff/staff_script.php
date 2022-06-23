<script type="text/javascript" language="javascript">
	$(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
		//----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
		$('#add_staff').click(function() {
			$('#staff_form')[0].reset(); //ล้างข้อมูลก่อน
			$('.modal-title').text("เพิ่มเจ้าหน้าที่ใหม่"); //text บน Modal title จะถูกกำหนดเป็น Add User
			$('#action_staff').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
			$('#operation_staff').val("Add"); //กำหนดให้ operation เป็น add
			// $('#hn_staff').attr('readonly', true).val(<?php echo $row->hn_patient;  ?>);
		});
		// --- END ADD
		$(document).ready(function() {
			$('#staff_data').DataTable({
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
		$(document).on('submit', '#staff_form', function(event) {
			event.preventDefault();
			// window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
			var staff_no = $('#staff_no').val();
			var staff_prefix = $('#staff_prefix').val();
			var staff_name = $('#staff_name').val();
			var staff_lastname = $('#staff_lastname').val();
			var staff_position = $('#staff_position').val();
			var staff_level = $('#staff_level').val();
			var staff_status = $('#staff_status').val();

			$.ajax({
				url: "../../service/sub_admin/staff_list_script/staff_list_script_insert_edit.php",
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
					$('#staff_form')[0].reset();
					$('#staff_modal').modal('hide');
					setTimeout(location.reload.bind(location), 1200); // refresh หน้า
				}
			});
		});
		// ---- END Submit ----------------------------
		//----- UPDATE !!! ----------------------------
		$(document).on('click','#update_staff', function() {
			// window.alert("ไว้เช็ค");
			var staff_id = $(this).attr("data-id");
			$.ajax({
				url: "../../service/sub_admin/staff_list_script/staff_list_fetch_update.php",
				method: "POST",
				data: {
					staff_id: staff_id
				},
				dataType: "json",
				success: function(data) {
					$('#staff_modal').modal('show');
					$('#staff_id').val(data.staff_id);
					$('#staff_no').val(data.staff_no);
					$('#staff_prefix').val(data.staff_prefix);
					$('#staff_name').val(data.staff_name);
					$('#staff_lastname').val(data.staff_lastname);
					$('#staff_position').val(data.staff_position);
					$('#staff_level').val(data.staff_level);
					$('#staff_status').val(data.staff_status);
					$('#action_staff').val("Edit");
					$('#operation_staff').val("Edit");
					$('.modal-title').text("Edit staff");
				}
			})
		});
		//-----END UPDATE !!! ----------------------------
		//----- Delete !!! ----------------------------
		$(document).on('click', '#delete_staff', function() {
			var staff_id = $(this).attr("data-id");
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
						url: "../../service/sub_admin/staff_list_script/staff_list_script_delete.php",
						data: {
							staff_id : staff_id
						}
					}).done(function() {
						Swal.fire({
								text: 'รายการของคุณถูกลบเรียบร้อย',
								icon: 'success',
								confirmButtonText: 'ตกลง',
							})
							.then((result) => {
								location.reload()
							})
					})
				}
			})
		})
		//-----END Delete !!! ----------------------------
	});
</script>