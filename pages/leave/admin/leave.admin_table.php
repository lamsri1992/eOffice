<div class="card-body">
    <div class="text-right">
        <button class="btn btn-sm" data-toggle="modal" data-target="#reportLeave">
            <i class="fa fa-print"></i> พิมพ์รายงาน
        </button>
        <button class="btn btn-sm" data-toggle="modal" data-target="#addLeavePast">
            <i class="fa fa-edit"></i> บันทึกวันลาฉุกเฉิน
        </button>
    </div>
    <div class="table-responsive">
        <table id="tableList" class="display nowrap" style="width:100%;">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">ID</th>
                    <th>ชื่อ-สกุล</th>
                    <th class="text-center">ประเภท</th>
                    <th class="text-center">วันที่</th>
                    <th class="">หัวหน้า</th>
                    <th class="text-center">สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $leaves) { ?>
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
                    if($leaves['leave_type']=='sick'){
                        echo "<span>ลาป่วย</span>";
                    }else if($leaves['leave_type']=='busy'){
                        echo "<span>ลากิจ</span>";
                    }else if($leaves['leave_type']=='vacation'){
                        echo "<span>ลาพักผ่อน</span>";
                    }else {
                        echo "<span>ลาคลอดบุตร/ดูแลภรรยา</span>";} 
                    ?>
                    </td>
                    <td class="text-center">
                        <?=DBThaiShortDate($leaves['leave_start'])." - ".DBThaiShortDate($leaves['leave_end'])." <span style='color:red';>( ".$leaves['leave_num']." วัน )</span>"?>
                    </td>
                    <td>
                        <?php foreach ($unithead AS $name){ if ($leaves['emp_unit']==$name['emp_id']){ echo "<span>".$name['emp_name']."</span>";} }?>
                    </td>
                    <td class="text-center">
                        <?php
                    if($leaves['leave_status']==''){
                        echo "<span class='badge badge-danger'><i class='fa fa-clock'></i> รอหัวหน้าดำเนินการ</span>";
                    }else if($leaves['leave_status']=='header'){
                        echo "<span class='badge badge-info'><i class='fa fa-clock'></i> รอผู้อำนวยการอนุมัติ</span>";
                    }else if($leaves['leave_status']=='approve'){
                        echo "<span class='badge badge-success'><i class='fa fa-check'></i> อนุมัติแล้ว</span>";
                    }else if($leaves['leave_status']=='header_disapproved'){
                        echo "<span class='badge badge-danger'><i class='fa fa-ban'></i> หัวหน้าไม่อนุมัติ</span>";
                    }else if($leaves['leave_status']=='director_disapproved'){
                        echo "<span class='badge badge-danger'><i class='fa fa-ban'></i> ผู้อำนวยการไม่อนุมัติ</span>"; 
                    }else{
                        echo "<span class='badge badge-danger'><i class='fa fa-window-close'></i> ยกเลิกรายการ</span>"; 
                    } 
                    ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>