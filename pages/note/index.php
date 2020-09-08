<?php $fetchNote = $note->getNote(); $emp = $note->getListEmployee(); $empname = $leave->getUndertaker(); ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title ">ระบบบันทึกข้อความอัจฉริยะ</h5>
                <span class="card-title ">โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php include ('components/breadcrumb.php'); ?>
        <div class="text-right">
            <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addNewNote">
                <i class="fa fa-plus-circle"></i> สร้างบันทึกข้อความใหม่
            </button>
        </div>
        <?php include ('note_table.php'); ?>
    </div>
</div>
<?php include ('note_modal.php'); ?>
<?php include ('note_script.php'); ?>