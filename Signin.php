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
        <div class="signin">
			<?php
			$username = $_POST["username"];
			$password = $_POST["password"];

			$conn=new PDO("mysql:host=localhost;dbname=assign079;","assign079","Iehemugh");;


			$result=$conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
			$row=$result->fetch();
			if($row==false)
			{
				echo "Incorrect username or password! Please try again.";

			}
			else
			{	
				$_SESSION["username"] = $username;

				header("Location: Productsearch.php?username=" . $row["username"] . "");
			}
			?>
		</div>
	</div>


</body>
</html>
