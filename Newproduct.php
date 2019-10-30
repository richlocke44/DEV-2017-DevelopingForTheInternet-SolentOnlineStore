<?php
session_start();
?>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Solent E-store</title>
<link rel="stylesheet" href="css.css" />
</head>

<body>
<div class="backgroundimg">
</div>
	<div id="wrapper">
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
				if (isset($_SESSION["isadmin"]) && $_SESSION["isadmin"]==1)
				{
					$name = $_POST["name"];
					$price = $_POST["price"];
					$manufacturer = $_POST["manufacturer"];
					$description = $_POST["description"];
					$stocklevel = $_POST["stocklevel"];
					$agelimit = $_POST["agelimit"];
						 
						
				
				$conn=new PDO("mysql:host=localhost;dbname=assign079","assign079","Iehemugh");
				$q = "INSERT INTO products (name, manufacturer, description, price, stocklevel, agelimit) VALUES ('$name', '$manufacturer', '$description', $price, $stocklevel, $agelimit)";
					
				$result = $conn->query($q);
				if ($result != false){
				echo "You have added a new product!</br>";
				echo "</br><a class='adminhomebtn' href='Adminhome.php'>Admin Area</a></br>";
				echo "</br><a class='adminhomebtn'' href='index.html'>Home page</a></br>";
				}
				if($result == false) {
				echo "No product details entered!";
				echo "</br><a class='adminhomebtn' href='Adminhome.php'>Admin home</a></br>";
				echo "</br><a class='adminhomebtn' href='index.html'>Home</a></br>";
				}
			}
			?>
		</div>
	</div>


</body>
</html>