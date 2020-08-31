<?php

Class Helpdesk {
    
    function getList(){
        $sql = "SELECT * FROM tb_helpdesk
                LEFT JOIN tb_employee ON tb_employee.emp_id = tb_helpdesk.help_create
                LEFT JOIN tb_department ON tb_department.dept_id = tb_helpdesk.help_dept
                LEFT JOIN tb_helpdesk_rate ON tb_helpdesk_rate.help_rate = tb_helpdesk.help_id";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }

    function getListEdit($id){
        $sql = "SELECT * 
                FROM tb_helpdesk
                LEFT JOIN tb_employee ON tb_employee.emp_id = tb_helpdesk.help_create
                LEFT JOIN tb_department ON tb_department.dept_id = tb_helpdesk.help_dept
                LEFT JOIN tb_helpdesk_rate ON tb_helpdesk_rate.help_rate = tb_helpdesk.help_id
                WHERE tb_helpdesk.help_id = '{$id}'";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
    return $data;   
    }

    function getReport(){
        $sql = "SELECT * FROM tb_report
                LEFT JOIN tb_employee ON tb_employee.emp_id = tb_report.report_create
                LEFT JOIN tb_department ON tb_department.dept_id = tb_report.report_dept";
                // LEFT JOIN tb_report_rate ON tb_report_rate.report_rate = tb_report.report_id";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }
    
}

?>