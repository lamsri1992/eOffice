<table id="tableList" class="table table-sm table-striped nowrap" width="100%" cellspacing="0">
    <thead class="text-primary">
        <tr>
            <th class="text-center">ID::TIME</th>
            <th>ID::CARD</th>
            <th>ชื่อ/สกุล</th>
            <th>ฝ่าย/กลุ่มงาน</th>
            <th class="text-center">วันที่เข้างาน</th>
            <th class="text-center">เวลาเข้างาน</th>
            <th class="text-center">เวลาเข้าเวรบ่าย</th>
            <th class="text-center">เวลาเข้าเวรดึก</th>
            <th class="text-center"><i class="far fa-check-square"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($atime as $time){ ?>
        <tr>
            <td class="text-center"><?=$time['work_id']?></td>
            <td><?=$time['emp_barcode']?></td>
            <td><?=$time['emp_name']?></td>
            <td><?=$time['dept_name']?></td>
            <td class="text-center">
                <span style="font-weight:bold;">
                    <?=substr(DateTimeThai($time['work_in']),0,16)?>
                </span>
            </td>
            <td class="text-center">
                <span style="font-weight:bold;">
                    <?=substr($time['work_in'],10,20)?>
                </span>
            </td>
            <td class="text-center">
                <span style="font-weight:bold;">
                    <?=substr($time['work_early'],10,20)?>
                </span>
            </td>
            <td class="text-center">
                <span style="font-weight:bold;">
                    <?=substr($time['work_night'],10,20)?>
                </span>
            </td>
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