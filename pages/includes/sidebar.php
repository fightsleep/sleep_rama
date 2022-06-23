<?php 
    function isActive ($data) {
        $array = explode('/', $_SERVER['REQUEST_URI']);
        $key = array_search("pages", $array);
        $name = $array[$key + 1];
        return $name === $data ? 'active' : '' ;
    }
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars fa-2x"></i></a>
        </li>
    </ul>
    <ul class="ml-auto navbar-nav ">
        <li class="nav-item d-md-none d-block">
            <a href="../dashboard/">
                <img src="../../assets/images/AdminLogo.png" 
                    alt="Admin Logo" 
                    width="30px"
                    class="img-circle elevation-3">
                <span class="pl-1 font-weight-light">Sleep Rama</span>
            </a>
        </li>
        <li class="nav-item d-md-block d-none">
            <!-- <a class="nav-link">เข้าสู่ระบบครั้งล่าสุด: <?php echo $_SESSION['AD_LOGIN'] ?>  </a> -->
            <a class="nav-link">คุณ: <?php echo $_SESSION['AD_FIRSTNAME'].' '.$_SESSION['AD_LASTNAME'] ?> กำลังเป็นผู้บันทึกข้อมูล  เข้าสู่ระบบครั้งล่าสุด: <?php echo $_SESSION['AD_LOGIN'] ?> กรุณาใช้ความระมัดระวังในการบันทึกข้อมูล</a>
        </li>
    </ul>
</nav>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../dashboard/" class="brand-link">
        <img src="/sleeprama_systems/assets/images/AdminLogo.png" 
             alt="Admin Logo" 
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Sleep Rama</span>
    </a>
    <div class="sidebar">
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            <div class="image">
                <img src="/sleeprama_systems/assets/images/<?php echo $_SESSION['AD_IMAGE']?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="../manager/" class="d-block"> <?php echo $_SESSION['AD_FIRSTNAME'].' '.$_SESSION['AD_LASTNAME'] ?> </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/sleeprama_systems/pages/dashboard/" class="nav-link <?php echo isActive('dashboard') ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>หน้าหลัก</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/sleeprama_systems/pages/patients/" class="nav-link <?php echo isActive('patients') ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>รายชื่อผู้ป่วย</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo isActive('products') ?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>จัดการคิว</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo isActive('orders') ?>">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>ระบบบริการหลังการขาย</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo isActive('orders') ?>">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>ระบบให้บริการยืม CPAP</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo isActive('orders') ?>">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>ระบบส่งเวร</p>
                    </a>
                </li>
                <li class="nav-header">สำหรับแพทย์ </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo isActive('list_opd') ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Review Case</p>
                    </a>
                </li>
                <li class="nav-header">สำหรับ Admin </li>
                <li class="nav-item">
                    <a href="/sleeprama_systems/pages/sub_admin/" class="nav-link <?php echo isActive('list_opd') ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>แก้ไขข้อมูลระบบ</p>
                    </a>
                </li>
                <li class="nav-header">บัญชีของเรา</li>
             
                <li class="nav-item">
                    <a href="/sleeprama_systems/pages/logout.php" id="logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>ออกจากระบบ</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>