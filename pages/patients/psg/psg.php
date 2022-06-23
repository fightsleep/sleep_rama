<div class="tab-pane" id="psg">
<?php
    require 'psg_select.php';
    ?>
        <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-4 ">
                <h4>
                    <i class="fas fa-user"></i>
                    รายการ Activity ของผู้ป่วย
                </h4>
                <div align="left">
                <a href="/sleeprama_systems/pages/patients/psg/form_psg_create.php?hn_psg=<?php echo $row->hn_patient;  ?>" class="mt-3 btn btn-success">
    <i class="fas fa-procedures"></i>
            PSG NewCase </a>
                </div>
            </div> <!--  col-12 -->
        </div> <!--  row -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                   <?php require'psg_table.php'; ?> 
                </div>
            </div> <!--  row -->
        </div> <!--  cold-12 -->
    </div> <!--  container-fluid -->
    <!-- </div>   content -->
</div> <!--  tab -->

 <?php
require 'psg_script.php';
 ?>