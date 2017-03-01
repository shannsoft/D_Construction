<?php
include "connection_string.php";
if(isset($_GET['triptype'])){
	$tripID = $_GET['triptype'];
	getVehicleList($tripID);
}

function getVehicleList($tripID){
	$result = mysql_query("Select * from tbl_vehicle_info where v_trip_id = $tripID");
	$data = array();
	//$row = mysql_fetch_array($result);
	while($row = mysql_fetch_array($result)){
		array_push($data,$row);
	}
	
	echo json_encode($data);
}

?>
