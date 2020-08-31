<?php
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);     

include ('../config/database.php');
$mysqli = connect();

if(isset($_GET['q']) && $_GET['q']!=""){
    $q = urldecode($_GET["q"]);
    $q = $mysqli->real_escape_string($q);
     
    $pagesize = 10;
    $table_db="tb_employee";
    $find_field="emp_name";
    $sql = "
    SELECT
    emp_id,
    emp_name
    FROM $table_db 
    WHERE LOCATE('$q', $find_field) > 0
    ORDER BY LOCATE('$q', $find_field), $find_field LIMIT $pagesize";
    global $mysqli;
    $result = $mysqli->query($sql);
    if($result && $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $id = $row["emp_id"];
            $name = trim($row["emp_name"]);
            $name = addslashes($name);
            $name = htmlspecialchars($name);
            $display_name = preg_replace("/(" .$q. ")/i", "<b>$1</b>", $name);
            echo "
                <li onselect=\"this.setText('$name').setValue('$id')\">
                    $display_name
                </li>
            ";  
        }
    }
    $mysqli->close();
}
?>