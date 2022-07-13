<?php
// including the database connection file
include_once("config.php");
if(isset($_POST['update']))
{	
	$id = mysqli_real_escape_string($con, $_POST['id']);
	$name = mysqli_real_escape_string($con, $_POST['name']);

	$cardno = mysqli_real_escape_string($con, $_POST['cardno']);
	$age = mysqli_real_escape_string($con, $_POST['age']);
	$village = mysqli_real_escape_string($con, $_POST['village']);
	$small = mysqli_real_escape_string($con, $_POST['small']);	
	$big = mysqli_real_escape_string($con, $_POST['big']);
	$cow = mysqli_real_escape_string($con, $_POST['cow']);
	$bull = mysqli_real_escape_string($con, $_POST['bull']);	
	$calf = mysqli_real_escape_string($con, $_POST['calf']);
	$total = mysqli_real_escape_string($con, $_POST['total']);
	$created_at = mysqli_real_escape_string($con, $_POST['created_at']);


	
	// checking empty fields
	if(empty($name) && empty($cardno)  && empty($folder) && empty($filename) && empty($age) && empty($village) && empty($adharfolder) && empty($appfolder) && empty($small) && empty($big) && empty($cow) && empty($bull) && empty($calf) && empty($total) && empty($created_at)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if(empty($cardno)) {
			echo "<font color='red'>cardno field is empty.</font><br/>";
		}
		if(empty($folder)) {
			echo "<font color='red'>image field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		if(empty($filename)) {
			echo "<font color='red'>image field is empty.</font><br/>";
		}
		if(empty($village)) {
			echo "<font color='red'>village field is empty.</font><br/>";
		}
		
		if(empty($adharfolder)) {
			echo "<font color='red'>Upload your adhaar card.</font><br/>";
		}
		if(empty($appfolder)) {
			echo "<font color='red'>Upload your application.</font><br/>";
		}
		
		if(empty($small)) {
			echo "<font color='red'>small field is empty.</font><br/>";
		}
		
		if(empty($big)) {
			echo "<font color='red'>big field is empty.</font><br/>";
		}
		if(empty($cow)) {
			echo "<font color='red'>cow field is empty.</font><br/>";
		}
		if(empty($bull)) {
			echo "<font color='red'>bull field is empty.</font><br/>";
		}
		if(empty($calf)) {
			echo "<font color='red'>calf field is empty.</font><br/>";
		}
		if(empty($total)) {
			echo "<font color='red'>total field is empty.</font><br/>";
		}

		if(empty($created_at)) {
			echo "<font color='red'>date field is empty.</font><br/>";
		}


	} else {	
		//updating the table
		$result = mysqli_query($con, "UPDATE users SET name='$name',cardno='$cardno',image='$folder',age='$age',village='$village',adhar='$adharfolder',application='$appfolder',small='$small',big='$big',cow='$cow',bull='$bull',calf='$calf',total='$total' WHERE id=$id");
		$data = mysqli_query($con,$result);
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>

<?php
//getting id from url
$id = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM users WHERE id=$id") or die("Error: " . mysqli_error($con));
while($res = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
{
	$name = $res['name'];
	$cardno = $res['cardno'];

	$age = $res['age'];
	$village = $res['village'];

	$small = $res['small'];
	$big = $res['big'];
	$cow = $res['cow'];
	$bull = $res['bull'];
	$calf = $res['calf'];
	$total = $res['total'];

	
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>
<script type="text/javascript">
	function calc(A,B,SUM) {

	  var one = Number(A);
	  if (isNaN(one)) 
	  {
		   alert('Invalid entry: '+A); 
		   one=0; 
		   }
	  var two = Number(document.getElementById(B).value); 
	  if (isNaN(two)) 
	  { 
		  alert('Invalid entry: '+B); 
		  two=0; 
		}
		

			document.getElementById(SUM).value = one + two;

		
         
	}
	</script>
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php" enctype="multipart/form-data"> 
		<table border="0">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
				
			</tr>
			<tr>
				<td>Card Number</td>
				<td><input type="text" name="cardno" value="<?php echo $cardno;?>"></td>
			</tr>
			<tr>
				<td>Image</td>
				<td><input type="file" name="uploadfile" value="<?php echo $folder;?>"></td>
			</tr>
			<tr>
				<td>Age</td>
				<td><input type="number" name="age" value="<?php echo $age;?>"></td>
			</tr>
			<tr>
				<td>Village</td>
				<td><input type="text" name="village" value="<?php echo $village;?>"></td>
			</tr>
			<tr>
				<td>Adhar Card</td>
				<td><input type="file" name="uploadadhar" value="<?php echo $adharfolder;?>"/></td>
			</tr>
			<tr>
				<td>Application</td>
				<td><input type="file" name="application" value="<?php echo $appfolder;?>"></td>
			</tr>
			<tr>
				<td>Satbara</td>
				<td><input type="file" name="satbara" value="<?php echo $satbara;?>"></td>
			</tr>
			<tr>
				<td>small</td>
				<td><input type="number" id="small" name="small" value="<?php echo $small;?>" min="0" max="5" onChange="calc(this.value,'big','total')"></td>
			</tr>
			<tr>
				<td>big</td>
				<td><input type="number" id="big" name="big" min="0"  max="5" onChange="calc(this.value,'small','total')" name="big" value="<?php echo $big;?>"></td>
			</tr>
			
			<tr>
				<td>Cow</td>
				<td><input type="number" name="cow" value="<?php echo $cow;?>"></td>
			</tr>
			<tr>
				<td>Bull</td>
				<td><input type="number" name="bull" value="<?php echo $bull;?>"></td>
			</tr>
			<tr>
				<td>Calf</td>
				<td><input type="number" name="calf" value="<?php echo $calf;?>"></td>
			</tr>
			<tr>
				<td>total</td>
				<td><input type="number" id="total" name="total" min="0"  max="5" readonly style="border:5px;" value="<?php echo $total;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
			
			
		</table>
	</form>
</body>
</html>
