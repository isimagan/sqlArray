<?php
error_reporting(E_ALL);
ini_set('display_errors', FALSE);
ini_set('display_startup_errors', FALSE);

$con = new mysqli("isimagan.priv.no.mysql","isimagan_priv_n","0412trollA","isimagan_priv_n");
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

$teams = array("Senior Herrer","Senior Damer","G1996","J1998","G1999","J2000","G2002","El-innebandy");

function checkIfLoggedIn($brukerID, $undermapper) {
	$maps = '';
	for ($i = 0; $i < $undermapper; $i++) {
		$maps .= '../';
	}
	$maps .= 'login.php';
	if (!isset($brukerID)) {
		header("Location: " . $maps);
	}
}

function loginRequests() {
	$array = sqlArray("SELECT * FROM bvhif_brukere WHERE godkjent=0");
	return '<span class="badge">' . count($array) . '</span>';
}
?>