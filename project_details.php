<?php
include "header.php";
include "sidemenu.php";
$result = mysql_query("Select * from tbl_proj_info");
$ctr = 1;
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header form_content">
		<h1>      
			<small>Details</small>
		</h1>
		<div class="pull-right">
			<a href="project_info.php" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>
			<button class="hidden" type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
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
						  <h3 class="box-title">Project Details</h3>
						</div>
					<!-- /.box-header -->
					<div class="box-body">
					    <table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									  <th>#</th>
									  <th>Project Name</th>
									  <th>Address</th>
									  <th>Action</th>
								</tr>
								<?php while ($row = mysql_fetch_array($result)){?>									
									<tr>
										<td><?php echo $ctr ?></td>
										<td><?php echo $row[PROJ_NAME] ?></td>
										<td><?php echo $row[PROJ_ADDR] ?></td>
										<td> 
											<a data-toggle="tooltip" title="Spall" class="btn btn-sm btn-info" href="spall.php?id=<?php echo $row['PROJ_ID']?>">
											<i class="fa fa-wa fa-industry" aria-hidden="true"></i><a>
											<a data-toggle="tooltip" title="Crushing" class="btn btn-sm btn-success" href="crushing.php?id=<?php echo $row['PROJ_ID']?>">
											<i class="fa fa-wa fa-cogs" aria-hidden="true"></i><a>
											<a data-toggle="tooltip" title="Breakdown" class="btn btn-sm btn-warning" href="breakdown.php?id=<?php echo $row['PROJ_ID']?>">
											<i class="fa fa-wa fa-yelp" aria-hidden="true"></i><a>
											<a data-toggle="tooltip" title="Maintenance" class="btn btn-sm btn-danger" href="maintainance.php?id=<?php echo $row['PROJ_ID']?>">
											<i class="fa fa-wa fa-wrench" aria-hidden="true"></i><a>
										</td>
									</tr>
								<?php $ctr = $ctr + 1; } ?>
							</thead>
						</table>
					</div>
					
				</div>
			</div>
		</section>

    </section>	           
    <!-- /.content -->
  </div>

<?php
	include "footer.php";
?>