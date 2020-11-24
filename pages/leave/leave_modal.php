<!-- Modal Add New -->
<div class="modal fade" id="addNew" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-edit"></i> ขออนุมัติวันลา
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addLeave">
                <div class="modal-body">
                    <div class="form-group">
                        <table class="table table-bordered" style="font-size:14px;">
                            <tr>
                                <td>
                                    <b>ชื่อ-สกุล :</b>
                                    <?=$empSession['emp_name']?>
                                </td>
                                <td>
                                    <b>แผนก/กลุ่มงาน :</b>
                                    <?=$empSession['dept_name']?>
                                </td>
                                <td>
                                    <b>ตำแหน่ง :</b>
                                    <?=$empSession['emp_position']?>
                                </td>
                            </tr>
                        </table>
                        <input name="empid" type="hidden" value="<?=$_SESSION['employee']?>">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 control-label">ประเภทการลา</label>
                        <div class="col-md-12">
                            <select name="ltype" class="custom-select" required>
                                <option value="">เลือกประเภทการลา</option>
                                <option value="sick">- ลาป่วย</option>
                                <option value="busy">- ลากิจ</option>
                                <option value="vacation">- ลาพักผ่อน</option>
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
                        <label class="col-md-4 control-label">หมายเหตุ</label>
                        <div class="col-md-12">
                            <textarea name="empnote" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 control-label">ผู้รับผิดชอบงานระหว่างลา</label>
                        <div class="col-md-12">
                            <select class="js-single" name="empuid">
                                <option>-- เลือกผู้รับผิดชอบงานแทน --</option>
                                <?php foreach ($resUnderTaker as $rn){
                                    echo "<option value='".$rn['emp_id']."'>".$rn['emp_id']." :: ".$rn['emp_name']."</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnSave" type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i>
                        บันทึกรายการ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>