<div id="appointment_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูล การนัดหมาย</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="appointment_form">
          <div class="form-group">
            <label for="">HN</label>
            <input type="hidden" name="appointment_id" id="appointment_id" class="form-control " required />
            <input type="text" name="appointment_hn" id="appointment_hn" class="form-control " required />
          </div>
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label for="">วันที่ติดต่อ</label>
                <input type="date" id="appointment_contact_date" name="appointment_contact_date" class="form-control " value="<?php echo date('Y-m-d'); ?>" /> 
              </div>
            </div>
            <!-- <div class="col-4">
              <div class="form-group">
                <label for="">เวลาที่ติดต่อ</label>
                <input type="time" name="time_appointment" id="time_appointment" class="form-control "  value="<?php echo date("H:i"); ?>" />
              </div>
            </div> -->
            
          </div>

          <!-- start เลือกแผนก -->
          <div class="row">
            <div class="col-6">
            <div class="form-group">
            <label for="note_appointment-text" class="col-form-label">เลขที่ใบเสร็จ :</label>
            <input type="text" class="form-control" id="appointment_bill_id" name="appointment_bill_id">
          </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label for="select_appointment">OPD</label>
                <div class="form-group form-control-lg">
                  <select class="form-control" id="appointment_opd" name="appointment_opd">
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
              <!--  start ความเสี่ยง -->
              <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="appointment_risk">เลือกความเสี่ยง</label>
                <div class="form-group">
                  <select class="form-control" id="appointment_risk" name="appointment_risk">
                    <option value="">-เลือกความเสี่ยง-</option>
                    <option value="หลับใน">-หลับใน-</option>
                    <option value="VIP">-VIPS-</option>
                    <option value="Cancellist">-Cancellist-</option>
                    <option value="ผ่าตัดกระเพาะ">-ผ่าตัดกระเพาะ-</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <!-- end เลือกแผนก -->
          <div class="form-group">
            <label for="note_appointment-text" class="col-form-label">Note :</label>
            <textarea class="form-control " id="appointment_note" name="appointment_note"></textarea>
          
          </div>
            <!--  start ผู้ติดต่อ -->
          <div class="form-group">
            <label for="note_appointment-text" class="col-form-label">ชื่อผู้ติดต่อ :</label>
            <input type="text" class="form-control" id="appointment_namecontact" name="appointment_namecontact">
          </div>
          <!--  start ผู้ดำเนินการ -->
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="appointment_staff">เลือกผู้ดำเนินการ</label>
                <div class="form-group">
                  <select class="form-control" id="appointment_recipient" name="appointment_recipient">
                    <option value="">-เลือกผู้ดำเนินการ-</option>
                    <option value="">-เลือกผู้ให้คำปรึกษา-</option>
                    <option value="ปรีชา">-ปรีชา-</option>
                    <option value="จิราวรรณ">-จิราวรรณ-</option>
                    <option value="เจนจิรา">-เจนจิรา-</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="operation_appointment" id="operation_appointment" value="" />
            <input type="submit" name="action_appointment" id="action_appointment" class="btn btn-success" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>