<?php
include ('../../config/database.php');
include ('../../config/exdate.class.php');
include ('../../api/sql.class.php');

$mysqli = connect();
$id = $_REQUEST['id'];
// Check Data
    $sql = "SELECT COUNT(*) AS num FROM tb_employee_personal WHERE emp_id = '{$id}'";
    global $mysqli; $res = $mysqli->query($sql); $check = $res->fetch_assoc();
    
    $tel = mysqli_real_escape_string($mysqli,$_REQUEST['emptel']);
    $relation = mysqli_real_escape_string($mysqli,$_REQUEST['relation']);
    $relation_tel = mysqli_real_escape_string($mysqli,$_REQUEST['relation_tel']);
    $address = mysqli_real_escape_string($mysqli,$_REQUEST['address']);
    $relation_address = mysqli_real_escape_string($mysqli,$_REQUEST['relation_address']);

    if($check['num']==0){
    $data = array(
        "emp_id"=>$id,
        "emp_per_address"=>$address,
        "emp_per_tel"=>$tel,
        "emp_per_cperson"=>$relation,
        "emp_per_cperson_tel"=>$relation_tel,
        "emp_per_cperson_address"=>$relation_address
    );
    insertSQL("tb_employee_personal",$data);
}else{
    $data = array(
        "emp_per_address"=>$address,
        "emp_per_tel"=>$tel,
        "emp_per_cperson"=>$relation,
        "emp_per_cperson_tel"=>$relation_tel,
        "emp_per_cperson_address"=>$relation_address
    );
    updateSQL("tb_employee_personal",$data,"emp_id=$id");
}
?>