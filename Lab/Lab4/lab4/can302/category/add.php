<?php

if (!isset($_SESSION['can302'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
elseif (isset($_POST['add'])) {
    $p_cat_name = $_POST['p_cat_name'];
    $p_cat_priority = $_POST['p_cat_priority'];
    $insert_p_cat = "insert into product_category(name, priority)values('$p_cat_name','$p_cat_priority')";
    $run_p_cat = mysqli_query($con,$insert_p_cat);
    if ($run_p_cat) {
        echo "<script>alert('Product category successfully added!')</script>";
        echo "<script>window.open('index.php?category=view','_self')</script>";
    }
}
else{	

?>

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
	
		<ol class="breadcrumb">
			<li> <i class="fa fa-tasks"></i> Product Categories</li>
            <li>Add Product Category</li>
		</ol>

	</div><!-- col-lg-12 finish -->

</div><!-- row finish -->

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->		
		<div class="panel panel-default"><!-- panel panel-default begin -->			
			<div class="panel-heading"><!-- panel-heading begin -->				
				<h3 class="panel-title"> Add Product Category </h3>
			</div><!-- panel-heading finish -->
			<div class="panel-body"><!-- panel-body begin -->				
				<form method="post" class="form-horizontal">					
					<div class="form-group"><!-- form-group begin -->						
						<label class="control-label col-md-3">Name </label>
						<div class="col-md-6"><!-- col-md-6 begin -->							
							<input type="text" name="p_cat_name" class="form-control">
						</div><!-- col-md-6 finish -->
					</div><!-- form-group finish -->
					<div class="form-group"><!-- form-group begin -->						
						<label class="control-label col-md-3">Priority</label>
						<div class="col-md-6"><!-- col-md-6 begin -->							
							<input type="text" name="p_cat_priority" class="form-control">
						</div><!-- col-md-6 finish -->
					</div><!-- form-group finish -->
					<div class="form-group"><!-- form-group begin -->						
						<label class="control-label col-md-3"> </label>
						<div class="col-md-6"><!-- col-md-6 begin -->							
							<input type="submit" name="add" class="form-control btn btn-primary" value="Submit">
						</div><!-- col-md-6 finish -->
					</div><!-- form-group finish -->
				</form>
			</div><!-- panel-body finish -->
		</div><!-- panel panel-default finish -->
	</div><!-- col-lg-12 finish -->
</div><!-- row finish -->

<?php } ?>