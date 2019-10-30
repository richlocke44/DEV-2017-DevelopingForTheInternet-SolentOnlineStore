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
        <div class="adminhome">
			<?php
            
			
			if(isset($_SESSION["isadmin"]) && $_SESSION["isadmin"]==1)
			{	
				echo "<a class='newproduct'href='Newproduct_form.php'>Add a new product</a></br>";
				echo "<p><a class='newproduct'href='Adminlogout.php'>Logout</a></p>";
			}
			else{
				echo " You are not an admin, please log in with a valid admin username/password.";
			};
			?>
        </div>
	</div>


</body>
</html>
