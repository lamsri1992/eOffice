<table id="worktime" class="table table-sm table-striped nowrap" width="100%" cellspacing="0">
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
    <tfoot class="text-primary">
        <tr>
            <th class="text-center">ID::TIME</th>
            <th>ID::CARD</th>
            <th>ชื่อ/สกุล</th>
            <th>ฝ่าย/กลุ่มงาน</th>
            <th class="text-center">วันที่เข้างาน</th>
            <th class="text-center">เวลาเข้างาน</th>
            <th class="text-center"><i class="far fa-check-square"></i></th>
        </tr>
    </tfoot>
</table>
<script>
$(document).ready(function() {
    var table = $('#worktime').DataTable({
        responsive: true,
        "pageLength": 15,
        "lengthMenu": [
            [15, 50, 100, -1],
            [15, 50, 100, "All"]
        ],
        order: [
            [0, "desc"]
        ],
        initComplete: function() {
            this.api().columns([2, 3]).every(function() {
                var column = this;
                var select = $(
                        '<select class="select-single"><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });
                column.cells('', column[0]).render('display').sort().unique().each(function(
                    d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }
    });
});

$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready(function() {
    $('.select-single').select2();
});
</script>