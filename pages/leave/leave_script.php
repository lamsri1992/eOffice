<script>
// datePicker
$(function() {
    $.datetimepicker.setLocale('th');
    var dt = new Date();
    dt.setDate(dt.getDate() + 3);
    $("#dateStr").datetimepicker({
        format: 'Y/m/d',
        timepicker: false,
        lang: 'th',
        minDate: dt,
        onShow: function(ct) {
            this.setOptions({
                maxDate: jQuery('#dateEnd').val() ? jQuery('#dateEnd').val() : false
            })
        },
        beforeShowDay: function(date) {
            var day = date.getDay();
            return [day == 1 || day == 2 || day == 3 || day == 4 || day == 5, ""];
        }
    });
    $("#dateEnd").datetimepicker({
        format: 'Y/m/d',
        timepicker: false,
        lang: 'th',
        minDate: dt,
        onShow: function(ct) {
            this.setOptions({
                minDate: jQuery('#dateStr').val() ? jQuery('#dateStr').val() : false
            })
        },
        beforeShowDay: function(date) {
            var day = date.getDay();
            return [day == 1 || day == 2 || day == 3 || day == 4 || day == 5, ""];
        }
    });
});

// autocomplete
function make_autocom(autoObj, showObj) {
    var mkAutoObj = autoObj;
    var mkSerValObj = showObj;
    new Autocomplete(mkAutoObj, function() {
        this.setValue = function(id) {
            document.getElementById(mkSerValObj).value = id;
        }
        if (this.isModified)
            this.setValue("");
        if (this.value.length < 1 && this.isNotClick)
            return;
        return "api/json_employee.php?q=" + encodeURIComponent(this.value);
    });
}
make_autocom("empuname", "empuid");

// sweetalert + confirm add data
$('#addLeave').on("submit", function(event) {
    event.preventDefault();
    if ($('#dateStr').val() == '') {
        swal('Error', 'กรุณาเลือกวันที่ลา', 'warning', {
            buttons: false,
            timer: 1500,
        });
    } else if ($('#dateEnd').val() == '') {
        swal('Error', 'กรุณาเลือกวันสิ้นสุด', 'warning', {
            buttons: false,
            timer: 1500,
        });
    } else if ($('#empuid').val() == '') {
        swal('Error', 'ชื่อผู้รับผิดชอบงานไม่ถูกต้อง', 'warning', {
            buttons: false,
            timer: 1500,
        });
    } else {
        swal({
                title: "ยืนยันการขออนุมัติวันลา ?",
                icon: "warning",
                dangerMode: true,
                buttons: true,
            })
            .then((createCnf) => {
                if (createCnf) {
                    document.getElementById("btnSave").disabled = true;
                    $.ajax({
                        url: "pages/leave/leave_query.php?op=add",
                        method: "POST",
                        data: $('#addLeave').serialize(),
                        success: function(data) {
                            swal('Success!',
                                'ทำรายการขออนุมัติวันลาสำเร็จ',
                                'success', {
                                    closeOnClickOutside: false,
                                    closeOnEsc: false,
                                    buttons: false,
                                    timer: 3000,
                                });
                            window.setTimeout(function() {
                                location.replace('?menu=e-Leave')
                            }, 1500);
                        }
                    });
                }
            });
    }
});
</script>