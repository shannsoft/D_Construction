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
        <small><?php echo $row['PROJ_NAME'];?> : Crushing / Production</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content form_content">

      <!-- Your Page Content Here -->
    <form action="" method="post">
		<div class="form-group">
            <label>Date</label>
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</div>
				<input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
			</div>
            <!-- /.input group -->
        </div>	
		<div class="form-group">
			<label for="Prod_name">Production name</label> 
			<select class="form-control" id="triptype">
				<option>Production name</option>
				<?php
				$result=mysql_query("Select * from enm_production_type");
				while ($row=mysql_fetch_array($result)) {
					 echo"<option value='" . $row['PROD_ID'] ."'>" . $row['PROD_NAME']."</option>";
				
				}					
				?>
			</select>			
		</div>
		<div class="form-group">
			<label for="Qty">Quantity</label>
			<input type="number" class="form-control" id="qty" placeholder="Quantity">
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
		