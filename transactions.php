
<?php include("includes/layouts/header.php"); ?>
<?php include("includes/functions.php"); ?>
<?php include("includes/db_connection.php"); ?>



<?php
    // Perform database query
    $query = "SELECT TransactionID, Date, Time, Merchant_Name, merchants.MerchantID, Total, payment_PaymentID ";
    $query .= "FROM transactions, merchants ";
    $query .= "WHERE transactions.MerchantID = merchants.MerchantID ";
    $query .= "ORDER BY Date DESC ";
   # $query .= "LIMIT 15";
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
    <h2>Transactions</h2>
	
    
   <?php
     echo "<table>
     			<tr>
     			    <th>Transaction ID</th>
     			    <th>Date</th>
     			    <th>Time</th>
     			    <th>Merchant Name</th> 
                  
     			    <th>Total</th>  
     			    <th>Payment ID</th> 
     			  		
     		    </tr>";
        // using return data
        while($row = mysqli_fetch_assoc($result)){
            // output data from each row
            echo "<tr>
                    <td>" .$row["TransactionID"]. "</td>
                    <td>" . $row["Date"]. "</td>
                    <td>". $row["Time"]. "</td>
                    <td>". $row["Merchant_Name"]. "</td>
                    
                    <td>". $row["Total"]. "</td>
                    <td>". $row["payment_PaymentID"]. "</td>
                    <td>";
        }
      echo "</table>";   
   ?>
   
        <?
            //release returned data
            mysqli_free_result($result);
        ?>	
  </div>
</div>

<?php include("includes/layouts/header.php"); ?>
  