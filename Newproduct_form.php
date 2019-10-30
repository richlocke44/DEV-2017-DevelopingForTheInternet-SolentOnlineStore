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
	<div id="wrapper" style="height: 750;">
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
        <div class="newproductform">
			<?php
				if (isset($_SESSION["isadmin"]) && $_SESSION["isadmin"]==1)
				{
				
				$conn=new PDO("mysql:host=localhost;dbname=assign079","assign079","Iehemugh");
				
				
				echo "<form method='post' action='Newproduct.php'>";
				echo "Name: <input type='text' name='name' value='". $row["name"] . "' /><br/>";
				echo "Price: <input type='text' name='price' value='". $row["price"] . "' /><br/>";
				echo "Manufacturer: <input type='text' name='manufacturer' value='". $row["manufacturer"] . "' /><br/>";
				echo "Description: <input type='text' name='description' value='". $row["description"] . "' /><br/>";
				echo "Stock Level: <input type='text' name='stocklevel' value='". $row["stocklevel"] . "' /><br/>";
				echo "Age Limit: <input type='text' name='agelimit' value='". $row["agelimit"] . "' /><br/>";
				echo "<input type='submit' name='submit' value='Submit' /><br/>";
				}
				else 
				{
					echo "Something went wrong. Please sign in again as an admin.";
					mysql_close($conn);
				}
				
				
			?>
		</div>
	</div>


</body>
</html>