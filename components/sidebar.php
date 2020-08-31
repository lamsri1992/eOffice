<?php include ('activemenu.php'); ?>
<div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
    <div class="logo">
        <a href="?" class="simple-text logo-normal">
            Watchan e-Office
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item <?=$amain?>">
                <a class="nav-link" href="?">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item <?=$aleave?>">
                <a class="nav-link" href="?menu=e-Leave">
                    <i class="material-icons">event</i>
                    <p>ระบบวันลาออนไลน์</p>
                </a>
            </li>
            <li class="nav-item <?=$aehelpdesk?>">
                <a class="nav-link" href="?menu=e-Helpdesk">
                    <i class="material-icons">build</i>
                    <p>ระบบแจ้งซ่อมคอมพิวเตอร์</p>
                </a>
            </li>
            <!-- <li class="nav-item <?=$aesupplies?>">
                <a class="nav-link" href="?menu=e-Supplies">
                    <i class="material-icons">create</i>
                    <p>ระบบคลังพัสดุ</p>
                </a>
            </li> -->
            <!-- <li class="nav-item <?=$aereport?>">
                <a class="nav-link" href="?menu=e-Report">
                    <i class="material-icons">description</i>
                    <p>ระบบขอจัดทำรายงานข้อมูล</p>
                </a>
            </li> -->
            <!-- <li class="nav-item <?=$anote?>">
                <a class="nav-link" href="?menu=e-Note">
                    <i class="material-icons">description</i>
                    <p>ระบบบันทึกข้อความอัจฉริยะ</p>
                </a>
            </li> -->
            <li class="nav-item <?=$aemployee?>">
                <a class="nav-link" href="?menu=e-Employee">
                    <i class="material-icons">folder_shared</i>
                    <p>ระบบฐานข้อมูลบุคลากร</p>
                </a>
            </li>
            <li class="nav-item <?=$aform?>">
                <a class="nav-link" href="?menu=e-Form">
                    <i class="material-icons">get_app</i>
                    <p>ดาวน์โหลดแบบฟอร์ม</p>
                </a>
            </li>
            <li class="nav-item <?=$amanual?>">
                <a class="nav-link" href="?menu=e-Manual">
                    <i class="material-icons">help_outline</i>
                    <p>คู่มือการใช้งาน</p>
                </a>
            </li>
        </ul>
    </div>
</div>