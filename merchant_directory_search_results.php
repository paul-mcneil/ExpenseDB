<?php include("includes/layouts/header.php"); ?>
<?php include("includes/db_connection.php"); ?>
<?php include("includes/functions.php"); ?>

<?php
	
	
	if (isset($_POST['submit'])) {

	   
    
    $Value = $_POST["Value"];
   

    // Perform database query
    $query = "SELECT Merchant_Name, MerchantID, Merchant_Address, Merchant_PhoneNumber ";
    $query .= "FROM merchants ";
    $query .= "WHERE Merchant_Name LIKE '%{$Value}%' ";
   
    $result = mysqli_query($connection, $query);
    #echo $query;

    if($result){
        //success
     #   echo "Success!";
    }else{
        //failure
        die("Database query failed. " . mysqli_error_($connection));
    }
   }
?>

<div id="main">
  <div id="navigation">
		<ul style="list-style-type:none">
            <li><a href="/ExpenseDB/index.php">Home</a></li>
            <li><a href="/ExpenseDB/transactions.php">Transactions</a>
            </li>
             <ul>
                 <li><a href="/ExpenseDB/add_transaction.php">Add</a></li>
                 <li><a href="/ExpenseDB/delete_transaction.php">Delete</a></li>
             </ul>
             <li><a href="/ExpenseDB/merchants.php">Merchants</a></li>
            <ul><li><a href="/ExpenseDB/add_merchant.php">Add</a></li>
            
            </ul>
            <li><a href="/ExpenseDB/reports.php">Reports</a></li>
            <ul>
                <li><a href="/ExpenseDB/transactions_search_report.php">Transaction Report</a></li>
                <li><a href="/ExpenseDB/expense_report.php">Expense Report</a></li>
                <li><a href="/ExpenseDB/merchant_directory_search.php">Merchant Directory Search</a></li>
                <li><a href="/ExpenseDB/merchant_transaction_search.php">Merchant Transaction Search</a></li> 
                <li><a href="/ExpenseDB/payments_report.php">Payments Report</a></li>
             </ul>
        </ul>
  </div>
  <div id="page">
    <h2>Search Results</h2>
 <?php
     echo "<table>
     			<tr>
     			    <th>Merchant</th>
     			    <th>Merchant ID</th>
     			    <th>Address</th>  
     			    <th>Phone Number</th>   
     			  		
     		    </tr>";
        // using return data
        while($row = mysqli_fetch_assoc($result)){
            // output data from each row
            echo "<tr><td>" .$row["Merchant_Name"]. "</td><td>" .
                            $row["MerchantID"]. "</td><td>".
                            $row["Merchant_Address"]. "</td><td>".
                            $row["Merchant_PhoneNumber"]. "</td><td>";
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
