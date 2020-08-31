<?php $data = $leave->getLeaveList(); $unithead = $leave->getUndertaker(); $job = $hr->getJob(); $dept = $hr->getDepartment(); ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title "><i class="fa fa-user-cog"></i> โหมดผู้ดูแลระบบ -> ระบบวันลาออนไลน์</h5>
                <span class="card-title ">โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php include ('leave.admin_table.php'); ?>
    </div>
</div>
<?php include ('leave.admin_modal.php'); ?>
<?php include ('leave.admin_script.php'); ?>