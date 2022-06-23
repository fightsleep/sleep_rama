
<div class="shadow card">
  <div class="pt-4 border-0 card-header">
    <div class="row">
      <div class="col-md-10">
        <h4>
          <i class="far fa-address-card text-orange"></i>
          Patient Profile
        </h4>
      </div>
      <div class="col-md-2">
        <a href="javascript:history.back()" class="mt-3 btn btn-warning">
          <i class="far fa-hand-point-left"></i>
          กลับหน้าหลัก
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="px-5">
      <div class="row">
        <!-- ทดสอบข้อมูลคนไข้รูปแบบใหม่ -->
        <div class="col-lg-12">
          <div class="row">
            <div class="form-group col-4">
              <label for="firstname">HN</label>
              <input type="text" class="form-control form-control-border" name="firstname" id="firstname" value="<?php echo $row->hn_patient;  ?>" placeholder="ชื่อจริง" readonly>
            </div>
            <div class="form-group col-4">
              <label for="first_name">ชื่อ</label>
              <input type="text" class="form-control form-control-border" name="first_name" id="first_name" value="<?php echo $row->firstname;  ?>" placeholder="ชื่อจริง" readonly>
            </div>
            <div class="form-group col-4">
              <label for="last_name">นามสกุล</label>
              <input type="text" class="form-control form-control-border" name="last_name" id="last_name" value="<?php echo $row->lastname;  ?>" placeholder="นามสกุล" readonly>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-4">
              <label for="last_name">สิทธิการรักษา</label>
              <input type="text" class="form-control form-control-border" name="last_name" id="last_name" value="<?php echo $row->claim;  ?>" readonly>
            </div>
            <!-- DateThai($row['birthdate']); -->
            <div class="form-group col-4">
              <label for="last_name">วันเกิด</label>
              <input type="text" class="form-control form-control-border" name="last_name" id="last_name" value="<?php echo  $row->birthdate;  ?>" readonly>
            </div>    
            <div class="form-group col-4">
              <label for="text">เบอร์โทรศัพท์</label>
              <input type="tel" class="form-control form-control-border" name="tel" id="tel" placeholder="เบอร์โทรศัพท์" readonly>
            </div>
          </div>
        </div>
        <p>ผู้แก้ไขข้อมูล : <?php echo $_SESSION['AD_FIRSTNAME'] . ' ' . $_SESSION['AD_LASTNAME'] ?></p>
        <!-- end input  -->
      </div>
    </div>
    <!-- end profile -->
  </div>
</div>