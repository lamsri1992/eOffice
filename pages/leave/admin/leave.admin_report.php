<?php
$strStartDate = Date2DBDate($_REQUEST['dstart']);
$strEndDate = Date2DBDate($_REQUEST['dend']);
$job = $_REQUEST['job'];

    foreach($_REQUEST['checkleave'] as $check){ 
        $arr_where[] = " tb_leave.leave_type='$check'";
    }
    $condition = implode(" OR", $arr_where);

    $sql = "SELECT tb_leave.leave_id,
                   tb_leave.leave_type,
                   tb_leave.leave_start,
                   tb_leave.leave_end,
                   tb_leave.leave_num,
                   tb_employee.emp_name,
                   tb_employee_job.emp_job_id,
                   tb_employee_job.emp_job_name,
                   tb_department.dept_name 
            FROM tb_leave 
            LEFT JOIN tb_employee ON tb_employee.emp_id = tb_leave.emp_id
            LEFT JOIN tb_employee_job ON tb_employee_job.emp_job_id = tb_employee.emp_job
            LEFT JOIN tb_department ON tb_department.dept_id = tb_employee.emp_dept
            WHERE tb_employee.emp_job = '{$job}' AND (tb_leave.leave_start >= '{$_REQUEST['dstart']}' AND tb_leave.leave_end <= '{$_REQUEST['dend']}')
            AND tb_leave.leave_status = 'approve' AND (".$condition.")";
    global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()){
            $obj[] = $data;
        }
?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title"><i class="far fa-file-alt"></i> รายงานการลาระหว่างวันที่
                    <?=DBThaiShortDate($strStartDate)." ถึง ".DBThaiShortDate($strEndDate)?>
                </h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="card-body">
                <table id="reportTable" class="display compact table table-bordered nowrap"
                    style="width:100%;font-size:14px;">
                    <thead>
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th>เจ้าหน้าที่</th>
                            <th>วันที่ลา</th>
                            <th class="text-center">ประเภทการลา</th>
                            <th class="text-center">ประเภทบุคลากร</th>
                            <th>ฝ่าย</th>
                        </tr>
                    </thead>
                    <?php 
                        foreach ($obj as $res){
                        if($res['leave_type']=="sick"){
                            $ls = "ลาป่วย";
                        } if ($res['leave_type']=="busy"){
                            $ls = "ลากิจ";
                        } if ($res['leave_type']=="vacation"){
                            $ls = "ลาพักผ่อน";
                        } if ($res['leave_type']=="mate"){
                            $ls = "ลาคลอด/ดูแลภรรยา";
                        }
                    ?>
                    <tr>
                        <td class="text-center">HR-<?=$res['leave_id'];?></td>
                        <td><?=$res['emp_name']?></td>
                        <td><?=DBThaiShortDate($res['leave_start'])?> -
                            <?=DBThaiShortDate($res['leave_end'])?>
                            (<?=$res['leave_num']?> วัน)</td>
                        <td class="text-center"><?=$ls?></td>
                        <td class="text-center"><?=$res['emp_job_name']?></td>
                        <td><?=$res['dept_name']?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>