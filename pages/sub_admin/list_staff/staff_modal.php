<div id="staff_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูลเจ้าหน้าที่</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="staff_form">
          <div class="row">
            <div class="col-4">
          <div class="form-group">
            <label for="">รหัสเจ้าหน้าที่</label>
            <!-- <input type="hidden" name="cpaped_id" id="cpaped_id" class="form-control" value=""/> -->
            <input type="hidden" name="staff_id" id="staff_id" class="form-control " required />
            <input type="text" name="staff_no" id="staff_no" class="form-control"/>
          </div>
          </div>
          </div>
          <div class="row">
            <div class="col-2">
            <div class="form-group">
                <label for="staff_prefix">เลือกคำนำหน้า</label>
                <div class="form-group">
                  <select class="form-control" id="staff_prefix" name="staff_prefix">
                    <option value="">คำนำหน้า</option>
                    <option value="นาย">นาย</option>
                    <option value="นางสาว">นางสาว</option>
                    <option value="นาง">นาง</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-5">
              <div class="form-group">
                <label for="">ชื่อ</label>
                <input type="text" id="staff_name" name="staff_name" class="form-control " value="" placeholder="กรอกชื่อ" required /> 
              </div>
            </div>
            <div class="col-5">
              <div class="form-group">
                <label for="">นามสกุล</label>
                <input type="text" id="staff_lastname" name="staff_lastname" class="form-control " value="" placeholder="กรอกนามสกุล" required /> 
              </div>
            </div>
          </div>
        <div class="row">
        <div class="col-4">
              <div class="form-group">
                <label for="">ตำแหน่ง</label>
                <input type="text" id="staff_position" name="staff_position" class="form-control " value="" placeholder="กรอกตำแหน่ง" /> 
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="">Level</label>
                <input type="text" id="staff_level" name="staff_level" class="form-control " value="" placeholder="กรอกตำแหน่ง" /> 
              </div>
            </div>
            <div class="col-4">
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

          <div class="modal-footer">
            <input type="hidden" name="operation_staff" id="operation_staff" value="" />
            <input type="submit" name="action_staff" id="action_staff" class="btn btn-success" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>