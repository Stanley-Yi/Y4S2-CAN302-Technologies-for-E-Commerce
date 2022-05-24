<?php 

if (!isset($_SESSION['can302'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
elseif(isset($_POST['add'])){    
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
    
    $insert_product = "insert into product (cat_id, name, description, image_path, price, stock) values ('$product_cat_id','$product_name', '$product_description', '$product_img_path', '$product_price', '$product_stock')";    
    echo $insert_product;
    $run_product = mysqli_query($con,$insert_product);
    if($run_product){
        echo "<script>alert('Product has been inserted sucessfully')</script>";
        echo "<script>window.open('index.php?product=view','_self')</script>";
    }
}
else {

?>
    
<div class="row"><!-- row Begin -->    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            <li ><!-- active Begin -->
                <i class="fa fa-cubes"></i> Products                 
            </li><!-- active Finish -->
            <li>Add Product</li>
        </ol><!-- breadcrumb Finish -->
    </div><!-- col-lg-12 Finish -->
</div><!-- row Finish -->

<div class="row"><!-- row Begin -->    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        <div class="panel panel-default"><!-- panel panel-default Begin -->
           <div class="panel-heading"><!-- panel-heading Begin -->
               <h3 class="panel-title"><!-- panel-title Begin -->
                   <i class="fa fa-money fa-fw"></i> Add Product 
               </h3><!-- panel-title Finish -->
           </div> <!-- panel-heading Finish -->
            
           <div class="panel-body"><!-- panel-body Begin -->   
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->           
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> Product Name </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="product_name" type="text" class="form-control" required>
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> Product Category </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->    
                          <select name="product_cat_id" class="form-control"><!-- form-control Begin -->
                              <option> Select a category </option>
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
                      <label class="col-md-3 control-label"> Product Image </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="product_img" type="file" class="form-control" required>
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->                       
                       <label class="col-md-3 control-label"> Product Price </label> 
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           <input name="product_price" type="text" class="form-control" required>
                       </div><!-- col-md-6 Finish -->
                    </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> Product Stock </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="product_stock" type="text" class="form-control" required>
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> Product Description </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <textarea name="product_description" cols="19" rows="10" class="form-control"></textarea>
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"></label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="add" value="Add Product" type="submit" class="btn btn-primary form-control">
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
               </form><!-- form-horizontal Finish -->
           </div><!-- panel-body Finish -->
        </div><!-- canel panel-default Finish -->
    </div><!-- col-lg-12 Finish -->
</div><!-- row Finish -->

<?php } ?>

