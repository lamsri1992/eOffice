<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"><?=$menu==""?"Dashboard":$menu?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form" hidden>
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="font-size:14px;">
                        <i class="fa fa-user-circle"></i> <?=$empSession['emp_name']?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="?menu=e-Personal">ข้อมูลส่วนตัว</a>
                        <?php if(isset($empSession['emp_line'])){ ?>
                        <a href="?menu=e-UnitHead" class="dropdown-item">เมนูสำหรับหัวหน้าฝ่าย</a>
                        <?php } ?>
                        <div class="dropdown-divider"></div>
                        <a id="logOff" class="dropdown-item" href="#">ออกจากระบบ</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php include ('script.php'); ?>