<?php

Class unitHead {

    public function getEmpDept($id){
        $sql = "SELECT * FROM tb_employee
                LEFT JOIN tb_department ON tb_department.dept_id = tb_employee.emp_dept
                LEFT JOIN tb_employee_job ON tb_employee_job.emp_job_id = tb_employee.emp_job
                WHERE tb_employee.emp_dept = '{$id}'";
        global $mysqli; $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }

    public function countEmp($id){
        $sql = "SELECT COUNT(*) AS num FROM tb_employee
                WHERE tb_employee.emp_dept = '{$id}'";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
    return $data;
    }

    function getLeaveDept($id){
        $sql = "SELECT * FROM tb_leave
                LEFT JOIN tb_employee ON tb_employee.emp_id = tb_leave.emp_id
                WHERE tb_leave.leave_status IS NULL
                AND tb_employee.emp_dept = '{$id}'
                ORDER BY tb_leave.leave_id DESC";
                global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }

    function countLeaveDept($id){
        $sql = "SELECT COUNT(*) AS num FROM tb_leave
                LEFT JOIN tb_employee ON tb_employee.emp_id = tb_leave.emp_id
                WHERE tb_leave.leave_status IS NULL
                AND tb_employee.emp_dept = '{$id}'";
        global $mysqli;
        $res = $mysqli->query($sql) or die("SQL Error: <br>".$sql."<br>".$mysqli->error);
        $data = $res->fetch_assoc();
    return $data;
    }
    
}

?>