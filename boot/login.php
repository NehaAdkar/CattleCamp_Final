<?php
session_start();
$conn = mysqli_connect("localhost","root","","student");
	
$message="";
if(!empty($_POST["login"])) {
	$result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["user_id"] = $row['user_id'];
	} else {
	$message = "Invalid Email or Password!";
	}
}
if(!empty($_POST["logout"])) {
	$_SESSION["user_id"] = "";
	session_destroy();
}
?>
<html>
<head>
<title>User Login</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<style>

.field-group { 
	margin:15px 0px; 
}
.input-field {
	padding: 8px;
	width: 250px;
	border: #A3C3E7 1px solid;
	border-radius: 13px; 
}
.form-submit-button {
	margin-left: 10px;
	background: #65C370;
	border: 0;
	padding: 8px 20px;
	border-radius: 10px;
	color: #FFF;
	text-transform: uppercase; 
}
.member-dashboard {
    
    border-radius: 250px;
    display: inline-block;
    text-align: center;
}
.logout-button {
	color: #09F;
	text-decoration: none;
	background: none;
	border: none;
	padding: 0px;
	cursor: pointer;
}
.error-message {
	text-align:center;
	color:#FF0000;
}
.demo-content label{
	width:auto;
}
</style>
<body>
<div style="background-color: aqua;width: max-content; border-radius: 21px; margin-left: 560px;margin-top: 74px;border: ridge;" align="center">
<h3 style="font-size: 31px;font-family: cursive;">Login Page</h3> <div class="imgcontainer" style="margin: 24px 0 12px 0;width: 40%;border-radius: 50%;">
    <img src="/boot/images/avatars-profile-picture-5.png" alt="Avatar" class="avatar" style="width: 55%;border-radius: 47%;">
  </div>
  <div>
<?php if(empty($_SESSION["user_id"])) { ?>
<form action="" method="post" id="frmLogin">
	<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>	
	<div class="field-group">
		<div><label for="email">Enter  Email</label></div>
		<div><input name="email" type="text" class="input-field"></div>
	</div>
	<div class="field-group">
		<div><label for="password">Enter Password</label></div>
		<div><input name="password" type="password" class="input-field"> </div>
	</div>
	<div class="field-group">
<div><input type="submit" name="login" value="Login" class="form-submit-button"><a class="form-submit-button" href="registration.html">Registration</a></div>

	</div>       
</form>
<?php 
} else { 
$result = mysqli_query($conn,"SELECT * FROM users WHERE user_id='" . $_SESSION["user_id"] . "'");
$row  = mysqli_fetch_array($result);
?>
<form action="" method="post" id="frmLogout">
<div class="member-dashboard" style="margin-left: -78px;margin-top: 28px;margin-right: -67px;"><p  style="margin-left: -92px;">Welcome<p><h6 style="font-size: 16px;font-family: cursive;margin-top: -38px;margin-left: 93px;"><?php echo ucwords($row['firstname']); ?> <?php echo ucwords($row['lastname']); ?></h6> You have successfully logged in!<br><br>
<a class="btn btn-primary" href="wt6/index.php">Farmers Profiles</a>
<a class="btn btn-primary" href="fodder.php">Fodder Profile</a>
<a class="btn btn-primary" href="masterfodder.php">Fodder Information</a><br><br>

Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
</form>
</div>
<?php } ?>
</body></html>