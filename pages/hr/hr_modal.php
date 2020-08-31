<!-- Modal Add New -->
<div class="modal fade" id="addNewEmp" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form id="frmAdd" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-plus"></i> เพิ่มข้อมูลบุคลากร
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-4 control-label">ชื่อ-สกุล</label>
                        <div class="col-md-12">
                            <input id="empname" name="empname" type="text" placeholder="ระบุชื่อ-สกุล ไม่ต้องมีคำนำหน้า"
                                class="form-control input-md" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">แผนก/กลุ่มงาน</label>
                        <div class="col-md-12">
                            <select name="dept" class="form-control input-md" required>
                                <option value="">เลือกแผนก/กลุ่มงาน</option>
                                <?php
									foreach ($fetchDept as $ds){
										echo "<option value='".$ds['dept_id']."'> - ".$ds['dept_name']."</option>";}
								    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">ประเภทบุคลากร</label>
                        <div class="col-md-12">
                            <select name="empjob" class="form-control input-md" required>
                                <option value="">เลือกประเภท</option>
                                <?php
									foreach ($fetchJob as $js){
										echo "<option value='".$js['emp_job_id']."'> - ".$js['emp_job_name']."</option>";}
								    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">ตำแหน่ง</label>
                        <div class="col-md-12">
                            <input id="emppos" name="emppos" type="text" placeholder="ระบุตำแหน่ง"
                                class="form-control input-md" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="dateSelect" name="empstart" type="text" class="form-control input-md"
                                placeholder="ระบุวันที่เริ่มงาน" readonly required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">ID-Card</label>
                        <div class="col-md-12">
                            <input id="empid" name="empid" type="text"
                                placeholder="ex. D001-H001 (ถ้าไม่ทราบให้เว้นว่างไว้)" class="form-control input-md">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>
                        เพิ่มข้อมูลบุคลากร
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Click -->
<div class="modal fade" id="empDetail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="font-size:14px;">
        <div id="ajaxEdit">
            <!-- เรียกใช้งานผ่าน ajax hr_modal_list -->
        </div>
    </div>
</div>