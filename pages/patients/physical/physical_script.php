<script type="text/javascript" language="javascript">
    $(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
        //----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
        $('#add_button').click(function() {
            $('#physical_form')[0].reset(); //ล้างข้อมูลก่อน
            $('.modal-title').text("Add Physical"); //text บน Modal title จะถูกกำหนดเป็น Add User
            $('#action_physical').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
            $('#operation_physical').val("Add"); //กำหนดให้ operation เป็น add
            $('#hn_physical').attr('readonly', true).val(<?php echo $row->hn_patient;  ?>);
        });
        // --- END ADD
        //----------- start เมื่อคลิกปุ่ม Submit บน Modal Form  ----------------------------
        $(document).on('submit', '#physical_form', function(event) {
            event.preventDefault();
            // window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
            var hn_physical = $('#hn_physical').val();
            var date_physical = $('#date_physical').val();
            var weight = $('#weight').val();
            var height = $('#height').val();
            var neck = $('#neck').val();
            var waist = $('#waist').val();
            var hip = $('#hip').val();
            var pulse_rate = $('#pulse_rate').val();
            var blood_pressure = $('#blood_pressure').val();

            $.ajax({
                url: "../../service/patients/physical_script/physical_script_insert_edit.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    Swal.fire({
                        text: 'เพิ่มข้อมูลกายภาพเรียบร้อย',
                        icon: 'success',
                        confirmButtonText: 'ตกลงจ้าา',
                    })
                    $('#physical_form')[0].reset();
                    $('#physical_modal').modal('hide');
                    setTimeout(location.reload.bind(location), 1200); // refresh หน้า
                }
            });
        });
        // ---- END Submit ----------------------------
        //----- UPDATE !!! ----------------------------
        $(document).on('click', '#update_physical', function() {
            // window.alert("ไว้เช็ค");
            var id_physical = $(this).attr("data-id");
            $.ajax({
                url: "../../service/patients/physical_script/physical_fetch_update.php",
                method: "POST",
                data: {
                    id_physical: id_physical
                },
                dataType: "json",
                success: function(data) {
                    $('#id_physical').val(data.id_physical);
                    $('#physical_modal').modal('show');
                    $('#hn_physical').attr('readonly', true).val(data.hn_physical);
                    $('#date_physical').val(data.date_physical);
                    $('#weight1').val(data.weight1);
                    $('#height').val(data.height);
                    $('#neck').val(data.neck);
                    $('#waist').val(data.waist);
                    $('#hip').val(data.hip);
                    $('#pulse_rate').val(data.pulse_rate);
                    $('#blood_pressure').val(data.blood_pressure);
                    $('#action_physical').val("Edit");
                    $('#operation_physical').val("Edit");
                    $('.modal-title').text("Edit Physical");

                }
            })
        });
        //-----END UPDATE !!! ----------------------------
        //----- Delete !!! ----------------------------
        $(document).on('click', '#delete_physical', function() {
            var id_physical = $(this).attr("data-id");
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
                        url: "../../service/patients/physical_script/physical_script_delete.php",
                        data: {
                            id_physical: id_physical
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