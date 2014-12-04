
<?php include("includes/layouts/header.php"); ?>
<?php include("includes/functions.php"); ?>
<?php include("includes/db_connection.php"); ?>



<?php
    // Perform database query
    $query = "SELECT * ";
    $query .= "FROM ss_students ";
   # $query .= "WHERE condition ";
    $query .= "ORDER BY StudentID, StudLastName";
    #$query .= ";";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Database query failed.");
    }
?>





<div id="main">
  <div id="navigation">
		<ul style="list-style-type:none">
            <li><a href="/ExpenseDB/index.php">Home</a></li>
            <li><a href="/ExpenseDB/transactions.php">Transactions</a>
            </li>
            <li><a href="/ExpenseDB/merchants.php">Merchants</a></li>
            <li><a href="/ExpenseDB/search.php">Search</a></li>
        </ul>
  </div>
  <div id="page">
    <h2>Search</h2>
	
    
   <?php
     echo "<table>
     			<tr>
     			    <th>StudentID</th>
     			    <th>First Name</th>
     			    <th>Last Name</th>
     			    <th>Street Address</th>    
     			    <th>City</th>  
     			    <th>State</th> 
     			    <th>ZipCode</th> 
     			    <th>Area Code</th> 	
     			    <th>Phone Number</th> 		
     		    </tr>";
        // using return data
        while($row = mysqli_fetch_assoc($result)){
            // output data from each row
            echo "<tr><td>" .$row["StudentID"]. "</td><td>" .
                            $row["StudFirstName"]. "</td><td>".
                            $row["StudLastName"]. "</td><td>".
                            $row["StudStreetAddress"]. "</td><td>".
                            $row["StudCity"]. "</td><td>".
                            $row["StudState"]. "</td><td>".
                            $row["StudZipCode"]. "</td><td>".
                            $row["StudAreaCode"]. "</td><td>".
                            $row["StudPhoneNumber"]. "</td><td>";
        }
      echo "</table>";   
   ?>
   
        <?
            //release returned data
            mysqli_free_result($result);
        ?>	
  </div>
</div>

<?php include("/includes/layouts/footer.php"); ?>
  