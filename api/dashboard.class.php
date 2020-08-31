<?php

Class dashboard {

    function getNews(){
        $sql = "SELECT * FROM tb_news
                ORDER BY news_date DESC
                LIMIT 5";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
        return $obj;
    }

    function getCalendar(){
        $sql = "SELECT * FROM tb_leave
                LEFT JOIN tb_employee ON tb_employee.emp_id = tb_leave.emp_id
                WHERE tb_leave.leave_status = 'approve'
                ORDER BY leave_id DESC";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
        return $obj;
    }


    function getAccessTime($date){
    $sql = "SELECT * FROM tb_worktime
            LEFT JOIN tb_employee ON tb_employee.emp_barcode = tb_worktime.emp_barcode
            LEFT JOIN tb_department ON tb_department.dept_id = tb_employee.emp_dept
            WHERE tb_worktime.work_in LIKE '%{$date}%'";
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