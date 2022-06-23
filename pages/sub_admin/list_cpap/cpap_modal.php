<div id="cpap_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูลอุปกรณ์ใหม่</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="cpap_form">
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="cpap_code">Code CPAP</label>
                <!-- <input type="hidden" name="cpaped_id" id="cpaped_id" class="form-control" value=""/> -->
                <input type="hidden" name="cpap_id" id="cpap_id" class="form-control " required />
                <input type="text" name="cpap_code" id="cpap_code" class="form-control" placeholder="cpap code" required />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="cpap_company">บริษัท</label>
                <div class="form-group">
                  <select class="form-control" id="cpap_company" name="cpap_company">
                    <option value="">-เลือกบริษัท-</option>
                    <?php foreach ($result_cpap_company as $cpap_company) { ?> -
                      <option value="<?php echo $cpap_company["cpap_company_list"]; ?>">
                        <?php echo $cpap_company["cpap_company_list"]; ?>
                      </option>
                    <?php } ?>

                  </select>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="">ชื่ออุปกรณ์</label>
                <input type="text" id="cpap_name" name="cpap_name" class="form-control " value="" placeholder="กรอกชื่ออุปกรณ์" />
              </div>
            </div>
            <div class="col-5">
              <div class="form-group">
                <label for="">ชื่อรุ่น</label>
                <input type="text" id="cpap_model" name="cpap_model" class="form-control " value="" placeholder="กรอกชื่อรุ่น" />
              </div>
            </div>
          </div>
          <!-- End row  ชื่อ CPAP-->
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="cpap_type">ประเภทอุปกรณ์</label>
                <div class="form-group">
                  <select class="form-control" id="cpap_type" name="cpap_type">
                    <option value="CPAP ครบชุด">CPAP ครบชุด</option>
                    <option value="CPAP เฉพาะเครื่องและสาย">CPAP เฉพาะเครื่องและสาย</option>
                    <option value="หน้ากาก">หน้ากาก</option>
                    <option value="สายรัดหน้ากาก">สายรัดหน้ากาก</option>
                    <option value="สายรัดคาง">สายรัดคาง</option>
                    <option value="ท่อลม">ท่อลม</option>
                    <option value="Humid">Humid</option>
                    <option value="Filter">Filter</option>
                    <option value="Battery">Battery</option>
                    <option value="CPAP ครบชุด">CPAP ครบชุด</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="cpap_download_type">ลักษณะการดาวโหลด</label>
                <input type="text" id="cpap_download_type" name="cpap_download_type" class="form-control " value="" placeholder="ลักษณะการดาวโหลด" />
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="cpap_type_pap">CPAP/AutoPAP</label>
                <input type="text" id="cpap_type_pap" name="cpap_type_pap" class="form-control " value="" placeholder="ระบุ CPAP/AutoPAP" />
              </div>
            </div>

          </div>
          <!-- End row -->
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="cpap_detail_model">รายละเอียด</label>
                <textarea class="form-control" id="cpap_detail_model" name="cpap_detail_model" placeholder="รายละเอียด"></textarea>
              </div>
            </div>
          </div>
          <!-- End row  -->
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label for="cpap_selling_price">ราคาจำหน่าย</label>
                <input type="text" id="cpap_selling_price" name="cpap_selling_price" class="form-control " value="" placeholder="ราคาจำหน่าย" />
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="cpap_wholesale_price">ราคาซื้อ</label>
                <input type="text" id="cpap_wholesale_price" name="cpap_wholesale_price" class="form-control " value="" placeholder="ราคาซื้อ" />
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="cpap_mask_type">ประเภทหน้ากาก</label>
                <div class="form-group">
                  <select class="form-control" id="cpap_mask_type" name="cpap_mask_type">
                    <option value="Pillow Mask">Pillow Mask</option>
                    <option value="Nasal Mask">Nasal Mask</option>
                    <option value="FullFace Mask">FullFace Mask</option>
                    <option value="Oral Mask">Oral Mask</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="cpap_mask_size">ขนาดหน้ากาก</label>
                <div class="form-group">
                  <select class="form-control" id="cpap_mask_size" name="cpap_mask_size">
                    <option value="No Size">No Size</option>
                    <option value="Free Size">Free Size</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="Wide">Wide</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <!-- End row  -->


          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label for="cpap_sales_status">สถานะการจำหน่าย</label>
                <div class="form-group">
                  <select class="form-control" id="cpap_sales_status" name="cpap_sales_status">
                    <option value="พร้อมจำหน่าย">พร้อมจำหน่าย</option>a
                    <option value="เลิกจำหน่าย">เลิกจำหน่าย</option>
                    <option value="ราคาเก่า">ราคาเก่า</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="cpap_update_date">วันที่อัพเดท</label>
                <input type="date" id="cpap_update_date" name="cpap_update_date" class="form-control " value="" placeholder="วันที่อัพเดท" />
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="cpap_note">หมายเหตุ</label>
                <input type="text" id="cpap_note" name="cpap_note" class="form-control" value="" placeholder="หมายเหตุ" />
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="cpap_image">อัพรูปอุปกรณ์</label>
                    <input type="file" id="cpap_image" name="cpap_image">
                    <span id="cpap_uploaded_image"></span>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <input type="hidden" name="operation_cpap" id="operation_cpap" value="" />
            <input type="submit" name="action_cpap" id="action_cpap" class="btn btn-success" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>