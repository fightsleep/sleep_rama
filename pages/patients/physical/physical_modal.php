<div id="physical_modal" class="modal fade" role="dialog"> 
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">เพิ่มข้อมูลกายภาพ</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <form  method="post" id="physical_form">
          <label for="">HN</label>
          <input type="hidden" name="id_physical" id="id_physical" class="form-control" required/>
           <input type="text" name="hn_physical" id="hn_physical" class="form-control" required/>
           <label for="">วันที่กรอกข้อมูล</label>
           <input type="date" name="date_physical" id="date_physical" value="<?php echo date('Y-m-d'); ?>" class="form-control"/>
           <label for="">น้ำหนัก</label>
           <input type="number" name="weight1" id="weight1"  class="form-control" max="500" placeholder="น้ำหนัก" />
           <label for="">ส่วนสูง</label>
           <input type="number" name="height" id="height" class="form-control" max="300" placeholder="ส่วนสูง" />
           <label for="">รอบคอ</label>
           <input type="number" name="neck" id="neck" class="form-control" placeholder="รอบคอ"/>
           <label for="">รอบเอว</label>
           <input type="number" name="waist" id="waist" class="form-control" placeholder="รอบเอว" />
           <label for="">รอบสะโพก</label>
           <input type="number" name="hip" id="hip" class="form-control" placeholder="รอบสะโพก" />
           <label for="">อัตราชีพจร</label>
           <input type="number" name="pulse_rate" id="pulse_rate" class="form-control" placeholder="อัตราชีพจร" />
           <label for="">ความดันเลือด</label>
           <input type="number" name="blood_pressure" id="blood_pressure" class="form-control" placeholder="ความดันเลือด" />
           <div class="modal-footer">
					<input type="hidden" name="operation_physical" id="operation_physical" value="" />
					<input type="submit" name="action_physical" id="action_physical" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </form>
  </div>
  </div>
</div>
</div>



