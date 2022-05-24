<?php
$private_key = '-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQC8eVT+pVl31LIqDc5x2FH+QljWEG8c7LrPNBzX+urYS/K2jaUX
iUMKNU9PEDq3ZETSWNTGfqITROyuC8vawiy3q/JcDdHNSOljM841zv7l816oNxEQ
pwyCVluOAAneIy9iVwmtbMpePqKDEoSrn7QE1s+W/6I5HhEFAZnQ8DZs6wIDAQAB
AoGBALcXIyNRG63WONGzodZkb5qRd11Uj6xIqF07Yb3KqjM+7GS9CyDnHfIfwZCr
0m5vgI/a7bB6OhaAAXA+U2WK9gY1artBlcHkek63fshY3iaRfoHySMtEHygpINtr
zBfN2Nw4TtmTBt3wrOwPbqGTqnyhTLD+sT36a4yVLQH4LV7BAkEA+PbgzpODzSWS
lUiJSRQ+7mql2OE/IUs8vtxI7P+BU9/I/qtlUsL6O1vovc4Z0YPFWiNxUkqoWbrQ
KycEp7+YSwJBAMHM1q4tCOqi7hUNdyAAS8RiA+q3JQQO8wW/BG3sEMezUAt6P54l
i23PWxD7301IDjCXypxkc0QQLgoJPanu2eECQAV4ZzgixaKcULw2+80/RKK4dSxu
xpRUsuD+tht/Abh2ElSGL5PB9P2Y52REQwz3eD6iyLqmKUzPbgOEt/V3oEECQBNi
RJq5QGoPj9alOSQHQ4zJ7PBeDyK/yAjsGSpRcUA4LCppuNE9mhuKoOYq+yPEsD6m
AArydSD6qVAxqmxDyqECQAjtPCkUT5tiUCih13AgxZCFtQkURb1I48TsJtRd6I3n
jN1YXwsVMfWZaYbHwXRroKRg8x4L+3qAzeIWW6XErZo=
-----END RSA PRIVATE KEY-----';

$pri_key = openssl_pkey_get_private($private_key);
$decrypted = '';
session_start(); // magic word to start a session.
include("includes/db.php");
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['pass']);
    openssl_private_decrypt(base64_decode($pass), $decrypted, $pri_key);
    $pass = $decrypted;
    $get_admin = "SELECT * FROM admin WHERE email='$email' AND passwd='$pass'";
    $run_admin = mysqli_query($con, $get_admin);
    $count = mysqli_num_rows($run_admin);
    if ($count==1) {
        $_SESSION['can302'] = $email; 
        $row_admin = mysqli_fetch_array($run_admin);
        session_regenerate_id();
        echo "<script>alert('Welcome ".$row_admin['nickname']."!')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
    }
    else{
        echo "<script>alert('Email or Password is Wrong!')</script>";
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
    <script src="https://cdn.bootcdn.net/ajax/libs/jsencrypt/3.2.1/jsencrypt.min.js"></script>
    <script>
        function security(){
            var pass = document.getElementById("pass").value;
            pubKey = '-----BEGIN PUBLIC KEY-----MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC8eVT+pVl31LIqDc5x2FH+QljWEG8c7LrPNBzX+urYS/K2jaUXiUMKNU9PEDq3ZETSWNTGfqITROyuC8vawiy3q/JcDdHNSOljM841zv7l816oNxEQpwyCVluOAAneIy9iVwmtbMpePqKDEoSrn7QE1s+W/6I5HhEFAZnQ8DZs6wIDAQAB-----END PUBLIC KEY-----';
            var encryptor = new JSEncrypt();
            encryptor.setPublicKey(pubKey);
            var encryptData = encryptor.encrypt(pass);
            document.getElementById("pass").value = encryptData;
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
            <input type="password" class="form-control" placeholder="Your Password" name="pass" id='pass' required>
            <br>
            <button class="btn btn-primary" type="submit" name="login" onclick="security();">Login</button>
        </form><!-- form finish -->
    </div><!-- container finish --> 
</body>
</html>
