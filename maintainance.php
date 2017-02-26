<?php
include "header.php";
include "sidemenu.php";
$project_id = $_REQUEST['id'];
$result = mysql_query("Select * from tbl_proj_info where PROJ_ID= ".$project_id);
$row = mysql_fetch_array($result);

if(isset($_POST['btn_add'])){
	$m_type = $_REQUEST['mtype'];
	$m_desc = $_REQUEST['desc'];

	$insertsql = ("INSERT INTO `tbl_maintenance` (`MAIN_PROJ_ID`, `MAIN_MT_ID`, `MAIN_DESC`) VALUES ('$project_id' ,'$m_type' , '$m_desc');");
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
        <small><?php echo $row['PROJ_NAME'];?> : Maintainance</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content form_content">

      <!-- Your Page Content Here -->
    <form method="post">
		<div class="form-group">
			<label for="mtype">Maintainance Type</label> 
			<select class="form-control" id="mtype" name="mtype">
				<option>Maintainance Type</option>
				<?php
				$result=mysql_query("Select * from enm_maintenance_type");
				while ($row=mysql_fetch_array($result)) {
					 echo"<option value='" . $row['MT_ID'] ."'>" . $row['MT_NAME']."</option>";
				
				}					
				?>
			</select>					
		</div>
		<div class="form-group">	
			<label for="desc">Description</label>
			<textarea type="text"  class="form-control" id="desc" name="desc" placeholder="Description">
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
		