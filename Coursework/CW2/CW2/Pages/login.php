<?php

session_start(); // magic word to start a session.
include("includes/db.php");
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['pass']);
    $get_admin = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
    $run_admin = mysqli_query($con, $get_admin);
    $count = mysqli_num_rows($run_admin);
    if ($count==1) {
        $_SESSION['can302'] = $email;
        $row_admin = mysqli_fetch_array($run_admin);
        $_SESSION['user_id'] = $row_admin['id'];
        echo "<script>alert('Welcome ".$row_admin['name']."!')</script>";
        echo "<script>window.open('Homepage.php','_self')</script>";
    }
    else{
        echo "<script>alert('Email or Password is Wrong!')</script>";
    }
} elseif (isset($_POST['sign_up'])) {
	$pw_1 = $_POST['pass'];
	$pw_2 = $_POST['password2'];
	$u_name = $_POST['username'];
	$u_email = $_POST['email'];
	
	if ($pw_1 == $pw_2) {
		$check_admin = "SELECT * FROM user WHERE email='$u_email'";
		$run_check = mysqli_query($con, $check_admin);
		$check = mysqli_num_rows($run_check);
		
		if ($check==1) {
			echo "<script>alert('Email is already Exists!')</script>";
		} else {
			$add_user = "INSERT INTO user (name, password, email) VALUES ('$u_name', '$pw_1', '$u_email')";
			$add = mysqli_query($con, $add_user);
			if ($add) {
			    echo "<script>alert('Sign up successfully!')</script>";
			}
		}
		
	} else {
		echo "<script>alert('Two Passwords are not Same!')</script>";
	}
	
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>login</title>
    <script src="https://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
    <style>
        * {
            box-sizing:border-box;
        }
        body {
            font-family:'Montserrat',sans-serif;
            background:#f6f5f7;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            height:100vh;
            margin:-20px 0 50px;
        }
        h1 {
            font-weight:bold;
            margin:0;
        }
        p {
            font-size:14px;
            line-height:20px;
            letter-spacing:.5px;
            margin:20px 0 30px;
        }
        span {
            font-size:12px;
        }
        a {
            color:#333;
            font-size:14px;
            text-decoration:none;
            margin:15px 0;
        }
        .dowebok {
            background:#fff;
            border-radius:10px;
            box-shadow:0 14px 28px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.22);
            position:relative;
            overflow:hidden;
            width:768px;
            max-width:100%;
            min-height:480px;
        }
        .form-container form {
            background:#fff;
            display:flex;
            flex-direction:column;
            padding:0 50px;
            height:100%;
            justify-content:center;
            align-items:center;
            text-align:center;
        }
        .social-container {
            margin:20px 0;
        }
        .social-container a {
            border:1px solid #ddd;
            border-radius:50%;
            display:inline-flex;
            justify-content:center;
            align-items:center;
            margin:0 5px;
            height:40px;
            width:40px;
        }
        .social-container a:hover {
            background-color:#eee;
        }
        .form-container input {
            background:#eee;
            border:none;
            padding:12px 15px;
            margin:8px 0;
            width:100%;
            outline:none;
        }
        button {
            border-radius:20px;
            border:1px solid rgb(47, 107, 94);
            background:rgb(47, 107, 94);
            color:#fff;
            font-size:12px;
            font-weight:bold;
            padding:12px 45px;
            letter-spacing:1px;
            text-transform:uppercase;
            transition:transform 80ms ease-in;
            cursor:pointer;
        }
        button:active {
            transform:scale(.95);
        }
        button:focus {
            outline:none;
        }
        button.ghost {
            background:transparent;
            border-color:#fff;
        }
        .form-container {
            position:absolute;
            top:0;
            height:100%;
            transition:all .6s ease-in-out;
        }
        .sign-in-container {
            left:0;
            width:50%;
            z-index:2;
        }
        .sign-up-container {
            left:0;
            width:50%;
            z-index:1;
            opacity:0;
        }
        .overlay-container {
            position:absolute;
            top:0;
            left:50%;
            width:50%;
            height:100%;
            overflow:hidden;
            transition:transform .6s ease-in-out;
            z-index:100;
        }
        .overlay {
            background:rgb(47, 107, 94);
            background:linear-gradient(to right,rgb(47, 107, 94),rgb(47, 107, 94)) no-repeat 0 0 / cover;
            color:#fff;
            position:relative;
            left:-100%;
            height:100%;
            width:200%;
            transform:translateY(0);
            transition:transform .6s ease-in-out;
        }
        .overlay-panel {
            position:absolute;
            top:0;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            padding:0 40px;
            height:100%;
            width:50%;
            text-align:center;
            transform:translateY(0);
            transition:transform .6s ease-in-out;
        }
        .overlay-right {
            right:0;
            transform:translateY(0);
        }
        .overlay-left {
            transform:translateY(-20%);
        }
        /* Move signin to right */
        .dowebok.right-panel-active .sign-in-container {
            transform:translateY(100%);
        }
        /* Move overlay to left */
        .dowebok.right-panel-active .overlay-container {
            transform:translateX(-100%);
        }
        /* Bring signup over signin */
        .dowebok.right-panel-active .sign-up-container {
            transform:translateX(100%);
            opacity:1;
            z-index:5;
        }
        /* Move overlay back to right */
        .dowebok.right-panel-active .overlay {
            transform:translateX(50%);
        }
        /* Bring back the text to center */
        .dowebok.right-panel-active .overlay-left {
            transform:translateY(0);
        }
        /* Same effect for right */
        .dowebok.right-panel-active .overlay-right {
            transform:translateY(20%);
        }
    </style>
    <script>
    function validate_password2(password2) {
        var password = document.getElementById("password").value;
        //测试：console.log(password);
        //测试：console.log(password2);
        if (password == "") {
            document.getElementById("is_test_pw").innerHTML = "<font color='red' size='3px'>Password cannot be empty</font>";
        } else if (password == password2) {
            document.getElementById("is_test_pw").innerHTML = "<font color='green' size='3px'>√Same password entered twice</font>";
        } else {
            document.getElementById("is_test_pw").innerHTML = "<font color='red' size='3px'>The password entered twice is not the same</font>";
            // console.log("密码由数字和字母组成!");
        }
    }
