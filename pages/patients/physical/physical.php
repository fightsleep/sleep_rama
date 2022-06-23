<div class="tab-pane" id="physical">
    <?php 
    require 'physical_select.php';
    require 'physical_modal.php' ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-4 ">
                <h4>
                    <i class="fas fa-user"></i>
                    รายการ Activity ของผู้ป่วย
                </h4>
                <div align="left">
                    <button name="add" id="add_button" data-toggle="modal" data-target="#physical_modal" class="mt-3 btn btn-success add_data"><i class="fas fa-plus"></i> เพิ่มข้อมูล Physical </button>
                </div>
            </div> <!--  col-12 -->
        </div> <!--  row -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                 <?php require 'physical_table.php'; ?>
                </div>
            </div> <!--  row -->
        </div> <!--  cold-12 -->
    </div> <!--  container-fluid -->
    <!-- </div>   content -->
</div> <!--  tab -->
<?php
require 'physical_script.php';
?>