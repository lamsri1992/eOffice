<!-- Modal Add New -->
<div class="modal fade" id="addNewForm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form id="frmAdd" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-file-medical"></i> เพิ่มแบบฟอร์มใหม่</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input name="formnum" type="text" placeholder="ระบุรหัสแบบฟอร์ม"
                                class="form-control input-md" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input name="formname" type="text" placeholder="ระบุชื่อแบบฟอร์ม"
                                class="form-control input-md" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">ฝ่ายงาน</label>
                        <div class="col-md-12">
                            <select name="formwork" class="form-control input-md" required>
                                <option value="">เลือกฝ่ายงาน</option>
                                <option value="งานการเงิน">- งานการเงิน</option>
                                <option value="งานบัญชี">- งานบัญชี</option>
                                <option value="งานพัสดุ">- งานพัสดุ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">ไฟล์แบบฟอร์ม</label>
                        <div class="col-md-12">
                            <input type="file" id="formfile" name="formfile" class="form-control-file">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label">ผู้อัพโหลดแบบฟอร์ม</label>
                            <table class="table table-bordered text-center" style="font-size:12px;">
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
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>
                        Add New
                    </button>
                    <input type="hidden" name="empid" value="<?=$_SESSION['employee']?>">
                </div>
            </div>
        </form>
    </div>
</div>