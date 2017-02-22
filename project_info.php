<?php
include "header.php";
include "sidemenu.php";
if(isset($_POST['btn_add'])){
	$p_info = $_REQUEST['proj_info'];
    $p_addr = $_REQUEST['proj_address'];
	$insertsql = "INSERT INTO tbl_proj_info(`PROJ_NAME`,`PROJ_ADDR`) VALUES ('$p_info','$p_addr')"; 
	$queryinsert = mysql_query($insertsql);	
	if ($queryinsert){
		echo"<script language=\"javascript\">
		alert(\"Success!\");
		document.location=\"project_details.php\";
		</script>";
	}
}	
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header form_content">
      <h1>      
        <small>Project Information</small>
      </h1>
		
    </section>

    <!-- Main content -->
    <section class="content form_content">

      <!-- Your Page Content Here -->
    <form method="post">
		
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Project Information</label>
                  <input type="text" class="form-control" name="proj_info" id="proj_info" placeholder="Project Information">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>                  
				  <textarea type="Address"  class="form-control" name="proj_address" placeholder="Address">
				</textarea></br>
                </div>

              <!-- /.box-body -->

              <div class="">			  
                <button type="submit" name="btn_add" class="btn btn-primary">Submit</button>
              </div>
			 
           
    </form>
  </div>	
    </section>
	            
    <!-- /.content -->
  </div>
<?php
	include "footer.php";
?>	
		