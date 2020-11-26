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
        <div class="row" style="padding-bottom:1%;">
            <div class="col-md-6"><span class="btn btn-success btn-block">เมนูระบบบันทึกเวลาเข้างาน</span></div>
            <?php if(isset($empSession['privilege_hr'])){ ?>
            <div class="col-md-2">
                <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#rule">
                    ลงบันทึกเวลาพิเศษ
                </button>
            </div>
            <?php } ?>
            <div class="col-md-2">
                <a href="?menu=Worktime-Report" class="btn btn-info btn-block">
                    แสดงรูปแบบตารางเวร
                </a>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark btn-block" data-toggle="modal" data-target="#report">
                    รายงานบันทึกเวลาทำงาน
                </button>
            </div>
        </div>
        <?php include ('pages/worktime/worktime_table.php'); ?>
    </div>
</div>

<!-- Modal Special Add Time -->
<div class="modal fade" id="rule" tabindex="-1" role="dialog" aria-labelledby="ruleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ruleLabel">ลงบันทึกเวลาพิเศษ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addWork">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" id="empname" name="empname" class="form-control"
                            placeholder="กรอกชื่อเจ้าหน้าที่" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="empcode" name="empcode" class="form-control" readonly required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="dateSave" name="dateSave" class="form-control" placeholder="เลือกวันที่"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="note" class="form-control"
                            placeholder="ระบุหมายเหตุ เช่น ไปรีเฟอร์ ไปราชการ ไปออกหน่วย" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnSave" class="btn btn-primary"><i class="fa fa-save"></i>
                        บันทึกเวลา
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Report -->
<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="reportLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportLabel">รายงานบันทึกเวลาทำงาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="filter" action="?menu=Worktime-Summary" method="post">
                <div class="modal-body">
                    <h5><i class="fa fa-search"></i> Filter Report</h5>
                    <div class="form-row">
                        <div class="col-md-3">
                            <label>เลือกเดือน</label>
                            <select name="wmonth" class="custom-select" required>
                                <option value="" selected>เลือกเดือน</option>
                                <option value="01">- มกราคม</option>
                                <option value="02">- กุมภาพันธ์</option>
                                <option value="03">- มีนาคม</option>
                                <option value="04">- เมษายน</option>
                                <option value="05">- พฤษภาคม</option>
                                <option value="06">- มิถุนายน</option>
                                <option value="07">- กรกฏาคม</option>
                                <option value="08">- สิงหาคม</option>
                                <option value="09">- กันยายน</option>
                                <option value="10">- ตุลาคม</option>
                                <option value="11">- พฤศจิกายน</option>
                                <option value="12">- ธันวาคม</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>เลือกฝ่าย/กลุ่มงาน</label>
                            <select name="wdept" class="custom-select" required>
                                <option value="0" selected>เลือกทั้งหมด</option>
                                <?php foreach ($fetchDept as $ds){ echo "<option value='".$ds['dept_id']."'> - ".$ds['dept_name']."</option>";} ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>เลือกประเภทบุคลากร</label>
                            <select name="wtype" class="custom-select" required>
                                <option value="0" selected>เลือกทั้งหมด</option>
                                <?php foreach ($fetchJob as $js){ echo "<option value='".$js['emp_job_id']."'> - ".$js['emp_job_name']."</option>";} ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label></label>
                            <button type="submit" class="btn btn-block btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // datePicker
    $(function () {
        $.datetimepicker.setLocale('th');
        $("#dateSave").datetimepicker({
            format: 'Y/m/d H:i',
            allowTimes: [
                '08:45', '13:00', '16:45', '23:45'
            ],
            timepicker: true,
            lang: 'th',
        });
    });

    // autocomplete
    function make_autocom(autoObj, showObj) {
        var mkAutoObj = autoObj;
        var mkSerValObj = showObj;
        new Autocomplete(mkAutoObj, function () {
            this.setValue = function (id) {
                document.getElementById(mkSerValObj).value = id;
            }
            if (this.isModified)
                this.setValue("");
            if (this.value.length < 1 && this.isNotClick)
                return;
            return "api/json_employee_code.php?q=" + encodeURIComponent(this.value);
        });
    }
    make_autocom("empname", "empcode");

    // sweetalert + confirm add data
    $('#addWork').on("submit", function (event) {
        event.preventDefault();
        swal({
                title: "ยืนยันการบันทึกเวลาเข้างาน ?",
                icon: "warning",
                dangerMode: true,
                buttons: true,
            })
            .then((createCnf) => {
                if (createCnf) {
                    document.getElementById("btnSave").disabled = true;
                    $.ajax({
                        url: "pages/worktime/worktime_query.php",
                        method: "POST",
                        data: $('#addWork').serialize(),
                        success: function (data) {
                            swal('Success!',
                                'บันทึกเวลาเข้างานสำเร็จ',
                                'success', {
                                    closeOnClickOutside: false,
                                    closeOnEsc: false,
                                    buttons: false,
                                    timer: 3000,
                                });
                            window.setTimeout(function () {
                                location.replace('?menu=e-Worktime')
                            }, 1500);
                        }
                    });
                }
            });
    });
</script>