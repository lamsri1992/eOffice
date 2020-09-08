<?php $events = $dashboard->getCalendar(); $new = $dashboard->getNews(); $atime = $dashboard->getAccessTime(date('Y-m-d')); $chart = $dashboard->getChart(); $tchart = $dashboard->getTime();?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title ">ระบบสำนักงานไร้กระดาษ</h5>
                <span class="card-title ">โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="row">
                <div class="col-lg-6">
                    <canvas id="leaveChart"></canvas>
                </div>
                <div class="col-lg-6">
                    <canvas id="workChart"></canvas>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <h5 class="card-title"><i class="far fa-clock"></i> ระบบบันทึกเวลาเข้างาน
                            <span style="font-weight:bold;" class="text-danger">
                                วันที่ <?=DBThaiLongDate(date('Y-m-d'));?>
                            </span>
                        </h5>
                        <table id="timelist" class="table table-sm table-striped nowrap" width="100%" cellspacing="0">
                            <thead class="text-primary">
                                <tr>
                                    <th class="text-center">เวลาเข้างาน</th>
                                    <th>ชื่อ/สกุล</th>
                                    <th>ฝ่าย/กลุ่มงาน</th>
                                    <th class="text-center"><i class="far fa-check-square"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($atime as $time){ ?>
                                <tr>
                                    <td class="text-center"><span style="font-weight:bold;">
                                            <?=substr($time['work_in'],10,20)?>
                                        </span>
                                    </td>
                                    <td><?=$time['emp_name']?></td>
                                    <td><?=$time['dept_name']?></td>
                                    <td class="text-center">
                                        <?php 
                                            if($time['work_status']=='1'){
                                                echo "<span class='badge badge-success'><i class='fa fa-check-circle'></i> เข้างานปกติ</span>";
                                            }else{ echo "<span class='badge badge-danger'><i class='fa fa-exclamation-circle'></i> เข้างานสาย</span>"; }
                                        ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card-body">
                        <h5 class="card-title"><i class="far fa-calendar"></i> ปฏิทินวันลา</h5>
                        <div class="col-lg-12">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ('script_dashboard.php'); ?>