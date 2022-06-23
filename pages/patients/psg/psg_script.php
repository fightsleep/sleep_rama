<!-- script มี แค่นี้เพราะไม่ได้ใช้การ insert edit แบบ AJAX -->
<script type="text/javascript" language="javascript">
	$(document).ready(function() {
        //Script Delete
		$(document).on('click','#delete_psg', function() {
    var id_psg = $(this).attr("data-id");
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
                url: "../../service/patients/psg_script/psg_script_delete.php",
                data: {
                    id_psg: id_psg
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
//End Script Delete

	});
</script>