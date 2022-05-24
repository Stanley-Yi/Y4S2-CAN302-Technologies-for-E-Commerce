<?php

if (!isset($_SESSION['can302'])) {
    echo "<script>window.open('../login.php','_self')</script>";
}
else{

?>
<div class="row"><!-- row no 1 begin -->
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		<ol class="breadcrumb"> <!-- bread navigation -->
			<li class="active">
				<i class="fa fa-dashboard"></i> CAN302 Dashboard
			</li>
		</ol>
	</div><!-- col-lg-12 finish -->
</div><!-- row no 1 finish -->

<div class="row"><!-- row no 2 begin -->	
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->	
		<div class="panel panel-orange"><!-- panel panel-primary begin -->
			<div class="panel-heading"><!-- panel-heading begin -->
				<div class="row"><!-- row begin -->
					<div class="col-xs-3"><!-- col-xs-3 begin -->
						<i class="fa fa-tasks fa-4x"></i>
					</div><!-- col-xs-3 finish -->
					<div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <?php
     
                        $get_pro_cat = "SELECT * FROM product_category";
                        $run_pro_cat = mysqli_query($con, $get_pro_cat);
                        $count_pro_cate = mysqli_num_rows($run_pro_cat);

                        ?>
						<div class="huge"><?php echo $count_pro_cate; ?></div>
						<div>Product Categories</div>
					</div><!-- col-xs-9 finish -->
				</div><!-- row finish -->
			</div><!-- panel-heading finish -->
			<a href="index.php?category=view">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div><!-- panel panel-primary finish -->
	</div><!-- col-lg-3 col-md-6 finish -->

    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
		<div class="panel panel-red"><!-- panel panel-primary begin -->			
			<div class="panel-heading"><!-- panel-heading begin -->
				<div class="row"><!-- row begin -->
					<div class="col-xs-3"><!-- col-xs-3 begin -->
						<i class="fa fa-cubes fa-4x"></i>
					</div><!-- col-xs-3 finish -->
					<div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <?php
     
                        $get_pro = "SELECT * FROM product";
                        $run_pro = mysqli_query($con, $get_pro);
                        $count_pro = mysqli_num_rows($run_pro);

                        ?>
						<div class="huge"><?php echo $count_pro; ?></div>
						<div>Products</div>
					</div><!-- col-xs-9 finish -->
				</div><!-- row finish -->
			</div><!-- panel-heading finish -->
			<a href="index.php?product=view">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div><!-- panel panel-primary finish -->
	</div><!-- col-lg-3 col-md-6 finish -->

	<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->		
		<div class="panel panel-green"><!-- panel panel-primary begin -->			
			<div class="panel-heading"><!-- panel-heading begin -->
				<div class="row"><!-- row begin -->
					<div class="col-xs-3"><!-- col-xs-3 begin -->
						<i class="fa fa-users fa-4x"></i>
					</div><!-- col-xs-3 finish -->
					<div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
						<div class="huge">9999</div>
						<div>Customers</div>
					</div><!-- col-xs-9 finish -->
				</div><!-- row finish -->
			</div><!-- panel-heading finish -->
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div><!-- panel panel-primary finish -->
	</div><!-- col-lg-3 col-md-6 finish -->

	<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->		
		<div class="panel panel-primary"><!-- panel panel-primary begin -->			
			<div class="panel-heading"><!-- panel-heading begin -->
				<div class="row"><!-- row begin -->
					<div class="col-xs-3"><!-- col-xs-3 begin -->
						<i class="fa fa-shopping-cart fa-4x"></i>
					</div><!-- col-xs-3 finish -->
					<div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
						<div class="huge">777</div>
						<div>Orders</div>
					</div><!-- col-xs-9 finish -->
				</div><!-- row finish -->
			</div><!-- panel-heading finish -->
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div><!-- panel panel-primary finish -->
	</div><!-- col-lg-3 col-md-6 finish -->
</div><!-- row no 2 finish -->

<div class="row"><!-- row no 3 begin -->	
	<div class="col-lg-8"><!-- col-lg-8 begin -->		
		<div class="panel panel-primary"><!-- panel panel-primary begin -->			
			<div class="panel-heading"><!-- panel-heading begin -->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Low Stock Products
				</h3>
			</div><!-- panel-heading finish -->
			<div class="panel-body"><!-- panel-body begin -->				
				<div class="table-responsive"><!-- table-responsive begin -->					
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>ID:</th>
								<th>Name:</th>
								<th>Price:</th>
								<th>Stock:</th>
								<th>Category:</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$get_pro = "SELECT p.*, c.name as c_name FROM product p INNER JOIN product_category c ON p.cat_id = c.id WHERE p.stock < 100 ORDER BY p.stock ASC LIMIT 0,5";
                                $run_pro = mysqli_query($con,$get_pro);
								while ($row_pro = mysqli_fetch_array($run_pro)) {
									$pro_id = $row_pro['id'];
									$pro_category = $row_pro['c_name'];
									$pro_name = $row_pro['name'];
									$pro_price = $row_pro['price'];
									$pro_stock = $row_pro['stock'];
							 ?>
							 <tr>
                                 <td><?php echo $pro_id; ?></td>
                                 <td><?php echo $pro_name; ?></td>
                                 <td><?php echo $pro_price; ?></td>
                                 <td><?php echo $pro_stock; ?></td>
                                 <td><?php echo $pro_category; ?></td>
							 </tr>
							 <?php } ?>
						</tbody>
					</table>
				</div><!-- table-responsive finish -->

				<div class="text-right"><!-- text-right begin -->
					<a href="index.php?product=view">
						View All Products <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div><!-- text-right finish -->
			</div><!-- panel-body finish -->
		</div><!-- panel panel-primary finish -->
	</div><!-- col-lg-8 finish -->

	<div class="col-md-4"><!-- col-md-4 begin -->	
        <?php
     
        $admin_img = $row_admin['image_path'];
        $admin_email = $row_admin['email'];
        $admin_image = $row_admin['image_path'];
        $admin_about = $row_admin['about'];
        $admin_phone = $row_admin['phone'];
        $admin_role = $row_admin['role'];
     
        ?>
        <div class="panel"><!-- panel begin -->			
			<div class="panel-body"><!-- panel-body begin -->				
				<div class="thumb-info"><!-- thumb-info begin -->
					<img src="<?php echo $admin_image; ?>" alt="admin-thumb-info" class="rounded img-responsive">
					<div class="thumb-info-title"><!-- thumb-info-title begin -->						
						<span class="thumb-info-inner"> <?php echo $nickname; ?> </span>
						<span class="thumb-info-type"> <?php echo $admin_role; ?> </span>
					</div><!-- thumb-info-title finish -->
				</div><!-- thumb-info finish -->
				<div class="widget-context-expanded"><!-- widget-context-expanded begin -->						
                    <br>
                    <i class="fa fa-user"></i>
                    <span>Email:</span> <?php echo $admin_email; ?>
                    <br>
                    <i class="fa fa-envelope"></i>
                    <span>Contact:</span> <?php echo $admin_phone; ?>
                </div><!-- widget-context-expanded finish -->
				<hr style="margin: 10px 0 10px 0;">
				<h5 class="text-muted">About me</h5>
				<p> <?php echo $admin_about; ?> </p>
			</div><!-- panel-body finish -->
		</div><!-- panel finish -->
	</div><!-- col-md-4 finish -->
</div><!-- row no 3 finish -->

<?php } ?>