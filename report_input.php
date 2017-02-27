<?php
	include "header.php";
	include "sidemenu.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header form_content">
	<h1>      
		<small>Input Selection</small>		
		<div class="row">
			<div class="col-xs-6">
				<div class="form-group">
					<label for="date"><small>Date :</small> </label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" name="to_date" class="form-control pull-right" id="to_date" >
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
						<input type="text" name="from_date" class="form-control pull-right" id="from_date">
					</div>		
				</div>
			</div>
		</div>
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
	$(function () {	
		//Date picker
		$('#to_date').datepicker({
			autoclose: true,
			maxDate: new Date()
		});
	});
	$(function () {	
		//Date picker
		$('#from_date').datepicker({
			autoclose: true
		});
	});
</script>