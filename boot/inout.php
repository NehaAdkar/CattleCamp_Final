<?php
         
         $databaseHost = 'localhost';
         $databaseName = 'animal';
         $databaseUsername = 'root';
         $databasePassword = '';
         $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>

<html>
   
   <head>
      <title>Cattles IN/OUT Record</title>
   </head>
   
   <body>
     
        <?php  
        
        if(isset($_POST['add']))
        {
         
         
         $name = mysqli_real_escape_string($conn, $_POST['name']);
         $cardno = mysqli_real_escape_string($conn, $_POST['cardno']);
         $a_in = mysqli_real_escape_string($conn, $_POST['a_in']);
         $a_out = mysqli_real_escape_string($conn, $_POST['a_out']);
         $reason = mysqli_real_escape_string($conn, $_POST['reason']);


         if(empty($name) || empty($cardno) || empty($a_in) || empty($a_out) || empty($reason)) {
        
            if(empty($name)) {
             echo "<font color='red'>animal in field is empty.</font><br/>";
            }
            if(empty($cardno)) {
             echo "<font color='red'>animal in field is empty.</font><br/>";
          }
          if(empty($a_in)) {
             echo "<font color='red'>animal in field is empty.</font><br/>";
          }
          if(empty($a_out)) {
             echo "<font color='red'>animal out  field is empty.</font><br/>";
          }
          if(empty($reason)) {
             echo "<font color='red'>reason field is empty.</font><br/>";
          }
    
       
        }else{

         $sql = "INSERT INTO log(id,name,cardno,a_in,a_out,reason) VALUES('','$name','$cardno','$a_in','$a_out','$reason')";
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
               <form method = "post" action = "" enctype="multipart/form-data">
               <fieldset>
               <legend>Cattles IN/OUT Record</legend>
                  <table  width=42% height="100" border="2" cellspacing = "2" 
                     cellpadding = "5" style="background-color:pink">
                  
                     <tr>
                        <td width = "100">Farmer's Name</td>
                        <td><input name = "name" type = "text" 
                           id = "name"></td>
                    </tr>
                    <tr>
                        <td width = "100">Card Number</td>
                        <td><input name = "cardno" type = "number" 
                           id = "cardno"></td>
                    </tr>
                     <tr>
                        <td width = "100">Animals In</td>
                        <td><input name = "a_in" type = "number" 
                           id = "a_in"></td>
                    </tr>

                           <tr>
                        <td width = "100">Animals Out</td>
                        <td><input name = "a_out" type = "number" 
                           id = "a_out"></td>
                           </tr>


                        <tr>
                        <td width = "100">Reasons For Going Out</td>
                        <td><select name="reason">
                           <option value="fieldwork">Fieldwork</option>
                           <option value="medical">Medical Issues</option>
                           <option value="others">Others</option>
                        </select></td>
                     </tr>

		        	    
                     <tr>


                        <td> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" value = "Add"> 
                           <input name = "display" type = "submit" id = "display" value = "display"> 

                        </td>
                     </tr>                  
                  </table>
               </fieldset>
               </form>


               <?php
if (isset($_POST['display']))
         {

         
                     
            //To display the data 
                 $sql_Query ="select * from log"; 
                $retResult = mysqli_query($conn,$sql_Query) or die("Error: ".mysqli_error($conn));;
                echo "<table border='1' cellspacing ='1' 
                cellpadding = '2' style='background-color:pink; width:55%;'><tr><th>Name</th><th>Cardno</th><th>Animals In</th><th>Animals Out</th><th>Reason</th><th>Created at</th></tr>"; 
            while($row = mysqli_fetch_array($retResult))
                 {
                echo "<tr><td>{$row['name']}</td><td>{$row['cardno']}</td><td>{$row['a_in']}</td><td>{$row['a_out']}</td><td>{$row['reason']}</td><td>{$row['created_at']}</td></tr>"; 
                
                 } 
                 echo "</table>";
               // mysql_close($con);
                }   
         
      ?>          
             
        </body>
</html>

<?php
                     
                    // total in
					$sql ="SELECT SUM(a_in) AS total from log";
                    $result=mysqli_query($conn,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $a_in=$values['total'];
                    echo "<br>Total Animals In  :".$a_in;

                    // total out
					$sql ="SELECT SUM(a_out) AS total from log";
                    $result=mysqli_query($conn,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $a_out=$values['total'];
                    echo "<br>Total Animals Out   :".$a_out;
               


               ?>