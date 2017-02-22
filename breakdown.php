<?php
include "header.php";
include "sidemenu.php";
$project_id = $_REQUEST['id'];
$result = mysql_query("Select * from tbl_proj_info where PROJ_ID= ".$project_id);
$row = mysql_fetch_array($result);
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
    <form action="" method="post">
		<div class="form-group">			
			<label for="BD_type">Breakdown Type</label> 
			<select class="form-control" id="triptype">
				<option>Breakdown Type</option>
				<?php
				$result=mysql_query("Select * from enm_breakdown_type");
				while ($row=mysql_fetch_array($result)) {
					 echo"<option value='" . $row['BD_ID'] ."'>" . $row['BD_NAME']."</option>";
				
				}					
				?>
			</select>					
		</div>
		<div class="form-group">
			<label for="forHrs">For hours</label>
			<input type="text" class="form-control" id="for_hrs" placeholder="For Hours">
		</div>
		<div class="form-group">
			<label for="natureofBd">Nature of Breakdown</label>
			<textarea type="text"  class="form-control" name="natureofbreakdown" placeholder="Nature of Breakdown">
			</textarea></br>
		</div>	
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
		