</script>
</head>


<body>
<div class="dowebok" id="dowebok">
    <div class="form-container sign-up-container"> 
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <h1>Sign Up</h1>

            <span>Please enter your information</span>
            <input type="text" id="Username" name="username" placeholder="Username">
            
            <input type="text" id="idcard" name="email"required placeholder="Email">
            

            <input type="password" id="password" name="pass" required placeholder="Your Password">

            
            <input type="password" id="Password2" name="password2" onblur="validate_password2(this.value)" placeholder="Confirm your password">
            
			<input name="sign_up" value='Sign Up' type="submit" class="Button_Class">
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="" method="post">
            <h1>Sign In</h1>

            <span>or using your account</span>
            <input type="text" placeholder="Email Address" name="email" required>
            <input type="password" placeholder="Your Password" name="pass" required>
            <a href="###">Forgot your password?</ a>
            <button type="submit" style="margin-top: 8px" name="login">Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Already have account?</h1>
                <p>Please login with your account</p >
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>No account？</h1>
                <p>Register now to join us and start your journey with us!</p >
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<script>
    var signUpButton = document.getElementById('signUp')
    var signInButton = document.getElementById('signIn')
    var container = document.getElementById('dowebok')

    signUpButton.addEventListener('click', function() {
        container.classList.add('right-panel-active')
    })

    signInButton.addEventListener('click', function() {
        container.classList.remove('right-panel-active')
    })
</script>

</body>
</html>