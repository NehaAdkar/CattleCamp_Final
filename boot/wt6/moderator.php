<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:index.php');
}
//Restrict User or admin to Access moderator.php page
if($_SESSION['user']['role']=='user'){
 header('location:user.php');
}
if($_SESSION['user']['role']=='admin'){
 header('location:admin.php');
}
?>
<h1>Welcome  <?php echo ucwords($_SESSION['user']['username']);?></h1>
<h2>User name is: <?php echo ucwords($_SESSION['user']['username']);?> and Your Role is :<?php echo ucwords($_SESSION['user']['role']);?></h2>
<?php


include_once("config.php");


$result = mysqli_query($con, "SELECT * FROM users");
	
   while($res = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
    {
        echo "<td ><h4 style='font-size:22px;font-family:cursive;'>Name :- $res[name]  :--<a  href=\"edit.php?id=$res[id]\">Edit</a></h4></td><br>";		
    }

 ?>
 <br> <br>
 
<link rel="stylesheet" href="style.css" type="text/css"/>
<div id="profile">
<div id="logout"><a href="logout1.php">Please Click To Logout</a></div>
</div>