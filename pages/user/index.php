<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title "><i class="far fa-address-card"></i>
                    ข้อมูลส่วนตัว
                </h5>
                <span class="card-title "> ยินดีต้อนรับ,
                    คุณ<?=$empSession['emp_name']." | ".$empSession['emp_barcode']?>
                </span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php include ('components/breadcrumb.php'); ?>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="bmd-label-floating">ชื่อ-นามสกุล</label>
                    <input type="text" class="form-control" style="color:blue;" value="<?=$empSession['emp_name']?>"
                        disabled>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="bmd-label-floating">ตำแหน่ง</label>
                    <input type="text" class="form-control" style="color:blue;" value="<?=$empSession['emp_position']?>"
                        disabled>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="bmd-label-floating">ฝ่าย</label>
                    <input type="text" class="form-control" style="color:blue;" value="<?=$empSession['dept_name']?>"
                        disabled>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="bmd-label-floating">ประเภทบุคลากร</label>
                    <input type="text" class="form-control" style="color:blue;" value="<?=$empSession['emp_job_name']?>"
                        disabled>
                </div>
            </div>
        </div>
        <form id="updateProfile">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">เบอร์โทรศัพท์</label>
                        <input type="text" name="emptel" class="form-control" value="<?=$empSession['emp_per_tel']?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">ผู้ติดต่อยามฉุกเฉิน</label>
                        <input type="text" name="relation" class="form-control"
                            value="<?=$empSession['emp_per_cperson']?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">เบอร์โทร (ผู้ติดต่อยามฉุกเฉิน)</label>
                        <input type="text" name="relation_tel" class="form-control"
                            value="<?=$empSession['emp_per_cperson_tel']?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">ที่อยู่</label>
                        <input type="text" name="address" class="form-control"
                            value="<?=$empSession['emp_per_address']?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">ที่อยู่ (ผู้ติดต่อยามฉุกเฉิน)</label>
                        <input type="text" name="relation_address" class="form-control"
                            value="<?=$empSession['emp_per_cperson_address']?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึกข้อมูลส่วนตัว</button>
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#changePassword">
                <i class="fa fa-user-lock"></i> เปลี่ยนรหัสผ่าน
            </button>
        </form>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-user-lock"></i> เปลี่ยนรหัสผ่าน <?=$_SESSION['employee']?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="changePassWordForm">
                <div class="modal-body">
                    <div class="form-group">
                        <span>รหัสผ่านใหม่</span>
                        <input type="password" id="ishowPass1" name="newPass" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <span>ยืนยันรหัสผ่านใหม่</span>
                        <input type="password" id="ishowPass2" name="RePass" class="form-control" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="checkbox" onclick="showPass()"> <span>แสดงรหัสผ่าน</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnChPass" class="btn btn-primary btn-block">
                            <i class="fa fa-save"></i> เปลี่ยนรหัสผ่าน
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ('user_script.php'); ?>