<?php
include ('../../config/database.php');
include ('../../config/exdate.class.php');
include ('../../api/line_notify.class.php');
include ('../../api/sql.class.php');
include ('../../api/leave.class.php');

$leave = new leave();
$mysqli = connect();
$op = $_REQUEST['op'];

// Add Data
if($op == 'add'){
    $strStartDate = Date2DBDate($_REQUEST['dstart']);
    $strEndDate = Date2DBDate($_REQUEST['dend']);
    $intWorkDay = 0;
    $intHoliday = 0;
    $intTotalDay = ((strtotime($strEndDate) - strtotime($strStartDate))/  ( 60 * 60 * 24 )) + 1;

    while (strtotime($strStartDate) <= strtotime($strEndDate)) {

        $DayOfWeek = date("w", strtotime($strStartDate));
        if($DayOfWeek == 0 or $DayOfWeek ==6){ $intHoliday++; }
        else{ $intWorkDay++; }
        $strStartDate = date ("Y-m-d", strtotime("+1 day", strtotime($strStartDate)));
    }
    if ($_REQUEST['ltime'] == 'half_m' || $_REQUEST['ltime'] == 'half_a'){
        $intWorkDay = $intWorkDay - 0.5;
    }
    if ($_REQUEST['ltime'] == 'half_m'){
        $dstr = mysqli_real_escape_string($mysqli,Date2DBDate($_REQUEST['dstart'])." 08:00:00");
        $dend = mysqli_real_escape_string($mysqli,Date2DBDate($_REQUEST['dend'])." 12:00:00");
        $mail_days = "ลาครึ่งวันเช้า";
    }
    if ($_REQUEST['ltime'] == 'half_a'){
        $dstr = mysqli_real_escape_string($mysqli,Date2DBDate($_REQUEST['dstart'])." 12:00:00");
        $dend = mysqli_real_escape_string($mysqli,Date2DBDate($_REQUEST['dend'])." 16:00:00");
        $mail_days = "ลาครึ่งวันบ่าย";
    }
    if ($_REQUEST['ltime'] == 'full'){
        $dstr = mysqli_real_escape_string($mysqli,Date2DBDate($_REQUEST['dstart'])." 08:00:00");
        $dend = mysqli_real_escape_string($mysqli,Date2DBDate($_REQUEST['dend'])." 16:00:00");
        $mail_days = "ลาเต็มวัน";
    }

    $type = mysqli_real_escape_string($mysqli,$_REQUEST['ltype']);
    $dday = mysqli_real_escape_string($mysqli,$_REQUEST['ltime']);
    $dund = mysqli_real_escape_string($mysqli,$_REQUEST['empuid']);
    $emid = mysqli_real_escape_string($mysqli,$_REQUEST['empid']);
    $note = mysqli_real_escape_string($mysqli,$_REQUEST['empnote']);

    $data = array(
        "leave_type"=>$type,
        "leave_start"=>$dstr,
        "leave_end"=>$dend,
        "leave_num"=>$intWorkDay,
        "leave_days"=>$dday,
        "leave_undertaker"=>$dund,
        "leave_note"=>$note,
        "emp_id"=>$emid
    );
    insertSQL("tb_leave",$data);

    // Get ID Leave
    $sql = "SELECT leave_id FROM tb_leave ORDER BY leave_id DESC LIMIT 1";
    $res = $mysqli->query($sql);
    $data = $res->fetch_assoc();

    // Get Line Token
    $get_emp = $leave->getEmpDetail($emid);
    $get_email = "SELECT emp_line FROM tb_employee WHERE emp_id = '{$get_emp['emp_unit']}'";
    $semail = $mysqli->query($get_email);
    $sdata = $semail->fetch_assoc();
    
    // Get Employee For Check Level
    $data_emp = $leave->getEmpDetail($emid);
    if($data_emp['emp_line']!=""){
        $id=$data['leave_id'];
        $hdata = array(
            "leave_status"=>'header'
        );
        updateSQL("tb_leave",$hdata,"leave_id=$id");
        $surl = "prajin";
    }else{
        $surl = "office";
    }
    // Line Notify
    $Token = $sdata['emp_line'];
    // $Token = "pldQRZreXtqkVFxYGqoEBIBgHySXixuSKriyLNvQz2V";
    $message = "มีรายการขออนุมัติวันลารอดำเนินการ\nรหัส : HR-".$data['leave_id']."\nดำเนินการได้ที่ : https://".$surl.".watchanhospital.com/";
    line_notify($Token, $message);
}