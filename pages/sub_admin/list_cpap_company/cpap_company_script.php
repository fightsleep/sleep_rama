<script type="text/javascript" language="javascript">
	$(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
		//----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
		$('#add_cpap_company').click(function() {
			$('#cpap_company_form')[0].reset(); //ล้างข้อมูลก่อน
			$('.modal-title').text("เพิ่มเจ้าหน้าที่ใหม่"); //text บน Modal title จะถูกกำหนดเป็น Add User
			$('#action_cpap_company').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
			$('#operation_cpap_company').val("Add"); //กำหนดให้ operation เป็น add
			// $('#hn_cpap_company').attr('readonly', true).val(<?php echo $row->hn_patient;  ?>);
		});
		// --- END ADD
		//----------- start เมื่อคลิกปุ่ม Submit บน Modal Form  ----------------------------
		$(document).on('submit', '#cpap_company_form', function(event) {
			event.preventDefault();
			// window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
			var cpap_company_id = $('#cpap_company_id').val();
			var cpap_company_list = $('#cpap_company_list').val();
			var cpap_company_note = $('#cpap_company_note').val();
			$.ajax({
				url: "../../service/sub_admin/cpap_company_list_script/cpap_company_list_script_insert_edit.php",
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(data) {
					Swal.fire({
						text: 'เพิ่มข้อมูลรายชื่อบริษัทรียบร้อย',
						icon: 'success',
						confirmButtonText: 'ตกลง',
					})
					$('#cpap_company_form')[0].reset();
					$('#cpap_company_modal').modal('hide');
				setTimeout(location.reload.bind(location), 1200); // refresh หน้า
				}
			});
		});
		// ---- END Submit ----------------------------
		//----- UPDATE !!! ----------------------------
		$(document).on('click','#update_cpap_company', function() {
			// window.alert("ไว้เช็ค");
			var cpap_company_id = $(this).attr("data-id");
			$.ajax({
				url: "../../service/sub_admin/cpap_company_list_script/cpap_company_list_fetch_update.php",
				method: "POST",
				data: {
					cpap_company_id: cpap_company_id
				},
				dataType: "json",
				success: function(data) {
					$('#cpap_company_modal').modal('show');
					$('#cpap_company_id').val(data.cpap_company_id);
					$('#cpap_company_list').val(data.cpap_company_list);
					$('#cpap_company_note').val(data.cpap_company_note);
					$('#action_cpap_company').val("Edit");
					$('#operation_cpap_company').val("Edit");
					$('.modal-title').text("Edit cpap_company");
				}
			})
		});
		//-----END UPDATE !!! ----------------------------
		//----- Delete !!! ----------------------------
		$(document).on('click', '#delete_cpap_company', function() {
			var cpap_company_id = $(this).attr("data-id");
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
						url: "../../service/sub_admin/cpap_company_list_script/cpap_company_list_script_delete.php",
						data: {
							cpap_company_id : cpap_company_id
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