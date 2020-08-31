<?php
include ('../../config/database.php');
include ('../../config/exdate.class.php');
include ('../../api/sql.class.php');

$mysqli = connect();
$id = $_REQUEST['id'];
$pass = mysqli_real_escape_string($mysqli,$_REQUEST['newPass']);
$hash_pass = password_hash($pass,PASSWORD_DEFAULT);

$data = array(
    "emp_password"=>$hash_pass,
);
updateSQL("tb_employee",$data,"emp_id=$id");

session_start();
session_destroy();
header('Location: ?');
exit();
?>