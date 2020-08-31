<?php

Class form {
    
    function getForm(){
        $sql = "SELECT * FROM tb_form";
        global $mysqli;
        $obj = array();
        $res = $mysqli->query($sql);
        while($data = $res->fetch_assoc()) {
            $obj[] = $data;
        }
    return $obj;
    }

    function getFormEdit($id){
        $sql = "SELECT * 
                FROM tb_form
                WHERE form_id = '{$id}'";
        global $mysqli;
        $res = $mysqli->query($sql);
        $data = $res->fetch_assoc();
    return $data;   
    }
    
}

?>