<?php 
$events = $dashboard->getCalendar(); 
$new = $dashboard->getNews(); 
$atime = $dashboard->getAccessTime(date('Y-m-d')); 
$lost = $dashboard->getTimeLost(date('Y-m-d')); 
$chart = $dashboard->getChart(); $tchart = $dashboard->getTime();
?>
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
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-primary">
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#profile" data-toggle="tab">
                                                    <i class="fa fa-user-check"></i> รายชื่อบันทึกเข้างาน
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#messages" data-toggle="tab">
                                                    <i class="fa fa-user-times"></i> ผู้ที่ยังไม่ได้บันทึกเวลาเข้างาน
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <table id="timelist" class="table table-sm table-striped nowrap" width="100%"
                                            cellspacing="0">
                                            <thead class="text-primary">
                                                <tr>
                                                    <th class="text-center">เวลาเข้างาน</th>
                                                    <th>ชื่อ/สกุล</th>
                                                    <th>ตำแหน่ง</th>
                                                    <th>ฝ่าย/กลุ่มงาน</th>
                                                    <th class="text-center" width="2%"><i
                                                            class="fa fa-check-square"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $latetime = date('Y-m-d')." 08:46:00";
                                                    $count_late = 0;
                                                    foreach ($atime as $time){
                                                    if($time['work_time'] >= $latetime && $time['work_status'] == 1){
                                                        $late = 'text-danger';
                                                        $text = 'เข้างานสาย';
                                                        $count_late++;
                                                    }else{
                                                        $late = '';
                                                        $text = '';
                                                    }
                                                ?>
                                                <tr class="<?=$late?>">
                                                    <td class="text-center">
                                                        <span style="font-weight:bold;">
                                                            <?=substr($time['work_time'],10,20)?>
                                                        </span>
                                                    </td>
                                                    <td class="row">
                                                        <div class="col-md-8">
                                                            <?=$time['emp_name']?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <span style="font-weight:bold;">
                                                                <?=$text?>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td><?=$time['emp_position']?></td>
                                                    <td><?=$time['dept_name']?></td>
                                                    <td class="text-center">
                                                        <?php if(!isset($time['wstat_name'])){
                                                                echo "<a href='#' class='badge badge-danger btn-block' data-toggle='tooltip' data-placement='top' title='รอการตรวจสอบ'>รอตรวจสอบ</a>";
                                                            }else{
                                                                echo "
                                                                <a href='#' class='badge badge-".$time['wstat_badge']." btn-block' data-toggle='tooltip' 
                                                                data-placement='top' title='".$time['wstat_note']." ".$time['work_note']." '>
                                                                    ".$time['wstat_name']."
                                                                </a>";
                                                            }
                                                            ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="messages">
                                        <table id="lostlist" class="table table-sm table-striped nowrap" width="100%"
                                            cellspacing="0">
                                            <thead class="text-primary">
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>ชื่อ/สกุล</th>
                                                    <th>ตำแหน่ง</th>
                                                    <th>ฝ่าย/กลุ่มงาน</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $n=0; foreach ($lost as $losts){ $n++; ?>
                                                <tr>
                                                    <td class="text-center"><?=$n?></td>
                                                    <td><?=$losts['emp_name']?></td>
                                                    <td><?=$losts['emp_position']?></td>
                                                    <td><?=$losts['dept_name']?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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