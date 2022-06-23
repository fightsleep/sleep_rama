<div align="left">
    <button name="add" id="add_appointment" data-toggle="modal" data-target="#appointment_modal" class="mb-2 mt-2 btn btn-success add_data"><i class="fas fa-plus"></i> เพิ่มข้อมูล Appointment </button>
  </div>
  <div class="row">
  </div>
  <table id="appointment_data" class="table table-bordered table-striped table-hover" width="100%">
    <thead class="table-success">
      <tr>
        <th width="5%">ลำดับ</th>
        <th width="5%">appoint id</th>
        <th width="5%">HN</th>
        <th width="15%">วันที่ติดต่อ</th>
        <th width="5%">วันที่ได้คิว</th>
        <th width="10%">OPD</th>
        <th width="10%">เลขที่ใบเสร็จ</th>
        <th width="15%">ชื่อผู้ติดต่อ</th>
        <th width="5%">note</th>
        <th width="5%">แก้ไข</th>
        <th width="5%">ลบ</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      foreach ($result_appointment as $appointment) {
        $i++;
      ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $appointment['appointment_id']; ?></td>
          <td><?= $appointment['appointment_hn']; ?></td>
          <td><?= DateThai($appointment['appointment_contact_date']); ?></td> 
          <td><?= DateThai($appointment['appointment_psgdate']); ?></td>
          <td><?= $appointment['appointment_opd']; ?></td>
          <td><?= $appointment['appointment_bill_id']; ?></td>
          <td><?= $appointment['appointment_namecontact']; ?></td>
          <td><?= $appointment['appointment_note']; ?></td>
          <td>
            <button type="button" name="update_appointment" class="btn btn-warning btn-block update_appointment" id="update_appointment" data-id=<?= $appointment['appointment_id']; ?>><i class="far fa-edit"></i></button>
          </td>
          <td><button type="button" name="delete_appointment" class="btn btn-danger" id="delete_appointment" data-id=<?= $appointment['appointment_id']; ?>><i class="far fa-trash-alt"></i>  </button></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  </table>