<?php  require_once '../../../service/connect_db.php';
if (!isset($_SESSION['AD_ID'])) {      //มีการ check ว่ามี session id หรือยัง ถ้าไม่มีให้เด้งกลับไปที่หน้า login
    header('Location: ../../../login.php');
}
$id_psg = $_GET['id_psg'];
if ($id_psg) {
    $sql_psg_edit = ("SELECT * FROM tbl_psg as psg
-- LEFT JOIN tbl_patient AS patient ON psg.hn_psg=patient.hn_patient
 WHERE psg.id_psg = :id_psg
 ORDER BY date_psg DESC;
 ");
    $stmt_psg_edit = $connection->prepare($sql_psg_edit);
    $stmt_psg_edit->execute(array(":id_psg" => $_GET['id_psg']));
    $result_psg_edit = $stmt_psg_edit->fetch(PDO::FETCH_OBJ);  }
?>
<?php include('../../includes/header.php');   ?>
    <div class="wrapper">
        <?php require_once '../../includes/sidebar.php';  ?>
        <div class="content-wrapper pt-3">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-header border-0 pt-4">
                                    <h4>
                                        <i class="fas fa-users"></i>
                                        แก้ไขข้อมูล PSG ของ HN <?php echo $result_psg_edit->hn_psg;  ?>
                                    </h4>
                                    <div class="col-md-2">
                                        <a href="javascript:history.back()" class="mt-3 btn btn-warning">
                                            <i class="far fa-hand-point-left"></i>
                                            กลับหน้าหลัก
                                        </a>
                                    </div>
                                </div>
                                <form id="formData">
                                    <div class="card-body">
                                        <div class="px-5">
                                            <div class="row">
                                                <!-- start input  -->
                                                <input type="hidden" name="id_psg" value="<?php echo $result_psg_edit->id_psg;  ?>">
                                                <input type="hidden" name="user_edit_psg" value="<?php echo $_SESSION['AD_FIRSTNAME'] . ' ' . $_SESSION['AD_LASTNAME'] ?>">
                                                <div class="col-3">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">วันที่ตรวจ</span>
                                                        </div>
                                                        <input type="date" name="date_psg" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $result_psg_edit->date_psg;  ?>">
                                                    </div>
                                                </div>
                                                <!-- end input  -->
                                                <!-- start input  -->
                                                <div class="col-3">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">ผู้ป่วยใหม่/เก่า</span>
                                                        </div>
                                                        <input type="text" name="old_new_psg" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $result_psg_edit->old_new_psg;  ?>">
                                                    </div>
                                                </div>
                                                <!-- end input  -->
                                                <!-- start input  -->
                                                <div class="col-3">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">แผนกส่งตรวจ</span>
                                                        </div>
                                                        <select name="opd_psg" class="form-control">
                                                            <option value="<?php echo $result_psg_edit->opd_psg;  ?>"><?php echo $result_psg_edit->opd_psg;  ?></option>
                                                            <option value="MED">- MED -</option>
                                                            <option value="ENT">- ENT -</option>
                                                            <option value="PHY">- PHY -</option>
                                                            <option value="PED">- PED -</option>
                                                            <option value="OTMED">- OT MED -</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end input  -->
                                                <div class="col-3">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">OPD/IPD</span>
                                                        </div>
                                                        <select name="opd_ipd_psg" class="form-control">
                                                            <option value="<?php echo $result_psg_edit->opd_ipd_psg;  ?>"><?php echo $result_psg_edit->opd_ipd_psg;  ?></option>
                                                            <option value="OPD">- OPD -</option>
                                                            <option value="IPD">- IPD -</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">แพทย์ส่งตรวจ</span>
                                                        </div>
                                                        <input type="text" name="doctor_refering" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $result_psg_edit->doctor_refering;  ?>">
                                                    </div>
                                                </div>
                                                <!-- end input  -->
                                                <!-- start input  -->
                                                <div class="col-4">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">แพทย์อ่านผล</span>
                                                        </div>
                                                        <input type="text" name="doctor_review" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $result_psg_edit->doctor_review;  ?>">
                                                    </div>
                                                </div>
                                                <!-- end input  -->
                                                <!-- start input  -->
                                                <div class="col-4">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">Pre Dx</span>
                                                        </div>
                                                        <input type="text" name="predx" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $result_psg_edit->predx;  ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-block mx-auto w-50" name="submit">อัพเดทการแก้ไข</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('../../includes/footer.php') ?>
    </div>
    <!-- scripts -->
    <script>
        $(function() {
            $('#formData').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '../../../service/patients/psg_script/psg_script_edit.php',
                    data: $('#formData').serialize()
                }).done(function(resp) {
                    Swal.fire({
                            text: 'อัพเดทข้อมูล PSG เรียบร้อย',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                        })
                        .then((result) => {
                            window.history.back()
                        });
                })
            });
        });
    </script>
</body>
</html>