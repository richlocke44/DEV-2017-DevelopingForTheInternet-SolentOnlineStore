<?php
session_start();
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
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
        <div class="basket">
        	<?php
		$productID = $_GET["productID"];
		$username = $_SESSION["username"];
			
		if ( !isset ($_SESSION["username"])){
			echo "<p class=''>Please Sign in to continue.</p>";
				echo "	<form action='Basketsignin.php' method='post' style='margin-top:100px;'>
						<label>Username</label>
						<input name='username' type='text' placeholder='User1' />
						<label>Password</label>
						<input name='password' type='text'' placeholder='Pass123' />
						<input type='submit' name='Enter' value='Sign In' />
						</form>";
			
		}
		else{
		echo "<form action='Basket.php' method='post'> 
        	<label>Quantity:</label>
        	<input type='number' name='qty' placeholder='0'/>
			<input type='submit' name='submit' value='Add'/>
			<input type='hidden' name='productID' value='$productID'/> 
        </form>";
		}
					
		?>
        </div>
        
	</div>
</body>
</html>