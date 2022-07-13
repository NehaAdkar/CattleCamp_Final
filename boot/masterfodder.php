<?php
         
         $databaseHost = 'localhost';
         $databaseName = 'fod1';
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
   </head>
   
   <body>
     
        <?php  
        
        if(isset($_POST['add']))
        {

         $f_id = mysqli_real_escape_string($conn, $_POST['f_id']);
         $f_used = mysqli_real_escape_string($conn, $_POST['f_used']);
         $f_avail = mysqli_real_escape_string($conn, $_POST['f_avail']);
         $dop = mysqli_real_escape_string($conn, $_POST['dop']);
       
      
         if(empty($f_id) || empty($f_used) || empty($f_avail) || empty($dop) ) {
				
            if(empty($f_id)) {
               echo "<font color='red'>id field is empty.</font><br/>";
            }
            if(empty($f_used)) {
               echo "<font color='red'>used field is empty.</font><br/>";
            }
            if(empty($f_avail)) {
               echo "<font color='red'>available field is empty.</font><br/>";
            }
      
            if(empty($dop)) {
               echo "<font color='red'>dop field is empty.</font><br/>";
            }
           
         }else{
            
            $sql = "INSERT INTO fodder1(id,f_id,f_avail,f_used,dop) VALUES('','$f_id','$f_avail','$f_used','$dop')";
            $data = mysqli_query($conn, $sql);
   
            if($data) 
            {
               echo "Record  Inserted ";
            }else{
               echo " Record Failed Insert!!!";
   
           }

         }
         
      }
         
       ?>

<div class="container">
<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Fodder Information</li>
        </ol>

  <p>Please Enter your Information:</p>
       
               <form method = "post" action = "">
               <table class="table " >

                   <thead>
      <tr>

      <div class="form-group row">
  <label for="f_id" class="col-2 col-form-label">Fodder Type</label>
  <div class="col-10">
  <select class="form-control" id="f_id" name="f_id">
      <option>Wheat</option>
      <option>Grass</option>
      <option>Corn</option>
      <option>Hay</option>
    </select>
  </div>

                       
                        </tr></thead>
                  
                     <thead>
      <tr>
      <div class="form-group row">
  <label for="f_avail"  class="col-2 col-form-label">Fodder Available</label>
  <div class="col-10">
    <input class="form-control" type="number" value="" id="f_avail" name="f_avail">
  </div>
</div>
                        
                           </tr></thead>
                  
                     <thead>
      <tr>
      <div class="form-group row">
      <label for="f_used"  class="col-2 col-form-label">Fodder Used</label>
  <div class="col-10">
    <input class="form-control" type="number" value="" id="f_used" name="f_used">
  </div>
  </div>
      
                        
                           </tr></thead>
			

                     <thead>
      <tr>
      <div class="form-group row">
      <label for="dop"  class="col-2 col-form-label">Date</label>
  <div class="col-10">
    <input class="form-control" type="date" value="" id="dop" name="dop">
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
                     
  //To display the data 
   $sql_Query ="select * from fodder1"; 
   $retResult = mysqli_query($conn,$sql_Query);
   echo "<table width='100' height='100' border='2' cellspacing = '2' 
   cellpadding = '5' ;  width: 56%;' ><tr><th>Fodder Type</th><th>Fodder Available</th><th>Fodder Used</th><th>Date</th><th>Created at</th><th>Updated On</th></tr>"; 
   while($row = mysqli_fetch_array($retResult))
      {
      echo "<tr><td>{$row['f_id']}</td><td>{$row['f_avail']}</td><td>{$row['f_used']}</td><td>{$row['dop']}</td><td>{$row['created_at']}</td><td>{$row['updated_at']}</td></tr>"; 

      } 
    echo "</table>";
      // mysql_close($con);
         }
 

               
      ?>          
      
      <?php
      // total Fodder available
					$sql ="SELECT SUM(f_avail) AS total from fodder1";
               $result=mysqli_query($conn,$sql);
               $values=mysqli_fetch_assoc($result);
               $f_avail=$values['total'];
               echo "<br>  Total Fodder available   :   ".$f_avail;

      // total Fodder used
               $sql ="SELECT SUM(f_used) AS total from fodder1";
               $result=mysqli_query($conn,$sql);
               $values=mysqli_fetch_assoc($result);
               $f_used=$values['total'];
               echo "Kg<br> Total Fodder used  :  ".$f_used;
               echo "Kg<br>"

               ?>
   
   </body>
</html>
