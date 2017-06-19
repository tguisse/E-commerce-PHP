<?php
$norow=-1;
if(isset($_POST['addcart'])){
 // the line of the posted product in the product file
 $itemlin=$_POST["prdline"];
 //read the line
 $myFile = "products.dat";
$lines = file($myFile);//file in to an array

 $list = array(
 array ($lines[$itemlin]));
$data=$list[0][0]."\n";
//get the shopping cart and insert the customers shopping cart
 $fp ='shoppingcart.dat';
$current = file_get_contents($fp);
// Append a new item to the file
$current .= $data;
// Write the contents back to the file
file_put_contents($fp, $current);


//remove blank lines

$str=file_get_contents("$fp");
$str = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $str);
file_put_contents("$fp", "$str");

header("location: myshopcart.php");

	} 




//get to know the lines in the shopping cart file
$file="shoppingcart.dat";
$linecount = 0;
$handle = fopen($file, "r");
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;
  
}
fclose($handle);
//when a user pressess continue shopping
	if(isset($_POST['continue'])){
 //redirect to the products page
 header("location: products.php");
	}
	//when a user presses the checkout button 
 
	else if(isset($_POST['checkout'])){
		//redirect to the customer information page
			header("location: customerinfo.php");

		}
		else if(isset($_POST['delete'])){
		//to delete all the information on the cart file just write an empty string to the file
$fp ='shoppingcart.dat';
		file_put_contents($fp, "");
//echo to the user that he or she has successully deleted the cart
echo '<script type="text/javascript">alert("You Have Successully Deleted Your Cart");</script>';
$linecount = 0;
$handle = fopen($fp, "r");
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;
		}}
		//delete the selected items from the file
		else if(isset($_POST['delselcart'])){
 // the line of the posted product in the product file
 $itemlin=$_POST["prdline"];
 //read the line
 			$fp1 ='shoppingcart.dat';
		 
$array = file($fp1); // Takes the file, and puts it in an array each seperated 
// by line. 
$array[$itemlin] = ""; // Deleted the selected line. 

file_put_contents($fp1, $array); // write the new array  
		echo '<script type="text/javascript">alert("You Have Successully Deleted ");</script>';
		$linecount = 0;
$handle = fopen($fp1, "r");
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;
		}
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
            <h1>View Cart</h1>
            <br>
            
            <!-- Only show table if there are products in cart -->
           <?php
			
	if($linecount<2){
		echo "No Items in Your Cart";
	}
	else{

		  echo " <table border=\"1\" cellspacing=\"0\" cellpadding=\"10\" width=\"100%\">
                <tr>
                    <th class=\"left\">Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
					<th></th>
                </tr>";
               // <!-- This is a good spot to start the loop -->
				
				
				
			
//	open the shopping cart file				
$file = file("shoppingcart.dat");
                 
$f = fopen("shoppingcart.dat", "r");
 $total=0;
 $lin=0;
//read through the file and leave the last one because its empty
for ($i = max(0, count($file)-$linecount); $i < count($file); $i++) {
$norow ++;//increment the row count to enable the line of the product to be read
	//separate word between commas
$pollfields= explode(',', fgets($f));
		       
			 $total +=$pollfields[3];
			   //put in this table
       		echo"<tr><form action=\"viewcart.php\" method=\"POST\">
	";
									
				echo"<td class=\"left\"><strong>". $pollfields[1]. ".</strong>
				</td>
				<td class=\"center\"> 1</td>
				<td class=\"center\">$".$pollfields[3]."</td>
			<td><input type=\"submit\" name=\"delselcart\" value=\"Del\"  class=\"btn-orange\"> 	<input type=\"hidden\" name=\"prdline\" value=". $norow."> </td>
				</form></tr> ";
				 
        
      // end of loop
    }
	
	echo "</table>";
	
	}
   
	?>
				
				
				
               
                <!-- This is a good spot to end the loop -->
                
                <!-- You already have your loop row above. You should be able to delete this once your PHP code is working. This is just for display purposes -->
                
                <!-- This is a good spot to end the loop -->

                
            
            <!-- Only show table if there are products in cart -->
            <div class="buttonss">
	<form method="post" action="viewcart.php">
	<input type="submit" name="continue" value="<< continue shopping"  class="btn-backward">    <input type="submit" name="checkout" value="Check Out >>"  class="btn-forward">  <?php 
	if($linecount<2){
		
	}
	else{
		echo "<input type=\"submit\" name=\"delete\" value=\"Delete All\"  class=\"btn-delete\">";
	}?>
		</p>			
	</div>
        </article>
        <br>
            
        <footer>Affordablecall.inc</footer>
            
    </div>
</body>

</html>
