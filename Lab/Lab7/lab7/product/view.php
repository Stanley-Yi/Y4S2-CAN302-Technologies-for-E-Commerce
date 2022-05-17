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
            <li>View Products</li>
		</ol><!-- breadcrumb finish -->
	</div><!-- col-lg-12 finish -->
</div><!-- row Finish -->

<div class="row"><!-- row Begin -->
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		<div class="panel panel-default"><!-- panel panel-default begin -->
			<div class="panel-heading"><!-- panel-heading begin -->
				<h3 class="panel-title">
					<i class="fa fa-cubes"></i> View Products
				</h3>
			</div><!-- panel-heading finish -->
			<div class="panel-body"><!-- panel-body begin -->
				<div class="table-responsive"><!-- table-responsive begin -->
					<table class="table table-striped table-bordered table-hover"><!-- table begin -->
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Image</th>
								<th>Price</th>
								<th>Stock</th>
								<th>Category</th>
								<th>Operation</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$get_pro = "SELECT p.*, c.name as c_name FROM product p INNER JOIN product_category c ON p.cat_id = c.id";
                                if (isset($_GET['cat_id'])) {
                                    $cat_id = $_GET['cat_id'];
                                    $get_pro .=" WHERE p.cat_id='$cat_id'";
                                }
                                $run_pro = mysqli_query($con,$get_pro);
								while ($row_pro = mysqli_fetch_array($run_pro)) {
									$pro_id = $row_pro['id'];
									$pro_category = $row_pro['c_name'];
									$pro_name = $row_pro['name'];
									$pro_image = $row_pro['image_path'];
									$pro_price = $row_pro['price'];
									$pro_stock = $row_pro['stock'];
							 ?>
							 <tr>
                                 <td><?php echo $pro_id; ?></td>
                                 <td><?php echo $pro_name; ?></td>
                                 <td><img src="<?php echo $pro_image; ?>" width="80" height="80"></td>
                                 <td><?php echo $pro_price; ?></td>
                                 <td><?php echo $pro_stock; ?></td>
                                 <td><?php echo $pro_category; ?></td>
                                 <td>
								    <a href="index.php?product=edit&id=<?php echo $pro_id; ?>">
									<i class="fa fa-pencil"></i> Edit
								    </a>
								    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								    <a href="index.php?product=delete&id=<?php echo $pro_id; ?>">
									<i class="fa fa-trash-o"></i> Delete
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