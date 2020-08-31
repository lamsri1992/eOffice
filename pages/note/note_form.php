<?php
include ('../../config/database.php');
include ('../../config/exdate.class.php');
include ('../../api/dashboard.class.php');
include ('../../api/leave.class.php');
include ('../../api/user.class.php');
include ('../../api/hr.class.php');
include ('../../api/form.class.php');
include ('../../api/note.class.php');

$mysqli = connect();
$leave = new leave();
$note = new note();

$id = base64_decode($_REQUEST['id']);
$data = $note->getNotePreview($id);
$header = $note->getNoteHeader($data['emp_unit']);
$empname = $leave->getUndertaker();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NOTE GENERATE</title>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="../../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <link href="../../assets/demo/demo.css" rel="stylesheet" />
    <!-- Core JS Files -->
    <script src="../../assets/js/core/jquery.min.js"></script>
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="../../assets/js/plugins/moment.min.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="../../assets/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="../../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!-- Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="../../assets/js/plugins/bootstrap-selectpicker.js"></script>
    <!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="../../assets/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="../../assets/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../../assets/js/plugins/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="../../assets/js/plugins/arrive.min.js"></script>
    <!-- Notifications Plugin -->
    <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../../assets/demo/demo.js"></script>
    <link rel="stylesheet" href="../../plugin/font_sarabun.css" />
    <style type="text/css">
    body {
        overflow: hidden;
    }
    </style>
</head>

<body>
    <div id="body" class="n">
        <div style="margin:0px auto;width:210mm;background-color: #ffffff;" class="page_breck">
            <img src="../../assets/img/thai_government.png" style="width:21mm;margin-top: 60px;margin-left: 60px;">
            <div style="font-size: 22px;font-weight:bold;width:350px;margin-left:350px;margin-top: -30px;">บันทึกข้อความ
            </div>
            <div style="margin-left:60px;margin-top: 50px;"><b>ส่วนราชการ</b>
                <div class="div_edit" id="div_edit1"
                    style="width:580px;height:30px; solid #000000;margin-left: 100px;margin-top:-26px;">
                    โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา โทร 0-53484010
                </div>
            </div>
            <div style="margin-left:60px;margin-top: 3px;"><b>ที่</b>
                <div class="div_edit" id="div_edit2"
                    style="width:300px;height:30px; solid #000000;margin-left: 50px;margin-top:-26px;">
                    <?=$data['note_no']."/".$data['note_id']?>
                </div>
                <div style="margin-left: 400px;margin-top: -28px;"><b>วันที่</b>
                    <div class="div_edit" id="div_edit3"
                        style="width:300px;height:30px; solid #000000;margin-left: 40px;margin-top:-26px;">
                        <?=DBThaiLongDate($data['note_create'])?>
                    </div>
                </div>
            </div>
            <div style="margin-left:60px;"><b>เรื่อง</b>
                <div class="div_edit" id="div_edit4"
                    style="width:630px;height:30px; solid #000000;margin-left: 50px;margin-top:-26px;">
                    ขออนุมัติเดินทางไปราชการ
                </div>
            </div>
            <hr>
            <div style="margin-left:60px;margin-top:20px;"><b>เรียน</b>
                <div style="width:630px;height:30px;margin-left: 50px;margin-top:-26px;">
                    ผู้อำนวยการโรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา
                </div>
            </div>
            <div style="margin-left:60px;margin-top:20px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ข้าพเจ้า&nbsp;&nbsp;&nbsp;&nbsp;
                <?php foreach ($empname AS $name){ if ($data['note_emp']==$name['emp_id']){ echo "<span>".$name['emp_name']."</span>"; } }?>
                &nbsp;&nbsp;&nbsp;&nbsp;
                ตำแหน่ง&nbsp;&nbsp;&nbsp;&nbsp;
                <?=$data['emp_position'];?>
            </div>
            <div style="margin-left:60px;margin-top:10px;">
                ฝ่าย&nbsp;&nbsp;&nbsp;&nbsp;
                <?=$data['dept_name'];?>
                &nbsp;&nbsp;&nbsp;&nbsp;
                โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา พร้อมด้วยผู้มีรายชื่อดังต่อไปนี้
            </div>
            <?php if($data['note_list']!="") { $list = $note->getNoteList($data['note_list']);?>
            <div style="margin-left:110px;margin-top:10px;">
                <table width="85%">
                    <?php $i=0; foreach ($list as $ls){ $i++;?>
                    <tr>
                        <td class="b">
                            <?=$i.". ".$ls['emp_name']?>
                        </td>
                        <td class="b">
                            ตำแหน่ง <?=$ls['emp_position']?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <?php } ?>
            <div style="margin-left:111px;margin-top:10px;">
                มีความประสงค์ขออนุมัติไปราชการ
            </div>
            <div style="margin-left:60px;margin-top:10px;">
                ที่ <span class="b"><?=$data['note_place']?></span>
            </div>
            <div style="margin-left:60px;margin-top:10px;">
                เพื่อปฏิบัติราชการ <span class="b"><?=$data['note_title']?></span>
            </div>
            <div class="b" style="margin-left:60px;margin-top:10px;">
                ใน<?=FullDateTimeThai($data['note_start'])?> ถึง<?=FullDateTimeThai($data['note_end'])?>
            </div>
            <div style="margin-left:60px;margin-top:10px;">
                จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ โดยขอเบิกค่าใช้จ่ายในเดินทางไปราชการครั้งนี้ตามระเบียบฯ ของทางราชการ
            </div>
            <div style="margin-left:450px;margin-top:40px;">
                <table width="300px">
                    <tr>
                        <td>(ลงชื่อ)</td>
                    </tr>
                    <tr class="text-center">
                        <td>( <?=$data['emp_name']?> )</td>
                    </tr>
                    <tr class="text-center">
                        <td>ตำแหน่ง <?=$data['emp_position']?></td>
                    </tr>
                </table>
            </div>
            <div style="margin-left:60px;margin-top:40px;">
                <table width="675px">
                    <tr style="text-decoration:underline;font-size:18px" class="b text-center">
                        <td>ความคิดเห็นของหัวหน้าฝ่าย</td>
                        <td>ความคิดเห็นของผู้บังคับบัญชา</td>
                    </tr>
                    <tr class="text-center">
                        <td>เรียน ผู้อำนวยการโรงพยาบาลฯ</td>
                        <td>
                            <input type="radio"> อนุมัติ
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                            <input type="radio"> ไม่อนุมัติ
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>.................................................................</td>
                        <td>.................................................................</td>
                    </tr>
                    <tr class="text-center">
                        <td>.................................................................</td>
                        <td>.................................................................</td>
                    </tr>
                    <tr>
                        <td>(ลงชื่อ)</td>
                        <td>(ลงชื่อ)</td>
                    </tr>
                    <tr class="text-center">
                        <td>(<?php foreach ($empname AS $name){ if ($data['emp_unit']==$name['emp_id']){echo "<span>".$name['emp_name']."</span>";}}?>)
                        </td>
                        <td>( นายประจินต์ เหล่าเที่ยง )</td>
                    </tr>
                    <tr class="text-center">
                        <td>ตำแหน่ง <?=$header['emp_position']?></td>
                        <td>ผู้อำนวยการโรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>