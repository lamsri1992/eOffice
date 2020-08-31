<script>
$('#addNew').on("submit", function(event) {
    event.preventDefault();
    swal({
            title: "ยืนยันการแจ้งซ่อม ?",
            icon: "warning",
            dangerMode: true,
            buttons: true,
        })
        .then((createCnf) => {
            if (createCnf) {
                document.getElementById("btnSave").disabled = true;
                $.ajax({
                    url: "pages/helpdesk/helpdesk_query.php?op=add",
                    method: "POST",
                    data: $('#addNew').serialize(),
                    success: function(data) {
                        swal('Success!',
                            'บันทึกรายการแจ้งซ่อมสำเร็จ',
                            'success', {
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                buttons: false,
                                timer: 3000,
                            });
                        window.setTimeout(function() {
                            location.replace('?menu=e-Helpdesk')
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
        url: "pages/helpdesk/helpdesk_modal_list.php?id=" + id,
        cache: false,
        success: function(result) {
            $('#ajaxEdit').html(result);
        }
    });
});
</script>