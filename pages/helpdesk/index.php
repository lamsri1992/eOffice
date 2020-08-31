<?php $fetchList = $helpdesk->getList();?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title ">ระบบแจ้งซ่อมคอมพิวเตอร์</h5>
                <span class="card-title ">โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="text-right">
            <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addNewFix">
                <i class="fa fa-plus-circle"></i> เปิดรายการแจ้งซ่อม
            </button>
        </div>
        <?php include ('helpdesk_table.php'); ?>
    </div>
</div>
<?php include ('helpdesk_modal.php'); ?>
<?php include ('helpdesk_script.php'); ?>