<?php

Class user {

    public function getUser($id){
        $sql = "SELECT * FROM tb_employee
                LEFT JOIN tb_employee_personal ON tb_employee_personal.emp_id = tb_employee.emp_id
                LEFT JOIN tb_employee_leave ON tb_employee_leave.emp_id = tb_employee.emp_id
                LEFT JOIN tb_employee_job ON tb_employee_job.emp_job_id = tb_employee.emp_job
                LEFT JOIN tb_department ON tb_department.dept_id = tb_employee.emp_dept
                LEFT JOIN tb_privilege ON tb_privilege.emp_id = tb_employee.emp_id
                WHERE tb_employee.emp_id = '{$id}'";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
    return $data;
    }
    
}

?>