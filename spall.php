<?php
include "header.php";
include "sidemenu.php";
$project_id = $_REQUEST['id'];
$result = mysql_query("Select * from tbl_proj_info where PROJ_ID= ".$project_id);
$row = mysql_fetch_array($result);



if(isset($_POST['btn_add'])){
	$s_trip_type = $_REQUEST['triptype'];
	$s_no_trips = $REQUEST['no_of_trips'];
	$s_date = $_REQUEST['date'];
	$s_trip_type = $_REQUEST['triptype'];
	
	$result1 = mysql_query("Select * from enm_trip_type where TRIP_ID= ".$s_trip_type);
	$row1 = mysql_fetch_array($result);
	
	$qty_of_trip = $row1['TRIP_QTY'];
	$total_qty = $qty_of_trip * $s_no_trips;
	echo $qty_of_trip;
	echo $total_qty;
	$insertsql = ("INSERT INTO `tbl_spl_rcvd` (`SPL_PROJ_ID`, `SPL_TRIP_TYPE`, `SPL_NO_OF_TRIP`, `SPL_QTY_OF_TRIP`, `SPL_TOT_QTY`, `SPL_DATE`) VALUES ($project_id, $s_trip_type, $s_no_trips, $qty_of_trip , $total_qty , $s_date);");
	$queryinsert = mysql_query($insertsql);	
	if ($queryinsert){
		echo"<script language=\"javascript\">
		alert(\"Success!\");
		document.location=\"project_details.php\";
		</script>";
	}	
}	
$result1 = mysql_query("Select * from enm_trip_type where TRIP_ID= ".$project_id);
$row1 = mysql_fetch_array($result);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header form_content">
	<h1>      
		<small><?php echo $row['PROJ_NAME'];?> : Spall Received</small>		
	</h1>
</section>
<!-- Main content -->
<section class="content form_content">
    <!-- Your Page Content Here -->
    <form method="post">	
		<div class="box-body">
			<div class="form-group">
				<label for="TripType">Trip Type</label> 
					<select class="form-control" id="triptype" name="triptype" onchange="myFunction()">
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
				<label for="NoOfTrip">No of Trips</label>
				<input type="text" class="form-control" id="no_of_trips" name="no_of_trips" placeholder="No of trips">
			</div>
			<div class="form-group">			
				<label for="QtyOfTrip">Quantity of trips</label>
				<input disabled type="number" class="form-control" id="qty_of_trips" placeholder="Quantity of trips">
			</div>
			<div class="form-group">			
				<label for="TotalQty">Total Quantity</label>
				<input disabled type="number" class="form-control" id="total_qty" placeholder="Total Quantity">
			</div>
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
			<div class="">			  
                <button type="submit" name="btn_add" class="btn btn-primary">Submit</button>
            </div>
	</form>
</section>
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