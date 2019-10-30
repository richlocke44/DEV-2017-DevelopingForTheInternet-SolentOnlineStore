<?php
session_start();
$username = $_SESSION["username"];
?>
<html>
<head>
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
       	<?php
       	$username = $_SESSION["username"];
       	?>
        <form action='Productsearch_results.php?username=" . $row["username"] . "' method="get">
            <label>Product Search</label>
            <input type="text" placeholder="Product" name="product"/>
            <input type="submit" name="submit" value="Search"/>
        </form>
        
		<a class="adminhomebtn" href="Logout.php">Logout</a>
	</div>
</body>
</html>