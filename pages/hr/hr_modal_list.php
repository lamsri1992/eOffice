<?php
include ('../../config/database.php');
include ('../../config/exdate.class.php');
include ('../../api/hr.class.php');

$id = $_REQUEST['id'];
$mysqli = connect();
$hr = new hr();
$data = $hr->editEmployee($id);
$dep = $hr->getDepartment();
$job = $hr->getJob();
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
                                        <a class="nav-link" href="#messages" data-toggle="tab">
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
                                        <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-save"></i>
                                            บันทึกการแก้ไข
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="messages">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            checked>
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Flooded: One year later, assessing what was lost and what was found when
                                                a ravaging rain swept through metro Detroit
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="settings">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            checked>
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Flooded: One year later, assessing what was lost and what was found when
                                                a ravaging rain swept through metro Detroit
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            checked>
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
</script>