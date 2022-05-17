<?php
//this page also need to check login status to avoid attack.
if (!isset($_SESSION['can302'])) {
    echo "<script>window.open('../login.php','_self')</script>";
} else {
//many html code in else, don't forget '}' at the end.
?>

    <nav class="navbar navbar-inverse navbar-fixed-top">  <!-- navbar navbar-inverse navbar-fixed-top begin -->
        <div class="navbar-header">   <!-- navbar-header begin -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <!-- navbar-toggle begin, fixed code with using class name '.navbar-ex1-collapse' -->
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button><!-- navbar-toggle finish -->
            <a href="index.php?dashboard" class="navbar-brand">CAN302 Home</a>
        </div><!-- navbar-header finish -->
        
        <ul class="nav navbar-right top-nav">   <!-- nav navbar-right top-nav begin -->
            <li class="dropdown"> <!-- dropdown begin -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <!-- dropdown-toggle begin -->
                    <i class="fa fa-user"></i> <?php echo $nickname; ?> <b class="caret"></b>
                </a><!-- dropdown-toggle finish -->

                <ul class="dropdown-menu">   <!-- dropdown-menu begin -->
                    <li> <!-- li begin -->
                        <a href="index.php?profile&id=<?php echo $admin_id; ?>"> <!-- a href begin -->
                            <i class="fa fa-fw fa-user"></i> Profile
                        </a>
                    </li><!-- li finish -->               

                    <li class="divider"></li>

                    <li>                        <!-- li begin -->
                        <a href="logout.php">
                            <i class="fa fa-fw fa-power-off"></i> Log Out
                        </a>
                    </li><!-- li finish -->
                </ul><!-- dropdown-menu finish -->
            </li><!-- dropdown finish -->
            <!-- more drop down menu can be added here-->
            
        </ul><!-- nav navbar-right top-nav finish -->

        <div class="collapse navbar-collapse navbar-ex1-collapse">  <!-- navbar-ex1-collapse begin -->
            <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav begin -->
                
                <li> <!-- li begin -->
                    <a href="index.php?dashboard">                <!-- a href begin -->
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li>                    <!-- li begin -->
                    <a href="#" data-toggle="collapse" data-target="#p_cat">    <!-- a href begin -->
                        <i class="fa fa-fw fa-tasks"></i> Products Categories
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a><!-- a href finish -->
                    <ul id="p_cat" class="collapse">                        <!-- collapse begin -->
                        <li>                            <!-- li begin -->
                            <a href="index.php?category=add"> Add Product Category </a>
                        </li><!-- li finish -->
                        <li>                            <!-- li begin -->
                            <a href="index.php?category=view"> View Products Categories </a>
                        </li><!-- li finish -->
                    </ul><!-- collapse finish -->
                </li><!-- li finish -->

                <li>                    <!-- li begin -->
                    <a href="#" data-toggle="collapse" data-target="#supplier">                        <!-- a href begin -->
                        <i class="fa fa-fw fa-globe"></i> Supplier
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a><!-- a href finish -->
                    <ul id="supplier" class="collapse">                        <!-- collapse begin -->
                        <li>                            <!-- li begin -->
                            <a href="#"> Insert Supplier </a>
                        </li><!-- li finish -->
                        <li>                            <!-- li begin -->
                            <a href="#"> View Supplier </a>
                        </li><!-- li finish -->
                    </ul><!-- collapse finish -->
                </li><!-- li finish -->
                               
                <li>    <!-- li begin, ###with sub-menus### -->
                    <a href="#" data-toggle="collapse" data-target="#products">    <!-- a href begin -->
                        <i class="fa fa-fw fa-cubes"></i> Products
                        <i class="fa fa-fw fa-caret-down"></i> 
                    </a><!-- a href finish -->
                    <ul id="products" class="collapse">                        <!-- collapse begin -->
                        <li>                            <!-- li begin -->
                            <a href="index.php?product=add"> Add Product </a>
                        </li><!-- li finish -->
                        <li>                            <!-- li begin -->
                            <a href="index.php?product=view"> View Products </a>
                        </li><!-- li finish -->
                        <li>  <!-- li begin -->
                            <a href="index.php?product=statistics"> View Statistics </a>
                        </li><!-- li finish -->
                    </ul><!-- collapse finish -->
                </li><!-- li finish -->


                <li>                    <!-- li begin -->
                    <a href="#" data-toggle="collapse" data-target="#coupon">                        <!-- a href begin -->
                        <i class="fa fa-fw fa-tag"></i> Coupon
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a><!-- a href finish -->
                    <ul id="coupon" class="collapse">                        <!-- collapse begin -->
                        <li>                            <!-- li begin -->
                            <a href="#"> Insert Coupon </a>
                        </li><!-- li finish -->
                        <li>                            <!-- li begin -->
                            <a href="#"> View Coupon </a>
                        </li><!-- li finish -->
                    </ul><!-- collapse finish -->
                </li><!-- li finish -->                
                
                <li>                    <!-- li begin -->
                    <a href="#" data-toggle="collapse" data-target="#slides">                        <!-- a href begin -->
                        <i class="fa fa-fw fa-gear"></i> Slides
                        <i class="fa fa-fw fa-caret-down"></i>
                    </a><!-- a href finish -->
                    <ul id="slides" class="collapse">                        <!-- collapse begin -->
                        <li>                            <!-- li begin -->
                            <a href="#"> Insert Slide </a>
                        </li><!-- li finish -->
                        <li>                            <!-- li begin -->
                            <a href="#"> View Slides </a>
                        </li><!-- li finish -->
                    </ul><!-- collapse finish -->
                </li><!-- li finish -->

                <li>                    <!-- li begin -->
                    <a href="#">                        <!-- a href begin -->
                        <i class="fa fa-fw fa-users"></i> View Customers
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li>                    <!-- li begin -->
                    <a href="#">                        <!-- a href begin -->
                        <i class="fa fa-fw fa-book"></i> View Orders
                    </a><!-- a href finish -->
                </li><!-- li finish -->

                <li>                    <!-- li begin -->
                    <a href="logout.php">                        <!-- a href begin -->
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                    </a><!-- a href finish -->
                </li><!-- li finish -->
            </ul><!-- nav navbar-nav side-nav finish -->
        </div><!-- collapse navbar-collapse navbar-ex1-collapse finish -->
    </nav><!-- navbar navbar-inverse navbar-fixed-top finish -->

<?php } ?> 