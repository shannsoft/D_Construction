<?php
include "header.php";
include "sidemenu.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
        <small>Project Information</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
    <form action="" method="post">
		<div class="row">
			<div class="col-xs-12">
				Project Name<input type="Project Name" class="form-control" name="project_name" placeholder="Project name"></br>
        
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<!--<input type="Address" class="form-control" name="address" placeholder="Address">-->
				Address<textarea type="Address"  class="form-control" name="address" placeholder="Address">
				</textarea></br>
			</div>
		</div>
		<div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Enter</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>	
    </section>
    <!-- /.content -->
  </div>
<?php
	include "footer.php";
?>	
		