<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['username'])) {
        header("location:index.php");
        
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Online Test</title>
	<link rel="stylesheet" href="./style.css" type="text/css">
</head>
<body>
	<header>
        <h1>Online Test </h1>
        <br>
        
        
    </header>
    <nav>
        <a href="userdashboard.php">Home</a>
        <a href="completedtest.php">Your Test</a>
        <a class="logout" href="logout.php">Logout</a>
        <h3>Welcome :<?php echo $_SESSION["username"] ?></h3>
	</nav> 
    
	

