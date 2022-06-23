<?php 
//dashboard/index.php
    require_once('../authen.php'); 
    include '../includes/header.php';  //แก้ 20/05/2565 ลบ headder เก่าออก include แทน
?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include_once('../includes/sidebar.php') ?>
    <div class="pt-3 content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="shadow small-box bg-info">
                            <div class="text-center inner">
                                <h1 class="py-3">&nbsp;ผู้ป่วยรอรับเครื่อง&nbsp;</h1>
                            </div>
                            <a href="../manager/" class="py-3 small-box-footer"> คลิกดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="shadow small-box bg-primary">
                            <div class="text-center inner">
                                <h1 class="py-3">คิวตรวจวันนี้</h1>
                            </div>
                            <a href="../members/" class="py-3 small-box-footer"> คลิกดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="shadow small-box bg-success">
                            <div class="text-center inner">
                                <h1 class="py-3">ผู้ป่วยที่รอตรวจ</h1>
                            </div>
                            <a href="../products/" class="py-3 small-box-footer"> คลิกดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="shadow small-box bg-danger">
                            <div class="text-center inner">
                                <h1 class="py-3">ผู้ป่วยที่ยกเลิกตรวจ</h1>
                            </div>
                            <a href="../orders/" class="py-3 small-box-footer"> คลิกดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="py-3 bg-white shadow small-box">
                            <div class="inner">
                                <h3>256 Case</h3>
                                <p class="text-danger">ยอดตรวจ PSG เดือนนี้</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="py-3 bg-white shadow small-box">
                            <div class="inner">
                                <h3>75,000 บาท</h3>
                                <p class="text-danger">ยอดขาย CPAP เดือนนี้</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-area"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="py-3 bg-white shadow small-box">
                            <div class="inner">
                                <h3>ยอดนัดเดือนนี้</h3>
                                <p class="text-danger">56 case</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-cart-arrow-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="py-3 bg-white shadow small-box">
                            <div class="inner">
                                <h3>10 case</h3>
                                <p class="text-danger">ผู้ป่วยใหม่เดือนนี้</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shadow card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-xl text-bold" id="salesReport"></span>
                                        <span class="text-danger" id="salesTextReport"></span>
                                    </p>
                                    <p class="flex-row ml-auto" id="salesbtn">
                                        <button class="m-1 ml-auto btn btn-outline-secondary d-block d-md-inline" onclick="selectReport('report-year.php', this, 'bar')">แยกตามบริษัท</button>
                                        <button class="m-1 ml-auto btn btn-secondary d-block d-md-inline" onclick="selectReport('report-month.php', this, 'line')">ยอดขายเดือนนี้</button>
                                        <button class="m-1 ml-auto btn btn-outline-secondary d-block d-md-inline" onclick="selectReport('report-sixmonths.php', this, 'pie')">6 เดือน</button>
                                        <button class="m-1 ml-auto btn btn-outline-secondary d-block d-md-inline" onclick="selectReport('report-twelvemonths.php', this, 'bar')">12 เดือน</button>
                                       
                                    </p>
                                </div>
                                <div class="position-relative">
                                    <canvas id="visitors-chart" height="350"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('../includes/footer.php') ?>
</div>


<!-- SCRIPTS -->
<!-- <script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/adminlte.min.js"></script> -->

<!-- OPTIONAL SCRIPTS ใช้เฉพาะหน้า dashboard-->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<script src="../../plugins/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>
<script src="../../assets/js/pages/dashboard.js"></script>
</body>
</html>
