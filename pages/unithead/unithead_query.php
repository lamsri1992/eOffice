<?php
include ('../../config/database.php');
include ('../../config/exdate.class.php');
include ('../../api/sql.class.php');
include ('../../api/line_notify.class.php');

$mysqli = connect();
$id = $_REQUEST['id'];

if($_REQUEST['chk_approve']=="Y"){
    // Update Status Header = Approve
    $hnote = mysqli_real_escape_string($mysqli,$_REQUEST['head_note']);
    $data = array(
        "leave_status"=>'header',
        "leave_hnote"=>$hnote
    );
    updateSQL("tb_leave",$data,"leave_id=$id");
    // Send Line To Prajin Director
    $Token = "rJeUj5NcPslNXbv6sE8x2KMKXdbkyyfba2kNebCcyub";
    $message = "มีรายการขออนุมัติวันลารอดำเนินการ\nรหัส : HR-".$id."\nดำเนินการได้ที่ : https://prajin.watchanhospital.com/";
    line_notify($Token, $message);
}else{
    // Not Approve : Header
    $hnote = mysqli_real_escape_string($mysqli,$_REQUEST['head_note']);
    $data = array(
        "leave_status"=>'header_disapproved',
        "leave_hnote"=>$hnote
    );
    updateSQL("tb_leave",$data,"leave_id=$id");
}
?>