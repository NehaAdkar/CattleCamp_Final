<?php
session_start();
$conn=mysqli_connect('localhost','root','','codenair');
//Getting Input value
if(isset($_POST['login'])){
  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $password=mysqli_real_escape_string($conn,$_POST['password']);
  if(empty($username)&&empty($password)){
  $error= 'Fileds are Mandatory';
  }else{
 //Checking Login Detail
 $result=mysqli_query($conn,"SELECT*FROM user WHERE username='$username' AND password='$password'");
 $row=mysqli_fetch_assoc($result);
 $count=mysqli_num_rows($result);
 if($count==1){
      $_SESSION['user']=array(
   'username'=>$row['username'],
   'password'=>$row['password'],
   'role'=>$row['role']
   );
   $role=$_SESSION['user']['role'];
   //Redirecting User Based on Role
    switch($role){
  case 'user':
  header('location:user.php');
  break;
  case 'moderator':
  header('location:moderator.php');
  break;
  case 'admin':
  header('location:admin.php');
  break;
 }
 }else{
 $error='Your PassWord or UserName is not Found';
 }
}
}
?>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Role wise Acess</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>


<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Login with Admin</div>
      <div class="card-body">
<form method="POST" action="">

           <div class="form-group">
            <div class="form-label-group">
                  <input type="text" id="username" name="username" class="form-control" placeholder="name" required="required" >
                  <label for="username">Name</label>
                </div>
                </div>
             
              
                <div class="form-group">
            <div class="form-label-group">
                  <input type="password" id="password" name="password" class="form-control" placeholder="password" required="required">
                  <label for="password">Password</label>
                </div>
              </div>
          

     <input type="submit" name="login" value="Login"/>
   
</form>

          </div>
          </div>
          </div>
          
<?php if(isset($error)){ echo $error; }?>

</html>