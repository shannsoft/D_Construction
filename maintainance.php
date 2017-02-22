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
        <small><?php echo $row['PROJ_NAME'];?> : Maintainance</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content form_content">

      <!-- Your Page Content Here -->
    <form action="" method="post">
		<div class="form-group">
			<label for="BD_type">Maintainance Type</label> 
			<select class="form-control" id="triptype">
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
			<textarea type="text"  class="form-control" name="desc" placeholder="Description">
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
		