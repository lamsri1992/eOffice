<!-- Modal -->
<div class="modal fade" id="addNewNote" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-plus-circle"></i> แบบฟอร์มขออนุมัติเดินทางไปราชการ
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addNew">
                <div class="modal-body">
                    <div class="form-group">
                        <table class="table table-bordered text-center" style="font-size:13px;">
                            <span style="font-size:14px;">ผู้ทำรายการ</span>
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
                    <div class="form-group">
                        <span style="font-size:14px;">ระบุสถานที่</span>
                        <input type="text" name="place" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <span style="font-size:14px;">ระบุชื่อเรื่อง</span>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="dateStr" name="dstart" type="text" class="form-control input-md"
                                placeholder="วันที่ไป" readonly required>
                        </div>
                        <div class="col-md-6">
                            <input id="dateEnd" name="dend" type="text" class="form-control input-md"
                                placeholder="วันที่กลับ" readonly required>
                        </div>
                    </div>
                    <div class="form-group" style="font-size:14px;">
                        <span>รายชื่อผู้เข้าร่วม</span>
                        <select id="list" name="list[]" class="form-control" multiple="multiple" style="width:100%;">
                            <?php foreach ($emp as $es){ ?>
                            <option value="<?=$es['emp_id']?>"><?=$es['emp_id']." : ".$es['emp_name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSave" class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> บันทึกรายการ
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>