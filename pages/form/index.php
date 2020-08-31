<?php $fetchForm = $form->getForm(); ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title">ดาวน์โหลดแบบฟอร์ม</h5>
                <span class="card-title">โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <!-- <div class="text-right">
            <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addNewForm">
                <i class="fa fa-file-import"></i> เพิ่มแบบฟอร์ม
            </button>
        </div> -->
        <?php include ('form_table.php'); ?>
    </div>
</div>
<?php include ('form_modal.php'); ?>