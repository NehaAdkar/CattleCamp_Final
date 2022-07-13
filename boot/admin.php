<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:log.php');
}
//Restrict User or Moderator to Access Admin.php page
if($_SESSION['user']['role']=='user'){
 header('location:user.php');
}
if($_SESSION['user']['role']=='moderator'){
 header('location:moderator.php');
}
?>
<h1>Wellcome to <?php echo $_SESSION['user']['username'];?> Page</h1>
<a  href="edit.php?id=$res[id]\">Edit</a> | <a href="delete.php?id=$res[id]\" >Delete</a>
 
 
<link rel="stylesheet" href="style.css" type="text/css"/>
<div id="profile">
<h2>User name is: <?php echo $_SESSION['user']['username'];?> and Your Role is :<?php echo $_SESSION['user']['role'];?></h2>
<div id="logout"><a href="logout1.php">Please Click To Logout</a></div>
</div>