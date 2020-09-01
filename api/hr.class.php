<?php

Class hr {

    public function getEmployee(){
        $sql = "SELECT * FROM tb_employee
                LEFT JOIN tb_employee_job ON tb_employee_job.emp_job_id = tb_employee.emp_job
                LEFT JOIN tb_department ON tb_department.dept_id = tb_employee.emp_dept
                WHERE emp_status != 'ลาออก'";
        global $mysqli; $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }

    public function editEmployee($id){
        $sql = "SELECT * FROM tb_employee
                WHERE emp_id = {$id}";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
    return $data;    
    }

    public function getEmployeeLeave($id){
        $sql = "SELECT * FROM tb_employee_leave
                WHERE emp_id = {$id}";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
    return $data;    
    }

    public function getDepartment(){
        $sql = "SELECT * FROM tb_department";
        global $mysqli; $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }

    public function getJob(){
        $sql = "SELECT * FROM tb_employee_job";
        global $mysqli; $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }

    function countJob(){
        $sql = "SELECT *,
                COUNT(tb_employee.emp_job) AS total,
                SUM(tb_employee.emp_job = '1') AS job1 , 
                SUM(tb_employee.emp_job = '2') AS job2 ,
                SUM(tb_employee.emp_job = '3') AS job3 ,
                SUM(tb_employee.emp_job = '4') AS job4 ,
                SUM(tb_employee.emp_job = '5') AS job5
                FROM tb_employee_job
                LEFT JOIN tb_employee ON tb_employee.emp_job = tb_employee_job.emp_job_id
                WHERE emp_status != 'ลาออก'
                GROUP BY tb_employee_job.emp_job_id";
        global $mysqli;
            $obj = array();
            $res = $mysqli->query($sql);
            while($data = $res->fetch_assoc()) {
                    $obj[] = $data;
            }
        return $obj;
    }

    function countDept(){
        $sql = "SELECT *,
                COUNT(tb_employee.emp_dept) AS total,
                SUM(tb_employee.emp_dept = '1') AS dept1 , 
                SUM(tb_employee.emp_dept = '2') AS dept2 ,
                SUM(tb_employee.emp_dept = '3') AS dept3 ,
                SUM(tb_employee.emp_dept = '4') AS dept4 ,
                SUM(tb_employee.emp_dept = '5') AS dept5 ,
                SUM(tb_employee.emp_dept = '6') AS dept6 ,
                SUM(tb_employee.emp_dept = '7') AS dept7 ,
                SUM(tb_employee.emp_dept = '8') AS dept8 ,
                SUM(tb_employee.emp_dept = '9') AS dept9 ,
                SUM(tb_employee.emp_dept = '10') AS dept10 ,
                SUM(tb_employee.emp_dept = '11') AS dept11
                FROM tb_department
                LEFT JOIN tb_employee ON tb_employee.emp_dept = tb_department.dept_id
                WHERE emp_status != 'ลาออก'
                GROUP BY tb_department.dept_id";
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