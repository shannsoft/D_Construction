<?php
	session_start();
	session_destroy();
	echo"<script language=\"javascript\">
		alert(\"Successfully logged out!\");
		document.location=\"project_details.php\";
		</script>";
	exit();

?>