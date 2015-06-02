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

    header('Content-type: application/json');
    echo json_encode(array('cribs'=>$cribArray));

   // for ($i=0; $i < count($cribArray); $i++) {
   // 	echo '[{"titulo": "latlong' . $cribArray[$i]["urlcrib"] . "\n";
   // 	echo '[{"titulo": "'. $cribArray[$i]["urlcrib"] . "\n";
   // 	echo '[{"ubicacion": "'. $cribArray[$i]["ubicacioncrib"] . "\n";

	//echo '}]';


   //     //echo ' var latlong'. $cribArray[$i]["id"] . ' = new google.maps.LatLng('. $cribArray[$i]["ubicacioncrib"] .');';
   //     //echo ' var string'. $cribArray[$i]["id"] . ' = \'<div style="width:200px;" id="content"><a style="font-weight:bold; font-size: 1em;" href="' . $cribArray[$i]["urlcrib"] . '">><h1 style="font-weight:bold; font-size: 1em;" id="firstHeading" class="firstHeading">' . $cribArray[$i]["titulocrib"] . '</h1></a><div id="bodyContent"><img style="max-width:200px;" src="' . $cribArray[$i]["imagenprincipalcrib"] . '"></div>\';';
   //     //echo 'var infowindow'. $cribArray[$i]["id"] .'new google.maps.InfoWindow({ content: contentString . '. $cribArray[$i]["id"] .'});';
  	//	
   // }
?>