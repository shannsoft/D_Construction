<?php
include "header.php";
include "sidemenu.php";
$ctr = 1;
$result = mysql_query("SELECT a.v_id, a.v_proj_id, a.v_trip_id, a.v_no, a.v_mileage, b.TRIP_NAME, c.PROJ_NAME FROM tbl_vehicle_info a INNER JOIN enm_trip_type b ON a.v_trip_id = b.TRIP_ID INNER JOIN tbl_proj_info c ON a.v_proj_id = c.PROJ_ID");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header form_content">
		<h1>      
			<small>Vehicle Details</small>
		</h1>
		<div class="pull-right">
			<a href="add_vehicle.php" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>
		</div>
    </section>
	<!-- /.box-header -->
	<div class="box-body">
    <!-- Main content -->
    <section class="content form_content">
		<!-- Your Page Content Here -->

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
						  <h3 class="box-title">Vehicle Details</h3>
						</div>
					<!-- /.box-header -->
						<div class="box-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										  <th>#</th>
										  <th>Project Name</th>
										  <th>Vehicle Type</th>
										  <th>Vehicle No</th>
										  <th>Mileage </th>
									</tr>
									<?php while ($row = mysql_fetch_array($result)){?>
									<tr> 
										<td><?php echo $ctr; ?></td>
										<td><?php echo $row['PROJ_NAME'] ?></td>
										<td><?php echo $row['TRIP_NAME'] ?></td>
										<td><?php echo $row['v_no'] ?></td>
										<td><?php echo $row['v_mileage'] ?></td>									
									</tr>
									<?php 
											$ctr = $ctr + 1;									
									} ?>
								</thead>
							</table>
						</div>					
					</div>
				</div>
		    </div>
		</section>
    </section>	           
    <!-- /.content -->

	

<?php
	include "footer.php";
?>	