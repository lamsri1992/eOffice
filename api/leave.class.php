<?php

Class leave {

    function leaveCount($id){
        $sql = "SELECT
            (SELECT SUM(leave_num) FROM tb_leave WHERE leave_type = 'sick' AND emp_id = '{$id}' AND leave_status ='approve' GROUP BY emp_id) AS sick,
            (SELECT SUM(leave_num) FROM tb_leave WHERE leave_type = 'busy' AND emp_id = '{$id}' AND leave_status ='approve' GROUP BY emp_id) AS busy,
            (SELECT SUM(leave_num) FROM tb_leave WHERE leave_type = 'vacation' AND emp_id = '{$id}' AND leave_status ='approve' GROUP BY emp_id) AS vacation,
            (SELECT SUM(leave_num) FROM tb_leave WHERE leave_type = 'mate' AND emp_id = '{$id}' AND leave_status ='approve' GROUP BY emp_id) AS mate";
        global $mysqli;
        $res = $mysqli->query($sql) or die("SQL Error: <br>".$sql."<br>".$mysqli->error);
        $data = $res->fetch_assoc();
        return $data;
        }

    function leaveHistory($id){
        $sql = "SELECT * FROM tb_leave
                LEFT JOIN tb_employee ON tb_employee.emp_id = tb_leave.emp_id
                WHERE tb_employee.emp_id = '{$id}'
                ORDER BY tb_leave.leave_id DESC";
        global $mysqli; $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }

    public function getUndertaker(){
        $sql = "SELECT emp_id,emp_name
                FROM tb_employee";
        global $mysqli; $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }

    public function getEmpDetail($id){
        $sql = "SELECT * FROM tb_employee
                WHERE emp_id = {$id}";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
    return $data;    
    }

    function getLeaveList(){
        $sql = "SELECT * FROM tb_leave
                LEFT JOIN tb_employee ON tb_employee.emp_id = tb_leave.emp_id
                LEFT JOIN tb_department ON tb_department.dept_id = tb_employee.emp_dept";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
        return $obj;
    }

    public function getLeaveDetail($id){
        $sql = "SELECT * FROM tb_leave
                LEFT JOIN tb_employee ON tb_employee.emp_id = tb_leave.emp_id
                LEFT JOIN tb_department ON tb_department.dept_id = tb_employee.emp_dept
                WHERE tb_leave.leave_id = {$id}";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
    return $data;    
    }
    
}

?>