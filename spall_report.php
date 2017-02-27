<?php
	include "header.php";
	include "sidemenu.php";
	
	
if(isset($_POST['btn_add'])){
	$ctr = 1;
	$total = 0;
	$s_start_date = $_REQUEST['start_date'];
	$s_end_date = $_REQUEST['end_date'];
	if ($s_start_date !='' && $s_end_date == ''){
		$query = "Select * from tbl_spl_rcvd where SPL_DATE = '$s_start_date'";
	}
	else{
		$query = "Select * from tbl_spl_rcvd where SPL_DATE between '$s_start_date' AND '$s_end_date'";
	}
	$result = mysql_query($query);
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
						  <h3 class="box-title">Report</h3>
						</div>
					<!-- /.box-header -->
					<div class="box-body">
					    <table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									  <th>#</th>
									  <th>Date</th>	
									  <th>Trip Type</th>
									  <th>No of trips</th>
									  <th>Trip Qty</th>
									  <th>Total Spall Qty</th>									  
								</tr>
								<?php while ($row = mysql_fetch_array($result)){
									    $s_trip_type = $row['SPL_TRIP_TYPE'];
										$result1 = mysql_query("Select * from enm_trip_type where TRIP_ID= ".$s_trip_type);
										$row1 = mysql_fetch_array($result1);
								?>									
									<tr>
										<td><?php echo $ctr; ?></td>
										<td><?php echo $row['SPL_DATE'] ?></td>
										<td><?php echo $row1['TRIP_NAME'] ?></td>
										<td><?php echo $row['SPL_NO_OF_TRIP'] ?></td>
										<td><?php echo $row['SPL_QTY_OF_TRIP'] ?></td>
										<td><?php echo $row['SPL_TOT_QTY'] ?></td>
									</tr>
								<?php 
									$ctr = $ctr + 1;
									$total = $total + $row['SPL_TOT_QTY'];
								} ?>   
								<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<th>TOTAL</td>
										<th><?php echo $total; ?></td>
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
</script>