<?php
 // declare and array to hold customers shopping cart
$tocart=array();
	//initialize the row count to -1 so that its incremented to zero and so on to load array content
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

header("location: viewcart.php");

	} 

?>



<!DOCTYPE html>
<html>
<head>
<title>Project Template - Products</title>
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
            <h1>Products</h1>
            <div class="products_container">
              	
				
			<?php
$file_path = 'images/';
 //opens the products file                 
$f = fopen("products.dat", "r");

while(!feof($f))//to loop through the file till the end
{
	   //put in this table
$pollfields = explode(',', fgets($f));
		       $src=$file_path.$pollfields[4];
			$norow ++;//increment the row count to enable the line of the product to be read 
			//put the records in a table
				echo"<div class=\"product\">
                  
 <form action=\"products.php\" method=\"POST\">
	
				<image class=\"product_image\" alt=\"product\"
                src=".$src.">  <strong>". $pollfields[1]. "</strong> <br> $". $pollfields[3]." &nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"addcart\" value=\"Add to Cart\"  class=\"btn-orange\">     </p>
					<input type=\"hidden\" name=\"prdline\" value=". $norow." /></td></tr>
					</form>
					";
				 echo"</div> ";
        
      // end of table  
    }
    fclose($f);
	//where the add to cart button is pressed
	



	?>	
				
		  
            </div>
            
            


        </article>
            
        <footer>Copyright © Affordablecell.inc</footer>
        
    </div>
</body>

</html>
