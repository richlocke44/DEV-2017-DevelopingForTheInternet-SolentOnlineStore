<?php
session_start();
$username = $_SESSION["username"];
?>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Solent E-store</title>
<link rel="stylesheet" href="css.css" />
</head>

<body>
<div class="backgroundimg">
</div>
	<div id="wrapper" style="height:auto;">
		<div class="header">
			<img class="logo" alt="logo" src="logo.png" />
			<div class="navbar">
				<ul>
                	<li><a href="index.html">Home</a></li>
					<li><a href="Productsearch.php">Products</a></li>
					<li><a href="Signin.html">Sign In</a></li>
					<li><a href="Adminlogin.html">Admin</a></li>
				</ul>
			</div>
            
		</div>
        <div class="basket">
			<?php
			$day = $_POST["date"];
			$month = $_POST["month"];
			$year = $_POST["year"];
			$getdate = getdate();
			$getyear = $getdate["year"];
			$agelimit = $_GET["agelimit"];
			
			if ($year > $getyear = 18){
				echo "<p>You need to be 18 or over to purchase these items.</p>";
				
			}
			else{
				echo "<p>You are over 18 years old, you may purchase these products</p>";
			}

			echo "<p><a class='adminhomebtn' href='Checkout.php'>Confirm purchase</a></p></br>";
			echo "<p><a class='adminhomebtn' href='Clearbasket.php'>Clear Basket</a></p></br>";
			
			
			
			$productID = $_POST["productID"];
			$username = $_SESSION["username"];
			$qty = $_POST["qty"];
			$stocklevel = $_POST["stocklevel"];
			
			$conn = new PDO ("mysql:host=localhost;dbname=assign079;","assign079", "Iehemugh");
			
			$results2=$conn->query ("SELECT username, productID, qty, ID FROM basket WHERE username= '$username'");
			
			if ($qty < $row["stocklevel"])
			{
				echo "Not enough stock available.";
			}
			while ($row=$results2-> fetch()){
				
					$results=$conn->query ("SELECT name, price, stocklevel FROM products WHERE ID= $row[productID]");
				
					$row2=$results-> fetch();
					echo "<p class='result'>";
					echo "Hello" . $_SESSION["username"];
					echo " <br/>Name: ". $row2["name"] ."<br/> ";
					echo " <br/>Price: " . $row2["price"] . "<br/> " ; 
					echo " <br/>:Stock Level: " .$row2["stocklevel"]. "<br/>" ; 
					echo " <br/>:Product ID: ". $row["productID"] ."<br/> ";
					echo " <br/>Quantity: ". $row["qty"] ."<br/> ";
					
					echo "<a class='adminhomebtn' href='Removeproduct.php?productID=" . $row["ID"] . "'>Remove product</a>";
				    
					echo "</p>";
				
				$qty = $row["qty"];
				$price = $row2["price"];
				$totalprice += $price * $qty;
				echo "<p>Total price: £ $totalprice</p>";
				}
			
			
			
				//print_r($conn->errorInfo());
				
			
			
			?>
		</div>
	</div>


</body>
</html>