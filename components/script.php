<script>
// sweetalert + confirm add data
$('#logOff').on("click", function(event) {
    event.preventDefault();
    swal({
            title: "ต้องการออกจากระบบ ?",
            icon: "info",
            dangerMode: true,
            buttons: true,
        })
        .then((createCnf) => {
            if (createCnf) {
                document.getElementById("logOff").disabled = true;
                $.ajax({
                    url: "components/logoff.php",
                    success: function(data) {
                        swal('Success!',
                            'ลงชื่อออกจากระบบแล้ว',
                            'success', {
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                buttons: false,
                                timer: 3000,
                            });
                        window.setTimeout(function() {
                            location.replace('?')
                        }, 1500);
                    }
                });
            }
        });

});
</script>