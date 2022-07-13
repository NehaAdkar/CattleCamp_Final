<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($con, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead



?>

<html>
<head>	
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>

<style type="text/css">
.container{
	width: 53%;
    margin: 31px;
    margin-left: -13px;
    margin-top: 29px;
}
.Add{
	font-size: 26px;
    width: 25%;
    margin-left: 670;
    margin-top: 20px;
    font-family: cursive;
}
.table-bordered {
    border: 6px solid #171617;
}
.table {
    width: 200%;
    margin-bottom: 1rem;
    color: #1d1b1a;
    font-size: larger;
    font-family: cursive;
}
h1{
	font-size: 32px;
    width: 17%;
    margin-left: 620px;
    margin-top: 34px;
    font-family: cursive;
}
}


</style>

</head>

<body>
	<a href="/boot/index.php">Return to Dashboard</a><br>
	<h1>Farmers Profiles</h1>
<div class="container">
	 

	<table class="table table-striped table-bordered" style="width:170%  border="1" cellspacing = "1" 
                     cellpadding = "2" style="background-color:pink">
	
	<tr>
		<td>Name<br>(नाव)</td>
		<td>Card Number<br>(कार्ड क्रमांक)</td>
		<td>Image<br>(प्रतिमा)</td>
		<td>Age<br>(वय)</td>
		<td>Village<br>(गाव)</td>
		<td>Adhar Card<br>(आधार कार्ड)</td>
		<td>Application<br>(अर्ज)</td>
		<td>7/12 Form<br>(सातबारा)</td>
		<td>Small Animals<br>(लहान प्राणी)</td>
		<td>Big Animals<br>(मोठे प्राणी)</td>
		<td>Cows<br>(गायी)</td>
		<td>Bulls<br>(बैल)</td>
		<td>Calf<br>(वासरू)</td>
        <td>Total Animals<br>(एकूण प्राणी)</td>
		<td>Created On<br>(नोंदणीकृत तारीख)</td>
		<td>Updated On</td>
		<td>Options<br>(पर्याय)</td>

	</tr>
	<?php 

	
	
	
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	
	$result = mysqli_query($con, "SELECT * FROM users");
	
	while($res = mysqli_fetch_array($result)) 
	{ 		
		echo "<tr>";
		echo "<td width='100'>".$res['name']."</td>";
		echo "<td>".$res['cardno']."</td>";
		echo  "<td><a href='$res[image]'><img src='".$res['image']."' height='100' width='100'/></a></td>";
		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['village']."</td>";
		echo  "<td><a href='$res[adhar]'><img src='".$res['adhar']."' height='100' width='100'/></a></td>";
		echo  "<td><a href='$res[application]'><img src='".$res['application']."' height='100' width='100'/></a></td>";
		echo  "<td><a href='$res[satbara]'><img src='".$res['satbara']."' height='100' width='100'/></a></td>";
		echo "<td>".$res['small']."</td>";
		echo "<td>".$res['big']."</td>";
		echo "<td>".$res['cow']."</td>";
		echo "<td>".$res['bull']."</td>";
		echo "<td>".$res['calf']."</td>";
		echo "<td>".$res['total']."</td>";	
		echo "<td>".$res['created_at']."</td>";
		echo "<td>".$res['updated_at']."</td>";

		echo "<td><a  href=\"log.php?id=$res[id]\">Admin</a></td>";

		//echo "<td ><a  href=\"log.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
	
	<div class="Add"><a href="add.html"> Add New Data</a><br/><br/></div>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<?php

                     // total farmars
                    $sql ="SELECT count(id) AS total from users";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $num_rows=$values['total'];
					echo "Total Farmers Registered :".$num_rows;

					// total small animals
					$sql ="SELECT SUM(small) AS total from users";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $small=$values['total'];
					echo "<br>Total Small Animals Registered :".$small;

					// total small animals
					$sql ="SELECT SUM(big) AS total from users";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $big=$values['total'];
					echo "<br>Total Big Animals Registered :".$big;


					// total small animals
					$sql ="SELECT SUM(cow) AS total from users";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $cow=$values['total'];
					echo "<br>Total Cow Registered :".$cow;


					// total small animals
					$sql ="SELECT SUM(bull) AS total from users";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $bull=$values['total'];
					echo "<br>Total Bull Registered :".$bull;

					// total small animals
					$sql ="SELECT SUM(calf) AS total from users";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $calf=$values['total'];
					echo "<br>Total Calf Registered :".$calf;

?>    


</body>
</html>
