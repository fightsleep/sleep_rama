<div id="patient_modal" class="modal fade" role="dialog"> 
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">เพิ่มข้อมูลผู้ป่วย</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <form  method="post" id="patient_form">
          <label for="">HN</label>
          <input type="hidden" name="id_auto_patient" id="id_auto_patient" class="form-control " required />
           <input type="text" name="hn_patient" id="hn_patient" class="form-control" required/>
           <label for="">คำนำหน้า</label>
           <input type="text" name="prefix" id="prefix" class="form-control" required/>
           <label for="">ชื่อ</label>
           <input type="text" name="firstname" id="firstname" class="form-control" required/>
           <label for="">นามสกุล</label>
           <input type="text" name="lastname" id="lastname" class="form-control" required/>
           <label for="">สิทธิการรักษา</label>
           <input type="text" name="claim" id="claim" class="form-control" />
           <label for="">วันเกิด</label>
           <input type="date" name="birthdate" id="birthdate" class="form-control" />
    <div class="modal-footer">
					<input type="hidden" name="operation" id="operation" value="Add" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </form>
    </div>
  </div>
</div>
</div>



