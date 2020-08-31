<?php

Class note {
    
    function getNote(){
        $sql = "SELECT * FROM tb_note";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }

    function getNotePreview($id){
        $sql = "SELECT * 
                FROM tb_note
                LEFT JOIN tb_employee ON tb_employee.emp_id = tb_note.note_emp
                LEFT JOIN tb_department ON tb_department.dept_id = tb_employee.emp_dept
                WHERE note_id = '{$id}'";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
    return $data;   
    }

    function getNoteList($id){
        $sql = "SELECT emp_id,emp_name,emp_position
                FROM tb_employee
                WHERE emp_id IN ($id)";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }
    
    function getNoteHeader($id){
        $sql = "SELECT * 
                FROM tb_employee
                WHERE emp_id = '{$id}'";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
    return $data;   
    }

    public function getListEmployee(){
        $sql = "SELECT emp_id,emp_name FROM tb_employee";
        global $mysqli; $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }

}

?>