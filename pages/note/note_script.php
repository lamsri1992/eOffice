<script>
$('select').select2({
    createTag: function(params) {
        if (params.term.indexOf('@') === -1) {
            return null;
        }
        return {
            id: params.term,
            text: params.term
        }
    }
});

$(function() {
    $.datetimepicker.setLocale('th');
    var dt = new Date();
    dt.setDate(dt.getDate());
    $("#dateStr").datetimepicker({
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
});

$('#addNew').on("submit", function(event) {
    event.preventDefault();
    swal({
            title: "ยืนยันการขออนุมัติเดินทางไปราชการ ?",
            icon: "warning",
            dangerMode: true,
            buttons: true,
        })
        .then((createCnf) => {
            if (createCnf) {
                document.getElementById("btnSave").disabled = true;
                $.ajax({
                    url: "pages/note/note_query.php?op=add",
                    method: "POST",
                    data: $('#addNew').serialize(),
                    success: function(data) {
                        swal('Success!',
                            'บันทึกรายการขออนุมัติเดินทางไปราชการสำเร็จ',
                            'success', {
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                buttons: false,
                                timer: 3000,
                            });
                        window.setTimeout(function() {
                            location.replace('?menu=e-Note')
                        }, 1500);
                    }
                });
            }
        });
});
</script>