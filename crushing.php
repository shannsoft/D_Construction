<?php
include "header.php";
include "sidemenu.php";
$project_id = $_REQUEST['id'];
$result = mysql_query("Select * from tbl_proj_info where PROJ_ID= ".$project_id);
$row = mysql_fetch_array($result);

if(isset($_POST['btn_add'])){
	$c_date = $_REQUEST['date'];
	$c_prod_type = $_REQUEST['prodtype'];
	$c_qty = $_REQUEST['qty'];

	$insertsql = ("INSERT INTO `tbl_crushing` (`CRS_PROJ_ID`, `CRS_DATE`, `CRS_PROD_ID`, `CRS_QTY`) VALUES ($project_id, $c_date, $c_prod_type, $c_qty);");
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
        <small><?php echo $row['PROJ_NAME'];?> : Crushing / Production</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content form_content">

      <!-- Your Page Content Here -->
    <form method="post">
		<div class="form-group">
			<label>Date</label>
			<div class="input-group date">
				<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</div>
				<input type="text" name="date" class="form-control pull-right" id="datepicker">
			</div>
			<!-- /.input group -->
        </div>
		<div class="form-group">
			<label for="Prod_name">Production name</label> 
			<select class="form-control" id="prodtype" name="prodtype">
				<option>Production name</option>
				<?php
					$result=mysql_query("Select * from enm_production_type");
					while ($row=mysql_fetch_array($result)) {
				?>
					<option value="<?php echo $row['PROD_ID']?>"><?php echo $row['PROD_NAME']?></option>
				<?php
					}					
				?>
			</select>			
		</div>
		<div class="form-group">
			<label for="Qty">Quantity</label>
			<input type="number" class="form-control" id="qty" name="qty" placeholder="Quantity">
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
<script type="text/javascript">
	$(function () {	
		//Date picker
		$('#datepicker').datepicker({
			autoclose: true
		});
	});
</script>		