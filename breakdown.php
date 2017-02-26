<?php
include "header.php";
include "sidemenu.php";
$project_id = $_REQUEST['id'];
$result = mysql_query("Select * from tbl_proj_info where PROJ_ID= ".$project_id);
$row = mysql_fetch_array($result);

if(isset($_POST['btn_add'])){
	$bd_type = $_REQUEST['bd_type'];
	$for_hrs = $_REQUEST['for_hrs'];
	$bd_nature = $_REQUEST['natureofbd'];
	
	$insertsql = "INSERT INTO `tbl_breakdown` (`bd_proj_id`, `bd_bd_id`, `bd_hrs`, `bd_nat`) VALUES ('$project_id', '$bd_type', '$for_hrs', '$bd_nature')";
	$queryinsert = mysql_query($insertsql,$connection);	
	
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
        <small><?php echo $row['PROJ_NAME'];?> : Breakdown</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content form_content">

      <!-- Your Page Content Here -->
    <form method="post">
		<div class="form-group">			
			<label for="bd_type">Breakdown Type</label> 
			<select class="form-control" id="bd_type" name="bd_type">
				<option>Breakdown Type</option>
				<?php
					$result=mysql_query("Select * from enm_breakdown_type");
					while ($row=mysql_fetch_array($result)) {
				?>					 
					<option value="<?php echo $row['BD_ID']?>"><?php echo $row['BD_NAME']?></option>
				<?php
					}					
				?>
			</select>					
		</div>
		<div class="form-group">
			<label for="for_hrs">For hours</label>
			<input type="number" class="form-control" id="for_hrs" name="for_hrs" placeholder="For Hours">
		</div>
		<div class="form-group">
			<label for="natureofbd">Nature of Breakdown</label>
			<textarea type="text"  class="form-control" id="natureofbd" name="natureofbd" placeholder="Nature of Breakdown">
			</textarea></br>
		</div>	
		<div class="">			  
                <button type="submit" name="btn_add" class="btn btn-primary">Submit</button>
				<a class="btn btn-danger" href="report_input.php" type="submit" name="btn_add1">Report<a>
        </div>
	</form>
  </div>	
    </section>	           
    <!-- /.content -->
  </div>
<?php
	include "footer.php";
?>	
		