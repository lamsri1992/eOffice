<div class="table-responsive">
    <table id="tableList" class="display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">เลขที่</th>
                <th class="text-center">ผู้ทำรายการ</th>
                <th class="text-center">วันที่</th>
                <th>เรื่อง</th>
                <th>สถานที่</th>
                <th class="text-center">พิมพ์แบบฟอร์ม</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fetchNote as $ns){ ?>
            <tr>
                <td class="text-center">
                    <a href="#noteDetail" class="ajaxModal" data-toggle="modal"
                        data-id="<?=$ns['note_id']?>"><?=$ns['note_no'].$ns['note_id']?>
                    </a>
                </td>
                <td class="text-center">
                    <?php foreach ($empname AS $name){ if ($ns['note_emp']==$name['emp_id']){ echo "<span>".$name['emp_name']."</span>"; } }?>
                </td>
                <td class="text-center">
                    <?=DateTimeThai($ns['note_start'])." - ".DateTimeThai($ns['note_end'])?>
                </td>
                <td><?=$ns['note_title']?></td>
                <td><?=$ns['note_place']?></td>
                <td class="text-center">
                    <a href="pages/note/note_form.php?id=<?=base64_encode($ns['note_id'])?>" target="_blank"
                        class='badge badge-primary'><i class='fa fa-print'></i>
                        พิมพ์เอกสาร
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>