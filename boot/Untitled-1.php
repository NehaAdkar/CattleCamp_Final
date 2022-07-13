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
#frmLogin { 
	margin-left: 557px;
    margin-top: 95px;
	padding: 20px 60px;
	background: #B6E0FF;
	color: #555;
	display: inline-block;
	border-radius: 4px; 
}
.field-group { 
	margin:15px 0px; 
}
.input-field {
	padding: 8px;width: 200px;
	border: #A3C3E7 1px solid;
	border-radius: 4px; 
}
.form-submit-button {
	background: #65C370;
	border: 0;
	padding: 8px 20px;
	border-radius: 4px;
	color: #FFF;
	text-transform: uppercase; 
}
.member-dashboard {
    padding: 139px;
    background: #D2EDD5;
    color: #555;
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
<div>
<div style="display:block;margin:0px auto;">
<?php if(empty($_SESSION["user_id"])) { ?>
<form action="" method="post" id="frmLogin">
	<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>	
	<div class="field-group">
		<div><label for="email">Email</label></div>
		<div><input name="email" type="text" class="input-field"></div>
	</div>
	<div class="field-group">
		<div><label for="password">Password</label></div>
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
<div class="member-dashboard">Welcome <?php echo ucwords($row['firstname']); ?> <?php echo ucwords($row['lastname']); ?> , You have successfully logged in!<br><br>
<a class="btn btn-primary" href="wt6/index.php">Farmers Profiles</a><br><br>
<a class="btn btn-primary" href="fodder.php">Fodder Profile</a><br><br>
<a class="btn btn-primary" href="masterfodder.php">Fodder Information</a><br><br>


Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
</form>
</div>
</div>
<?php } ?>
</body></html>