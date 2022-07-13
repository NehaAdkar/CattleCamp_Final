<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users` WHERE CONCAT( `name`, `cardno`, `age`,'village','small','big','total') LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `users`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "test");
    $filter_Result = mysqli_query($connect, $query) or die("Error: " . mysqli_error($connect));
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search Farmers Info</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
                
            }
        </style>
    </head>
    <body>
        
        <form action="search.php" method="post" style="margin-top:40px;">
            <input type="text" name="valueToSearch" placeholder="Value To Search"  style="width: 234px; height: 35px; margin-left: 536px;"><br><br>
            <input type="submit" name="search" value="Filter" style="margin-top: -61px; margin-left: 789px; float: left; width: 80px; height: 42px;"><br><br>
            
            <table border="1" cellspacing = "1" cellpadding = "2" style="background-color:pink; margin-left: 333px;
                width: 55%;">
                <tr>
                    <th>First Name</th>
                    <th>Card number</th>
                    <th>Age</th>
                    <th>Village</th>
                    <th>Small Animals</th>
                    <th>Big Animals</th>
                    <th>Total Animals</th>
                    <th>Created On</th>




                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['cardno'];?></td>
                    <td><?php echo $row['age'];?></td>
                    <td><?php echo $row['village'];?></td>
                    <td><?php echo $row['small'];?></td>
                    <td><?php echo $row['big'];?></td>
                    <td><?php echo $row['total'];?></td>
                    <td><?php echo $row['created_at'];?></td>


                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>

