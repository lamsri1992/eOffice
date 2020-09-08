<?php
	$menu = $_GET['menu'];
    if($menu=='main' || $menu==''){ $amain='active'; }
    if($menu=='e-Leave' || $menu=='e-Leave.Admin' || $menu=='leaveReport.Job' || $menu=='leaveReport.Department' || $menu=='leaveReport.Person'){ $aleave='active';}
    if($menu=='e-Employee'){ $aemployee='active';}
    if($menu=='e-Form'){ $aform='active';}
    if($menu=='e-Manual'){ $amanual='active';}
    if($menu=='e-Note'){ $anote='active';}
    if($menu=='e-Helpdesk'){ $aehelpdesk='active';}
    if($menu=='e-Report'){ $aereport='active';}
    if($menu=='e-Supplies'){ $aesupplies='active';}
    if($menu=='e-Worktime' || $menu=='Worktime-Report'){ $awork='active';}
?>