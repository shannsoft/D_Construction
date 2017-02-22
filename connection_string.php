<?php
	ini_set('display_errors',FALSE);
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "db_dconstruction";
	$connection = mysql_connect($host,$user,$password);
	mysql_select_db($db,$connection);
	if ($connection )
	{
		
	}else{
		?><script language="javascript">alert("Is not Connection Database Mysql  !!")</script><?php
	}

?>
