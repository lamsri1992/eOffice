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
            LEFT JOIN tb_worktime_status ON tb_worktime_status.wstat_id  = tb_worktime.work_status
            WHERE tb_worktime.work_time LIKE '%{$date}%'";
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

    function getTime(){
        $sql = "SELECT
            (SELECT COUNT(*) FROM tb_worktime WHERE STR_TO_DATE(work_time, '%Y-%m-%d') = CURDATE() AND work_status = '0' GROUP BY work_status) AS count_late,
            (SELECT COUNT(*) FROM tb_worktime WHERE STR_TO_DATE(work_time, '%Y-%m-%d') = CURDATE() AND work_status = '1' GROUP BY work_status) AS count_normal,
            (SELECT COUNT(*) FROM tb_worktime WHERE STR_TO_DATE(work_time, '%Y-%m-%d') = CURDATE() AND work_status = '2' GROUP BY work_status) AS count_early,
            (SELECT COUNT(*) FROM tb_worktime WHERE STR_TO_DATE(work_time, '%Y-%m-%d') = CURDATE() AND work_status = '3' GROUP BY work_status) AS count_night";
        global $mysqli;
        $res = $mysqli->query($sql) or die("SQL Error: <br>".$sql."<br>".$mysqli->error);
        $data = $res->fetch_assoc();
        return $data;
    }

    function getTimeLost($date){
        $sql = "SELECT tb_employee.emp_name,tb_employee.emp_barcode,tb_employee.emp_position,tb_department.dept_name
            FROM tb_employee
            LEFT JOIN tb_department ON tb_department.dept_id = tb_employee.emp_dept
            WHERE NOT tb_employee.emp_barcode IN(SELECT tb_worktime.emp_barcode FROM tb_worktime WHERE DATE(tb_worktime.work_time) = '{$date}')
            AND tb_employee.emp_status = 'ปฏิบัติงาน'";
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