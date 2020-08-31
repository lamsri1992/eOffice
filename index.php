<?php include ('config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        WATCHAN e-OFFICE : ระบบสำนักงานไร้กระดาษ โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <?php include ('components/source.php'); ?>
    <?php $menu = $_GET['menu']; ?>
</head>

<body>
    <div class="wrapper ">
        <?php include ('components/sidebar.php'); ?>
        <div class="main-panel">
            <?php include ('components/navbar.php'); ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <?php 
                                if(password_verify('1234',$empSession['emp_password'])){
                                    echo "
                                    <div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <i class='material-icons'>close</i>
                                        </button>
                                        <span>
                                        <b> โปรดอ่าน : รหัสผ่านของท่านเป็นรหัสผ่านเริ่มต้น เพื่อความปลอดภัยกรุณาเปลี่ยนรหัสผ่าน</b></span>
                                    </div>";  
                                }
                            ?>
                            <?php if (!isset($menu)){ include ('pages/dashboard.php'); } ?>
                            <?php if ($menu=='e-Leave'){ include ('pages/leave/index.php'); } ?>
                            <?php if ($menu=='e-Employee'){ include ('pages/hr/index.php'); } ?>
                            <?php if ($menu=='e-Form'){ include ('pages/form/index.php'); } ?>
                            <?php if ($menu=='e-Manual'){ include ('pages/manual.php'); } ?>
                            <?php if ($menu=='e-Note'){ include ('pages/note/index.php'); } ?>
                            <?php if ($menu=='e-Leave.Admin'){ include ('pages/leave/admin/index.php'); } ?>
                            <?php if ($menu=='leaveReport.Job'){ include ('pages/leave/admin/leave.admin_report.php'); } ?>
                            <?php if ($menu=='leaveReport.Person'){ include ('pages/leave/admin/leave.admin_report_person.php'); } ?>
                            <?php if ($menu=='leaveReport.Department'){ include ('pages/leave/admin/leave.admin_report_dept.php'); } ?>
                            <?php if ($menu=='e-UnitHead'){ include ('pages/unithead/index.php'); } ?>
                            <?php if ($menu=='e-Personal'){ include ('pages/user/index.php'); } ?>
                            <?php if ($menu=='e-Helpdesk'){ include ('pages/helpdesk/index.php'); } ?>
                            <?php if ($menu=='e-Report'){ include ('pages/report/index.php'); } ?>
                            <?php if ($menu=='e-Supplies'){ include ('pages/supplies/index.php'); } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include ('components/footer.php'); ?>
        </div>
    </div>
</body>

</html>