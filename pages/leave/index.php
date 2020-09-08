<?php $countLeave = $leave->leaveCount($_SESSION['employee']); $resHistory = $leave->leaveHistory($_SESSION['employee']); $resUnderTaker = $leave->getUndertaker(); ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title ">ระบบวันลาออนไลน์</h5>
                <span class="card-title ">โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php include ('components/breadcrumb.php'); ?>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-business-time"></i>
                        </div>
                        <p class="card-category">จำนวนวันลากิจ</p>
                        <h3 class="card-title">
                            <?=$countLeave['busy']==''?'0':$countLeave['busy']."/".$empSession['emp_leave_busy']?>
                            <small>วัน</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> การลากิจควรทำรายการล่วงหน้าอย่างน้อย 3 วันทำการ
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-user-injured"></i>
                        </div>
                        <p class="card-category">จำนวนวันลาป่วย</p>
                        <h3 class="card-title">
                            <?=$countLeave['sick']==''?'0':$countLeave['sick']."/".$empSession['emp_leave_sick']?>
                            <small>วัน</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> การลาป่วยให้แจ้งในกลุ่ม Watchan Family ทุกครั้ง
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-map-marked"></i>
                        </div>
                        <p class="card-category">จำนวนวันลาพักผ่อน</p>
                        <h3 class="card-title">
                            <?=$countLeave['vacation']==''?'0':$countLeave['vacation']."/".$empSession['emp_leave_vacation']?>
                            <small>วัน</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> การลาพักผ่อนควรทำรายการล่วงหน้าอย่างน้อย 7 วันทำการ
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php include ('leave_table.php'); ?>
    </div>
</div>
<?php include ('leave_modal.php'); ?>
<?php include ('leave_script.php'); ?>