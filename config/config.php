<?php
date_default_timezone_set("Asia/Bangkok");
session_start();
error_reporting(E_ALL & ~E_NOTICE);
if (!isset($_SESSION['employee'])){
    header( "location: login.php" );
    exit(0);
}
include ('config/database.php');
include ('config/exdate.class.php');
include ('api/dashboard.class.php');
include ('api/leave.class.php');
include ('api/user.class.php');
include ('api/hr.class.php');
include ('api/form.class.php');
include ('api/note.class.php');
include ('api/unithead.class.php');
include ('api/helpdesk.class.php');
include ('api/worktime.class.php');

$mysqli = connect();
$dashboard = new dashboard();
$leave = new leave();
$user = new user();
$hr = new hr();
$form = new form();
$note = new note();
$unithead = new unitHead();
$helpdesk = new Helpdesk();
$worktime = new Worktime();

$empSession = $user->getUser($_SESSION['employee']);
?>