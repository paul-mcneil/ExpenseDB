
<?php include("includes/layouts/header.php"); ?>
<?php include("includes/functions.php"); ?>
<?php include("includes/db_connection.php"); ?>


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
    <h2>Merchant Directory Search</h2>
      <br>
      <ul>
          <li>Search Directory by Merchant Name</li>
      </ul>
	
  <table>
	<form method="post" action="merchant_directory_search_results.php">
        <tr>
            <colgroup align="right" valign="top"></colgroup>
            <td align="right">Search:</td> 
           <td> <input type="text" name="Value" value=""> </td>
        </tr>
         <tr>
            <td></td>
            <td align="right"><input type="submit" name="submit" value="Search">&nbsp
        </tr>
</fieldset>
</form>
</table>
  </div>
</div>

<?php include("/includes/layouts/footer.php"); ?>
  