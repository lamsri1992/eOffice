<?php
session_start();
include ('../../config/database.php');
include ('../../config/exdate.class.php');
include ('../../api/helpdesk.class.php');
include ('../../api/hr.class.php');
include ('../../api/user.class.php');
include ('../../api/leave.class.php');


$id = $_REQUEST['id'];
$mysqli = connect();
$user = new user();
$hr = new hr();
$helpdesk = new Helpdesk();
$leave = new leave();
$data = $helpdesk->getListEdit($id);
$dep = $hr->getDepartment();
$job = $hr->getJob();
$empSession = $user->getUser($_SESSION['employee']);
$resUnderTaker = $leave->getUndertaker();
$type = $helpdesk->getHelpType();
?>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id=""><i class="fa fa-wrench"></i>
            รหัสแจ้งซ่อม : <?=$data['help_id'];?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="table-responsive">
        <form id="frmEdit" class="form-horizontal">
            <div class="modal-body">
                <div class="form-group">
                    <table class="table table-bordered text-center">
                        <tr>
                            <th width="20%">ผู้แจ้ง</th>
                            <td><?=$data['emp_name']?></td>
                        </tr>
                        <tr>
                            <th>อาการ/ปัญหาที่พบ</th>
                            <td><?=$data['help_title']?></td>
                        </tr>
                        <tr>
                            <th>ฝ่าย/กลุ่มงาน</th>
                            <td><?=$data['dept_name']?></td>
                        </tr>
                        <tr>
                            <th>วันที่แจ้ง</th>
                            <td><?=DateTimeThai($data['help_date'])?></td>
                        </tr>
                    </table>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 control-label">วิธีแก้ไข</label>
                    <div class="col-md-12">
                        <input name="support" type="hidden" value="<?=$_SESSION['employee']?>">
                        <input type="text" name="cause" class="form-control" value="<?=$data['help_cause']?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 control-label">สาเหตุ</label>
                    <div class="col-md-12">
                        <input type="text" name="fix" class="form-control" value="<?=$data['help_fix']?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-12 control-label">สถานะการซ่อม</label>
                    <div class="col-md-12">
                        <select name="status" class="custom-select" required>
                            <option value="">เลือกสถานะการซ่อม</option>
                            <option value="success" <?php if ($data['help_status']=="success"){ echo 'SELECTED'; } ?>>-
                                สำเร็จ
                            </option>
                            <option value="repair" <?php if ($data['help_status']=="repair"){ echo 'SELECTED'; } ?>>-
                                ส่งซ่อม
                            </option>
                            <option value="spares" <?php if ($data['help_status']=="spares"){ echo 'SELECTED'; } ?>>-
                                รออะไหล่
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-12 control-label">ประเภทการซ่อม</label>
                    <div class="col-md-12">
                        <select name="type" class="custom-select" required>
                            <option value="">เลือกประเภทการซ่อม</option>
                            <?php foreach ($type AS $ts){ ?>
                            <option value="<?=$ts['helpdesk_type_id']?>"
                                <?php if ($data['help_type']==$ts['helpdesk_type_id']){ echo 'SELECTED'; } ?>>
                                - <?=$ts['helpdesk_type_name']?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <table class="table table-bordered text-center">
                        <tr>
                            <th width="20%">ผู้ดำเนินการ</th>
                            <td>
                                <?php 
                            foreach ($resUnderTaker AS $name){ 
                                if ($data['help_support']==$name['emp_id']){ echo "<span>".$name['emp_name']."</span>"; } 
                            } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>วันที่ดำเนินการ</th>
                            <td><?=DateTimeThai($data['help_end'])?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <?php if($data['help_status']=='success' && isset($data['help_type'])){$btn="hidden";}else{$btn="";} ?>
                    <button type="submit" id="btnSave" class="btn btn-success btn-sm" <?=$btn?>>
                        <i class="fa fa-save"></i> บันทึกการแจ้งซ่อม
                    </button>
                </div>
            </div>
        </form>
        <?php if($data['help_rate']=='' && $data['help_status']=='success' && $data['help_create']==$_SESSION['employee']){$rate="";}else{$rate="hidden";} ?>
        <form id="frmRate" class="form-horizontal" <?=$rate?>>
            <div class="modal-header">
                <h5 class="modal-title" id=""><i class="fas fa-clipboard-list"></i>
                    แบบประเมิณการรับบริการ
                </h5>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-bordered">
                    <tr class="text-center">
                        <th width="75%">รายการ / คะแนน</th>
                        <th width="5%">5</th>
                        <th width="5%">4</th>
                        <th width="5%">3</th>
                        <th width="5%">2</th>
                        <th width="5%">1</th>
                    </tr>
                    <tr>
                        <td>1. ความรวดเร็วในการให้บริการ</td>
                        <td class="text-center"><input type="radio" id="rate_1" name="rate_1" value="5"></td>
                        <td class="text-center"><input type="radio" id="rate_1" name="rate_1" value="4"></td>
                        <td class="text-center"><input type="radio" id="rate_1" name="rate_1" value="3"></td>
                        <td class="text-center"><input type="radio" id="rate_1" name="rate_1" value="2"></td>
                        <td class="text-center"><input type="radio" id="rate_1" name="rate_1" value="1"></td>
                    </tr>
                    <tr>
                        <td>2. การจัดลำดับขั้นตอนการให้บริการ</td>
                        <td class="text-center"><input type="radio" id="rate_2" name="rate_2" value="5"></td>
                        <td class="text-center"><input type="radio" id="rate_2" name="rate_2" value="4"></td>
                        <td class="text-center"><input type="radio" id="rate_2" name="rate_2" value="3"></td>
                        <td class="text-center"><input type="radio" id="rate_2" name="rate_2" value="2"></td>
                        <td class="text-center"><input type="radio" id="rate_2" name="rate_2" value="1"></td>
                    </tr>
                    <tr>
                        <td>3. ความเต็มใจและความพร้อมในการให้บริการ</td>
                        <td class="text-center"><input type="radio" id="rate_3" name="rate_3" value="5"></td>
                        <td class="text-center"><input type="radio" id="rate_3" name="rate_3" value="4"></td>
                        <td class="text-center"><input type="radio" id="rate_3" name="rate_3" value="3"></td>
                        <td class="text-center"><input type="radio" id="rate_3" name="rate_3" value="2"></td>
                        <td class="text-center"><input type="radio" id="rate_3" name="rate_3" value="1"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnRate" class="btn btn-success btn-sm">
                    <i class="fa fa-smile"></i> บันทึกการประเมิณ
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Fix List
    $('#frmEdit').on("submit", function (event) {
        event.preventDefault();
        swal({
                title: "บันทึกรายการซ่อม ?",
                text: "ยืนยันบันทึกรายการซ่อม <?="IT - ".$data['help_id']?>",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((createCnf) => {
                if (createCnf) {
                    $.ajax({
                        url: "pages/helpdesk/helpdesk_query.php?op=update&id=<?=$data['help_id']?>",
                        method: "POST",
                        data: $('#frmEdit').serialize(),
                        success: function (data) {
                            swal('Success!',
                                'บันทึกข้อมูลแล้ว',
                                'success', {
                                    closeOnClickOutside: false,
                                    closeOnEsc: false,
                                    buttons: false,
                                    timer: 3000,
                                });
                            window.setTimeout(function () {
                                location.replace('?menu=e-Helpdesk')
                            }, 2000);
                        }
                    });
                }
            });
    });
    // Rate List
    $('#frmRate').on("submit", function (event) {
        event.preventDefault();
        swal({
                title: "บันทึกการประเมิณ ?",
                text: "ยืนยันบันทึกการประเมิณ <?="IT - ".$data['help_id']?>",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((createCnf) => {
                if (createCnf) {
                    $.ajax({
                        url: "pages/helpdesk/helpdesk_query.php?op=rate&id=<?=$data['help_id']?>",
                        method: "POST",
                        data: $('#frmRate').serialize(),
                        success: function (data) {
                            swal('Success!',
                                'บันทึกข้อมูลแล้ว',
                                'success', {
                                    closeOnClickOutside: false,
                                    closeOnEsc: false,
                                    buttons: false,
                                    timer: 3000,
                                });
                            window.setTimeout(function () {
                                location.replace('?menu=e-Helpdesk')
                            }, 2000);
                        }
                    });
                }
            });
    });
</script>