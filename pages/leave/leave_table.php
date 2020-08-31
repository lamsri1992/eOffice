<div class="card-header card-header-tabs card-header-info">
    <div class="nav-tabs-navigation">
        <div class="nav-tabs-wrapper">
            <h5 class="card-title "><i class="fa fa-history"></i> ประวัติการลางาน</h5>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="text-right">
        <?php if(isset($empSession['privilege_hr'])){ ?>
        <a href="?menu=e-Leave.Admin" class="btn btn-sm">
            <i class="fa fa-user-cog"></i> เมนูผู้ดูแลระบบ
        </a>
        <?php } ?>
        <button class="btn btn-sm" data-toggle="modal" data-target="#addNew">
            <i class="fa fa-edit"></i> ขออนุมัติวันลา
        </button>
    </div>
    <div class="table-responsive">
        <table id="tableList" class="display nowrap" style="width:100%;">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">รหัสรายการ</th>
                    <th class="text-center">ประเภทการลา</th>
                    <th class="text-center">วันที่</th>
                    <th class="text-center">ระยะเวลา</th>
                    <th class="text-center">ผู้รับผิดชอบงาน</th>
                    <th class="text-center">สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; foreach ($resHistory as $rsh) { ?>
                <tr>
                    <td class="text-center"><?="HR-".$rsh['leave_id']?></td>
                    <td class="text-center">
                        <?php 
                        if($rsh['leave_type']=='sick'){
                            echo "<span>ลาป่วย</span>";
                        }else if($rsh['leave_type']=='busy'){
                            echo "<span>ลากิจ</span>";
                        }else if($rsh['leave_type']=='vacation'){
                            echo "<span>ลาพักผ่อน</span>";
                        }else {
                            echo "<span>ลาคลอดบุตร/ดูแลภรรยา</span>";
                    } ?>
                    </td>
                    <td class="text-center">
                        <?=DBThaiShortDate($rsh['leave_start'])." - ".DBThaiShortDate($rsh['leave_end'])?>
                    </td>
                    <td class="text-center">
                        <?=$rsh['leave_num']." วัน "?>
                        <?php 
                        if($rsh['leave_days']=='half_m'){ 
                            echo "<small style='color:red;'>ครึ่งวันเช้า</small>"; 
                        } else if($rsh['leave_days']=='half_a'){ 
                            echo "<small style='color:red;'>ครึ่งวันบ่าย</small>"; 
                        } else {
                            echo "<small style='color:red;'>เต็มวัน</small>"; 
                    } ?>
                    </td>
                    <td class="text-center">
                        <?php 
                        foreach ($resUnderTaker AS $name){ 
                        if ($rsh['leave_undertaker']==$name['emp_id']){ echo "<span>".$name['emp_name']."</span>"; } 
                    } ?>
                    </td>
                    <td class="text-center">
                        <?php 
                        if($rsh['leave_status']==''){
                            echo "<span class='ajaxModal badge badge-danger'><i class='fa fa-clock'></i> รอหัวหน้าดำเนินการ</span>";
                        }else if($rsh['leave_status']=='header'){
                             echo "<span class='ajaxModal badge badge-info'><i class='fa fa-clock'></i> รอผู้อำนวยการอนุมัติ</span>";
                        }else if($rsh['leave_status']=='approve'){
                            echo "<span class='ajaxModal badge badge-success'><i class='fa fa-check'></i> อนุมัติแล้ว</span>";
                        }else if($rsh['leave_status']=='header_disapproved'){
                            echo "<span class='ajaxModal badge badge-danger'><i class='fa fa-ban'></i> หัวหน้าไม่อนุมัติ</span>";
                        }else if($rsh['leave_status']=='director_disapproved'){
                            echo "<span class='ajaxModal badge badge-danger'><i class='fa fa-ban'></i> ผู้อำนวยการไม่อนุมัติ</span>"; 
                        }else{
                            echo "<span class='ajaxModal badge badge-danger'><i class='fa fa-window-close'></i> ยกเลิกรายการ</span>"; 
                    } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>