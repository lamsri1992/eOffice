<?php session_start(); $fetchEmp = $hr->getEmployee(); $fetchDept = $hr->getDepartment(); $fetchJob = $hr->getJob(); $countJob = $hr->countJob(); $countDept = $hr->countDept(); ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title ">ระบบฐานข้อมูลบุคลากร</h5>
                <span class="card-title ">โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php include ('components/breadcrumb.php'); ?>
        <?php if(isset($empSession['privilege_hr'])){ ?>
        <div class="text-right">
            <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addNewEmp">
                <i class="fa fa-user-plus"></i> เพิ่มข้อมูลบุคลากร
            </button>
        </div>
        <?php } ?>
        <?php include ('hr_table.php'); ?>
        <div class="card-body col-md-12 row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table" style="width:100%;">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">ฝ่าย/กลุ่มงาน</th>
                                <th class="text-center">จำนวน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; $xtotal; foreach ($countDept as $rs){ $i++; $xtotal += $rs['total']; ?>
                            <tr>
                                <td class="text-center"><?=$rs['dept_name']?></td>
                                <td class="text-center"><?=$rs["dept"."$i"]." คน"?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table" style="width:100%;">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">ประเภทบุคลากร</th>
                                <th class="text-center">จำนวน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; $xtotal; foreach ($countJob as $rs){ $i++;?>
                            <tr>
                                <td class="text-center"><?=$rs['emp_job_name']?></td>
                                <td class="text-center"><?=$rs["job"."$i"]." คน"?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td class="text-center"><span style="font-weight:bold;">รวมทั้งหมด</span></td>
                                <td class="text-center"><span style="font-weight:bold;"><?=$xtotal." คน"?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ('hr_modal.php'); ?>
<?php include ('hr_script.php'); ?>