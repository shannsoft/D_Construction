<?php
include "header.php";
include "sidemenu.php";
$project_id = $_REQUEST['id'];
$result = mysql_query("Select * from tbl_proj_info where PROJ_ID= ".$project_id);
$row = mysql_fetch_array($result);

if(isset($_POST['btn_add'])){
	$s_trip_type = $_REQUEST['triptype'];
	$linearray = explode(', ', $s_trip_type);
	$s_v_id = $_REQUEST['v_no'];
	$s_no_trips = $_REQUEST['no_of_trips'];	
	$s_qty = $_REQUEST['total_qty'];
	$s_date = $_REQUEST['todaydate'];
	$insertsql = ("INSERT INTO `tbl_spl_rcvd` (`SPL_PROJ_ID`, `SPL_V_ID`, `SPL_NO_OF_TRIP`, `SPL_TOT_QTY`, `SPL_DATE`) VALUES ('$project_id', '$s_v_id' , '$s_no_trips', '$s_qty', '$s_date');");
	echo $insertsql;
	$queryinsert = mysql_query($insertsql);	
	if ($queryinsert){
		echo"<script language=\"javascript\">
		alert(\"Success!\");
		document.location=\"project_details.php\";
		</script>";
	}
	$_REQUEST = $_POST = $_GET = NULL;	
}	

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
				<div class="radio">
				  <input type="radio" onchange="hideCubic(this)" value="weight" name="optradio" checked>Wight bridge
				</div>
				<div class="radio">
				  <input type="radio" onchange="hideCubic(this)" value="cubic" name="optradio">Cubic meter
				</div>
			</div>
			
			<div class="form-group">
				<label for="TripType">Trip Type</label> 
					<select class="form-control" id="triptype" name="triptype" onchange="get_tripid(this.value)">
					<option>Trip Type</option>
					<?php
						$result = mysql_query("Select * from enm_trip_type");
						while ($row = mysql_fetch_array($result)) {
					?>
						<option value="<?php echo $row['TRIP_ID'],', ',$row['TRIP_QTY'];?>"><?php echo $row['TRIP_NAME']?></option>
					<?php
						}					
					?>
					</select>
			</div>
			<div class="form-group">
				<label for="TripType">Vehicle No.</label> 
				<select class="form-control" id="v_no" name="v_no">
					<option>Vehicle no.</option>
				</select>
			</div>
			<div class="form-group">
				<label for="NoOfTrip">No of Trips</label>
				<input type="text" readOnly class="form-control" id="no_of_trips" value="<?php echo 1?>" name="no_of_trips" placeholder="No of trips">
			</div>
			<div class="form-group">			
				<label for="QtyOfTrip">Quantity of trips</label>
				<input readOnly type="number" class="form-control" name="qty_of_trips" id="qty_of_trips" placeholder="Quantity of trips">
			</div>
			<div class="form-group">			
				<label for="TotalQty">Total Quantity</label>
				<input type="number" class="form-control" name="total_qty" id="total_qty" placeholder="Total Quantity">
			</div>			
			<div class="form-group">
				<label for="date"> <small>date </small></label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<?php $now = new DateTime();
						?>
						<input readOnly type="text" class="form-control pull-right" id="todaydate" name="todaydate" value="<?php echo $now->format('Y-m-d') ?>">
					</div>		
			</div>
			<div class="">			  
                <button type="submit" name="btn_add" class="btn btn-primary">Submit</button>			
				<a class="btn btn-danger" href="spall_daily_report.php?id=<?php echo $project_id?>" type="submit" name="btn_add1">Daily Report</a>
				<a class="btn btn-warning" href="spallHSD_report.php?id=<?php echo $project_id?>" type="submit" name="btn_add2"> HSD Report</a>
            </div>
	</form>
</section>
</div>	
<?php
	include "footer.php";
?>	

<script type="text/javascript">
 var trip_quantity;
 var quantity_type = 'weight';
 var total_quantity = 0;
	$(function () {	
		//Date picker
		$('#date').datepicker({
			autoclose: true,
			format: 'yyyy-mm-dd'
		});
	});
	function hideCubic(x) {
	  quantity_type = x.value;
	  if(x.value == "weight"){
		$('#total_qty').attr("readOnly",false);
		$('#total_qty').val('');
	  }
	  else{
		$('#total_qty').attr("readOnly",true);
		$('#total_qty').val(total_quantity.toFixed(2));
	  }
	 }
	 function get_tripid(id){
		 var idArray = id.split(', ');
		 total_quantity =  idArray[1]*2.2;
		 if(quantity_type == 'cubic'){
			$('#total_qty').val(total_quantity.toFixed(2));
		 }
		 else{
			$('#total_qty').val(''); 
		 }
		 $('#qty_of_trips').val(idArray[1]);
		 $('#v_no').html('');
		 $('#v_no').append('<option>Vehicle no.</option>');
		$.ajax({
			type: "GET",
			url: "function.php",
			data: "triptype=" + idArray[0],
			success: function(result) {
				var vehicle_list = JSON.parse(result);
				for(i = 0; i < vehicle_list.length; i++){
					$('#v_no').append('<option value="'+vehicle_list[i].v_id+'">'+vehicle_list[i].v_no+'</option>');
				}
			}
		});
		
	 }

</script>