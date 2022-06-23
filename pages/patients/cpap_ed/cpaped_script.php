<script type="text/javascript" language="javascript">

	
	$(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
		//----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
		$('#add_cpap_ed').click(function() {
			$('#cpap_ed_form')[0].reset(); //ล้างข้อมูลก่อน
			$('.modal-title').text("Add Appointment"); //text บน Modal title จะถูกกำหนดเป็น Add User
			$('#action_cpap_ed').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
			$('#operation_cpap_ed').val("Add"); //กำหนดให้ operation เป็น add
			$('#cpaped_hn').attr('readonly', true).val(<?php echo $row->hn_patient;  ?>);
		});
		// --- END ADD
		//----------- start เมื่อคลิกปุ่ม Submit บน Modal Form  ----------------------------
		$(document).on('submit','#cpap_ed_form',function(event) {
			event.preventDefault();
			// window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
			var cpaped_id = $('#cpaped_id').val();
			var cpaped_hn = $('#cpaped_hn').val();
			var cpaped_opd = $('#cpaped_opd').val();
			var cpaped_contactdate = $('#cpaped_contactdate').val();
			var cpaped_appointdate = $('#cpaped_appointdate').val();
			var cpaped_chanel = $('#cpaped_chanel').val();
			var cpaped_doctor = $('#cpaped_doctor').val();
			var cpaped_order = $('#cpaped_order').val();
			var cpaped_note = $('#cpaped_note').val();
			var cpaped_staff = $('#cpaped_staff').val();

			$.ajax({
				url: "../../service/patients/cpap_ed_script/cpap_ed_script_insert_edit.php",
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(data) {
					// var cpap_ed_hn = $('#cpap_ed_hn').val();
					Swal.fire({
						text: 'เพิ่มข้อมูล cpap_ed เรียบร้อย',
						icon: 'success',
						confirmButtonText: 'ตกลงจ้าา',
					})
					$('#cpap_ed_form')[0].reset();
					$('#cpap_ed_modal').modal('hide');
					setTimeout(location.reload.bind(location), 1200); // refresh หน้า
				}
			});
		});
		// ---- END Submit ----------------------------
		//----- UPDATE !!! ----------------------------
		$(document).on('click', '#update_cpap_ed', function() {
			// window.alert("ไว้เช็ค");
			var cpap_ed_id = $(this).attr("data-id");
			$.ajax({
				url: "../../service/patients/cpap_ed_script/cpap_ed_fetch_update.php",
				method: "POST",
				data: {
					cpap_ed_id: cpap_ed_id
				},
				dataType: "json",
				success: function(data) {
					$('#cpap_ed_modal').modal('show');
					$('#cpap_ed_id').val(data.cpap_ed_id);
					$('#cpap_ed_hn').attr('readonly', true).val(data.cpap_ed_hn);
					$('#cpap_ed_contact_date').val(data.cpap_ed_contact_date);
					$('#cpap_ed_psgdate').val(data.cpap_ed_psgdate);
					$('#cpap_ed_opd').val(data.cpap_ed_opd);
					$('#cpap_ed_bill_id').val(data.cpap_ed_bill_id);
					$('#cpap_ed_namecontact').val(data.cpap_ed_namecontact);
					$('#cpap_ed_note').val(data.cpap_ed_note);
					$('#cpap_ed_recipient').val(data.cpap_ed_recipient);
					$('#cpap_ed_risk').val(data.cpap_ed_risk);
					$('#action_cpap_ed').val("Edit");
					$('#operation_cpap_ed').val("Edit");
					$('.modal-title').text("Edit cpap_ed");

				}
			})
		});
		//-----END UPDATE !!! ----------------------------
		//----- Delete !!! ----------------------------
		$(document).on('click', '#delete_cpap_ed', function() {
			var cpaped_id = $(this).attr("data-id");
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
						url: "../../service/patients/cpap_ed_script/cpap_ed_script_delete.php",
						data: {
							cpaped_id : cpaped_id
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