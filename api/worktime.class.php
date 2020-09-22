<?php 

Class Worktime{

    function getAccessTimeAll(){
        $sql = "SELECT * FROM tb_worktime
            LEFT JOIN tb_employee ON tb_employee.emp_barcode = tb_worktime.emp_barcode
            LEFT JOIN tb_department ON tb_department.dept_id = tb_employee.emp_dept
            LEFT JOIN tb_worktime_status ON tb_worktime_status.wstat_id  = tb_worktime.work_status";
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