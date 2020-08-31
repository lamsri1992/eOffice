<script>
$('#updateProfile').on("submit", function(event) {
    event.preventDefault();
    swal({
            title: "บันทึกการเปลี่ยนแปลงข้อมูล ?",
            icon: "warning",
            dangerMode: true,
            buttons: true,
        })
        .then((createCnf) => {
            if (createCnf) {
                $.ajax({
                    url: "pages/user/user_query.php?id=<?=$empSession['emp_id']?>",
                    method: "POST",
                    data: $('#updateProfile').serialize(),
                    success: function(data) {
                        swal('Success!',
                            'บันทึกสำเร็จ',
                            'success', {
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                buttons: false,
                                timer: 3000,
                            });
                        window.setTimeout(function() {
                            location.replace('?menu=e-Personal')
                        }, 1500);
                    }
                });
            }
        });
});

function showPass() {
    var x = document.getElementById("ishowPass1");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }

    var x2 = document.getElementById("ishowPass2");
    if (x2.type === "password") {
        x2.type = "text";
    } else {
        x2.type = "password";
    }
}

$(function() {
    $("#btnChPass").click(function() {
        if ($('#ishowPass1').val() != $('#ishowPass2').val()) {
            swal('Invalid', 'รหัสผ่านไม่ตรงกัน กรุณาลองใหม่', 'warning', {
                buttons: false,
                timer: 2000,
            });
        } else {
            $.ajax({
                url: "pages/user/user_password.php?id=<?=$_SESSION['employee']?>",
                method: "POST",
                data: $('#changePassWordForm').serialize(),
                success: function(data) {
                    swal('เปลี่ยนรหัสผ่านแล้ว!',
                        'ในการเข้าระบบครั้งต่อไปให้ใช้รหัสผ่านใหม่',
                        'success', {
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                            buttons: true
                        });
                }
            });
        }
    });
});
</script>