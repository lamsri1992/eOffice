<?php
include ('../../config/database.php');
include ('../../config/exdate.class.php');
include ('../../api/leave.class.php');

$mysqli = connect();
$leave = new leave();
$id = $_REQUEST['id'];
$data = $leave->getLeaveDetail($id);
$resUnderTaker = $leave->getUndertaker();

?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">ข้อมูลการลา : <?="HR-".$data['leave_id']." , ".$data['emp_name']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="unitHead">
        <div class="modal-body">
            <table class="table table-bordered">
                <tr>
                    <th class="">ตำแหน่ง</th>
                    <td><?=$data['emp_position']?></td>
                </tr>
                <tr>
                    <th class="">แผนก/กลุ่มงาน</th>
                    <td><?=$data['dept_name']?></td>
                </tr>
                <tr>
                    <th class="">วันที่ลา</th>
                    <td><?=DateTimeThai($data['leave_start'])?> - <?=DateTimeThai($data['leave_end'])?></td>
                </tr>
                <tr>
                    <th class="">จำนวนวันที่ลา</th>
                    <td><?=$data['leave_num']?> วัน</td>
                </tr>
                <tr>
                    <th class="">ประเภทลา</th>
                    <td>
                        <?php if($data['leave_type']=='sick'){
                    echo "<span>ลาป่วย</span>";
                    }else if($data['leave_type']=='busy'){
                        echo "<span>ลากิจ</span>";
                    }else if($data['leave_type']=='vacation'){
                        echo "<span>ลาพักผ่อน</span>";
                    }else {
                    echo "<span>ลาคลอดบุตร/ดูแลภรรยา</span>";} ?>
                    </td>
                </tr>
                <tr>
                    <th class="">ผู้รับผิดชอบงานระหว่างลา</th>
                    <td>
                        <?php foreach ($resUnderTaker AS $name){ 
                    if ($data['leave_undertaker']==$name['emp_id']){
                        echo "<span>".$name['emp_name']."</span>";
                        }
                    }?>
                    </td>
                </tr>
                <tr>
                    <th class="">หมายเหตุการลา</th>
                    <td><?=$data['leave_note']?></td>
                </tr>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">ความเห็นจากหัวหน้าฝ่าย</label>
                        <input type="text" name="head_note" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group clearfix text-center">
                <div class="icheck-success d-inline">
                    <input type="radio" name="chk_approve" id="radioSuccess1" value="Y" checked>
                    <label for="radioSuccess1" style="font-size:20px;">อนุมัติ</label>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="icheck-danger d-inline">
                    <input type="radio" name="chk_approve" id="radioSuccess2" value="N">
                    <label for="radioSuccess2" style="font-size:20px;">ไม่อนุมัติ</label>
                </div>
            </div>
        </div>
        <div class=" modal-footer">
            <button type="submit" class="btn btn-success btn-sm" id="btnApprove">
                <i class="fa fa-save"></i> บันทึกรายการ
            </button>
        </div>
    </form>
</div>

<script>
$('#unitHead').on("submit", function(event) {
    event.preventDefault();
    swal({
            title: "บันทึกรายการ",
            text: "รายการขออนุมัติวันลา <?="HR - ".$data['leave_id']." : ".$data['emp_name']?>",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((createCnf) => {
            if (createCnf) {
                $.ajax({
                    url: "pages/unithead/unithead_query.php?id=<?=$data['leave_id']?>",
                    method: "POST",
                    data: $('#unitHead').serialize(),
                    success: function(data) {
                        swal('Success!',
                            'บันทึกรายการแล้ว',
                            'success', {
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                buttons: false,
                                timer: 3000,
                            });
                        window.setTimeout(function() {
                            location.replace('?menu=e-UnitHead')
                        }, 2000);
                    }
                });
            }
        });
});
</script>