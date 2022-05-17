<?php
//a safe method to recieve post data.
function mypost($str) { 
    $val = !empty($_POST[$str]) ? $_POST[$str] : '';
    return $val;
}       

//connect to database
$con = mysqli_connect("localhost", "root", "", "lab1");
if (mysqli_connect_errno()) { 
    die("Connect to MySQL failed: " . mysqli_connect_error()); 
}

$last = mypost('last');
$first = mypost('first');
$email = mypost('email');

if (isset($_POST['add'])) {
    $sql = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`) VALUES (NULL, '".$first."', '".$last."', '".$email."')";
    $query = mysqli_query($con,$sql);
} 

if (isset($_POST['search'])) {
    $sql = "select * from user where first_name LIKE '%".$first."%' and last_name LIKE '%".$last."%' and email LIKE '%".$email."%'";
} 
else {
    $sql = "select * from user";
}
$query = mysqli_query($con,$sql);    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAN302 Lab1</title>
    <link rel="stylesheet" href="/can302/styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="/can302/font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/can302/styles/style.css">
    <script src="/can302/js/jquery-331.min.js"></script>
    <script src="/can302/js/bootstrap-337.min.js"></script>
</head>
<body>
    <div class="container">
	    <h2> Database demo @ CAN302 </h2>
    	<p>  A table to show info in table user</p> 
	    <table class="table">
		    <thead>
			    <tr>
				    <th>id</th>
				    <th>Firstname</th>
				    <th>Lastname</th>
				    <th>email</th>
			    </tr>
		    </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_array($query)){
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['last_name']."</td>";
                    echo "<td>".$row['first_name']."</td>";
                    echo "<td>".$row['email']."</td>";                    
                    echo "</tr>";
                }
                mysqli_close($con);
                ?>
            </tbody>
	    </table>
    </div>
    <br>
    <div class="container">
    <form class="form-inline" role="form" action="" method="post" >
        <label class="form-control" for="first"> Firstname </label>
        <input type="text" class="form-control" id="first" placeholder="Input first name" name="first">
        <label class="form-control" for="last"> Lastname </label>
        <input type="text" class="form-control" id="last" placeholder="Input last name" name="last">
        <label class="form-control" for="email"> Email </label>
        <input type="text" class="form-control" id="email" placeholder="Input email address" name="email">
        <button type="submit" class="btn btn-primary" id="add" name="add" value="add"> Add </button>
        <button type="submit" class="btn btn-primary" id="search" name="search" value="search"> Search </button>
    </form>   
    </div>
</body>
</html>