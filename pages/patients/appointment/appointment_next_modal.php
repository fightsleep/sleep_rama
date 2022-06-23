<div id="appointment_next_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูลการเลื่อนนัด</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="appointment_next_form">
          <div class="form-group">
            <input type="text" name="appointment_id_fornext" id="appointment_id_fornext" class="form-control" value="" />
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">วันที่ติดต่อเลื่อน</label>
                <input type="date" id="next_appoint_datecontact" name="next_appoint_datecontact" class="form-control " value="<?php echo date('Y-m-d'); ?>" /> 
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">เลื่อนเป็นวันที่</label>
                <input type="date" id="next_appoint_date" name="next_appoint_date" class="form-control " value="<?php echo date('Y-m-d'); ?>" /> 
              </div>
            </div>
            
          </div>

          <!-- start เลือกแผนก -->
          <div class="row">
        
            <div class="col-6">
              <div class="form-group">
                <label for="count_postpone_next">เลื่อนครั้งที่</label>
                <div class="form-group form-control-lg">
                  <select class="form-control" id="count_postpone_next" name="count_postpone_next">
                    <option value="">-เลือกการเลื่อนนัด-</option>
                      <option value="เลื่อนครั้งที่ 1">เลื่อนครั้งที่ 1</option>
                      <option value="เลื่อนครั้งที่ 2">เลื่อนครั้งที่ 2</option>
                      <option value="เลื่อนครั้งที่ 3">เลื่อนครั้งที่ 3</option>
                      <option value="เลื่อนครั้งที่ 4">เลื่อนครั้งที่ 4</option>
                   

                  </select>
                </div>
              </div>
            </div>
            <div class="col-6">
            <div class="form-group">
            <label for="note_next_appoint-text" class="col-form-label">Note เลื่อน :</label>
            <textarea class="form-control " id="note_next_appoint" name="note_next_appoint"></textarea>
            </div>
          </div>
          </div>
          <!--  start ผู้ดำเนินการ -->
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="staff_postpone_next">เลือกผู้ดำเนินการ</label>
                <div class="form-group">
                  <select class="form-control" id="staff_postpone_next" name="staff_postpone_next">
                    <option value="">-เลือกผู้ดำเนินการ-</option>
                    <option value="ปรีชา">-ปรีชา-</option>
                    <option value="จิราวรรณ">-จิราวรรณ-</option>
                    <option value="เจนจิรา">-เจนจิรา-</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="operation_appointment_next" id="operation_appointment_next" value="" />
            <input type="submit" name="action_appointment_next" id="action_appointment_next" class="btn btn-success" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>