<?php


// when the purchase summary is clicked 
	if(isset($_POST['summary'])){
 //first it write the customers data to the customerdata file
$myfile = fopen("customerdata.dat", "w") or die("Unable to open file!");
$firstname=$_POST['cfname'];
$lastname=$_POST['clname'];
$address=$_POST['address'];
$txt = $firstname.",  ". $lastname.", ".$address;
fwrite($myfile, $txt);
fclose($myfile);

 //then redirect tothe purchase summary
 header("location: purchasesummary.php");
	}
	
 
?> 

<!DOCTYPE html>
<html>
<head>
<title>Project Template - Customer Information</title>
<link rel="icon" href="img/proj_template.png" type="image/png">
<link rel="stylesheet" type="text/css" href="css/proj_template.css" />
<script src="js/proj_tamplate.js" type="text/javascript"></script>


<body>
    <div class="container">
            
        <header>
            <h1>AFFORDABLE CELLPHONES</h1>
        </header>
            
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="viewcart.php">View Cart</a></li>
                <li><a href="Customerinfo.php">Customer Data</a></li>
               <li><a href="purchasesummary.php">Purchase Summary</a></li>
                <li><a href="about.html">About Us</a></li>
            </ul>
        </nav>
            
        <article>
            <h1><u>Customer Details</u></h1>
            <div class="wrapper under">
<br>                      <form action="customerinfo.php" method="post" >
    <strong>Customer First Name:</strong><br>
  <input style ="width:300px;height:30px;font-size: 16px;" type="text" name="cfname" value=""><br><br>
  <strong>Customer Last Name:
</strong><br>
  <input style ="width:300px;height:30px;font-size: 16px;" type="text" name="clname" value=""><br>
 <br><strong>Address:</strong><br>
   
<input style ="width:300px;height:30px;font-size: 16px;" type="text" name="address" value=""><br>
 <input type="submit" name="summary" value="Add Customer"  class="btn-backward">  

</form>
        </article>
        <br>
            
        <footer>Copyright © Affordablecell.inc</footer>
            
    </div>
</body>

</html>
