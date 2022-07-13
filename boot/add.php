
<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['Submit'])) {	
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
	$date = mysqli_real_escape_string($con, $_POST['date']);	
	
				
		//FOR UPLOADING IMAGE 
		


        $filename = $_FILES["image"]["name"];
		$tempname = $_FILES["image"]["tmp_name"];
		$folder = "image/".$filename;

		//echo $folder;
		move_uploaded_file($tempname,$folder);
		
		//FOR UPLOADING ADHAAR CARD 
		$adharname = $_FILES["adhar"]["name"];
		$adhartempname = $_FILES["adhar"]["tmp_name"];
		$adharfolder = "adhar/".$adharname;

		//echo $folder;
		move_uploaded_file($adhartempname,$adharfolder);

		//FOR UPLOADING APPLICATION  
		$appname = $_FILES["application"]["name"];
		$apptempname = $_FILES["application"]["tmp_name"];
		$appfolder = "application/".$appname;

		//echo $folder;
		move_uploaded_file($apptempname,$appfolder);

		//FOR UPLOADING SATBARA FORM  
		$formname = $_FILES["satbara"]["name"];
		$formtempname = $_FILES["satbara"]["tmp_name"];
		$formfolder = "satbara/".$formname;

		//echo $folder;
		move_uploaded_file($formtempname,$formfolder);

	// checking empty fields
	if(empty($name) && empty($cardno) && empty($filename) && empty($age) && empty($village) && empty($adharname) && empty($appname) && empty($formname) && empty($small) && empty($big) && empty($cow) && empty($bull) && empty($calf) && empty($total) && empty($date)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		elseif(empty($cardno)) {
			echo "<font color='red'>cardno field is empty.</font><br/>";
		}
		elseif(empty($filename)) {
			echo "<font color='red'>Upload your Photo.</font><br/>";
		}

		elseif(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		elseif(empty($adharname)) {
			echo "<font color='red'>Upload your adhaar card.</font><br/>";
		}
		elseif(empty($appname)) {
			echo "<font color='red'>Upload your application.</font><br/>";
		}
		elseif(empty($formname)) {
			echo "<font color='red'>Upload your satbara form.</font><br/>";
		}
		elseif(empty($village)) {
			echo "<font color='red'>village field is empty.</font><br/>";
		}
		elseif(empty($small)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		elseif(empty($big)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		elseif(empty($cow)) {
			echo "<font color='red'>cow field is empty.</font><br/>";
		}
		elseif(empty($bull)) {
			echo "<font color='red'>bull field is empty.</font><br/>";
		}
		elseif(empty($calf)) {
			echo "<font color='red'>calf field is empty.</font><br/>";
		}
		elseif(empty($total)) {
			echo "<font color='red'>village field is empty.</font><br/>";
		}

		elseif(empty($date)) {
			echo "<font color='red'>village field is empty.</font><br/>";
		}


		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
		
		//insert data to database	
		$result = mysqli_query($con, "INSERT INTO users(name,cardno,image,age,village,adhar,application,satbara,small,big,cow,bull,calf,total,date) VALUES('$name','$cardno','$folder','$age','$village','$adharfolder','$appfolder','$formfolder','$small','$big','$cow','$bull','$calf','$total','$date')");
		
		//display success message
		echo "<font color='green'>Data added Successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
		
	}
}
?>
</body>
</html>
