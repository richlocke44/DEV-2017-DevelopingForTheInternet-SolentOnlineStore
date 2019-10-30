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
        <div class="searchresults">
			<?php
			$username = $_SESSION["username"];
			
			$p = $_GET["product"];
			
			if (empty($p)) {
			echo "Please enter a product.";				
			}
			
			else {
			echo "<p>You are searching for products by the name '$p'.</p>";
			}
			
			$conn = new PDO ("mysql:host=localhost;dbname=assign079;","assign079", "Iehemugh");
    
			$results = $conn->query("SELECT * FROM products WHERE name='$p'");
			$row = $results->fetch();
				if ($row == false){
					echo "Sorry, no results found!";
				}
			else {
			while ($row != false)
			{
			echo "<p class='result'>";
			echo " <br/>Name: ". $row["name"] ."<br/> ";
			echo " <br/>Price: " . $row["price"] . "<br/> " ; 
			echo " <br/>Manufacturer: " .$row["manufacturer"]. "<br/>" ; 
			echo " <br/>Description: ". $row["description"] ."<br/> ";
			echo " <br/>Stock Level: ". $row["stocklevel"] ."<br/> ";
			echo " <br/>Age Limit: ". $row["agelimit"] ."<br/> ";
			echo "<a href='addproductqty.php?productID=" . $row["ID"] . "'>Add to basket</a>";
			echo "</p>";
				$row = $results->fetch();
			}
			}
			
			
			
			/*if ($results->rowCount == 0) 
			{
				echo "Sorry, no results found!";
			}
			*/
			?>
		</div>
	</div>


</body>
</html>
