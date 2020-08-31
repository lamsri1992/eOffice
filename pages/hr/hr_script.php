<script>
// autocomplete
function make_autocom(autoObj, showObj) {
    var mkAutoObj = autoObj;
    var mkSerValObj = showObj;
    new Autocomplete(mkAutoObj, function() {
        this.setValue = function(id) {
            document.getElementById(mkSerValObj).value = id;
        }
        return "api/json_position.php?q=" + encodeURIComponent(this.value);
    });
}
make_autocom("emppos", "emppos");

// datePicker
$(function() {
    $.datetimepicker.setLocale('th');
    $("#dateSelect").datetimepicker({
        format: 'Y/m/d',
        timepicker: false,
        lang: 'th'
    });
});

// add + sweetalert
$('#frmAdd').on("submit", function(event) {
    event.preventDefault();
    swal({
            title: "ยืนยันการเพิ่มข้อมูล ?",
            icon: "warning",
            dangerMode: true,
            buttons: true,
        })
        .then((createCnf) => {
            if (createCnf) {
                $.ajax({
                    url: "pages/hr/hr_query.php?op=add",
                    method: "POST",
                    data: $('#frmAdd').serialize(),
                    success: function(data) {
                        swal('Success!',
                            'เพิ่มข้อมูลสำเร็จ',
                            'success', {
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                buttons: false,
                                timer: 3000,
                            });
                        window.setTimeout(function() {
                            location.replace('?menu=e-Employee')
                        }, 1500);
                    }
                });
            }
        });
});

// modal on click
$('.ajaxModal').click(function() {
    var id = $(this).attr('data-id');
    $.ajax({
        url: "pages/hr/hr_modal_list.php?id=" + id,
        cache: false,
        success: function(result) {
            $('#ajaxEdit').html(result);
        }
    });
});
</script>