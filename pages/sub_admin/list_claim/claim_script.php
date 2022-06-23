<script type="text/javascript" language="javascript">
	$(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
		//----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
		$('#add_claim').click(function() {
			$('#claim_form')[0].reset(); //ล้างข้อมูลก่อน
			$('.modal-title').text("เพิ่มสิทธิการรักษา"); //text บน Modal title จะถูกกำหนดเป็น Add User
			$('#action_claim').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
			$('#operation_claim').val("Add"); //กำหนดให้ operation เป็น add
		});
		// --- END ADD
		// $(document).ready(function() {
		// 	$('#claim_data').DataTable({
        //         "autoWidth": false,   //ปิด auto width คอลัมน์
		// 		"aaSorting": [
		// 			[0, 'desc']
		// 		],
		// 		"oLanguage": {
		// 			"sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
		// 			"sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
		// 			"sInfo": "แสดง _START_ ถึง _END_ ของจำนวน _TOTAL_ รายการ",
		// 			"sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
		// 			"sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
		// 			"sSearch": "ค้นหา :",
		// 			"aaSorting": [
		// 				[0, 'desc']
		// 			],
		// 			"oPaginate": {
		// 				"sFirst": "หน้าแรก",
		// 				"sPrevious": "ก่อนหน้า",
		// 				"sNext": "ถัดไป",
		// 				"sLast": "หน้าสุดท้าย"
		// 			},
		// 		},
		// 	});
		// });
		//----------- start เมื่อคลิกปุ่ม Submit บน Modal Form  ----------------------------
		$(document).on('submit', '#claim_form', function(event) {
			event.preventDefault();
			// window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
	
			var claim_list = $('#claim_list').val();
			var claim_note = $('#claim_note').val();
			$.ajax({
				url: "../../service/sub_admin/claim_list_script/claim_list_script_insert_edit.php",
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
					$('#claim_form')[0].reset();
					$('#claim_modal').modal('hide');
					setTimeout(location.reload.bind(location), 1200); // refresh หน้า
				}
			});
		});
		// ---- END Submit ----------------------------
		//----- UPDATE !!! ----------------------------
		$(document).on('click','#update_claim', function() {
			// window.alert("ไว้เช็ค");
			var claim_id = $(this).attr("data-id");
			$.ajax({
				url: "../../service/sub_admin/claim_list_script/claim_list_fetch_update.php",
				method: "POST",
				data: {
					claim_id: claim_id
				},
				dataType: "json",
				success: function(data) {
					$('#claim_modal').modal('show');
					$('#claim_id').val(data.claim_id);
					$('#claim_list').val(data.claim_list);
					$('#claim_note').val(data.claim_note);
					$('#action_claim').val("Edit");
					$('#operation_claim').val("Edit");
					$('.modal-title').text("Edit claim");
				}
			})
		});
		//-----END UPDATE !!! ----------------------------
		//----- Delete !!! ----------------------------
		$(document).on('click', '#delete_claim', function() {
			var claim_id = $(this).attr("data-id");
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
						url: "../../service/sub_admin/claim_list_script/claim_list_script_delete.php",
						data: {
							claim_id : claim_id
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