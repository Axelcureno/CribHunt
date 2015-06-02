<?php
	include("functions.php");
	include("dbcon.php");

$cribArray = array();
$index = 0;
$sql = "SELECT * FROM cribs";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //$cribArray[$index] = $row;
        //$index++;
        $cribArray[] = array('crib'=>$row);
    }
} else {
    echo "0 resultados";
}

echo json_encode($rows);
?>