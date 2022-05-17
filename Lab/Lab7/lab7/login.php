<?php

session_start(); // magic word to start a session.
include("includes/db.php");
include("functions/dh.php");
$timestamp = time();
$serverkey = mydh(1, $timestamp, 302);
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['pass']);
    $clientkey = mysqli_real_escape_string($con,$_POST['clientkey']); 
    $remaind = mydh(1, $clientkey, 302);
    $get_admin = "SELECT * FROM admin WHERE email='$email'";
    $run_admin = mysqli_query($con, $get_admin);
    $count = mysqli_num_rows($run_admin);
    if ($count==1) {
        $row_admin = mysqli_fetch_array($run_admin);
        $passwd = sha1($row_admin['passwd'].$remaind);
        if($passwd==$pass){
            $_SESSION['can302'] = $email; 
            session_regenerate_id();
            echo "<script>alert('Welcome ".$row_admin['nickname']."!')</script>";
            echo "<script>window.open('index.php?dashboard','_self')</script>";
        }
        else{
            echo "<script>alert('Password is Wrong!')</script>";
        }
    }
    else{
        echo "<script>alert('Email is Wrong!')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAN302 Login Demo</title>
    <link rel="stylesheet" href="/can302/styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="/can302/font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/can302/styles/style.css">
    <script src="/can302/js/jquery-331.min.js"></script>
    <script src="/can302/js/bootstrap-337.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/jshashes/1.0.8/hashes.js"></script>    
    <script>
        function jsdh(remaind, generator, prv){
            var prime = 99991;
            if (prv == 1){
                remaind = (remaind * generator) % prime;
                return remaind; 
            }
            else{
                prv -=1;
                remaind = (remaind * generator) % prime;   
                return jsdh(remaind, generator, prv);
            }
        }
        
        function security(){
            var pass = document.getElementById("pass").value;
            var clientkey = Number(document.getElementById("clientkey").value);
            var serverkey = Number(document.getElementById("serverkey").value);
            var timestamp = Number(document.getElementById("timestamp").value);            
            var remaind = jsdh(1, timestamp, clientkey);
            document.getElementById("clientkey").value = remaind;
            remaind = jsdh(1, serverkey, clientkey);
            pass = pass + remaind;
            var SHA1 = new Hashes.SHA1;
            document.getElementById("pass").value = SHA1.hex(pass);
        }
    </script>

</head>

<body>
    <div class="col-lg-2" style="text-align:center"><!-- container begin -->
    </div>
    <div class="col-lg-8" style="text-align:center"><!-- container begin -->
        <form action="" class="well" method="post"><!-- form begin -->
            <h2 class="form-login-heading text-center"> Admin Login </h2>
            <br>
            <input type="text" class="form-control" placeholder="Email Address" name="email" required>
            <br>
            <input type="password" class="form-control" placeholder="Your Password" name="pass" id="pass" required>
            <br>
            <input type="text" class="form-control" placeholder="Type a private key, from 10-100" name="clientkey" id="clientkey" required>
            <br>
            <button class="btn btn-primary" type="submit" name="login" onclick="security();">Login</button>
            <input type="hidden" name="generator" id="timestamp" class="form-control" value="<?php echo $timestamp; ?>" >
            <input type="hidden" name="pubkey" id="serverkey" class="form-control" value="<?php echo $serverkey; ?>" >           
            
        </form><!-- form finish -->
    </div><!-- container finish --> 
</body>
</html>
