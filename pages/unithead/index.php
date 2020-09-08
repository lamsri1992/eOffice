<?php 
$emp = $unithead->getEmpDept($empSession['emp_dept']); $count_emp = $unithead->countEmp($empSession['emp_dept']);
$leave = $unithead->getLeaveDept($empSession['emp_dept']); $count_leave = $unithead->countLeaveDept($empSession['emp_dept']);
?>
<div class="card">
    <?php include ('components/breadcrumb.php'); ?>
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title ">เมนูสำหรับหัวหน้าฝ่าย</h5>
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#employee" data-toggle="tab">
                            <i class="fa fa-users"></i> รายชื่อเจ้าหน้าที่
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#leave" data-toggle="tab">
                            <i class="fa fa-clipboard-list"></i> รายการขออนุมัติวันลา
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ebook" data-toggle="tab">
                            <i class="fa fa-file-alt"></i> รายการหนังสือเข้า
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <p class="card-category">จำนวนเจ้าหน้าที่ในฝ่าย</p>
                        <h3 class="card-title">
                            <?=$count_emp['num']?> <small>คน</small>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-clipboard-list"></i>
                        </div>
                        <p class="card-category">รายการขออนุมัติวันลาที่รอดำเนินการ</p>
                        <h3 class="card-title">
                            <?=$count_leave['num']?> <small>รายการ</small>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <p class="card-category">รายการหนังสือเข้าที่ยังไม่ได้เปิดอ่าน</p>
                        <h3 class="card-title">
                            0 <small>ฉบับ</small>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="employee">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>ชื่อ-สกุล</th>
                            <th>ตำแหน่ง</th>
                            <th class="text-center">ประเภท</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($emp as $emps) { $i++; ?>
                        <tr>
                            <td class="text-center"><?=$i;?></td>
                            <td><?=$emps['emp_name'];?></td>
                            <td><?=$emps['emp_position'];?></td>
                            <td class="text-center"><?=$emps['emp_job_name'];?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="leave">
                <table class="table table-sm table-striped table-bordered" style="width:100%;font-size:14px;">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>ชื่อ-สกุล</th>
                            <th class="text-center">ประเภท</th>
                            <th class="text-center">วันที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($leave as $leaves) { ?>
                        <tr>
                            <td class="text-center">
                                <a href="#" class="ajaxModal" data-target="#moreLeave" data-toggle="modal"
                                    data-id="<?=$leaves['leave_id']?>">
                                    <?="HR-".$leaves['leave_id'];?>
                                </a>
                            </td>
                            <td><?=$leaves['emp_name'];?></td>
                            <td class="text-center">
                                <?php 
                                if($leaves['leave_type']=='sick'){echo "<span>ลาป่วย</span>";}
                                else if($leaves['leave_type']=='busy'){echo "<span>ลากิจ</span>";}
                                else if($leaves['leave_type']=='vacation'){echo "<span>ลาพักผ่อน</span>";}
                                else {echo "<span>ลาคลอดบุตร/ดูแลภรรยา</span>";}
                                ?>
                            </td>
                            <td class="text-center">
                                <?=DBThaiShortDate($leaves['leave_start'])." - ".DBThaiShortDate($leaves['leave_end']).
                                " <span style='color:red';>( ".$leaves['leave_num']." วัน )</span>"?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="ebook">
                <i class="fa fa-code"></i> กำลังพัฒนาระบบ
            </div>
        </div>
    </div>
</div>

<!-- Modal More Leave -->
<div class="modal fade" id="moreLeave" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="font-size:14px;">
        <div id="ajaxLeave">
            <!-- เรียกใช้งานผ่าน ajax -->
        </div>
    </div>
</div>
<?php include ('unithead_script.php'); ?>