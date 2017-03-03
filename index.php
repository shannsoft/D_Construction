<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>D Construction | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
</head>
<?php
	include "connection_string.php";	
	$u_name = $_REQUEST['user_name'];
	$u_password = $_REQUEST['password'];
	$result = mysql_query("SELECT * FROM tbl_user WHERE user_name = '$u_name' and user_password = '$u_password'");
	$row  = mysql_fetch_array($result);
	if(is_array($row)) {
		$_SESSION["user_id"] = $row[user_id];
		$_SESSION["user_name"] = $row[user_name];
	} 
	else {
		$message = "Invalid Username or Password!";
	}
	if(isset($_SESSION["user_id"])) {
	echo"<script language=\"javascript\">
		alert(\"Welcome!\");
		document.location=\"project_details.php\";
		</script>";
	}
?>
	
?>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="index.html"><b>D</b>Construction</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>
			<form method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" id="user_name" name="user_name" placeholder="user_name">
					
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck"> 
							<label>
							  <input type="checkbox"> Remember Me
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
				<!-- /.col -->
				</div>
			</form>
			
		</div>
	  <!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 2.2.3 -->
	<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="plugins/iCheck/icheck.min.js"></script>
	<script>
	  $(function () {
		$('input').iCheck({
		  checkboxClass: 'icheckbox_square-blue',
		  radioClass: 'iradio_square-blue',
		  increaseArea: '20%' // optional
		});
	  });
	</script>
</body>
</html>
