<script>
// datePicker
$(function() {
    $.datetimepicker.setLocale('th');
    $("#dateStr").datetimepicker({
        format: 'Y/m/d',
        timepicker: false,
        lang: 'th',
        beforeShowDay: function(date) {
            var day = date.getDay();
            return [day == 1 || day == 2 || day == 3 || day == 4 || day == 5, ""];
        }
    });
    $("#dateEnd").datetimepicker({
        format: 'Y/m/d',
        timepicker: false,
        lang: 'th',
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
    $("#dateStr1").datetimepicker({
        format: 'Y/m/d',
        timepicker: false,
        lang: 'th',
    });
    $("#dateEnd1").datetimepicker({
        format: 'Y/m/d',
        timepicker: false,
        lang: 'th',
    });
    $("#dateStr2").datetimepicker({
        format: 'Y/m/d',
        timepicker: false,
        lang: 'th',
    });
    $("#dateEnd2").datetimepicker({
        format: 'Y/m/d',
        timepicker: false,
        lang: 'th',
    });
    $("#dateStr3").datetimepicker({
        format: 'Y/m/d',
        timepicker: false,
        lang: 'th',
    });
    $("#dateEnd3").datetimepicker({
        format: 'Y/m/d',
        timepicker: false,
        lang: 'th',
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

function make_autocom2(autoObj, showObj) {
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
make_autocom2("empuname2", "empuid2");

function make_autocom3(autoObj, showObj) {
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
make_autocom3("name", "id");

// add + sweetalert
$('#addLeaveLate').on("submit", function(event) {
    event.preventDefault();
    let formData = new FormData(this);
    swal({
            title: "ยืนยันการเพิ่มข้อมูล ?",
            icon: "warning",
            dangerMode: true,
            buttons: true,
        })
        .then((createCnf) => {
            if (createCnf) {
                $.ajax({
                    url: "pages/leave/admin/leave.admin_query.php?op=addLeave",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
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
                            location.replace('?menu=e-Leave.Admin')
                        }, 1500);
                    }
                });
            }
        });
});

$('.ajaxModal').click(function() {
    var id = $(this).attr('data-id');
    $.ajax({
        url: "pages/leave/admin/leave.admin_modal_detail.php?id=" + id,
        cache: false,
        success: function(result) {
            $('#ajaxLeave').html(result);
        }
    });
});
</script>