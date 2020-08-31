<?php
include ('../../../config/database.php');
include ('../../../config/exdate.class.php');
include ('../../../api/leave.class.php');

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
            <tr>
                <th class="">ความเห็นจากหัวหน้าฝ่าย</th>
                <td><?=$data['leave_hnote']?></td>
            </tr>
            <tr>
                <th class="">ความเห็นจากผู้อำนวยการ</th>
                <td><?=$data['leave_dnote']?></td>
            </tr>
            <tr>
                <th class="">สถานะ</th>
                <td>
                    <?php 
                    if($data['leave_status']==''){
                        echo "<span class='badge badge-danger'><i class='fa fa-clock'></i> รอหัวหน้าดำเนินการ</span>";
                    }else if($data['leave_status']=='header'){
                        echo "<span class='badge badge-info'><i class='fa fa-clock'></i> รอผู้อำนวยการอนุมัติ</span>";
                    }else if($data['leave_status']=='approve'){
                        echo "<span class='badge badge-success'><i class='fa fa-check'></i> อนุมัติแล้ว</span>";
                    }else{ echo "<span class='badge badge-danger'><i class='fa fa-ban'></i> ยกเลิกรายการ</span>"; } ?>
                </td>
            </tr>
        </table>
        <div class="text-center">
            <small style="color:red;">
                * วันลาที่ถูกอนุมัติแล้ว ไม่สามารถยกเลิกได้ กรุณาบันทึกหมายเลขรหัสวันลาและสรุปส่งให้ไอทียกเลิกทุกสิ้นเดือน *
            </small>
        </div>
    </div>
    <div class="modal-footer">
        <?php if($data['leave_status']=='approve' || $data['leave_status']=='header_disapproved' || $data['leave_status']=='director_disapproved' || $data['leave_status']=='cancle'){ $btn = "hidden";}else{$btn = "";} ?>
        <button type="button" class="btn btn-danger btn-sm" id="btnCC" <?=$btn?>>
            <i class="fa fa-exclamation-circle"></i> ยกเลิกวันลา
        </button>
    </div>
</div>

<script>
$('#btnCC').on("click", function(event) {
    event.preventDefault();
    swal({
            title: "ยกเลิกวันลา ?",
            text: "ยืนยันยกเลิกวันลารหัส <?="HR-".$data['leave_id'].": ".$data['emp_name']?>",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((createCnf) => {
            if (createCnf) {
                $.ajax({
                    url: "pages/leave/admin/leave.admin_query.php?op=cancle&id=<?=$data['leave_id']?>",
                    method: "POST",
                    success: function(data) {
                        swal('Success!',
                            'ยกเลิกวันลาแล้ว',
                            'success', {
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                buttons: false,
                                timer: 3000,
                            });
                        window.setTimeout(function() {
                            location.replace('?menu=e-Leave.Admin')
                        }, 2000);
                    }
                });
            }
        });
});
</script>