<?php
if (!isset($_SESSION['can302'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
elseif(isset($_POST['update'])){    
    $admin_id = $_POST['admin_id'];
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];
    $admin_phone = $_POST['admin_phone'];
    $admin_about = $_POST['admin_about'];
    $admin_role = $_POST['admin_role'];    
    
    $admin_image = '/can302/media/'.$_FILES['admin_image']['name'];
    $temp_name = $_FILES['admin_image']['tmp_name'];
    $store_path = $_SERVER['DOCUMENT_ROOT'].$admin_image;
    move_uploaded_file($temp_name, $store_path);
    
    $update_user = "UPDATE admin SET nickname='$admin_name', email='$admin_email', passwd='$admin_pass', image_path='$admin_image', about='$admin_about', phone='$admin_phone', role='$admin_role' where id='$admin_id'";
    echo $update_user;
    $run_user = mysqli_query($con,$update_user);

    if($run_user){        
        echo "<script>alert('Admin info has been updated sucessfully.')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
    }    
}
elseif (!isset($_GET['id'])) {
        echo "<script>alert('Admin email is missing.')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
}
else{
    $admin_id = $_GET['id'];
    $get_admin = "select * from admin where id='$admin_id'";
    $run_admin = mysqli_query($con,$get_admin);
    $row_admin = mysqli_fetch_array($run_admin);
    $admin_name = $row_admin['nickname'];
    $admin_email = $row_admin['email'];
    $admin_image = $row_admin['image_path'];
    $admin_about = $row_admin['about'];
    $admin_phone = $row_admin['phone'];
    $admin_role = $row_admin['role'];
  
?>
    
<div class="row"><!-- row Begin -->    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->            
            <li class="active"><!-- active Begin -->                
                <i class="fa fa-user"></i> Admin profile                
            </li><!-- active Finish -->            
        </ol><!-- breadcrumb Finish -->        
    </div><!-- col-lg-12 Finish -->    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->        
        <div class="panel panel-default"><!-- panel panel-default Begin -->            
           <div class="panel-heading"><!-- panel-heading Begin -->               
               <h3 class="panel-title"><!-- panel-title Begin -->                   
                   <i class="fa fa-pencil fa-fw"></i> Edit admin profile                  
               </h3><!-- panel-title Finish -->               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   <div class="form-group"><!-- form-group Begin -->                       
                      <label class="col-md-3 control-label"> Admin name </label>                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->                          
                          <input name="admin_name" type="text" class="form-control" value="<?php echo $admin_name; ?>" required>
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> E-mail </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                         <input name="admin_email" type="text" class="form-control" value="<?php echo $admin_email; ?>" required> 
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> Password </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="admin_pass" type="password" class="form-control" value="" required>
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> Phone </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="admin_phone" type="text" class="form-control" value="<?php echo $admin_phone; ?>" required>
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> Image </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="admin_image" type="file" class="form-control" required>
                          <br>
                          <img src="<?php echo $admin_image; ?>" alt="<?php echo $admin_image; ?>" height="150" width="150">
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> Role </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="admin_role" type="text" class="form-control" value="<?php echo $admin_role; ?>" required>
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"> About </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                    <textarea name="admin_about" class="form-control" cols="30" rows="3"><?php echo $admin_about; ?></textarea> 
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label"></label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="admin_id" value="<?php echo $admin_id; ?>" type="hidden" class="form-control">
                          <input name="update" value="Update Profile" type="submit" class="btn btn-primary form-control">
                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->
               
               </form><!-- form-horizontal Finish -->
           </div><!-- panel-body Finish -->
        </div><!-- canel panel-default Finish -->
    </div><!-- col-lg-12 Finish -->
</div><!-- row Finish -->

<?php } ?>