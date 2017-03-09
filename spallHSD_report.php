<?php
	include "header.php";
	include "sidemenu.php";
	$project_id = $_REQUEST['id'];
	
if(isset($_POST['btn_add'])){
	$ctr = 1;
	$total_qty = 0;
	$s_start_date = $_REQUEST['start_date'];
	$s_end_date = $_REQUEST['end_date'];
	$s_v_id = $_REQUEST['v_no'];
	$s_trip_type = $_REQUEST['triptype'];
	$trip_arrey = explode(', ', $s_trip_type);
	if ($s_start_date !='' && $s_end_date == ''){
		$query = "Select * from tbl_spl_rcvd where SPL_DATE = '$s_start_date'";
	}
	else{
		$query = "Select `SPL_DATE`,SUM(`SPL_NO_OF_TRIP`), SUM(`SPL_TOT_QTY`) from tbl_spl_rcvd where SPL_DATE between '$s_start_date' AND '$s_end_date' and SPL_V_ID = $s_v_id and SPL_PROJ_ID = $project_id  GROUP BY `SPL_DATE`";
	}
	$result1 = mysql_query($query);

	$result2 = mysql_query("Select * from enm_trip_type where TRIP_ID = $trip_arrey[0]");
	$row2 = mysql_fetch_array($result2);
	$trip_qty = $trip_arrey[1];

	$result3 = mysql_query("Select * from tbl_vehicle_info where v_id = $s_v_id");
	$row3 = mysql_fetch_array($result3);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header form_content">
	<h1>      
		<form method="post">		
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="date"><small>Date :</small> </label>
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="start_date" class="form-control pull-right" id="start_date" >
						</div>					
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="date"> <small>from </small></label>
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="end_date" class="form-control pull-right" id="end_date">
						</div>		
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="TripType"><small>Trip Type</small></label> 
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
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="v_no"><small>Vehicle No.</small></label> 
						<select class="form-control" id="v_no" name="v_no">
							<option>Vehicle no.</option>
						</select>
					</div>
				</div>
			</div>
			<div class="">			  
				<button type="submit" name="btn_add" class="btn btn-primary">Submit</button>			
			</div>
		</form>
	</h1>
	
</section>
<!-- Main content -->
<section class="content form_content">
    <!-- Your Page Content Here -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
						  
						  <h3 class="box-title"><small><strong>Vehicle : </strong><?php echo $row2['TRIP_NAME']; ?></small></h3>
						  <h3 class="box-title"><small><strong>No : </strong><?php echo $row3['v_no']; ?></small></h3></br>
						  <h3 class="box-title"><small><strong>Cubic mtr:</strong> <?php echo $trip_qty; ?></small></h3>				  
						</div>
					<!-- /.box-header -->
					<div class="box-body">
					    <table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									  <th>#</th>
									  <th>Date</th>	
									  <th>No of trips</th>									 
									  <th>Total matric-tonn</th>									  
								</tr>
								<?php while ($row1 = mysql_fetch_array($result1)){
									   
								?>									
									<tr>
										<td><?php echo $ctr; ?></td>
										<td><?php echo $row1['SPL_DATE'] ?></td>
										<td><?php echo $row1['SUM(`SPL_NO_OF_TRIP`)'] ?></td>										
										<td><?php echo $row1['SUM(`SPL_TOT_QTY`)'] ?></td>
									</tr>
								<?php 
										$ctr = $ctr + 1;
										$total_qty = $total_qty + $row1['SUM(`SPL_TOT_QTY`)'];
								} ?>   
								<tr>
										<td></td>
										<td></td>
										<th>TOTAL</th>
										<th><?php echo $total_qty; ?></th>																	
								</tr>
							</thead>
						</table>
					</div>					
				</div>
			</div>
		</section>
</section>
<?php
	include "footer.php";
?>

<script type="text/javascript">
	var validation = function(){
		var startDate = $('#start_date').val();
		var endDate = $('#end_date').val();
		if( startDate != '' && endDate != ''){
			if(startDate > endDate){
				alert('Invalid Date Range');
				return false;
			}
		}
		else{
			alert('Enter Date');
			return false;
		}
		
	}
	$(function () {	
		//Date picker
		$('#start_date').datepicker({
			autoclose: true,
			format: 'yyyy-mm-dd',
			endDate: new Date()
		});
	});
	$(function () {	
		//Date picker
		$('#end_date').datepicker({
			autoclose: true,
			format: 'yyyy-mm-dd',
			endDate: new Date()
		});
	});
	function get_tripid(id){
		 var idArray = id.split(', ');		 
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