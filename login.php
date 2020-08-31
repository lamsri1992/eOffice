<?php session_start(); error_reporting(E_ALL & ~E_NOTICE); ?>
<!DOCTYPE html>
<html>

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
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="text-center">
                        <img src="assets/img/logo.png" width="70%">
                    </div><br>
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">WATCHAN e-OFFICE</h4>
                        <p class="card-category">กรุณาลงชื่อเข้าใช้งานระบบ</p>
                    </div>
                    <div class="card-body">
                        <form action="config/checklogin.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">หมายเลขบัตร</label>
                                        <input type="text" name="barcode" class="form-control"
                                            onkeyup="this.value = this.value.toUpperCase();" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">รหัสผ่าน</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-sign-in-alt"></i> เข้าสู่ระบบ
                                </button>
                            </div>
                            <div class="text-center">
                                <a href="#" style="font-size:12px;">ลืมรหัสผ่าน ?</a>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <?php
      if($_SESSION['authen']=='fail'){
          echo "    
          <script type='text/javascript'>
          $(document).ready(function() {
              swal('เข้าสู่ระบบล้มเหลว','หมายเลขบัตร หรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง', 'error', {});
              });
          </script>";  
          unset($_SESSION['authen']);
      }
      ?>
</body>

</html>