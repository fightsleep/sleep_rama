<div id="claim_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูลสิทธิการรักษา</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="claim_form">
          <div class="row">
            <div class="col-12">
          <div class="form-group">
            <label for="">สิทธิการรักษา</label>
            <input type="hidden" name="claim_id" id="claim_id" class="form-control " required />
            <!-- <input type="hidden" name="cpaped_id" id="cpaped_id" class="form-control" value=""/> -->
            <input type="text" name="claim_list" id="claim_list" class="form-control"/>
          </div>
          </div>
          </div>

          
          <!-- Start Note -->
          <div class="form-group">
            <label for="claim_note" class="col-form-label">Note Education:</label>
            <textarea class="form-control " id="claim_note" name="claim_note"></textarea>
          
          </div>
 
          <div class="modal-footer">
            <input type="hidden" name="operation_claim" id="operation_claim" value="" />
            <input type="submit" name="action_claim" id="action_claim" class="btn btn-success" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>