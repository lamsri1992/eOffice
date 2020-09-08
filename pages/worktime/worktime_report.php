<?php
if($_REQUEST['wdept']==0){$finddept="";}else{$finddept="AND tb_employee.emp_dept = {$_REQUEST['wdept']}";}
if($_REQUEST['wtype']==0){$findtype="";}else{$findtype="AND tb_employee.emp_job = {$_REQUEST['wtype']}";}
    $sql = "SELECT tb_employee.emp_name,tb_employee.emp_barcode,tb_department.dept_name,tb_employee.emp_position,tb_employee_job.emp_job_name,tb_employee_job.emp_job_id,
            COUNT(IF(tb_worktime.work_status='1',1,NULL)) AS count_work,COUNT(IF(tb_worktime.work_status='0',1, NULL)) AS count_late
            FROM tb_employee
            LEFT JOIN tb_worktime ON tb_worktime.emp_barcode = tb_employee.emp_barcode
            LEFT JOIN tb_department ON tb_department.dept_id = tb_employee.emp_dept
            LEFT JOIN tb_employee_job ON tb_employee_job.emp_job_id  = tb_employee.emp_job
            WHERE tb_worktime.work_in BETWEEN '2020-{$_REQUEST['wmonth']}-01' AND '2020-{$_REQUEST['wmonth']}-31'
            $finddept $findtype
            GROUP BY tb_employee.emp_id
            ORDER BY tb_department.dept_id ASC";
    global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()){
            $obj[] = $data;
    }
// print_r($obj);
// echo $sql;
?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title"><i class="far fa-file-alt"></i> รายงานบันทึกลงเวลาเข้างาน
                    <span>ประจำเดือน<?=DateThai("2020-{$_REQUEST['wmonth']}-01")?></span>
                </h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php include ('components/breadcrumb.php'); ?>
        <div class="table-responsive">
            <table id="reportTable" class="compact table table-bordered nowrap" style="width:100%;font-size:14px;">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">รหัส</th>
                        <th>เจ้าหน้าที่</th>
                        <th>ประเภท</th>
                        <th>ฝ่ายงาน</th>
                        <th width="7%" class="text-center">ทำงาน</th>
                        <th width="7%" class="text-center">มาสาย</th>
                        <th width="7%" class="text-center">รวม</th>
                        <th width="10%" class="text-center">หมายเหตุ</th>
                    </tr>
                </thead>
                <?php foreach ($obj as $res){ ?>
                <tr>
                    <td class="text-center"><?=$res['emp_barcode'];?></td>
                    <td><span><?=$res['emp_name']?></span></td>
                    <td><span><?=$res['emp_job_name']?></span></td>
                    <td><span><?=$res['dept_name']?></span></td>
                    <td class="text-center">
                        <span class="badge badge-success btn-block" style="font-size:14px">
                            <?=$res['count_work']?>
                        </span>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-danger btn-block" style="font-size:14px">
                            <?=$res['count_late']?>
                        </span>
                    </td>
                    <td class="text-center">
                        <?php $count = $res['count_work']+$res['count_late']; ?>
                        <span class="badge badge-primary btn-block" style="font-size:14px">
                            <?=$count?>
                        </span>
                    </td>
                    <td class="text-center">
                        <?php if($count >= 15 && $res['emp_job_id'] <> 5){ 
                                echo "<span class='text-success'><i class='fa fa-check-circle'></i> ได้เบี้ย ฉ.11</span>"; }else{
                                echo "<a href='#' class='text-danger' data-toggle='tooltip' data-placement='top' title='เวลาทำงานรวมไปถึง 15 วัน'><i class='fa fa-ban'></i> ไม่ได้เบี้ย ฉ.11</a>";} 
                            ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>