<?php
include ('../../config/database.php');
include ('../../config/exdate.class.php');
include ('../../api/hr.class.php');
include ('../../api/leave.class.php');

$id = $_REQUEST['id'];
$mysqli = connect();
$hr = new hr();
$leaves = new leave();
$data = $hr->editEmployee($id);
$dep = $hr->getDepartment();
$job = $hr->getJob();
$leave = $hr->getEmployeeLeave($id);
$resCount = $leaves->leaveCount($id);
?>
<div class="modal-content">
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">
                                    <i class="fa fa-user-circle"></i> ข้อมูล : <?=$data['emp_name'];?>
                                </span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#profile" data-toggle="tab">
                                            <i class="material-icons">account_box</i> ข้อมูลพื้นฐาน
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#leave" data-toggle="tab">
                                            <i class="material-icons">calendar_today</i> ข้อมูลวันลา
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#settings" data-toggle="tab">
                                            <i class="material-icons">more</i> ข้อมูลอื่น ๆ
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <form id="frmEdit" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">ชื่อ-สกุล</label>
                                        <div class="col-md-12">
                                            <input id="empname" name="empname" type="text"
                                                placeholder="ระบุชื่อ-สกุล ไม่ต้องมีคำนำหน้า"
                                                class="form-control input-md" value="<?=$data['emp_name']?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">แผนก/กลุ่มงาน</label>
                                        <div class="col-md-12">
                                            <select name="dept" class="form-control input-md" required>
                                                <option value="">เลือกแผนก/กลุ่มงาน</option>
                                                <?php foreach ($dep AS $ds){ ?>
                                                <option value="<?=$ds['dept_id']?>" <?php
                                                    if ($data['emp_dept']==$ds['dept_id']){ echo 'SELECTED'; } ?>>
                                                    - <?=$ds['dept_name']?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">ประเภทบุคลากร</label>
                                        <div class="col-md-12">
                                            <select name="empjob" class="form-control input-md" required>
                                                <option value="">เลือกประเภท</option>
                                                <?php foreach ($job AS $js){ ?>
                                                <option value="<?=$js['emp_job_id']?>" <?php
                                                    if ($data['emp_job']==$js['emp_job_id']){ echo 'SELECTED'; } ?>>
                                                    - <?=$js['emp_job_name']?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">ตำแหน่ง</label>
                                        <div class="col-md-12">
                                            <input id="emppos" name="emppos" type="text" placeholder="ระบุตำแหน่ง"
                                                class="form-control input-md" value="<?=$data['emp_position']?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">วันที่เริ่มงาน</label>
                                        <div class="col-md-12">
                                            <input id="empstart" name="empstart" type="date"
                                                class="form-control input-md" value="<?=$data['emp_workstart']?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <?php if($data['emp_barcode']!=''){$vis="readonly";} ?>
                                            <input id="empid" name="empid" type="text" placeholder="รหัสบัตรเจ้าหน้าที่"
                                                class="form-control input-md" value="<?=$data['emp_barcode']?>"
                                                <?=@$vis?> required>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>
                                            บันทึกการแก้ไข
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="leave">
                                <?php if(!isset($leave)){
                                    echo "
                                    <span class='badge badge-pill badge-danger'><i class='fa fa-exclamation-circle'></i> ยังไม่มีข้อมูลวันลา กรุณาบันทึกวันลา</span>
                                    <form id='leaveAdd'>
                                        <table class='table table-bordered table-striped table-sm text-center'>
                                            <tr>
                                                <th>ลาป่วย</th>
                                                <th>ลากิจ</th>
                                                <th>ลาพักผ่อน</th>
                                                <th>ลาคลอดบุตร/ดูแลภรรยา</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name='sick' type='text' class='form-control input-md text-center' required>
                                                </td>
                                                <td>
                                                    <input name='busy' type='text' class='form-control input-md text-center' required>
                                                </td>
                                                <td>
                                                    <input name='vacation' type='text' class='form-control input-md text-center' required>
                                                </td>
                                                <td>
                                                    <input name='mate' type='text' class='form-control input-md text-center' required>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class='text-right'>
                                            <button type='submit' class='btn btn-info'><i class='fa fa-save'></i>
                                                บันทึกการแก้ไข
                                            </button>
                                        </div>
                                    </form>";
                                }else{
                                    echo "
                                    <h5>สิทธิ์วันลา</h5>
                                    <form id='leaveEdit'>
                                        <table class='table table-bordered table-striped table-sm text-center'>
                                            <tr>
                                                <th>ลาป่วย</th>
                                                <th>ลากิจ</th>
                                                <th>ลาพักผ่อน</th>
                                                <th>ลาคลอดบุตร/ดูแลภรรยา</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name='sick' type='text' class='form-control input-md text-center'
                                                        value='".$leave['emp_leave_sick']."'>
                                                </td>
                                                <td>
                                                    <input name='busy' type='text' class='form-control input-md text-center'
                                                        value='".$leave['emp_leave_busy']."'>
                                                </td>
                                                <td>
                                                    <input name='vacation' type='text' class='form-control input-md text-center'
                                                        value='".$leave['emp_leave_vacation']."'>
                                                </td>
                                                <td>
                                                    <input name='mate' type='text' class='form-control input-md text-center'
                                                        value='".$leave['emp_leave_mate']."'>
                                                </td>
                                            </tr>
                                        </table>
                                        <h5>สถิติการลา</h5>
                                        <table class='table table-bordered table-striped table-sm text-center nowrap'>
                                            <tr>
                                                <th width='25%'>ลาป่วย</th>
                                                <th width='25%'>ลากิจ</th>
                                                <th width='25%'>ลาพักผ่อน</th>
                                                <th width='25%'>ลาคลอดบุตร/ดูแลภรรยา</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span style='color:red;'>
                                                        ".$resCount['sick']."
                                                    </span>
                                                </td>
                                                <td>
                                                    <span style='color:red;'>
                                                        ".$resCount['busy']."
                                                    </span>
                                                </td>
                                                <td>
                                                    <span style='color:red;'>
                                                        ".$resCount['vacation']."
                                                    </span>
                                                </td>
                                                <td>
                                                    <span style='color:red;'>
                                                        ".$resCount['mate']."
                                                    </span>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class='text-right'>
                                            <button type='submit' class='btn btn-info'><i class='fa fa-save'></i>
                                                บันทึกการแก้ไข
                                            </button>
                                        </div>
                                    </form>";
                                } 
                                ?>
                            </div>
                            <div class="tab-pane" id="settings">
                                <span class="badge badge-dark"><i class="fa fa-code"></i> Developing...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Edit Employee Data
$('#frmEdit').on("submit", function(event) {
    event.preventDefault();
    swal({
            title: "แก้ไขข้อมูล ?",
            text: "ยืนยันแก้ไขข้อมูลของ <?=$data['emp_name']?>",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((createCnf) => {
            if (createCnf) {
                $.ajax({
                    url: "pages/hr/hr_query.php?op=edit&id=<?=$data['emp_id']?>",
                    method: "POST",
                    data: $('#frmEdit').serialize(),
                    success: function(data) {
                        swal('Success!',
                            'แก้ไขข้อมูลแล้ว',
                            'success', {
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                buttons: false,
                                timer: 3000,
                            });
                        window.setTimeout(function() {
                            location.replace('?menu=e-Employee')
                        }, 2000);
                    }
                });
            }
        });
});

// Add Employee Leave
$('#leaveAdd').on("submit", function(event) {
    event.preventDefault();
    swal({
            title: "เพิ่มข้อมูลวันลา ?",
            text: "ยืนยันเพิ่มข้อมูลวันลาของ <?=$data['emp_barcode'].": ".$data['emp_name']?>",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((createCnf) => {
            if (createCnf) {
                $.ajax({
                    url: "pages/hr/hr_query.php?op=addLeave&id=<?=$data['emp_id']?>",
                    method: "POST",
                    data: $('#leaveAdd').serialize(),
                    success: function(data) {
                        swal('Success!',
                            'เพิ่มข้อมูลวันลาแล้ว',
                            'success', {
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                buttons: false,
                                timer: 3000,
                            });
                        window.setTimeout(function() {
                            location.replace('?menu=e-Employee')
                        }, 2000);
                    }
                });
            }
        });
});

// Edit Employee Leave
$('#leaveEdit').on("submit", function(event) {
    event.preventDefault();
    swal({
            title: "แก้ไขข้อมูลวันลา ?",
            text: "ยืนยันแก้ไขข้อมูลวันลาของ <?=$data['emp_barcode'].": ".$data['emp_name']?>",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((createCnf) => {
            if (createCnf) {
                $.ajax({
                    url: "pages/hr/hr_query.php?op=editLeave&id=<?=$data['emp_id']?>",
                    method: "POST",
                    data: $('#leaveEdit').serialize(),
                    success: function(data) {
                        swal('Success!',
                            'แก้ไขข้อมูลวันลาแล้ว',
                            'success', {
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                buttons: false,
                                timer: 3000,
                            });
                        window.setTimeout(function() {
                            location.replace('?menu=e-Employee')
                        }, 2000);
                    }
                });
            }
        });
});
</script>