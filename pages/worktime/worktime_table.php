<table id="tableList" class="table table-sm table-striped nowrap" width="100%" cellspacing="0">
    <thead class="text-primary">
        <tr>
            <th class="text-center">ID::TIME</th>
            <th>ID::CARD</th>
            <th>ชื่อ/สกุล</th>
            <th>ฝ่าย/กลุ่มงาน</th>
            <th class="text-center">วันที่เข้างาน</th>
            <th class="text-center">เวลาเข้างาน</th>
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
                    <?=substr(DateTimeThai($time['work_time']),0,16)?>
                </span>
            </td>
            <td class="text-center">
                <span style="font-weight:bold;">
                    <?=substr($time['work_time'],10,20)?>
                </span>
            </td>
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
<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>