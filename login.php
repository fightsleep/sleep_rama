<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>SleepRama Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico"> -->
  <!-- stylesheet -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="bg"></header>
<section class="d-flex align-items-center min-vh-100">
  <div class="container">
    <div class="row justify-content-center">
      <section class="col-lg-6">
        <div class="p-3 shadow card p-md-4">
          <h2 class="text-center font-weight-bold" style="color:purple ;">ศูนย์โรคการนอนหลับ</h2>
          <h4 class="text-center font-weight-bold" style="color:purple ;">โรงพยาบาลรามาธิบดี</h4>
          <!-- <h4 class="text-center text-secondary">เข้าสู่ระบบ</h4>  -->
          <div class="card-body">
            <!-- HTML Form Login --> 
            <form id="formLogin">
              <div class="form-group col-sm-12">
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <div class="px-2 input-group-text">รหัสเจ้าหน้าที่</div>
                  </div>
                  <input type="text" class="form-control" name="username" placeholder="username" required>
                </div>
              </div>
              <div class="form-group col-sm-12">
              <div class="input-group">
                  <div class="input-group-prepend">
              <div class="px-2 input-group-text">รหัสผ่าน</div>
                  </div>
                  <input type="password" class="form-control" name="password" placeholder="password" required>
                </div>
              </div>
              <button type="submit" class="btn btn-outline-secondary btn-block" style="color:purple ;" > เข้าสู่ระบบ</button>
            </form>
          
          </div>
        </div>
      </section>
    </div>
  </div>
</section>

<!-- script -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script> 
<script>
  $(function() {
    /** Ajax Submit Login */
    $("#formLogin").submit(function(e){   //เมื่อใดที่มีการกด submit form จะมีการเข้ามาใช้งาน
      e.preventDefault()    //เพื่อป้องกันการโหลดหน้า web  
      $.ajax({
        type: "POST",    //การ creat data ใช้แบบ POST
        url: "service/auth/login.php",   // คือ end point API ปลายทาง
        data: $(this).serialize()     //serialize()) การส่งค่า jquery ด้วยการอ่านค่าข้อมูลทั้งหมดจาก form แล้วส่งไปให้ php
      }).done(function(resp) {      //เมื่อใดที่ทำงานสำเร็จ (code ตระกูล200)จะเข้ามาที่ .done
        window.toastr.remove()
        toastr.success('เข้าสู่ระบบเรียบร้อย')
        setTimeout(() => {
          location.href = 'pages/dashboard/'
        }, 700)
      }).fail(function(resp) {       //เมื่อใดที่ทำไม่สำเร็จ (code ตระกูล400)จะเข้ามาที่ .fail ทุกตัว
        window.toastr.remove()
        toastr.error('ไม่สามารถเข้าสู่ระบบได้')
      })
    })
  })
</script>
</body>

</html>
