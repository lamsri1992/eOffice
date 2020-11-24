<!-- Modal Add New -->
<div class="modal fade" id="addLeavePast" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addLeaveLate">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-history"></i> ลงวันลาย้อนหลัง
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-4 control-label">ผู้ลา</label>
                        <div class="col-md-12">
                            <input id="empuname" name="empuname" type="text" placeholder="กรอกชื่อผู้ลา"
                                class="form-control input-md" required>
                            <input id="empuid" name="empuid" type="hidden">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 control-label">ประเภทการลา</label>
                        <div class="col-md-12">
                            <select name="ltype" class="custom-select" required>
                                <option value="">เลือกประเภทการลา</option>
                                <option value="sick">- ลาป่วย</option>
                                <option value="busy">- ลากิจ</option>
                                <option value="vacation">- ลาพักผ่อน</option>
                                <option value="mate">- ลาคลอดบุตร/ดูแลภรรยา</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 control-label">ระยะเวลา</label>
                        <div class="col-md-12">
                            <select name="ltime" class="custom-select" required>
                                <option value="">เลือกระยะเวลา</option>
                                <option value="full">- เต็มวัน (8.00น. - 16.00น.)</option>
                                <option value="half_m">- ครึ่งเช้า (8:00น. - 12:00น.)</option>
                                <option value="half_a">- ครึ่งบ่าย (12.00น. - 16.00น.)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="dateStr" name="dstart" type="text" class="form-control input-md"
                                placeholder="วันที่ลา" readonly required>
                        </div>
                        <div class="col-md-6">
                            <input id="dateEnd" name="dend" type="text" class="form-control input-md"
                                placeholder="วันที่สิ้นสุด" readonly required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="empuname2" name="empuname2" type="text" placeholder="ผู้รับผิดชอบงานระหว่างลา"
                                class="form-control input-md" required>
                            <input id="empuid2" name="empuid2" type="hidden">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnSave" type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i> บันทึกรายการ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Report -->
<div class="modal fade" id="reportLeave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"><i class="fa fa-print"></i> พิมพ์รายงานวันลา</h5>
            </div>
            <div class="modal-body">
                <ul id="myTab" class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" href="#all" data-toggle="tab">พิมพ์รายงานโดยรวม</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dept" data-toggle="tab">พิมพ์รายงานตามฝ่าย</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#set" data-toggle="tab">พิมพ์รายงานเฉพาะบุคคล</a>
                    </li>
                </ul>
                <br>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active" id="all">
                        <form id="iReport" action="?menu=leaveReport.Job" method="post" target="_blank">
                            <div class="form-group clearfix row">
                                <label class="col-md-12 control-label" for="textinput">เลือกประเภทการลา</label>
                                <div class="col-md-12">
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" id="checkboxSuccess1" name="checkleave[]" value="busy"
                                            checked>
                                        <label for="checkboxSuccess1">ลากิจ</label>
                                    </div>
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" id="checkboxSuccess2" name="checkleave[]" value="sick"
                                            checked>
                                        <label for="checkboxSuccess2">ลาป่วย</label>
                                    </div>
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" id="checkboxSuccess3" name="checkleave[]"
                                            value="vacation" checked>
                                        <label for="checkboxSuccess3">ลาพักผ่อน</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix row">
                                <label class="col-md-12 control-label">เลือกประเภทบุคลากร</label>
                                <div class="col-md-12">
                                    <div class="form-group clearfix">
                                        <?php foreach ($job as $jobs){ ?>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" name="job" id="radioSuccess<?=$jobs['emp_job_id']?>"
                                                value="<?=$jobs['emp_job_id']?>">
                                            <label
                                                for="radioSuccess<?=$jobs['emp_job_id']?>"><?=$jobs['emp_job_name']?></label>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix row">
                                <div class="col-md-6">
                                    <input id="dateStr1" name="dstart" type="text" class="form-control input-md"
                                        placeholder="วันที่ลา" required>
                                </div>
                                <div class="col-md-6">
                                    <input id="dateEnd1" name="dend" type="text" class="form-control input-md"
                                        placeholder="วันที่สิ้นสุด" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-file-export"></i> เขียนรายงาน
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="dept">
                        <form id="iReportDept" action="?menu=leaveReport.Department" method="post" target="_blank">
                            <div class="form-group clearfix row">
                                <label class="col-md-12 control-label" for="textinput">เลือกประเภทการลา</label>
                                <div class="col-md-12">
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" id="checkboxSuccess1" name="checkleave[]" value="busy"
                                            checked>
                                        <label for="checkboxSuccess1">ลากิจ</label>
                                    </div>
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" id="checkboxSuccess2" name="checkleave[]" value="sick"
                                            checked>
                                        <label for="checkboxSuccess2">ลาป่วย</label>
                                    </div>
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" id="checkboxSuccess3" name="checkleave[]"
                                            value="vacation" checked>
                                        <label for="checkboxSuccess3">ลาพักผ่อน</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix row">
                                <label class="col-md-12 control-label">เลือกฝ่าย</label>
                                <div class="col-md-12">
                                    <div class="form-group clearfix">
                                        <select name="dept" class="custom-select" required>
                                            <option value="">เลือกแผนก/กลุ่มงาน</option>
                                            <?php foreach ($dept as $ds){
										echo "<option value='".$ds['dept_id']."'> - ".$ds['dept_name']."</option>";}?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix row">
                                <div class="col-md-6">
                                    <input id="dateStr2" name="dstart" type="text" class="form-control input-md"
                                        placeholder="วันที่ลา" required>
                                </div>
                                <div class="col-md-6">
                                    <input id="dateEnd2" name="dend" type="text" class="form-control input-md"
                                        placeholder="วันที่สิ้นสุด" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-sm btn-sm">
                                    <i class="fa fa-file-export"></i> เขียนรายงาน
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="set">
                        <form id="iReportSet" action="?menu=leaveReport.Person" method="post" target="_blank">
                            <div class="form-group clearfix row">
                                <div class="col-md-12">
                                    <input id="name" name="name" type="text" placeholder="ระบุชื่อเจ้าหน้าที่"
                                        class="form-control input-md">
                                    <input id="id" name="id" type="hidden">
                                </div>
                            </div>
                            <div class="form-group clearfix row">
                                <label class="col-md-12 control-label">เลือกช่วงเวลา</label>
                                <div class="col-md-6">
                                    <input id="dateStr3" name="dstart" type="text" class="form-control input-md"
                                        placeholder="วันที่ลา" required>
                                </div>
                                <div class="col-md-6">
                                    <input id="dateEnd3" name="dend" type="text" class="form-control input-md"
                                        placeholder="วันที่สิ้นสุด" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-file-export"></i> เขียนรายงาน
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal More Leave -->
<div class="modal fade" id="moreLeave" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="font-size:14px;">
        <div id="ajaxLeave">
            <!-- เรียกใช้งานผ่าน ajax -->
        </div>
    </div>
</div>