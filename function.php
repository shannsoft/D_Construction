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

if($_GET['logout'])
{
    session_start();
    //remove PHPSESSID from browser
    if ( isset( $_COOKIE[session_name()] ) )
    setcookie( session_name(), "", time()-3600, "/" );
    //clear session from globals
    $_SESSION = array();
    //clear session from disk
    echo session_destroy() ? "Successfully Logged Out";
    exit;
	echo"<script language=\"javascript\">
		;
		document.location=\"index.php\";
		</script>";
}
?>
