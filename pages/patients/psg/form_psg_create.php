<?php  require_once '../../../service/connect_db.php' ; 
if( !isset($_SESSION['AD_ID'] ) ){      //มีการ check ว่ามี session id หรือยัง ถ้าไม่มีให้เด้งกลับไปที่หน้า login
    header('Location: ../../../login.php');  }
$hn_psg = $_GET['hn_psg'];  ?>
<?php include('../../includes/header.php'); ?>
    <div class="wrapper">
    <?php require_once '../../includes/sidebar.php' ; ?> 
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
                                        เพิ่มข้อมูล PSG ของ HN <?php echo $hn_psg; ?>
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
                                                <!-- start input  hn-->
                                                <div class="col-2">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">HN</span>
                                                        </div>
                                                        <input type="text" name="hn_psg" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $hn_psg; ?>" readonly>
                                                    </div>
                                                </div>
                                                <!-- end input  -->
                                                <!-- start input  -->
                                                <div class="col-3">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">วันที่ตรวจ</span>
                                                        </div>
                                                        <input type="date" name="date_psg" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
                                                    </div>
                                                </div>
                                                <!-- end input  -->
                                                <!-- start input  -->
                                                <div class="col-4">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">ผู้ป่วยใหม่/เก่า</span>
                                                        </div>
                                                        <select name="old_new_psg" class="form-control">
                                                            <option value="">-เลือกผู้ป่วยเก่า/ใหม่-</option>
                                                            <option value="ผู้ป่วยเก่า">- ผู้ป่วยเก่า -</option>
                                                            <option value="ผู้ป่วยใหม่">- ผู้ป่วยใหม่ -</option>
                                                        </select>
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
                                                            <option value="">-เลือกแผนก-</option>
                                                            <option value="MED">- MED -</option>
                                                            <option value="ENT">- ENT -</option>
                                                            <option value="PHY">- PHY -</option>
                                                            <option value="PED">- PED -</option>
                                                            <option value="OTMED">- OT MED -</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end input  -->
                                            </div>
                                            <div class="row">
                                                <!-- start input  -->
                                                <div class="col-3">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">OPD/IPD</span>
                                                        </div>
                                                        <select name="opd_ipd_psg" class="form-control">
                                                            <option value="">-OPD/IPD-</option>
                                                            <option value="OPD">- OPD -</option>
                                                            <option value="IPD">- IPD -</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default" >แพทย์ส่งตรวจ</span>
                                                        </div>
                                                        <input type="text" name="doctor_refering" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
                                                    </div>
                                                </div>
                                                <!-- end input  -->
                                                <!-- start input  -->
                                                <div class="col-4">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">แพทย์อ่านผล</span>
                                                        </div>
                                                        <input type="text" name="doctor_review" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
                                                    </div>
                                                </div>
                                                <!-- end input  -->
                                                <!-- start input  -->
                                                <div class="col-4">
                                                    <div class="mb-3 input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">Pre Dx</span>
                                                        </div>
                                                        <input type="text" name="predx" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="">
                                                    </div>
                                                </div>
                                                <!-- end input  -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md6">
                                                <p>ผู้เพิ่มข้อมูล : <?php echo $_SESSION['AD_FIRSTNAME'].' '.$_SESSION['AD_LASTNAME'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-block mx-auto w-50" name="submit">บันทึกข้อมูล</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once '../../includes/footer.php' ?>
    </div>
    <!-- scripts Ajax -->
    <script>
        $(function() {
            $('#formData').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '../../../service/patients/psg_script/psg_script_create.php',
                    data: $('#formData').serialize()
                }).done(function(resp) {
                    Swal.fire({
                            text: 'เพิ่มข้อมูล PSG เรียบร้อย',
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