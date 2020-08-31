<?php
include ('../../config/database.php');
include ('../../config/exdate.class.php');
include ('../../api/sql.class.php');

$mysqli = connect();
$op = $_REQUEST['op'];

// Add Data
if($op == 'add'){
    $name = mysqli_real_escape_string($mysqli,$_REQUEST['empname']);
    $dept = mysqli_real_escape_string($mysqli,$_REQUEST['dept']);
    $ejob = mysqli_real_escape_string($mysqli,$_REQUEST['empjob']);
    $posi = mysqli_real_escape_string($mysqli,$_REQUEST['emppos']);
    $idcd = mysqli_real_escape_string($mysqli,$_REQUEST['empid']);
    $workdate = Date2DBDate($_REQUEST['empstart']);
    if($dept=='1'){$unit='19';}
    if($dept=='2'){$unit='11';}
    if($dept=='3'){$unit='5';}
    if($dept=='4'){$unit='23';}
    if($dept=='5'){$unit='12';}
    if($dept=='6'){$unit='16';}
    if($dept=='7'){$unit='15';}
    if($dept=='8'){$unit='35';}
    if($dept=='9'){$unit='4';}
    if($dept=='10'){$unit='24';}
    if($dept=='11'){$unit='1';}
    $data = array(
        "emp_name"=>$name,
        "emp_dept"=>$dept,
        "emp_job"=>$ejob,
        "emp_position"=>$posi,
        "emp_workstart"=>$workdate,
        "emp_barcode"=>$idcd,
        "emp_unit"=>$unit
    );
    insertSQL("tb_employee",$data);
}

// Edit Data
if($op == 'edit'){
    $id = $_REQUEST['id'];
    $name = mysqli_real_escape_string($mysqli,$_REQUEST['empname']);
    $dept = mysqli_real_escape_string($mysqli,$_REQUEST['dept']);
    $ejob = mysqli_real_escape_string($mysqli,$_REQUEST['empjob']);
    $posi = mysqli_real_escape_string($mysqli,$_REQUEST['emppos']);
    $dstr = mysqli_real_escape_string($mysqli,$_REQUEST['empstart']);
    $ecode = mysqli_real_escape_string($mysqli,$_REQUEST['empid']);
    $data = array(
        "emp_name"=>$name,
        "emp_dept"=>$dept,
        "emp_job"=>$ejob,
        "emp_position"=>$posi,
        "emp_workstart"=>$dstr,
        "emp_barcode"=>$ecode
    );
    updateSQL("tb_employee",$data,"emp_id=$id");
}
?>