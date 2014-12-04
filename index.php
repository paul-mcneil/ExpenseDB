<!-- 
    PHP
-->
<?php include("includes/layouts/header.php"); ?>
<?php include("includes/functions.php"); ?>
<?php include("includes/db_connection.php"); ?>


<?php
    $CurDate = date("Y-m-d");
    // Perform database query
    $query = "SELECT TransactionID, Date, Time, Merchant_Name, Total, payment_PaymentID ";
    $query .= "FROM transactions, merchants ";
    $query .= "WHERE transactions.MerchantID = merchants.MerchantID ";
    $query .= "AND Date >= DATE_SUB('{$CurDate}', INTERVAL 7 DAY) ";
    $query .= "ORDER BY Date DESC ";
   
    $result = mysqli_query($connection, $query);
   
    // if the query comes back with an error
    if(!$result){
        die("Database query failed.");
    }
?>
<!-- 
    HTML
-->
<div id="main">
  <div id="navigation">
		<ul style="list-style-type:none">
            <li>
                <a href="/ExpenseDB/index.php">Home</a>
            </li>
            <li>
                <a href="/ExpenseDB/transactions.php">Transactions</a>
            </li>
                <ul>
                    <li><a href="/ExpenseDB/add_transaction.php">Add</a></li>
                    <li><a href="/ExpenseDB/delete_transaction.php">Delete</a></li>
                </ul>
            <li>
                <a href="/ExpenseDB/merchants.php">Merchants</a>
            </li>
            <ul>
                <li><a href="/ExpenseDB/add_merchant.php">Add</a>
                </li>
              
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
    <h2>Home</h2>
    <br>
    <h3>Recent Transactions</h3>
      <i>Transactions within last 7 days.</i>
      <br>

       <?php
    // make HTML table and populate with the query data
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
            echo "<tr><td>" .$row["TransactionID"]. "</td><td>" .
                            $row["Date"]. "</td><td>".
                            $row["Time"]. "</td><td>".
                            $row["Merchant_Name"]. "</td><td>".
                            $row["Total"]. "</td><td>".
                            $row["payment_PaymentID"]. "</td><td>";
        }
    echo "</table>";   
   ?>
   
        <?
            //release data from the query
            mysqli_free_result($result);
        ?>

  </div>
</div>

<?php include("includes/layouts/header.php"); ?>
