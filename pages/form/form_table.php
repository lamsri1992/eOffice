<div class="table-responsive">
    <table id="tableList" class="display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">รหัสแบบฟอร์ม</th>
                <th class="">ชื่อแบบฟอร์ม</th>
                <th class="text-center">ฝ่ายงาน</th>
                <th class="text-center"><i class="fa fa-download"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fetchForm as $frms) { ?>
            <tr>
                <td class="text-center"><?=$frms['form_number']?></td>
                <td class=""><?=$frms['form_name']?></td>
                <td class="text-center"><?=$frms['form_work']?></td>
                <td class="text-center">
                    <a href="pages/form/files/<?=$frms['form_file']?>" target="_blank" class="badge badge-success">
                        <i class="fa fa-download"></i>
                        ดาวน์โหลดไฟล์
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>