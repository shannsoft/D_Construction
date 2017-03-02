<?php
	include "header.php";
	include "sidemenu.php";
	$project_id = $_REQUEST['id'];
	$result = mysql_query("Select * from tbl_proj_info where PROJ_ID= ".$project_id);
	$row = mysql_fetch_array($result);

    $now = new DateTime();
	$todaydate = $now->format('Y-m-d');
	echo $todaydate;
	$ctr = 1;
	$result1 = mysql_query("SELECT a.SPL_V_ID, a.SPL_NO_OF_TRIP, a.SPL_TOT_QTY, b.v_no , c.TRIP_QTY , c.TRIP_NAME FROM tbl_spl_rcvd a INNER JOIN tbl_vehicle_info b ON a.SPL_V_ID = b.v_id JOIN enm_trip_type c ON b.v_trip_id = c.TRIP_ID where a.SPL_DATE = '$todaydate'");
	$total_trip = 0;
	$total_cm = 0;
	$total_qty = 0;
	$result2 = mysql_query("SELECT sum(a.SPL_NO_OF_TRIP), sum(a.SPL_TOT_QTY), sum(c.TRIP_QTY) FROM `tbl_spl_rcvd` a INNER JOIN tbl_vehicle_info b on a.SPL_V_ID = b.v_id INNER JOIN enm_trip_type c on b.v_trip_id = c.TRIP_ID");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header form_content"> 
	<h1>      
		<small>Project : <?php echo $row['PROJ_NAME'];?></small></br>	
		<small>Date : <?php echo $todaydate;?></small>	
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
						  <h3 class="box-title"><?php echo  $now->format('F j, Y')?> :Report</h3>
						</div>
					<!-- /.box-header -->
					<div class="box-body">
					    <table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									  <th>#</th>
									  <th>Trip Type</th>
									  <th>Vehicle No.</th>	
									  <th>No of trips</th>
									  <th>Cubic Meter</th>
									  <th>Total Metric Ton</th>									  
								</tr>
								<?php while ($row = mysql_fetch_array($result1)){?>
									<tr> 
										<td><?php echo $ctr; ?></td>
										<td><?php echo $row['TRIP_NAME'] ?></td>
										<td><?php echo $row['v_no'] ?></td>
										<td><?php echo $row['SPL_NO_OF_TRIP'] ?></td>
										<td><?php echo $row['TRIP_QTY'] ?></td>
										<td><?php echo $row['SPL_TOT_QTY'] ?></td>									
									</tr>
								<?php 
										$ctr = $ctr + 1;
										$total_trip = $total_trip + $row['SPL_NO_OF_TRIP'];
										$total_cm = $total_cm + $row['TRIP_QTY'];
										$total_qty = $total_qty + $row['SPL_TOT_QTY'];
								} ?>
								<tr>
									  <th></th>
									  <th></th>
									  <th>Total</th>	
									  <th><?php echo $total_trip?></th>
									  <th><?php echo $total_cm?></th>
									  <th><?php echo $total_qty?></th>									  
								</tr>
								<?php									
									while ($row2 = mysql_fetch_array($result2)){
								?>
								<tr>
									  <th></th>
									  <th></th>
									  <th>Cumulative</th>	
									  <th><?php echo $row2['sum(a.SPL_NO_OF_TRIP)']?></th>
									  <th><?php echo $row2['sum(c.TRIP_QTY)']?></th>
									  <th><?php echo $row2['sum(a.SPL_TOT_QTY)']?></th>									  
								</tr>
								<?php } ?>
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