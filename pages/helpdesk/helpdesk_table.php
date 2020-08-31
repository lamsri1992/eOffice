<div class="table-responsive">
    <table id="tableList" class="display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">รหัสแจ้งซ่อม</th>
                <th class="text-center">วันที่แจ้ง</th>
                <th class="text-center">ฝ่าย/กลุ่มงาน</th>
                <th>รายละเอียด</th>
                <th class="text-center">สถานะ</th>
                <th class="text-center">ความพึงพอใจ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fetchList as $list){ ?>
            <tr>
                <td class="text-center">
                    <a href="#listDetail" class="ajaxModal" data-toggle="modal"
                        data-id="<?=$list['help_id']?>"><?="IT-".$list['help_id']?>
                    </a>
                </td>
                <td class="text-center">
                    <?=DateTimeThai($list['help_date'])?>
                </td>
                <td class="text-center"><?=$list['dept_name']?></td>
                <td><?=$list['help_title']?></td>
                <td class="text-center">
                    <?php 
                        if($list['help_status']=='pending'){
                            echo "<span class='ajaxModal badge badge-info'><i class='fa fa-clock'></i> รอดำเนินการ</span>";
                        }else if($list['help_status']=='repair'){
                             echo "<span class='ajaxModal badge badge-danger'><i class='fa fa-truck'></i> ส่งซ่อม</span>";
                        }else if($list['help_status']=='spares'){
                            echo "<span class='ajaxModal badge badge-primary'><i class='fa fa-tools'></i> รออะไหล่</span>";
                        }else{
                            echo "<span class='ajaxModal badge badge-success'><i class='fa fa-check'></i> สำเร็จ</span>"; 
                    } ?>
                </td>
                <style>
                .checked {
                    color: orange;
                }
                </style>
                <td class="text-center">
                    <?php $rate = ($list['rate_1']+$list['rate_2']+$list['rate_3'])/3?>
                    <?php $i = 1; while ($i <= $rate) { echo "<span class='fa fa-star checked'></span>";$i++;}?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>