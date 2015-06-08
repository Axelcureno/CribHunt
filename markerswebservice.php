<?php
include("functions.php");
$sth = mysqli_query($con, "SELECT titulocrib,urlcrib,categoriacrib,latitudcrib,longitudcrib, imagenprincipalcrib FROM cribs");
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}
echo json_encode($rows);
?>