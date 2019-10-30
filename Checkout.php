<?php
session_start();
$username = $_SESSION["username"];
$productID = $_GET["productID"];
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
        <div class="adminhome">
			<?php
			
			$conn = new PDO ("mysql:host=localhost;dbname=assign079;","assign079", "Iehemugh");
			
			$results=$conn->query ("DELETE FROM basket WHERE username='" . $_SESSION["username"]. "'");
			echo "Thank you for your purchase!";
			echo "<p><a class='adminhomebtn' href='index.html'>Home</a></p>";
			echo "<p><a class='adminhomebtn' href='Productsearch.php'>Products</a></p>";
			
				?>
		
        </div>
	</div>


</body>
</html>