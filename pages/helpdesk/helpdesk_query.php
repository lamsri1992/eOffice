<?php
date_default_timezone_set("Asia/Bangkok");
include ('../../config/database.php');
include ('../../api/sql.class.php');
include ('../../api/line_notify.class.php');

$mysqli = connect();
$op = $_REQUEST['op'];

if($op == 'add'){
    $empid = mysqli_real_escape_string($mysqli,$_REQUEST['empid']);
    $deptid = mysqli_real_escape_string($mysqli,$_REQUEST['deptid']);
    $title = mysqli_real_escape_string($mysqli,$_REQUEST['title']);
    $start = date("Y-m-d H:i:s");
    $data = array(
        "help_create"=>$empid,
        "help_dept"=>$deptid,
        "help_title"=>$title,
        "help_date"=>$start,
    );
    insertSQL("tb_helpdesk",$data);

    // Select Department Name
    $getunit="SELECT * FROM tb_department WHERE dept_id = '{$deptid}'"; 
    $unit=selectSQL($getunit);
    $rs=$unit[0];

    // Line Notify
    $Token = "l4nlyOCAb9Tf8ZR69I4LC3EWB2GyeNCuI04d2YbdEb0";
    $message = "รายการแจ้งซ่อมใหม่ \n จาก :".$rs['dept_name']."\nสาเหตุ :".$title."";
    line_notify($Token, $message);
}

if($op == 'update'){
    $id = mysqli_real_escape_string($mysqli,$_REQUEST['id']);
    $cause = mysqli_real_escape_string($mysqli,$_REQUEST['cause']);
    $fix = mysqli_real_escape_string($mysqli,$_REQUEST['fix']);
    $status = mysqli_real_escape_string($mysqli,$_REQUEST['status']);
    $support = mysqli_real_escape_string($mysqli,$_REQUEST['support']);
    $end = date("Y-m-d H:i:s");
    $data = array(
        "help_cause"=>$cause,
        "help_fix"=>$fix,
        "help_status"=>$status,
        "help_support"=>$support,
        "help_end"=>$end
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