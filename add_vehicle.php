<?php
include "header.php";
include "sidemenu.php";
if(isset($_POST['btn_add'])){
	$v_proj_id = $_REQUEST['p_name'];
    $v_trip_id = $_REQUEST['vtype'];
	$v_no = $_REQUEST['v_no'];
	$v_mileage = $_REQUEST['v_mileage'];
	$insertsql = "INSERT INTO tbl_vehicle_info (`v_proj_id`,`v_trip_id`,`v_no`,`v_mileage`) VALUES ('$v_proj_id','$v_trip_id','$v_no','$v_mileage')"; 
	$queryinsert = mysql_query($insertsql);	
	if ($queryinsert){
		echo"<script language=\"javascript\">
		alert(\"Success!\");
		document.location=\"vehicle_details.php\";
		</script>";
	}
}	
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header form_content">
      <h1>      
        <small>Add Vechile Information</small>
      </h1>
		
    </section>

    <!-- Main content -->
    <section class="content form_content">

      <!-- Your Page Content Here -->
    <form method="post">
		
              <div class="box-body">
                <div class="form-group">
					<label for="VType">Vehicle Type</label> 
					<select class="form-control" id="vtype" name="vtype">
					<option>Trip Type</option>
					<?php
						$result = mysql_query("Select * from enm_trip_type");
						while ($row = mysql_fetch_array($result)) {
					?>
						<option value="<?php echo $row['TRIP_ID']?>"><?php echo $row['TRIP_NAME']?></option>
					<?php
						}					
					?>
					</select>
				</div>
                <div class="form-group">
                  <label for="V_no">Vehicle No</label>                  
				  <input type="text"  class="form-control" name="v_no" id="v_no" placeholder="Vechile No">
                </div>
				<div class="form-group">
                  <label for="V_mileage">Mileage</label>                  
				  <input type="text"  class="form-control" name="v_mileage" id="v_mileage" placeholder="Vechile Mileage">
                </div>
				<div class="form-group">
					<label for="Proj_name">For Project</label> 
					<select class="form-control" id="p_name" name="p_name">
					<option>Project Name</option>
					<?php
						$result = mysql_query("Select * from tbl_proj_info");
						while ($row = mysql_fetch_array($result)) {
					?>
						<option value="<?php echo $row['PROJ_ID']?>"><?php echo $row['PROJ_NAME']?></option>
					<?php
						}					
					?>
					</select>
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
<script type="text/javascript">
	$('#v_mileage').change(function(){
	this.value = parseFloat(this.value).toFixed(2); 
	});
</script>