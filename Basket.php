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
	<div id="wrapper" style="height:720px;">
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
			$productID = $_POST["productID"];
			$username = $_SESSION["username"];
			$qty = $_POST["qty"];
			
			echo"Hello" . $_SESSION["username"];
			
			$conn = new PDO ("mysql:host=localhost;dbname=assign079;","assign079", "Iehemugh");
			$results=$conn->query ("SELECT * FROM products WHERE ID = $productID");
			
			/*echo "SQL query: SELECT * FROM products WHERE ID = $productID<br />";*/
			$row=$results->fetch();
			
			if ($qty > $row["stocklevel"]){
				echo"Not enough items in stock";
			}
			else{
			$conn->query("UPDATE products SET stocklevel=stocklevel-$qty WHERE  ID = $productID");
			
			$conn->query("INSERT INTO basket (productID, username, qty) VALUES ($productID, '$username', $qty)");
			
			/*echo "SQL: INSERT INTO basket (productID, username, qty) VALUES ($productID, '$username', $qty)";
				
			print_r($conn->errorInfo());*/
				
			echo "<p><a class='adminhomebtn' href='Viewbasket.php'>View Basket</a></p<";
			}
			
			
				
			
			?>
		</div>
	</div>


</body>
</html>