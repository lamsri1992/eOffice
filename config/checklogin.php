<?php
session_start();
include ('database.php');
$mysqli = connect();

$user = mysqli_real_escape_string($mysqli,$_POST['barcode']);
$pass = mysqli_real_escape_string($mysqli,$_POST['password']);
$hash = $pass;

    $sql = "SELECT * 
            FROM tb_employee
            WHERE tb_employee.emp_barcode = '{$user}'";

    global $mysqli;
        $res = $mysqli->query($sql);
        $obj = $res->fetch_assoc();

    if (password_verify($hash,$obj['emp_password'])){
        $_SESSION['employee'] = $obj['emp_id'];
        header('Location: ../?');
    }else{
        $_SESSION['authen'] = 'fail';
        header('Location: ../login.php');
        exit();
    }
?>