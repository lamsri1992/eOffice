<!-- Modal -->
<div class="modal fade" id="addNewReport" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-plus-circle"></i> ขอจัดทำรายงานข้อมูล
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
                        <input name="deptid" type="hidden" value="<?=$empSession['dept_id']?>">
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSave" class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> บันทึกการขอจัดทำรายงาน
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Click -->
<div class="modal fade" id="listDetail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="font-size:14px;">
        <div id="ajaxEdit">
            <!-- เรียกใช้งานผ่าน ajax hr_modal_list -->
        </div>
    </div>
</div>