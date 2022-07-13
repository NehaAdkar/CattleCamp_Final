<?php
$databaseHost = 'localhost';
$databaseName = 'fod';
$databaseUsername = 'root';
$databasePassword = '';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($conn, "SELECT * FROM fodder ORDER BY id DESC"); // using mysqli_query instead



?>

<html>
<head>	
	<title>Display</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>

<style type="text/css">
.container{
	width: 153%;
    margin: 31px;
    margin-left: -16px;
    margin-top: 29px;
}
.Add{
	font-size: 22px;
    width: 14%;
    margin-left: 854px;
    margin-top: 20px;
    background-color: #fb9f9ffc;
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
	font-size: 37px;
    width: 32%;
    margin-left: 574px;
    margin-top: 20px;
    background-color: #fb9f9ffc;
    font-family: cursive;
}
}


</style>

</head>

<body>
	<h1>Display Fodder Information</h1>
<div class="container">
	 

	<table class="table table-striped table-bordered" style="width:170%">
	
	<tr>
		<td>Fodder Type</td>
        <td>Vendor Name </td>
        <td>Vendor Contact</td>
        <td>Vendor City</td>
		<td>Fodder weight</td>
		<td>Date of Purchase</td>
		<td>Date of recieved</td>
        <td>PO Receipt</td>
        <td>Created at</td>
        <td>Updated on</td>
        <td>Options</td>



		
	</tr>
	<?php 

	
	
	
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	
	$results = mysqli_query($conn, "SELECT * FROM fodder") or die("Error: " . mysqli_error($conn));
	
	while($res = mysqli_fetch_array($results)) 
	{ 		

        echo "<tr>";
        echo "<td>".$res['f_type']."</td>";
        echo "<td>".$res['v_name']."</td>";
        echo "<td>".$res['v_con']."</td>";
        echo "<td>".$res['v_city']."</td>";
        echo "<td>".$res['f_weight']."</td>";
        echo "<td>".$res['dop']."</td>";
    	echo "<td>".$res['dor']."</td>";
        echo  "<td><a href='$res[receipt]'><img src='".$res['receipt']."' height='100' width='100'/></a></td>";
        echo "<td>".$res['created_at']."</td>";
        echo "<td>".$res['updated_at']."</td>";
	//	echo "<td><a  href=\"log.php?id=$res[id]\">Admin</a></td>";

		//echo "<td><a  href=\"del.php?id=$res[id]\">Delete</a></td>";

		
	echo "<td ><a  href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"del.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
        echo "</tr>";

     
    }
	?>
	</table>
	
	


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</body>
</html>
