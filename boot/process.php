<?php
include("config.php");
?>
<?php

if(isset($_POST)){

	$firstname 		= $_POST['firstname'];
	$lastname 		= $_POST['lastname'];
	$email 			= $_POST['email'];
	$phonenumber	= $_POST['phonenumber'];
	//$password 		= sha1($_POST['password']);
	$password 		= $_POST['password'];


	$query = "INSERT INTO users VALUES('','$firstname ','$lastname','$email','$phonenumber','$password');";
	$data = mysqli_query($con,$query);
	
		if($data){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}