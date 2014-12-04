
<?php include("includes/layouts/header.php"); ?>
<?php include("includes/functions.php"); ?>
<?php include("includes/db_connection.php"); ?>

<?php
    // Perform database query
    $query = "SELECT Category_Name, count(Total) as NumTransactions, avg(Total) as AvgExp, ";
    $query .= "sum(Total) as CategoryTotal ";
    $query .= "FROM transactions t, merchants m, merchant_has_category m2, categories c ";
    $query .= "WHERE m.MerchantID = m2.merchant_MerchantID ";
    $query .= "AND m2.category_CategoryID = c.CategoryID ";
    $query .= "AND t.MerchantID = m.MerchantID ";
    $query .= "GROUP BY Category_Name";
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
    <h2>Expense Report</h2>
      <br>
	 <?php
     echo "<table>
     			<tr>
     			    <th>Category</th>
     			    <th>Number of Transactions</th>
     			    <th>Average Expense</th>
     			    <th>Category Total</th>    
     		    </tr>";
        // using return data
        while($row = mysqli_fetch_assoc($result)){
            // output data from each row
            echo "<tr><td>" .$row["Category_Name"]. "</td><td>" .
                            $row["NumTransactions"]. "</td><td>".
                            $row["AvgExp"]. "</td><td>".
                            $row["CategoryTotal"]. "</td><td>";
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
  