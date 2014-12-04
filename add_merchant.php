<?php include("includes/layouts/header.php"); ?>
<?php include("includes/db_connection.php"); ?>
<?php include("includes/functions.php"); ?>

<?php
	
	
	if (isset($_POST['submit'])) {

	   
    
    $Name = $_POST["Name"];
    $Address = $_POST["Address"];
    $PhoneNumber = $_POST["PhoneNumber"];
    $CategoryID = $_POST["category_CategoryID"];

    // Perform database query
    $query = "INSERT INTO merchants (Merchant_Name, Merchant_Address, Merchant_PhoneNumber)  
                VALUES ('{$Name}','{$Address}','{$PhoneNumber}')";
    $result = mysqli_query($connection, $query);
    #echo $query;

    if($result){
        //success
        echo "{$Name} successfully added with id: " . mysqli_insert_id($connection);
      
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
    <h2>Add Merchant</h2>

  	<table>
	<form method="post" action="add_merchant.php">
        <tr>
            <colgroup align="right" valign="top"></colgroup>
            <td align="right">Name:</td> 
           <td> <input type="text" name="Name" value=""> </td>
        </tr>
         <tr>
            <td align="right">Address:</td> 
           <td> <input type="text" name="Address" value=""> </td>
        </tr>
        <tr>
            <td align="right">Phone Number:</td>
            <td><input type="text" name="PhoneNumber" value=""></td>
        </tr>
          <!--
          <tr>
                <td><select name="category_CategoryID">
                <option value="1">Dine</option>
                <option value="2">Grocery Store</option>
                <option value="3">Fuel</option>
                <option value="4">Video Games</option>
                <option value="5">Movies</option>
                <option value="6">Books</option>
                <option value="7">House</option>
                <option value="8">Clothing</option>
                <option value="9">Car Maintenance</option>
                </select></td>
            </tr>
          -->
            <td></td>
            <td align="right"><input type="submit" name="submit" value="Submit">&nbsp<input type="reset" value="Clear"></td>
        </tr>
</fieldset>
</form>
</table>


  </div>
</div>

<?php include("/includes/layouts/footer.php"); ?>
