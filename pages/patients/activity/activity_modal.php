<div id="activity_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูล Activity</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="activity_form">
          <div class="form-group">
            <label for="">HN</label>
            <input type="hidden" name="id_activity" id="id_activity" class="form-control " required />
            <input type="text" name="hn_activity" id="hn_activity" class="form-control form-control-border" required />
          </div>
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label for="">วันที่ติดต่อ</label>
                <input type="date" id="date_activity" name="date_activity" class="form-control form-control-border" value="<?php echo date('Y-m-d'); ?>" />
                 <!-- <date-input date="{{date}}" timezone="[[timezone]]"></date-input> -->
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="">เวลาที่ติดต่อ</label>
                <input type="time" name="time_activity" id="time_activity" class="form-control form-control-border"  value="<?php echo date("H:i"); ?>" />
              </div>
            </div>
            
          </div>


          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="contact_activity">Activity select</label>
                <div class="form-group form-control-lg">
                  <select class="form-control form-control-lg form-control-border" id="contact_activity" name="contact_activity">
                    <option value="">-เลือก Activity -</option>
                    <option value="">-เลือกผู้ให้คำปรึกษา-</option>
                    <option value="ปรีชา">-ปรีชา-</option>
                    <option value="จิราวรรณ">-จิราวรรณ-</option>
                    <option value="เจนจิรา">-เจนจิรา-</option>

                    
                  </select>
                </div>
              </div>
            </div>
          </div>
      
          <!-- start เลือกแผนก -->
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="select_activity">OPD</label>
                <div class="form-group form-control-lg">
                  <select class="form-control form-control-lg form-control-border" id="opd_activity" name="opd_activity">
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
            <div class="col-6">
              <div class="form-group">
                <label for="select_activity">ช่องทางการให้บริการ</label>
                <div class="form-group form-control-lg">
                  <select class="form-control form-control-lg form-control-border" id="channel_activity" name="channel_activity">
                    <option value="">-เลือกช่องทาง-</option>
                    <option value="Line">-Line-</option>
                    <option value="Tele-walkin">-Tele-walkin-</option>
                    <option value="Telemed">-Tele Med-</option>
                    <option value="Sleeponcloud">-Sleep on Cloud -</option>
                    <option value="Email">-Email-</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <!-- end เลือกแผนก -->
          

          <div class="form-group">
            <label for="note_activity-text" class="col-form-label">Note :</label>
            <textarea class="form-control form-control-border" id="note_activity" name="note_activity"></textarea>
          </div>

          <!--  start ผู้ดำเนินการ -->
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="activity_staff">เลือกผู้ดำเนินการ</label>
                <div class="form-group form-control-lg">
                  <select class="form-control form-control-lg form-control-border" id="staff_activity" name="staff_activity">
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
            <div class="col-6">
              <div class="form-group">
                <label for="consultant_activity">เลือกผู้ให้คำปรึกษา</label>
                <div class="form-group form-control-lg">
                  <select class="form-control form-control-lg form-control-border" id="consultant_activity" name="consultant_activity">
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
            <input type="hidden" name="operation_activity" id="operation_activity" value="" />
            <input type="submit" name="action_activity" id="action_activity" class="btn btn-success" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>