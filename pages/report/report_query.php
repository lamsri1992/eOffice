<?php
include ('../../config/database.php');
include ('../../api/sql.class.php');
include ('../../api/line_notify.class.php');

$mysqli = connect();
$op = $_REQUEST['op'];

if($op == 'add'){
    $empid = mysqli_real_escape_string($mysqli,$_REQUEST['empid']);
    $deptid = mysqli_real_escape_string($mysqli,$_REQUEST['deptid']);
    $title = mysqli_real_escape_string($mysqli,$_REQUEST['title']);
    $data = array(
        "help_create"=>$empid,
        "help_dept"=>$deptid,
        "help_title"=>$title
    );
    insertSQL("tb_helpdesk",$data);
    // Line Notify
    $Token = "l4nlyOCAb9Tf8ZR69I4LC3EWB2GyeNCuI04d2YbdEb0";
    $message = "มีรายการแจ้งซ่อมใหม่ กรุณาตรวจสอบที่ https://office.watchanhospital.com/";
    line_notify($Token, $message);
}

if($op == 'update'){
    $id = mysqli_real_escape_string($mysqli,$_REQUEST['id']);
    $cause = mysqli_real_escape_string($mysqli,$_REQUEST['cause']);
    $fix = mysqli_real_escape_string($mysqli,$_REQUEST['fix']);
    $status = mysqli_real_escape_string($mysqli,$_REQUEST['status']);
    $data = array(
        "help_cause"=>$cause,
        "help_fix"=>$fix,
        "help_status"=>$status
    );
    updateSQL("tb_helpdesk",$data,"help_id=$id");
}

if($op == 'rate'){
    $id = mysqli_real_escape_string($mysqli,$_REQUEST['id']);
    $rate_1 = mysqli_real_escape_string($mysqli,$_REQUEST['rate_1']);
    $rate_2 = mysqli_real_escape_string($mysqli,$_REQUEST['rate_2']);
    $rate_3 = mysqli_real_escape_string($mysqli,$_REQUEST['rate_3']);
    $data = array(
        "rate_1"=>$rate_1,
        "rate_3"=>$rate_2,
        "rate_2"=>$rate_3,
        "help_rate"=>$id
    );
    insertSQL("tb_helpdesk_rate",$data);
}
?>