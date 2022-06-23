<script type="text/javascript" language="javascript">
	$(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
		//----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
		$('#add_activity').click(function() {
			$('#activity_form')[0].reset(); //ล้างข้อมูลก่อน
			$('.modal-title').text("Add activity"); //text บน Modal title จะถูกกำหนดเป็น Add User
			$('#action_activity').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
			$('#operation_activity').val("Add"); //กำหนดให้ operation เป็น add
			$('#hn_activity').attr('readonly', true).val(<?php echo $row->hn_patient;  ?>);
		});

		// --- END ADD
		$(document).ready(function() {
			$('#activity_data').DataTable({
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

		   //start view_data
		   $(document).on('click','#view_activity', function() {
      var id_activity=$(this).attr("data-id");   //รับ id ผ่านปุ่ม
          $.ajax({
			url: "../../service/patients/activity_script/activity_fetch_update.php",
				method: "POST",
				data: {
					id_activity: id_activity
				},
				dataType: "json",
				success: function(data) {
					$('#hn_activity').attr('readonly', true).val(data.hn_activity); 
					$('#activity_modal_view').modal('show');
					// $('#id_activity2').val(data.id_activity);
					document.getElementById("hn_text").innerHTML = (data.hn_activity) ;
					$('#hn_activity2').attr('readonly', true).val(data.hn_activity);
					$('#date_activity2').val(data.date_activity);
					$('#time_activity2').val(data.time_activity);
					$('#contact_activity2').val(data.contact_activity);
					$('#opd_activity2').val(data.opd_activity);
					$('#channel_activity2').val(data.channel_activity);
					$('#note_activity2').val(data.note_activity);
					$('#staff_activity2').val(data.staff_activity);
					$('#consultant_activity2').val(data.consultant_activity);
					$('#action_activity2').hide();
					$('#operation_activity2').hide();
					$('.modal-title').text("รายละเอียด activity");
            }
          });
		  
    });
    //end view data
		//----------- start เมื่อคลิกปุ่ม Submit บน Modal Form  ----------------------------
		$(document).on('submit', '#activity_form', function(event) {
			event.preventDefault();
			// window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
			var hn_activity = $('#hn_activity').val();
			var date_activity = $('#date_activity').val();
			var time_activity = $('#time_activity').val();
			var contact_activity = $('#contact_activity').val();
			var opd_activity = $('#opd_activity').val();
			var channel_activity = $('#channel_activity').val();
			var note_activity = $('#note_activity').val();
			var staff_activity = $('#staff_activity').val();
			var consultant_activity = $('#consultant_activity').val();

			$.ajax({
				url: "../../service/patients/activity_script/activity_script_insert_edit.php",
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(data) {
					Swal.fire({
						text: 'เพิ่มข้อมูล Activity เรียบร้อย',
						icon: 'success',
						confirmButtonText: 'ตกลง',
					})
					$('#activity_form')[0].reset();
					$('#activity_modal').modal('hide');
					setTimeout(location.reload.bind(location), 1200); // refresh หน้า
				}
			});
		});
		// ---- END Submit ----------------------------
		//----- UPDATE !!! ----------------------------
		$(document).on('click', '#update_activity', function() {
			// window.alert("ไว้เช็ค");
			var id_activity = $(this).attr("data-id");
			$.ajax({
				url: "../../service/patients/activity_script/activity_fetch_update.php",
				method: "POST",
				data: {
					id_activity: id_activity
				},
				dataType: "json",
				success: function(data) {
					$('#activity_modal').modal('show');
					$('#id_activity').val(data.id_activity);
					$('#hn_activity').attr('readonly', true).val(data.hn_activity); 
					$('#date_activity').val(data.date_activity);
					$('#time_activity').val(data.time_activity);
					$('#contact_activity').val(data.contact_activity);
					$('#opd_activity').val(data.opd_activity);
					$('#channel_activity').val(data.channel_activity);
					$('#note_activity').val(data.note_activity);
					$('#staff_activity').val(data.staff_activity);
					$('#consultant_activity').val(data.consultant_activity);
					$('#action_activity').val("Edit");
					$('#operation_activity').val("Edit");
					$('.modal-title').text("Edit activity");
				}
			})	
			// document.getElementById("font_test").innerHTML = data.date_activity ;
		});
		//-----END UPDATE !!! ----------------------------
		//----- Delete !!! ----------------------------
		$(document).on('click', '#delete_activity', function() {
			var id_activity = $(this).attr("data-id");
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
						url: "../../service/patients/activity_script/activity_script_delete.php",
						data: {
							id_activity : id_activity
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