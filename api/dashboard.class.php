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

    function getChart(){
        $sql = "SELECT
            (SELECT COUNT(*) FROM tb_leave
            WHERE CURDATE() BETWEEN STR_TO_DATE(leave_start, '%Y-%m-%d') AND STR_TO_DATE(leave_end, '%Y-%m-%d')
            AND leave_status = 'approve' AND leave_type = 'sick' GROUP BY leave_type) AS count_sick,
            (SELECT COUNT(*) FROM tb_leave
            WHERE CURDATE() BETWEEN STR_TO_DATE(leave_start, '%Y-%m-%d') AND STR_TO_DATE(leave_end, '%Y-%m-%d')
            AND leave_status = 'approve' AND leave_type = 'busy' GROUP BY leave_type) AS count_busy,
            (SELECT COUNT(*) FROM tb_leave
            WHERE CURDATE() BETWEEN STR_TO_DATE(leave_start, '%Y-%m-%d') AND STR_TO_DATE(leave_end, '%Y-%m-%d')
            AND leave_status = 'approve' AND leave_type = 'vacation' GROUP BY leave_type) AS count_vacation,
            (SELECT COUNT(*) FROM tb_leave
            WHERE CURDATE() BETWEEN STR_TO_DATE(leave_start, '%Y-%m-%d') AND STR_TO_DATE(leave_end, '%Y-%m-%d')
            AND leave_status = 'approve' AND leave_type = 'mate' GROUP BY leave_type) AS count_mate";
        global $mysqli;
        $res = $mysqli->query($sql) or die("SQL Error: <br>".$sql."<br>".$mysqli->error);
        $data = $res->fetch_assoc();
        return $data;
    }

}

?>