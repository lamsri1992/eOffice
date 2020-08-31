<div class="table-responsive">
    <table id="tableList" class="display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>ชื่อ-สกุล</th>
                <th>แผนก/กลุ่มงาน</th>
                <th>ตำแหน่ง</th>
                <th class="text-center">ประเภท</th>
                <th class="text-center">สถานะ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fetchEmp as $emps) { ?>
            <tr>
                <td class="text-center"><?=$emps['emp_barcode'];?></td>
                <td>
                    <a href="#" class="ajaxModal" data-target="#empDetail" data-toggle="modal"
                        data-id="<?=$emps['emp_id'];?>">
                        <?=$emps['emp_name'];?>
                    </a>
                </td>
                <td><?=$emps['dept_name'];?></td>
                <td><?=$emps['emp_position'];?></td>
                <td class="text-center"><?=$emps['emp_job_name'];?></td>
                <td class="text-center">
                    <?php
                        if($emps['emp_status']=='ปฏิบัติงาน'){
                        echo "<span class='badge badge-success'><i class='fa fa-check'></i> ".$emps['emp_status']."</span>";}
                        if($emps['emp_status']=='ลาออก'){
                        echo "<span class='badge badge-danger'><i class='fa fa-exclamation-circle'></i> ".$emps['emp_status']."</span>";} 
                    ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>