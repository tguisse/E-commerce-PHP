<?php
//get the number of lines in the  shopping cart file
$file = "shoppingcart.dat";
$linecount = 0;
$handle = fopen($file, "r");
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++; 
}
fclose($handle);


//generate the random id number for the transaction id.
$digits = 3;
$val1= rand(pow(10, $digits-1), pow(10, $digits)-1);
$val2= rand(pow(10, $digits-1), pow(10, $digits)-1);
$val3= rand(pow(10, $digits-1), pow(10, $digits)-1);
$tranid= $val1."-".$val2."-".$val3;

 
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
              <h2>Transaction Successful</h2>          

								  <?php
$fcus = fopen("customerdata.dat", "r");
 	// Read line by line until end of file
	while(!feof($fcus)) { 
	    $customersd = explode(',', fgets($fcus));
echo "<strong><h6>Thank you  ". $customersd[0]; 
echo "  ". $customersd[1]." for Making Purchases with Us."; // The second
}

// close file
    fclose($fcus);
	
	//get the total of the pruchases from the shopping cart 
$file = file("shoppingcart.dat");            
$f = fopen("shoppingcart.dat", "r");
 $total=0;
$lin=0;
for ($i = max(0, count($file)-$linecount); $i < count($file); $i++) {
$pollfields= explode(',', fgets($f));
		       
			 $total +=$pollfields[3];
			   
    }
	echo "<br> Your Purchase of Grand Total $ ".$total; // The second
echo  " has been successful. <br>Transaction Id: ".$tranid."</h6></strong>";

   

	?>
	<div class="buttonss">
	<form method="post" action="home.html">
	   <input type="submit" name="purchase" value="OK "  class="btn-backward">     </p>	
        </article>
        <br>
            
        <footer>Copyright © Affordable cellphones</footer>
            
    </div>
</body>

</html>
