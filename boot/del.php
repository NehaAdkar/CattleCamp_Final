<?php
//including the database connection file
        $databaseHost = 'localhost';
         $databaseName = 'fod';
         $databaseUsername = 'root';
         $databasePassword = '';
         $con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);//getting id of the data from url
        $id = $_GET['id'];
//deleting the row from table
$result = "DELETE FROM fodder WHERE id='$id'";
$data = mysqli_query($con,$result);
/*
if($data)
{
    echo "Record deleted from table";
}
else{
    echo "Sorry, Deleted process is failed";
}*/
//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
