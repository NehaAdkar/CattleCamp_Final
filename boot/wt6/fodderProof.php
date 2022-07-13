<?php 
$databaseHost = 'localhost';
$databaseName = 'proof';
$databaseUsername = 'root';
$databasePassword = '';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); ?>

<?php
if(isset($_POST['add']))
{

   $f_type = mysqli_real_escape_string($conn, $_POST['f_type']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $f_weight = mysqli_real_escape_string($conn, $_POST['f_weight']);

   $cardno = mysqli_real_escape_string($conn, $_POST['cardno']);
	
		
    //FOR UPLOADING IMAGE 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "proof/".$filename;

    //echo $folder;
    move_uploaded_file($tempname,$folder);

    if(empty($f_type) || empty($name) || empty($f_weight) || empty($cardno) || empty($filename)) {
        
        if(empty($f_type)) {
         echo "<font color='red'>f_type field is empty.</font><br/>";
        }
        if(empty($name)) {
         echo "<font color='red'>name field is empty.</font><br/>";
      }
      if(empty($f_weight)) {
         echo "<font color='red'>f_weight field is empty.</font><br/>";
      }
      if(empty($cardno)) {
         echo "<font color='red'>cardno field is empty.</font><br/>";
      }
      if(empty($filename)) {
         echo "<font color='red'>filename field is empty.</font><br/>";
      }

   
    }else{

   $query = "INSERT INTO fod(id,f_type,name,cardno,f_weight,proof) VALUES('','$f_type','$name','$cardno','$f_weight','$folder')";
   $data = mysqli_query($conn ,$query);
    if($data)
    {
        echo "Data Inserted";
    }else{
        echo "Data Failed To Insert";

    }

    }
}
?>
<html>
<head>
<title></title>
</head>
<body>
<h1>Fodder Proof</h1>
        <hr>
        <p><form method = "post" action = "" enctype="multipart/form-data">
               <fieldset>
               <legend> Fodder Proof</legend>
                  <table  border="1" cellspacing = "1" 
                     cellpadding = "2" style="background-color:pink">
                  
                     <tr>
                        <td width = "100">Fodder Type</td>
                        <td><select name="f_type">
                              <option value="wheat">Wheat</option>
                               <option value="corn">Corn</option>
                               <option value="grass">Grass</option>
                              <option value="hay">Hay</option>
                        </select></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Farmer name</td>
                        <td><input name = "name" type = "text" 
                           id = "name"></td>
                     </tr>
                     <tr>
                        <td width = "100">Card Number</td>
                        <td><input name = "cardno" type = "number" 
                           id = "cardno"></td>
                     </tr>
                  
                    
			
			        <tr>
                        <td width = "100">Fodder weight</td>
                        <td><input name = "f_weight" type = "number" 
                           id = "f_weight"></td>
                     </tr>		
                     
                    <tr>
                        <td width = "100">Proof of Fodder</td>
                        <td><input type="file" value="uploadfile" name="uploadfile"></td>

                    </tr>
                    <tr>
                        <td> </td>
                        <td>
                <input type = "submit" id = "add" name = "add"  value = "Add Fodder">
                <input type = "submit" id = "display" name = "display"  value = "Display">

			   
			   
                        </td>
                     </tr>                  
                  </table>
               </fieldset>
               </form></p>

               <?php  
         if (isset($_POST['display']))
         {
                     
  //To display the data 
   $sql_Query ="select * from fod"; 
   $retResult = mysqli_query($conn,$sql_Query);
   echo "<table width='100' height='100' border='2' cellspacing = '2' 
   cellpadding = '5' style='background-color:pink;  width: 52%;' ><tr><th>Fodder Type</th><th>Farmers Name</th><th>Card Number</th><th>Fodder Weight</th><th>Proof of Fodder Given</th><th>Created at</th></tr>"; 
   while($row = mysqli_fetch_array($retResult))
      {
      echo "<tr><td>{$row['f_type']}</td><td>{$row['name']}</td><td>{$row['cardno']}</td><td>{$row['f_weight']}</td><td><a href='$row[proof]'><img src='".$row['proof']."' height='100' width='100'/></a></td><td>{$row['created_at']}</td></tr>"; 

      } 
    echo "</table>";
      // mysql_close($con);
         }
 

               
      ?>       
            </body>
            </html>   
