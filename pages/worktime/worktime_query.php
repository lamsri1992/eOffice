<?php 
error_reporting(0);
date_default_timezone_set("Asia/Bangkok");

include ('../../config/database.php');
include ('../../config/exdate.class.php');
include ('../../api/sql.class.php');

$mysqli = connect();
$empcode = mysqli_real_escape_string($mysqli,$_REQUEST['empcode']);
$note = mysqli_real_escape_string($mysqli,$_REQUEST['note']);
$time = mysqli_real_escape_string($mysqli,Date2DBDate($_REQUEST['dateSave'])." 08:45:59");
 // เพิ่มเวลาเข้างานกรณีพิเศษ
$add = "INSERT INTO tb_worktime SET 
        work_time = '{$time}',
        emp_barcode = '{$empcode}',
        work_status = '1',
        work_note = '{$note}'";
$mysqli->query($add);

?>