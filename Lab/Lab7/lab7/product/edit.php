<?php

if (!isset($_SESSION['can302'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
elseif(isset($_POST['update'])){    
    $product_id = $_POST['product_id'];
    $product_cat_id = $_POST['product_cat_id'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_stock = $_POST['product_stock'];
    
    //copy the image files to target folder.
    $exts = explode('.', $_FILES['product_img']['name']);
    $product_img_path = "/can302/media/".time().".".end($exts);
    $temp_name = $_FILES['product_img']['tmp_name'];
    $store_path = $_SERVER['DOCUMENT_ROOT'].$product_img_path;
    move_uploaded_file($temp_name, $store_path);
    

    $update_product = "UPDATE product set cat_id='$product_cat_id', name='$product_name', description='$product_description', image_path='$product_img_path', price='$product_price', stock='$product_stock' where id='$product_id'";    
    
    echo $update_product;
    $run_product = mysqli_query($con,$update_product);

    if ($run_product) {
      echo "<script>alert('Your product infomation has been updated successfully!')</script>";
      echo "<script>window.open('index.php?product=view','_self')</script>";
    }
}
elseif (!isset($_GET['id'])) {
    echo "<script>alert('Product ID is misssing.')</script>";
    echo "<script>window.open('index.php?product=view','_self')</script>";
}
else {
    $edit_product_id = $_GET['id'];
    $edit_product_query = "SELECT p.*, c.name as c_name FROM product p INNER JOIN product_category c ON p.cat_id = c.id where p.id='$edit_product_id'";
    $run_edit = mysqli_query($con,$edit_product_query);
    $row_edit = mysqli_fetch_array($run_edit);
    $product_cat_id = $row_edit['cat_id'];
    $product_cat_name = $row_edit['c_name'];
    $product_name = $row_edit['name'];
    $product_description = $row_edit['description'];
    $product_price = $row_edit['price'];
    $product_stock = $row_edit['stock'];
    $product_image = $row_edit['image_path'];

?> 
    
<div class="row"><!-- row Begin -->    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->            
            <li class="active"><!-- active Begin -->                
                <i class="fa fa-cubes"></i> Products
            </li><!-- active Finish -->
            <li> Edit Products </li>            
        </ol><!-- breadcrumb Finish -->
    </div><!-- col-lg-12 Finish -->    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->        
        <div class="panel panel-default"><!-- panel panel-default Begin -->            
           <div class="panel-heading"><!-- panel-heading Begin -->               
               <h3 class="panel-title"><!-- panel-title Begin -->                   
                   <i class="fa fa-pencil"></i> Edit Product
               </h3><!-- panel-title Finish -->
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->                   
                   <div class="form-group"><!-- form-group Begin -->                       
                      <label class="col-md-3 control-label"> Product Name </label>                       
                      <div class="col-md-6"><!-- col-md-6 Begin -->                          
                          <input name="product_name" type="text" class="form-control" value="<?php echo $product_name; ?>" required>
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->                       
                      <label class="col-md-3 control-label"> Product Category </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <select name="product_cat_id" class="form-control"><!-- form-control Begin -->
                              <option value="<?php echo $product_cat_id; ?>"> <?php echo $product_cat_name; ?> </option>
                              <?php 
                                $get_p_cats = "select * from product_category";
                                $run_p_cats = mysqli_query($con,$get_p_cats);
                                while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                    $p_cat_id = $row_p_cats['id'];
                                    $p_cat_name = $row_p_cats['name'];
                                    echo "<option value='$p_cat_id'> $p_cat_name </option>";
                                }
                              ?>
                          </select><!-- form-control Finish -->
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
                     
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> Product Image</label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="product_img" type="file" class="form-control form-height-custom" required>
                          <img src="<?php echo $product_image; ?>" width="150" height="150" alt="<?php echo $product_image; ?>">
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> Product Price </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="product_price" type="text" class="form-control" value="<?php echo $product_price; ?>" required>
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> Product Stock </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="product_stock" type="text" class="form-control" value="<?php echo $product_stock; ?>" required>
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> Product Description </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <textarea name="product_description" cols="19" rows="10" class="form-control"><?php echo $product_description; ?></textarea>
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"></label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">     		
                          <input type="hidden" name="product_id" class="form-control" value="<?php echo $edit_product_id; ?>" >
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
               </form><!-- form-horizontal Finish -->
           </div><!-- panel-body Finish -->
        </div><!-- canel panel-default Finish -->
    </div><!-- col-lg-12 Finish -->
</div><!-- row Finish -->        

<?php } ?>