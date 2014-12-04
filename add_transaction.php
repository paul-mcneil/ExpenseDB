<?php include("includes/layouts/header.php"); ?>
<?php include("includes/db_connection.php"); ?>
<?php include("includes/functions.php"); ?>

<?php
	
	
	if (isset($_POST['submit'])) {

	   
    
    $Date = $_POST["Date"];
    $Time = $_POST["Time"];
    $MerchantID = $_POST["MerchantID"];
    $Total = $_POST["Total"];
    $payment_PaymentID = $_POST["payment_PaymentID"];

    // Perform database query
    $query = "INSERT INTO transactions (Date,Time,MerchantID,Total,payment_PaymentID)  
                VALUES ('{$Date}','{$Time}',{$MerchantID},{$Total},{$payment_PaymentID})";
    $result = mysqli_query($connection, $query);
    #echo $query;

    if($result){
        //success
       # echo "Success!";
    }else{
        //failure
        die("Database query failed. " . mysqli_error_($connection));
    }
   }
?>
<?php
    // Perform database query
    $query = "SELECT Merchant_Name, Merchant_Address, MerchantID ";
    $query .= "FROM merchants ";
    $query .= "ORDER BY Merchant_Name ";
    $query .= "LIMIT 20";
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
    <h2>Add Transaction</h2>

  	<table>
	<form method="post" action="add_transaction.php">
        <tr>
            <colgroup align="right" valign="top"></colgroup>
            <td align="right">Date:</td> 
           <td> <input type="text" name="Date" value="YYYY-MM-DD"> </td>
            <td>
                   
            </td>
        </tr>
         <tr>
            <td align="right">Time:</td> 
           <td> <input type="text" name="Time" value="HH:MM"> </td>
        </tr>
        <tr>
            <td align="right">MerchantID:</td>
            <td><input type="text" name="MerchantID" value=""></td>
        </tr>
          <tr>
            <td align="right">Total:</td>
            <td><input type="text" name="Total" value=""></td>
        </tr>
          <tr>
            <td align="right">Payment Type:</td>
            <td><select name="payment_PaymentID">
<option value="1">Cash</option>
<option value="2">Debit</option>
<option value="3">Credit</option>
</select></td>
              
        <tr>
            <td></td>
            <td align="right"><input type="submit" name="submit" value="Submit">&nbsp<input type="reset" value="Clear"></td>
            
            <td> 
           
            </td>
        </tr>
</fieldset>
</form>
</table>
 <?php
     echo "<table>
     			<tr>
     			    <th>Merchant</th>
     			    <th>Merchant Address</th>
     			    <th>Merchant ID</th> 
     		    </tr>";
        // using return data
        while($row = mysqli_fetch_assoc($result)){
            // output data from each row
            echo "<tr><td>" .$row["Merchant_Name"]. "</td><td>" .
                            $row["Merchant_Address"]. "</td><td>".
                            $row["MerchantID"]. "</td><td>";
        }
      echo "</table>";   
   ?>


 
  </div>
</div>

<?php include("/includes/layouts/footer.php"); ?>
