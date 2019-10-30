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
        <div class="adminbox">
           <?php
            
			$username = $_POST["adminuser"];
			$password = $_POST["adminpass"];
			
			$conn=new PDO("mysql:host=localhost;dbname=assign079","assign079","Iehemugh");
			
			$result=$conn->query("SELECT * FROM users WHERE username='$username' AND password='$password' AND isadmin=1");
			$row=$result->fetch();
			if($row==false)
			{
				echo "<p class='adminhometxt'>Incorrect username/password for admin log in!</p><p>Please return to the previous page and sign in with a correct admin log in or go back to the home page.</p></br>";
				echo "</br><a class='adminlogbtn' href='Adminlogin.html'>Admin login</a></br>";
				echo "</br><a class='adminhomebtn' href='index.html'>Home</a></br>";
				
				
			}
			else
			{	
				
				$_SESSION["isadmin"] = $row["isadmin"];
				
				
				header("Location: Adminhome.php");
			};		           
?>