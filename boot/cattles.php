<?php

$databaseHost = 'localhost';
$databaseName = 'test';
$databaseUsername = 'root';
$databasePassword = '';
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 





	                 // total farmars
                     $sql ="SELECT count(id) AS total from users";
                     $result=mysqli_query($con,$sql);
                     $values=mysqli_fetch_assoc($result);
                     $num_rows=$values['total'];
                    // echo "Total Farmers Registered :".$num_rows;
 
                     // total small animals
                     $sql ="SELECT SUM(small) AS total from users";
                     $result=mysqli_query($con,$sql);
                     $values=mysqli_fetch_assoc($result);
                     $small=$values['total'];
                     //echo "<br>Total Small Animals Registered :".$small;
 
                     // total small animals
                     $sql ="SELECT SUM(big) AS total from users";
                     $result=mysqli_query($con,$sql);
                     $values=mysqli_fetch_assoc($result);
                     $big=$values['total'];
                    // echo "<br>Total Big Animals Registered :".$big;
 
 
                     // total small animals
                     $sql ="SELECT SUM(cow) AS total from users";
                     $result=mysqli_query($con,$sql);
                     $values=mysqli_fetch_assoc($result);
                     $cow=$values['total'];
                    // echo "<br>Total Cow Registered :".$cow;
 
 
                     // total small animals
                     $sql ="SELECT SUM(bull) AS total from users";
                     $result=mysqli_query($con,$sql);
                     $values=mysqli_fetch_assoc($result);
                     $bull=$values['total'];
                     //echo "<br>Total Bull Registered :".$bull;
 
                     // total small animals
                     $sql ="SELECT SUM(calf) AS total from users";
                     $result=mysqli_query($con,$sql);
                     $values=mysqli_fetch_assoc($result);
                     $calf=$values['total'];
                     //echo "<br>Total Calf Registered :".$calf;

                     

                    $query="select SUM(total) as 'totalcattles' from users";
                    $res=mysqli_query($con,$query);
                    $data=mysqli_fetch_assoc($res);
                    // echo "Total Cattles :".$data['totalcattles'];

?>
<?php

$databaseHost = 'localhost';
$databaseName = 'vacci';
$databaseUsername = 'root';
$databasePassword = '';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


            // total vaccinations
           $sql ="SELECT SUM(vaccinated) AS total from vaccination";
           $result=mysqli_query($conn,$sql);
           $values=mysqli_fetch_assoc($result);
           $vaccinated=$values['total'];
           //echo "<br>Total Vaccinations done till today  :".$vaccinated;
      
          
      ?>


<?php
$databaseHost = 'localhost';
$databaseName = 'animal';
$databaseUsername = 'root';
$databasePassword = '';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

                    // total animals in
					          $sql ="SELECT SUM(a_in) AS total from animal";
                    $result=mysqli_query($conn,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $a_in=$values['total'];
                    //echo "<br>Total Animals In  :".$a_in;

                    // total animals out
					          $sql ="SELECT SUM(a_out) AS total from animal";
                    $result=mysqli_query($conn,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $a_out=$values['total'];
                    //echo "<br>Total Animals Out   :".$a_out;
               
?>






<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <link rel="stylesheet" href="css/uidai-style.css" type="text/css">  


</head>
<style type="text/css">
img{
  width: 200px;
  margin-top: -170px;
    margin-left: 616px;
  height: 140px;
}

  </style>
<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

<a class="navbar-brand mr-1" href="index.php">Cattle Dashboard</a>

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

    <div id="content-wrapper">
    <a href="index.php" style="font-size: 29px;font-family: cursive;margin-left: 535px;">Welcome to Cattle Dashboard</a>
      <div class="container-fluid" style="margin-top: 11px;" >

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->

    <div class="width100 floatLeft" style="height: 414px;background:#f7f7f7;">
            <div class="container">
              <div class="visible">
                <div class="container">
                  <div class="visible main-cont">
                    
                            
                    <div class="fourDivWrapper width100 marginTop20">
                    
                    <div class="dash_first_div_1 marginRight55">
                    <p class="dash_first_para"><a  style=" font-family: cursive; color:#FFFFFF;">Small Animals</a></p>
                    
                    <p class="dash_second_para"><?php echo $small; ?></p>
                    
                    <p class="dash_third_para">Total Small Animals</p>
                    
                    
                    </div>  
                          
                  
                    <div class="dash_first_div_1 dash_first_div_2 marginRight55">
                    <p class="dash_first_para"><a  style="font-family: cursive; color:#FFFFFF;">Big Animals</a></p>
                    
                    <p class="dash_second_para"><?php echo $big; ?></p>
                    
                    <p class="dash_third_para">Total Big Animals</p>
                    
                    
                    </div>
                    
                    <div class="dash_first_div_1 dash_first_div_3 marginRight55">
                    <p class="dash_first_para"><a  style="font-family: cursive; color:#FFFFFF;">Cows</a></p>
                    
                    <p class="dash_second_para"><?php echo $cow; ?></p>
                    
                    <p class="dash_third_para">Total Cows</p>
                    
                    
                    </div>            
                    
                    <div class="dash_first_div_1 dash_first_div_4 floatRight">
                    <p class="dash_first_para"><a  style="font-family: cursive; color:#FFFFFF;">Calf</a></p>
                    
                    <p class="dash_second_para"><?php echo $calf; ?></p>
                    
                    <p class="dash_third_para">Total Calf</p>
                    
                    
                    </div>

                    <div class="dash_first_div_1 dash_first_div_3 marginRight55" style="margin-left: -3px; margin-top: 55px;">
                    <p class="dash_first_para"><a  style=" font-family: cursive; color:#FFFFFF;">Bulls</a></p>
                    
                    <p class="dash_second_para"><?php echo $bull; ?></p>
                    
                    <p class="dash_third_para">Total Bulls</p>
                    
                    
                    </div> 

                    <div class="dash_first_div_1 floatRight" style=" margin-right: -8px; margin-top: 55px;">
                    <p class="dash_first_para"><a href="vaccination.php" style=" font-family: cursive; color:#FFFFFF;">Vaccinations</a></p>
                    
                    <p class="dash_second_para"><?php echo $vaccinated; ?></p>
                    
                    <p class="dash_third_para">Total Vaccinations</p>
                    
                    
                    </div> 

                    <div class="dash_first_div_4  floatRight" style="margin-right: 633px;margin-top: -159px;border-radius: 30px;">
                    <p class="dash_first_para"><a  style=" font-family: cursive; color:#FFFFFF;">Animals In</a></p>
                    
                    <p class="dash_second_para"><?php echo $a_in; ?></p>
                    
                    <p class="dash_third_para">Total Animals In</p>
                    
                    
                    </div> /

                    <div class="dash_first_div_1 dash_first_div_2  floatRight" style="margin-right: 303px;margin-top: -159px;border-radius: 30px;">
                    <p class="dash_first_para"><a  style=" font-family: cursive; color:#FFFFFF;">Animals Out</a></p>
                    
                    <p class="dash_second_para"><?php echo $a_out; ?></p>
                    
                    <p class="dash_third_para">Total Animals Out</p>
                    
                    
                    </div> 

                  </div>
                </div>
              </div>
            </div>
          </div>

        

        
          <p class="Cattlecount" style="
    font-family: cursive;
    margin-top: 430px;
    margin-left: 559px;
    font-size: 30px;
    color: #181717;
"><?php echo "Total Cattle Count :".$data['totalcattles'] ?></p>



        </div>
      <!-- Sticky Footer -->
      <footer class="sticky-footer" style="">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © REDX</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>

