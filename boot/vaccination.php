<?php
         
         $databaseHost = 'localhost';
         $databaseName = 'vacci';
         $databaseUsername = 'root';
         $databasePassword = '';
         $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

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

   
   <body>
     
        <?php  
        
        if(isset($_POST['add']))
   {

         $name = mysqli_real_escape_string($conn, $_POST['name']);
         $desig = mysqli_real_escape_string($conn, $_POST['desig']);
         $con = mysqli_real_escape_string($conn, $_POST['con']);
         $vaccinated = mysqli_real_escape_string($conn, $_POST['vaccinated']);
        
         if(empty($name) || empty($desig) || empty($con) || empty($vaccinated)) {
				
            if(empty($name)) {
               echo "<font color='red'>Name field is empty.</font><br/>";
            }
            if(empty($desig)) {
               echo "<font color='red'>cardno field is empty.</font><br/>";
            }
            if(empty($con)) {
               echo "<font color='red'>contact field is empty.</font><br/>";
            }
            if(empty($vaccinated)) {
               echo "<font color='red'>vaccinated field is empty</font><br/>";
            }
         }else{

         $sql = "INSERT INTO vaccination(id,name,desig,con,vaccinated) VALUES('','$name','$desig','$con','$vaccinated')";
         $data = mysqli_query($conn, $sql);

         if($data) 
         {
            echo "Record  inserted ";
         }else{
            echo "Failed";

         }
           
      
      }

      
}
?>


<div class="container">
<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Vaccination</li>
        </ol>

  <p>Please Enter your Information:</p>

               <form method = "post" action = "" enctype="multipart/form-data">
               <fieldset>
               
               <table class="table " >
               
               <thead>
               <tr>
               <div class="form-group row">
  <label for="name" class="col-2 col-form-label">Doctor Name</label>
  <div class="col-10">
    <input class="form-control" type="text" value="" id="name" name="name">
  </div>
</div>
                        
                           </tr></thead>
                  
                     
               <thead>
      <tr>
      <div class="form-group row">
  <label for="desig" class="col-2 col-form-label">Designation</label>
  <div class="col-10">
    <input class="form-control" type="text" value="" id="desig" name="desig">
  </div>
</div>
                       
                           </tr></thead>
                     <thead>
      <tr>
      <div class="form-group row">
  <label for="con" class="col-2 col-form-label">Mobile No</label>
  <div class="col-10">
    <input class="form-control" type="text" value="" id="con" name="con">
  </div>
</div>
                        
                           </tr></thead>
                  
                     <thead>
      <tr>
      <div class="form-group row">
  <label for="vaccinated" class="col-2 col-form-label">Vaccinated</label>
  <div class="col-10">
    <input class="form-control" type="number" value="" id="vaccinated" name="vaccinated">
  </div>
</div>
                        
                           </tr></thead>
         
                 
                     <thead>
      <tr>
                         <button name = "add" type = "submit" id = "add" class="btn btn-primary">Add</button>
                        <button name = "display" type = "submit" id = "display" class="btn btn-success">Display</button>
                        </tr></thead>                  
                  </table>
               </fieldset>
               </form>


               <?php
if (isset($_POST['display']))
         {

            $name = mysqli_real_escape_string($conn, $_POST['name']);
         $desig = mysqli_real_escape_string($conn, $_POST['desig']);
         $vaccinated = mysqli_real_escape_string($conn, $_POST['vaccinated']);
       
                     
            //To display the data 
                 $sql_Query ="select * from vaccination"; 
                $retResult = mysqli_query($conn,$sql_Query);
                echo "<table border='1' cellspacing ='1' 
                cellpadding = '2' style='background-color:pink; width:55%;'><tr><th>Doctor Name</th><th>Designation</th><th>Mobile No.</th><th>Vaccinated</th><th>Created at</th></tr>"; 
            while($row = mysqli_fetch_array($retResult))
                 {
                echo "<tr><td>{$row['name']}</td><td>{$row['desig']}</td><td>{$row['con']}</td><td>{$row['vaccinated']}</td><td>{$row['created_at']}</td></tr>"; 
                
                 } 
                 echo "</table>";
               // mysql_close($con);
                }   
         
      ?>          
             
        </body>
</html>

<?php
                     // total vaccinations
					     $sql ="SELECT SUM(vaccinated) AS total from vaccination";
                    $result=mysqli_query($conn,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $vaccinated=$values['total'];
                    echo "<br>Total Vaccinations done till today  :".$vaccinated;

                  
               


               ?>