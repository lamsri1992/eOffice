<?php $atime = $worktime->getAccessTimeAll(); $fetchDept = $hr->getDepartment(); $fetchJob = $hr->getJob();?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title ">ระบบบันทึกเวลาเข้างาน</h5>
                <span class="card-title ">โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php include ('components/breadcrumb.php'); ?>
        <?php include ('pages/worktime/worktime_form.php'); ?>
        <?php include ('pages/worktime/worktime_table.php'); ?>
    </div>
</div>

<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>