<?php
include ('../../../config/database.php');
include ('../../../config/exdate.class.php');
include ('../../../api/line_notify.class.php');
include ('../../../api/sql.class.php');
include ('../../../api/leave.class.php');

$leave = new leave();
$mysqli = connect();
$op = $_REQUEST['op'];

// Add Special Leave
if($op == 'addLeave'){
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

    // @move_uploaded_file($_FILES["formfile"]["tmp_name"],"files/".$_FILES["formfile"]["name"]);
    $type = mysqli_real_escape_string($mysqli,$_REQUEST['ltype']);
    $dday = mysqli_real_escape_string($mysqli,$_REQUEST['ltime']);
    $emid = mysqli_real_escape_string($mysqli,$_REQUEST['empuid']);
    $dund = mysqli_real_escape_string($mysqli,$_REQUEST['empuid2']);

    $data = array(
        "leave_type"=>$type,
        "leave_start"=>$dstr,
        "leave_end"=>$dend,
        "leave_num"=>$intWorkDay,
        "leave_days"=>$dday,
        "leave_undertaker"=>$dund,
        "leave_note"=>"ลงวันลาฉุกเฉิน",
        "leave_hnote"=>"ลงวันลาฉุกเฉิน",
        "leave_dnote"=>"ลงวันลาฉุกเฉิน",
        "emp_id"=>$emid,
        // "leave_files"=>$_FILES["formfile"]["name"],
        "leave_status"=>"approve"
    );
    insertSQL("tb_leave",$data);
}

// Cancel Leave
if($op == 'cancle'){
    $id = $_REQUEST['id'];
    $data = array(
        "leave_status"=>"cancle",
    );
    updateSQL("tb_leave",$data,"leave_id=$id");
}

?>