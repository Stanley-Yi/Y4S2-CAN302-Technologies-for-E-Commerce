<?php

if (!isset($_SESSION['can302'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else{

?>
<div class="row"><!-- row Begin -->
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		<ol class="breadcrumb"><!-- breadcrumb begin -->
			<li class="active">
				<i class="fa fa-dashboard"></i> Products
			</li>
            <li>View Statistics</li>
		</ol><!-- breadcrumb finish -->
	</div><!-- col-lg-12 finish -->
</div><!-- row Finish -->

<div class="row"><!-- row Begin -->
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		<div class="panel panel-default"><!-- panel panel-default begin -->
			<div class="panel-heading"><!-- panel-heading begin -->
				<h3 class="panel-title">
					<i class="fa fa-cubes"></i> View Statistics
				</h3>
			</div><!-- panel-heading finish -->
			<div class="panel-body"><!-- panel-body begin -->
				<div class="table-responsive"><!-- table-responsive begin -->
					<table class="table table-striped table-bordered table-hover"><!-- table begin -->
						<thead>
							<tr>
								<th>Catetory</th>
								<th>Number of products</th>
								<th>Operation</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$get_cat = "SELECT * FROM product_category";
                                $run_cat = mysqli_query($con, $get_cat);
								while ($row_cat = mysqli_fetch_array($run_cat)) {
                                    $cat_name = $row_cat['name'];
                                    $cat_id = $row_cat['id'];
                                    $get_pro = "SELECT * FROM product where cat_id='$cat_id'";
                                    $run_pro = mysqli_query($con, $get_pro);
                                    $count = mysqli_num_rows($run_pro);
							 ?>
							 <tr>
                                 <td><?php echo $cat_name; ?></td>
                                 <td><?php echo $count ?></td>
                                 <td>
								    <a href="index.php?product=view&cat_id=<?php echo $cat_id; ?>">
									<i class="fa fa-list"></i> Details
								    </a>
								</td>
							 </tr>
							 <?php } ?>
						</tbody>
					</table><!-- table finish -->
				</div><!-- table-responsive finish -->			
			</div><!-- panel-body finish -->
		</div><!-- panel panel-default finish -->
	</div><!-- col-lg-12 finish -->
</div><!-- row Finish -->

<?php } ?>