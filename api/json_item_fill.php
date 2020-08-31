<?php 
header("Content-type:application/json; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);     

include ('../config/database.php');
$mysqli = connect();
    $sql = "SELECT *
    FROM tb_employee
    WHERE emp_id = '".$_REQUEST['id']."'";
    global $mysqli; 
    $result = $mysqli->query($sql);
    
if($result && $result->num_rows > 0){
    $row = $result->fetch_assoc();
    $data_json[] = array(
        "eposition" => $row['emp_position']);
}

if(isset($data_json)){  
    $json= json_encode($data_json);    
    if(isset($_GET['callback']) && $_GET['callback']!=""){    
    echo $_GET['callback']."(".$json.");";        
    }else{    
    echo $json;    
    }    
}
?>