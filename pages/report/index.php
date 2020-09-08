<?php $fetchReport = $helpdesk->getReport();?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title ">ระบบขอจัดทำรายงานข้อมูล</h5>
                <span class="card-title ">โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php include ('components/breadcrumb.php'); ?>
        <div class="text-right">
            <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addNewReport">
                <i class="fa fa-plus-circle"></i> ขอจัดทำรายงาน
            </button>
        </div>
        <?php include ('report_table.php'); ?>
    </div>
</div>
<?php include ('report_modal.php'); ?>
<?php //include ('report_script.php'); ?>