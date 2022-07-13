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
<title>Admin Role Based Access Control</title>
</head>
<style type="text/css">
p{
   font-size: 18px;
    font-family: cursive;
}

   </style>
<div style="background-color: aqua;width: max-content;margin-left: 598px;margin-top: 100px;border: ridge;border-radius: 38px;" align="center">
<h3 style=" font-family:cursive; ">Role Based Access Control System</h3> <div class="imgcontainer" style="margin: 24px 0 12px 0;width: 40%;border-radius: 50%;">
    <img src="/boot/images/avatars-profile-picture-5.png" alt="Avatar" class="avatar" style="width: 55%;border-radius: 47%;">
  </div>
<form method="POST" action="" style="margin-left: -42px;">
<table>
   <tr>
     <td><p>Username:<p></td>
  <td><input type="text" name="username"/></td>
   </tr>
   <tr>
     <td><p>Password:<p></td>
  <td><input type="text" name="password"/></td>
   </tr>
   <tr>
     <td></td>
  <td><input type="submit" name="login" value="Login" style="
    width: 59%;
    height: 32px;
    margin-left: 23px;
    margin-top: 18px;
    font-size: 16px;
    border-radius: 41px;
    font-family: cursive;
    background: #68f700cc;
"/></td>
   </tr>
</table>
</form>
<?php if(isset($error)){ echo $error; }?>
</div>
</html>