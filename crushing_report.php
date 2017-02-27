<?php
	include "header.php";
	include "sidemenu.php";
	
	
if(isset($_POST['btn_add'])){
	$ctr = 1;	
	$total30 = 0;
	$total20 = 0;
	$total12 = 0;
	$total10 = 0;
	$total6 = 0;
	$total_dust = 0;
	$s_start_date = $_REQUEST['start_date'];
	$s_end_date = $_REQUEST['end_date'];
	
	if ($s_start_date !='' && $s_end_date == ''){
		$query = "Select * from tbl_crushing where CRS_DATE = '$s_start_date'";
	}
	else{
		$query = "Select * from tbl_crushing where CRS_DATE between '$s_start_date' AND '$s_end_date'";
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
                <button type="submit" name="btn_add" class="btn btn-primary" onclick="validation()">Submit</button>			
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
									  <th>Input qty</th>
									  <th>30mm Chips</th>
									  <th>20mm Chips</th>
									  <th>12mm Chips</th>	
									  <th>10mm Chips</th>
									  <th> 6mm Chips</th>
									  <th>Dust</th>
								</tr>
								<?php while ($row = mysql_fetch_array($result)){?>									
									<tr>
										<td><?php echo $ctr; ?></td>
										<td><?php echo $row['CRS_DATE'] ?></td>
										<td><?php echo $row['CRS_INP_QTY'] ?></td>
										<?php if($row['CRS_PROD_ID'] == 1){?>
											<td><?php echo $row['CRS_QTY'] ?></td>
										<?php $total30 = $total30 + $row['CRS_QTY']; }else{?>
											<td>0</td>
										<?php }?>
										<?php if($row['CRS_PROD_ID'] == 2){?>
											<td><?php echo $row['CRS_QTY'] ?></td>
										<?php $total20 = $total20 + $row['CRS_QTY'];}else{?>
											<td>0</td>
										<?php } ?>
										<?php if($row['CRS_PROD_ID'] == 4){?>
											<td><?php echo $row['CRS_QTY'] ?></td>
										<?php $total12 = $total12 + $row['CRS_QTY'];}else{?>
											<td>0</td>
										<?php }?>
										<?php if($row['CRS_PROD_ID'] == 5){?>
											<td><?php echo $row['CRS_QTY'] ?></td>
										<?php $total10 = $total10 + $row['CRS_QTY'];}else{?>
											<td>0</td>
										<?php }?>
										<?php if($row['CRS_PROD_ID'] == 6){?>
											<td><?php echo $row['CRS_QTY'] ?></td>
										<?php $total6 = $total6 + $row['CRS_QTY'];}else{?>
											<td>0</td>
										<?php }?>
										<td><?php echo $row['CRS_DUST'] ?></td>
											<?php $total_dust = $total_dust + $row['CRS_DUST']; ?>
									</tr>
								<?php 
									$ctr = $ctr + 1;									
								} ?>   
								<tr>
									<td></td>
									<td></td>
									<th>TOTAL</th>									
									<th><?php echo $total30; ?></th>
									<th><?php echo $total20; ?></th>
									<th><?php echo $total12; ?></th>
									<th><?php echo $total10; ?></th>
									<th><?php echo $total6; ?></th>
									<th><?php echo $total_dust; ?></th>
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
		
		else if(startDate == '' && endDate == ''){
			alert('Enter Date');
			return false;
		}
		
		else{
			return true;
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