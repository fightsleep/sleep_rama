<script type="text/javascript" language="javascript">

	
	$(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
		//----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
		$('#add_appointment').click(function() {
			$('#appointment_form')[0].reset(); //ล้างข้อมูลก่อน
			$('.modal-title').text("Add Appointment"); //text บน Modal title จะถูกกำหนดเป็น Add User
			$('#action_appointment').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
			$('#operation_appointment').val("Add"); //กำหนดให้ operation เป็น add
			$('#appointment_hn').attr('readonly', true).val(<?php echo $row->hn_patient;  ?>);
		});
		// --- END ADD
		//----------- start เมื่อคลิกปุ่ม Submit บน Modal Form  ----------------------------
		$(document).on('submit', '#appointment_form', function(event) {
			event.preventDefault();
			// window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
			var appointment_hn = $('#appointment_hn').val();
			var appointment_contact = $('#appointment_contact_date').val();
			var appointment_bill_id = $('#appointment_bill_id').val();
			var appointment_risk = $('#appointment_risk').val();
			var appointment_opd = $('#appointment_opd').val();
			var appointment_note = $('#appointment_note').val();
			var appointment_recipient = $('#appointment_recipient').val();

			$.ajax({
				url: "../../service/patients/appointment_script/appointment_script_insert_edit.php",
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				
				success: function(data) {
					var appointment_hn = $('#appointment_hn').val();
					Swal.fire({
						text: 'เพิ่มข้อมูล appointment ' + appointment_hn + 'เรียบร้อย',
						icon: 'success',
						confirmButtonText: 'ตกลงจ้าา',
					})
					$('#appointment_form')[0].reset();
					$('#appointment_modal').modal('hide');
					setTimeout(location.reload.bind(location), 1200); // refresh หน้า
				}
			});
		});
		// ---- END Submit ----------------------------
		//----- UPDATE !!! ----------------------------
		$(document).on('click', '#update_appointment', function() {
			// window.alert("ไว้เช็ค");
			var appointment_id = $(this).attr("data-id");
			$.ajax({
				url: "../../service/patients/appointment_script/appointment_fetch_update.php",
				method: "POST",
				data: {
					appointment_id: appointment_id
				},
				dataType: "json",
				success: function(data) {
					$('#appointment_modal').modal('show');
					$('#appointment_id').val(data.appointment_id);
					$('#appointment_hn').attr('readonly', true).val(data.appointment_hn);
					$('#appointment_contact_date').val(data.appointment_contact_date);
					$('#appointment_psgdate').val(data.appointment_psgdate);
					$('#appointment_opd').val(data.appointment_opd);
					$('#appointment_bill_id').val(data.appointment_bill_id);
					$('#appointment_namecontact').val(data.appointment_namecontact);
					$('#appointment_note').val(data.appointment_note);
					$('#appointment_recipient').val(data.appointment_recipient);
					$('#appointment_risk').val(data.appointment_risk);
					$('#action_appointment').val("Edit");
					$('#operation_appointment').val("Edit");
					$('.modal-title').text("Edit appointment");

				}
			})
		});
		//-----END UPDATE !!! ----------------------------
		//----- Delete !!! ----------------------------
		$(document).on('click', '#delete_appointment', function() {
			var appointment_id = $(this).attr("data-id");
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
						url: "../../service/patients/appointment_script/appointment_script_delete.php",
						data: {
							appointment_id : appointment_id
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