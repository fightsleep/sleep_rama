<?php  require_once '../../../service/connect_db.php' ; 
    if( !isset($_SESSION['AD_ID'] ) ){     
        header('Location: ../../../login.php');  
    }
$id_psg = $_GET['id_psg'];
if ($id_psg) {
    $sql_psg_detail = ("SELECT * FROM tbl_psg as psg
LEFT JOIN tbl_patient AS patient ON psg.hn_psg=patient.hn_patient 
LEFT JOIN tbl_psg_update_log AS psg_log ON psg.id_psg=psg_log.ref_psg_id 
 WHERE psg.id_psg = :id_psg
 ORDER BY id DESC
--  LEFT JOIN tbl_psg_update_log AS psg_log ON psg.id_psg=psg_log.ref_psg_id
--  WHERE psg.id_psg = :id_psg
 ;
 ");
    $stmt_psg_detail = $connection->prepare($sql_psg_detail);
    $stmt_psg_detail->execute(array(":id_psg" => $_GET['id_psg']));
    $result_psg_detail = $stmt_psg_detail->fetch(PDO::FETCH_OBJ); }
?>

<?php include('../../includes/header.php');  ?>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include '../../includes/sidebar.php' ?>
        <?php require '../../../service/patients/my_function/function_date.php' ?>
        <div class="pt-3 content-wrapper" id="content_profile">
            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="shadow card">
                                <div class="pt-4 border-0 card-header">
                                    <h4>
                                        <i class="fas fa-user text-green"></i>
                                        ผลการตรวจ Sleep Test ของคุณ<?php echo $result_psg_detail->firstname; ?> เมื่อวันที่ <?php echo DateThai($result_psg_detail->date_psg); ?>
                                    </h4>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-9">
                                            </div>
                                            <div class="col-md-3">
                                            <a href="/sleeprama_systems/pages/patients/psg/form_psg_edit.php?id_psg=<?php echo $result_psg_detail->id_psg; ?>" class="mt-3 btn btn-secondary">
                    <i class="fas fa-tools"></i>
                        แก้ไข </a>
                                            <a href="javascript:history.back()" class="mt-3 btn btn-warning">
                    <i class="far fa-hand-point-left"></i>
                        กลับหน้าหลัก
                    </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    วันที่ตรวจ : <h5><?php echo DateThai($result_psg_detail->date_psg); ?></h5>
                                                    แผนกที่ส่งตรวจ : <h5><?php echo $result_psg_detail->opd_psg; ?></h5>
                                                    แพทย์ส่งตรวจ : <h5><?php echo $result_psg_detail->doctor_refering; ?></h5>
                                                    แพทย์อ่านผล : <h5><?php echo $result_psg_detail->doctor_review; ?></h5>
                                                    Technician : <h5><?php echo $result_psg_detail->technician; ?></h5>
                                                </div>
                                                <div class="col-md-4">
                                                    Apnea : <h5><?php echo $result_psg_detail->apnea_index; ?></h5>
                                                    Hypopnae : <h5><?php echo $result_psg_detail->hypopnae_index; ?></h5>
                                                    AHI : <h5><?php echo $result_psg_detail->ahi; ?></h5>
                                                    Pre Dx : <h5><?php echo $result_psg_detail->predx; ?></h5>

                                                </div>
                                                <div class="col-md-4">
                                                    RDI : <h5><?php echo $result_psg_detail->rdi; ?></h5>
                                                    RERA : <h5><?php echo $result_psg_detail->rera_index; ?></h5>
                                                    Min Sat : <h5><?php echo $result_psg_detail->min_sat; ?></h5>
                                                    Post Dx : <h5><?php echo $result_psg_detail->postdx; ?></h5>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-4">
                                                    <p>ผู้เพิ่มข้อมูล : <?php echo $result_psg_detail->user_insert_psg;  ?></p>
                                                </div>
                                                <div class="col-4">
                                                    <p>เวลาที่เพิ่มข้อมูล : <?php echo $result_psg_detail->insert_date_psg;  ?></p>
                                                </div>
                                         
                                            </div>
                                      <!-- ---------------------------- -->
                                            <div class="row">
                                                <div class="col-4">
                                                    <p>ผู้แก้ไขข้อมูลล่าสุด : <?php echo $result_psg_detail->log_edit_psg;  ?></p>
                                                </div>
                                                <div class="col-4">
                                                    <p>เวลาที่แก้ไขข้อมูล : <?php echo $result_psg_detail->date_edit_psg;  ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../includes/footer.php' ?>
    </div>
</body>
</html>