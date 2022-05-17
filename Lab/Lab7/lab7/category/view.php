<?php

if (!isset($_SESSION['can302'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else{

?>

<div class="row"><!-- row begin -->	
	<div class="col-lg-12"><!-- col-lg-12 begin -->	
		<ol class="breadcrumb">
			<li><i class="fa fa-tasks"></i> Product Categories</li>
			<li>View Product Categories</li>
		</ol>
	</div><!-- col-lg-12 finish -->
</div><!-- row finish -->
<div class="row"><!-- row begin -->
	<div class="col-lg-12"><!-- col-lg-12 begin -->		
		<div class="panel panel-default"><!-- panel panel-default begin -->			
			<div class="panel-heading"><!-- panel-heading begin -->				
				<h3 class="panel-title">View Product Categories</h3>
			</div><!-- panel-heading finish -->
			<div class="panel-body"><!-- panel-body begin -->				
				<div class="table-responsive"><!-- table-responsive begin -->					
					<table class="table table-hover table-striped table-bordered">						
						<thead>
							<tr>
								<th> ID </th>
								<th> Name </th>
								<th> Priority </th>
								<th> Operation </th>
							</tr>
						</thead>
						<tbody>
							<?php
								$get_p_cats = "select * from product_category order by priority";
								$run_p_cats = mysqli_query($con,$get_p_cats);
								while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
									$p_cat_id = $row_p_cats['id'];
									$p_cat_name = $row_p_cats['name'];
									$p_cat_priority = $row_p_cats['priority'];
							?>
							<tr>
								<td><?php echo $p_cat_id; ?></td>
								<td><?php echo $p_cat_name; ?></td>
								<td width="300"><?php echo $p_cat_priority; ?></td>
								<td>
								    <a href="index.php?category=edit&id=<?php echo $p_cat_id; ?>">
									<i class="fa fa-pencil"></i> Edit
								    </a>
								    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								    <a href="index.php?category=delete&id=<?php echo $p_cat_id; ?>">
									<i class="fa fa-trash-o"></i> Delete
								    </a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div><!-- panel-body finish -->
			</div><!-- panel-body finish -->
		</div><!-- panel panel-default finish -->
	</div><!-- col-lg-12 finish -->
</div><!-- row finish -->

<?php } ?>