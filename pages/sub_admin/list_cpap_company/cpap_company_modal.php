<div id="cpap_company_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มชื่อบริษัทตัวแทน</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="cpap_company_form">
          <div class="row">
            <div class="col-12">
          <div class="form-group">
            <label for="">ชื่อบริษัทตัวแทน</label>
            <input type="hidden" name="cpap_company_id" id="cpap_company_id" class="form-control " required />
            <!-- <input type="hidden" name="cpaped_id" id="cpaped_id" class="form-control" value=""/> -->
            <input type="text" name="cpap_company_list" id="cpap_company_list" class="form-control"/>
          </div>
          </div>
          </div>
          <!-- Start Note -->
          <div class="form-group">
            <label for="cpap_company_note" class="col-form-label">Note Education:</label>
            <textarea class="form-control " id="cpap_company_note" name="cpap_company_note"></textarea>
          
          </div>
 
          <div class="modal-footer">
            <input type="hidden" name="operation_cpap_company" id="operation_cpap_company" value="" />
            <input type="submit" name="action_cpap_company" id="action_cpap_company" class="btn btn-success" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>