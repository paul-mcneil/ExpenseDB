<?php include("includes/layouts/header.php"); ?>
<?php include("includes/db_connection.php"); ?>
<?php include("includes/functions.php"); ?>


<?php
    if (isset($_POST['submit'])) {
			
    

    if(isset($_POST["MerchantID"])){
      $MerchantID = $_POST["MerchantID"];  
    }
    

    // Perform database query
    $query = "DELETE FROM merchants ";
    $query .= "WHERE MerchantID = {$MerchantID} ";
    $result = mysqli_query($connection, $query);

    if($result){
        //success
        echo "Success!";

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
    <h2>Delete Merchant</h2>
      <p>Enter a Merchant ID to delete from database.</p><br>
<table>
	<form method="post" action="delete_transaction.php">

        <tr>
            <colgroup align="right" valign="top"></colgroup>
            <td align="right">MerchantID:</td> 
           <td> <input type="text" name="MerchantID" value=""> </td>
        </tr>
         
        <tr>
            <td></td>
            <td align="right"><input type="submit" name="submit" value="Submit">&nbsp<input type="reset" value="Clear"></td>
        </tr>
</fieldset>
</form>
</table>
</div>
        <?
            if($result){
            //release returned data
            mysqli_free_result($result);
            }
        ?>	
<?php include("/includes/layouts/footer.php"); ?>