<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($con, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead



?>

<html>
<head>	
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Charts</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">CattleCamp</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.php">Login</a>
          <a class="dropdown-item" href="register.php">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          
        </div>
      
      <li class="nav-item">
        <a class="nav-link" href="add.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Farmer</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fodder.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Fodder</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="masterfodder.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Master Fodder</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cattles.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Cattle</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="insp.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Inspection</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-table"></i>
          <span>About Us</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-table"></i>
          <span>Contact Us</span></a>
      </li>
    </ul>


</head>

<body>


	


<div class="container"style="margin-top: 150px;">
<table class="table table-condensed">
	
<thead><tr>
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
	
		<td>Options<br>(पर्याय)</td>

	</tr></thead>
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
		//echo "<td>".$res['created_at']."</td>";
		//echo "<td>".$res['updated_at']."</td>";

		echo "<td><a  href=\"log.php?id=$res[id]\">Admin</a></td>";

		//echo "<td ><a  href=\"log.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
	
	<div class="Add"><a href="add.html"> Add New Data</a><br/><br/></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="container justify"  style="margin-left: 20px;">



  <button type="button" class="btn btn-light p-1" title="Total Farmers"><span class="" style="">Total Farmers </span> <span class="badge badge-success" id="totalfarmer">
<?php

                     // total farmars
                    $sql ="SELECT count(id) AS total from users";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $num_rows=$values['total'];
					echo "".$num_rows;

          ?>
</span> </button>

<button type="button" class="btn btn-light p-1 mr-2" title="Small Animals"><span class="" style="">Small Animals </span> <span class="badge badge-info" id="small">

          <?php
					// total small animals
					$sql ="SELECT SUM(small) AS total from users";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $small=$values['total'];
					echo "".$small;
          ?>
          </span> </button>


          <button type="button" class="btn btn-light p-1 mr-2" title="Big Animals"><span class="" style="">Big Animals </span> <span class="badge badge-info" id="big">
          <?php
					// total small animals
					$sql ="SELECT SUM(big) AS total from users";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $big=$values['total'];
          echo "   ".$big;
          ?>   
          </span> </button>
          
</div>

</body>
</html>
