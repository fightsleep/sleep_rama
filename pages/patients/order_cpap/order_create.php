<?php require_once '../../../service/connect_db.php';
if (!isset($_SESSION['AD_ID'])) {      //มีการ check ว่ามี session id หรือยัง ถ้าไม่มีให้เด้งกลับไปที่หน้า login
    header('Location: ../../../login.php');
}
$hn_order = $_GET['hn_order'];  ?>
<?php include('../../includes/header.php'); ?>
<div class="wrapper">
    <?php include '../../includes/sidebar.php';
    require 'order_modal_add.php';
    ?>
    <?php
    // SQL Crate Order
    $sql_order = ("SELECT * FROM tbl_patient
 WHERE hn_patient = :hn_patient ");
    $stmt_order = $connection->prepare($sql_order);
    $stmt_order->execute(array(":hn_patient" => $_GET['hn_order']));
    $row_order = $stmt_order->fetch(PDO::FETCH_OBJ);
    // SQL PSG --------------------------
    $sql_psg = ("SELECT * FROM tbl_psg
     WHERE hn_psg = :hn_patient ");
    $stmt_psg = $connection->prepare($sql_psg);
    $stmt_psg->execute(array(":hn_patient" => $_GET['hn_order']));
    $row_psg = $stmt_psg->fetch(PDO::FETCH_OBJ);
    //END SQL PSG 
    ?>
    <div class="content-wrapper pt-4">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-header border-0 pt-4">
                                <h3 class="card-title">
                                    <i class="fas fa-cart-arrow-down"></i>
                                    ออเดอร์ของ<?php echo "คุณ" . $row_order->firstname . "  " . $row_order->lastname. "  " . "สิทธิการรักษา" . $row_order->claim; ?>
                                </h3>
                                <br>
                            </div>
                            <!-- <form id="form_add_order"> -->
                                <div class="card-body">
                            <!-- <?php    print_r($row_psg);   ?> -->
                                <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="date_buy">วันที่ซื้อ</label>
                                              <?php  $todayDate = date('Y-m-d', strtotime('today')); 
                                              echo  "<input type='date' id='date_buy' name='date_buy' class='form-control' value= '$todayDate' />"
                                              ?>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="date_receive">วันที่รับเครื่อง</label>
                                              <?php  $todayDate = date('Y-m-d', strtotime('today')); 
                                              echo  "<input type='date' id='date_receive' name='date_receive' class='form-control' value= '$todayDate' />"
                                              ?>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="">Level</label>
                                                <input type="text" id="staff_level" name="staff_level" class="form-control " value="" placeholder="กรอกตำแหน่ง" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="staff_status">สถานะ</label>
                                                <div class="form-group">
                                                    <select class="form-control" id="staff_status" name="staff_status">
                                                        <option value="คงสภาพ">คงสภาพ</option>
                                                        <option value="พ้นสภาพ">พ้นสภาพ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">วันที่ทำ sleep test ล่าสุด</label>
                                             <input type='text' id='date_buy' name='date_buy' class='form-control' value= "<?php echo $row_psg->date_psg; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">name</label>
                                                <input type="text" id="name" name="name" class="form-control " value="" placeholder="กรอกตำแหน่ง" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">email</label>
                                                <input type="text" id="email" name="email" class="form-control " value="" placeholder="กรอกตำแหน่ง" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ---------- -->
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-header border-0 pt-4">
                                <h3 class="card-title">
                                    <i class="fas fa-cart-arrow-down"></i>
                                    รายการอุปกรณ์
                                </h3>
                                <br>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modalAdd">
                                    <i class="fa fa-plus-circle"></i> เลือกอุปกรณ์ที่ต้องการ
                                </button>
                                <!-- <a href="print_order.php?hn_order=<?php echo $hn_order ; ?>" class="btn btn-warning mt-3" >
	<i class="fas fa-user"></i> Print ใบสั่งซื้อ </a> -->
                                <!-- <button type="button" class="btn btn-danger mt-3" data-toggle="modal" data-target="#modalAdd">
                                    <i class="fas fa-print"></i> Print เอกสารสั่งซื้อ
                                </button> -->
                            </div>
                            <form id="form_add_order">
                            <div class="card-body">
                                <div class="table-responsive-xxl">
                                    <table class="table table-hover" id="orders">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width: 3%;">รหัสสินค้า</th>
                                                <th style="width: 8%;">บริษัท</th>
                                                <th style="width: 5%;">ชื่อสินค้า</th>
                                                <th style="width: 30%;">รายละเอียด</th>
                                                <th style="width: 5%;">ประเภท</th>
                                                <th style="width: 15%;">serial number</th>
                                                <th style="width: 8%;">ราคา</th>
                                                <th style="width: 8%;">จำนวน</th>
                                                <th style="width: 3%;">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="8" class="text-center">ข้อมูลว่าง</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-md-6 col-lg-5 col-xl- text-right">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th>รวมเป็นเงิน</th>
                                                    <td>0</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-success btn-block mx-auto w-50" name="submit" value="บันทึกข้อมูล">
                            </div>
                            </form>    <!--close form data -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../includes/footer.php' ?>
</div>
<?php include_once 'order_create_script.php'; ?>
</body>

</html>