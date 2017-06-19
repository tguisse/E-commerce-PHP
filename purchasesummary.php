<?php
//open the shopping cart file and get the line number
$file="shoppingcart.dat";
$linecount = 0;
$handle = fopen($file, "r");
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;
  
}
fclose($handle);

	if(isset($_POST['purchase'])){
 //if purchase button is pressed redirct user to confirmation page
 header("location: confirmation.php");
	}
	
?> 


<!DOCTYPE html>
<html>
<head>
<title>Project Template - View Cart</title>
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
            <h1>Purchase Summary</h1>
            <br>
            
            <!-- Only show table if there are products in cart -->
           <?php
			
	if($linecount<2){
		echo "No Items in Your Cart";
	}
	else{

		
//open the customers data file to ead the customers details								  
$fcus = fopen("customerdata.dat", "r");
 	// Read line by line until end of file
	while(!feof($fcus)) { 
	    $customersd = explode(',', fgets($fcus));
echo "<strong>Customer Name:</strong>  ". $customersd[0]; // Prints the value in first "cell"
echo "  ". $customersd[1]."<br>"; // The second
echo "<br> <strong>Address:</strong>  ".$customersd[2]; // The second


}

// close file
    fclose($fcus);

	echo  "<br><h3> Customer Purchase Items</h3>";			
//open the shopping cart file to read the customers purchases
	$file = file("shoppingcart.dat");
                  
$f = fopen("shoppingcart.dat", "r");
 $total=0;
 
 echo " <table border=\"1\" cellspacing=\"0\" cellpadding=\"10\" width=\"100%\">
                <tr>
                    <th class=\"left\">Product</th>
                     <th>Quantity</th>
                    <th>Price($)</th>
                </tr>";
$lin=0;

for ($i = max(0, count($file)-$linecount); $i < count($file); $i++) {

$pollfields= explode(',', fgets($f));
		       //calculate the total amount of the purchases
			 $total +=$pollfields[3];
			   //put in this table
       		echo"<tr style=\"border-bottom:3px solid #1a7646;padding:10px;\">
									<td class=\"left\">";
									
				echo"<strong>". $pollfields[1]. ".</strong>
				</td>
				
				<td class=\"center\"> 1</td>
				<td class=\"center\">". $pollfields[3]."</td>
				
				</tr>";
				 
        
      // end of table  
    }
    echo"<tr><td class=\"left\"></td><td class=\"right\"><b>Totals</b></td><td class=\"center\">".$total."</td></tr></table> ";

	}
   
	?>
		<div class="buttonss">
	<form method="post" action="confirmation.php">
	<input type="hidden" name="totalamnt" value="<?php $total;?>"/>
	  <input type="submit" name="purchase" value="Purchase"  class="btn-backward">     </form>			
	</div>
        </article>
        <br>
            
        <footer>Copyright © Affordablecell.inc </footer>
            
    </div>
</body>

</html>
