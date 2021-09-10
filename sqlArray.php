<?php
error_reporting(E_ALL);
ini_set('display_errors', FALSE);
ini_set('display_startup_errors', FALSE);

$con = new mysqli($servername,$username,$password,$tableName);
function sqlArray($sql) {
    global $con;
    $result = $con->query($sql);
    $array = array();
    
    $keyResult = $con->query($sql);
    $keyRow = $keyResult->fetch_assoc();
    $keys = array_keys($keyRow);
    
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        $arr = array();
        for ($i = 0; $i < count($keyRow); $i++) {
            $key = $keys[$i];
            $arr[$key] = $row[$i];
        }
        $array[] = $arr;
    }
    return $array;
}
?>
