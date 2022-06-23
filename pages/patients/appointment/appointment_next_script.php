<script type="text/javascript" language="javascript">
	
	$(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
		//----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
		$('#add_appointment_next').click(function() {
			$('#appointment_next_form')[0].reset(); //ล้างข้อมูลก่อน
			$('.modal-title').text("เพิ่มข้อมุลการเลื่อนนัด"); //text บน Modal title จะถูกกำหนดเป็น Add User
			$('#action_appointment_next').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
			$('#operation_appointment_next').val("Add"); //กำหนดให้ operation เป็น add
			$('#appointment_id_fornext').attr('readonly', true).val(<?php echo $appointment['appointment_id'];  ?>);
		});
		// --- END ADD
		//----------- start เมื่อคลิกปุ่ม Submit บน Modal Form  ----------------------------
		$(document).on('submit','#appointment_next_form', function(event) {
			event.preventDefault();
			// window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");

			var next_appoint_date = $('#next_appoint_date').val();
			var next_appoint_datecontact = $('#next_appoint_datecontact').val();
			var appointment_id_fornext = $('#appointment_id_fornext').val();
			var count_postpone_next = $('#count_postpone_next').val();
			var note_next_appoint = $('#note_next_appoint').val();
			var staff_postpone_next = $('#staff_postpone_next').val();

			$.ajax({
				url: "../../service/patients/appointment_next_script/appointment_next_script_insert_edit.php",
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				
				success: function(data) {
					Swal.fire({
						text: 'เพิ่มข้อมูล appointment_next ',
						icon: 'success',
						confirmButtonText: 'ตกลงจ้าา',
					})
					$('#appointment_next_form')[0].reset();
					// $('#appointment_next_modal').modal('hide');
					// setTimeout(location.reload.bind(location), 1200); // refresh หน้า
				}
			});
		});
		// ---- END Submit ----------------------------
		//----- UPDATE !!! ----------------------------
		$(document).on('click', '#update_appointment_next', function() {
			// window.alert("ไว้เช็ค");
			var appointment_next_id = $(this).attr("data-id");
			$.ajax({
				url: "../../service/patients/appointment_next_script/appointment_next_fetch_update.php",
				method: "POST",
				data: {
					appointment_next_id: appointment_next_id
				},
				dataType: "json",
				success: function(data) {
					$('#appointment_next_modal').modal('show');
					$('#appointment_next_id').val(data.appointment_next_id);
					$('#appointment_next_hn').attr('readonly', true).val(data.appointment_next_hn);
					$('#appointment_next_contact_date').val(data.appointment_next_contact_date);
					$('#appointment_next_psgdate').val(data.appointment_next_psgdate);
					$('#appointment_next_opd').val(data.appointment_next_opd);
					$('#appointment_next_bill_id').val(data.appointment_next_bill_id);
					$('#appointment_next_namecontact').val(data.appointment_next_namecontact);
					$('#appointment_next_note').val(data.appointment_next_note);
					$('#appointment_next_recipient').val(data.appointment_next_recipient);
					$('#appointment_next_risk').val(data.appointment_next_risk);
					$('#action_appointment_next').val("Edit");
					$('#operation_appointment_next').val("Edit");
					$('.modal-title').text("Edit appointment_next");

				}
			})
		});
		//-----END UPDATE !!! ----------------------------
		//----- Delete !!! ----------------------------
		$(document).on('click', '#delete_appointment_next', function() {
			var next_appoint_id = $(this).attr("data-id");
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
						url: "../../service/patients/appointment_next_script/appointment_next_script_delete.php",
						data: {
							next_appoint_id : next_appoint_id
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