<div id="cpap_ed_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูล การนัดหมาย</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="cpap_ed_form">
          <div class="form-group">
            <label for="">HN</label>
            <input type="hidden" name="cpaped_id" id="cpaped_id" class="form-control" value=""/>
            <input type="text" name="cpaped_hn" id="cpaped_hn" class="form-control"/>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">วันที่ติดต่อ</label>
                <input type="date" id="cpaped_contactdate" name="cpaped_contactdate" class="form-control " value="<?php echo date('Y-m-d'); ?>" /> 
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">วันที่ได้คิวเข้า class</label>
                <input type="date" id="cpaped_appointdate" name="cpaped_appointdate" class="form-control " value="" /> 
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-6">
            <div class="form-group">
            <label for="cpaped_chanel" class="col-form-label">ช่องทาง Education :</label>
            <input type="text" class="form-control" id="cpaped_chanel" name="cpaped_chanel">
          </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label for="cpaped_opd">OPD</label>
                <div class="form-group form-control-lg">
                  <select class="form-control" id="cpaped_opd" name="cpaped_opd">
                    <option value="">-เลือกแผนก-</option>
                    <?php foreach ($result_list_opd as $result_list_opd) { ?> -
                      <option value="<?php echo $result_list_opd["id_list_opd"]; ?>">
                        <?php echo $result_list_opd["list_opd"]; ?>
                      </option>
                    <?php } ?>

                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">แพทย์ Education</label>
                <input type="text" id="cpaped_doctor" name="cpaped_doctor" class="form-control " /> 
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">แพทย์ order</label>
                <input type="text" id="cpaped_order" name="cpaped_order" class="form-control " /> 
              </div>
            </div>
            
          </div>

          <!-- Start Note -->
          <div class="form-group">
            <label for="cpaped_note" class="col-form-label">Note Education:</label>
            <textarea class="form-control " id="cpaped_note" name="cpaped_note"></textarea>
          
          </div>
          <!--  start ผู้ดำเนินการ -->
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="cpaped_staff">เลือกผู้ดำเนินการ</label>
                <div class="form-group">
                  <select class="form-control" id="cpaped_staff" name="cpaped_staff">
                  <option value="">-เลือกเจ้าหน้าที่-</option>
                    <?php foreach ($result_list_staff as $list_staff) { ?> -
                      <option value="<?php echo $list_staff["staff_id"]; ?>">
                        <?php echo $list_staff["staff_name"]; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="operation_cpap_ed" id="operation_cpap_ed" value="" />
            <input type="submit" name="action_cpap_ed" id="action_cpap_ed" class="btn btn-success" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>