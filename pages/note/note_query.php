<?php
include ('../../config/database.php');
include ('../../config/exdate.class.php');
include ('../../api/sql.class.php');

$mysqli = connect();
$op = $_REQUEST['op'];

if($op == 'add'){
    $empid = mysqli_real_escape_string($mysqli,$_REQUEST['empid']);
    $place = mysqli_real_escape_string($mysqli,$_REQUEST['place']);
    $title = mysqli_real_escape_string($mysqli,$_REQUEST['title']);
    $dstr = Date2DBDate($_REQUEST['dstart']);
    $dend = Date2DBDate($_REQUEST['dend']);
    $arr_select = array();
    foreach($_REQUEST['list'] as $list){
        $arr_select[] = $list;
    }
    $condition = implode(",", $arr_select);
    $data = array(
        "note_emp"=>$empid,
        "note_list"=>$condition,
        "note_place"=>$place,
        "note_title"=>$title,
        "note_start"=>$dstr,
        "note_end"=>$dend
    );
    insertSQL("tb_note",$data);
}
?>