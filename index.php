<?php
include './admin/config.php';
$noti="";
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['username'])) {
    $_SESSION['welcome'] = "Welcome" . $_SESSION['username'];
    header("location:userdashboard.php");
}

$_SESSION['msg'] = "";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $encrypted=md5($password);
    $query = "select * from user where username='$username' AND password='$encrypted'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $username;
            header('location:userdashboard.php');
    } else {
        $noti.= "<div>Username Or Password Is Incorrect.</div><br>";
    }

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
		<h1>Online Test</h1>
	</header>
	<nav>
		<a href="register.php">Register</a>
		<a href="index.php">Sign In</a>
	</nav>

<div class="contents">

    <form action="#" method="post">
        <table >
            <caption><h1>Login Form</h1></caption>
            <tr>
                <td><label for="username">User Id</label></td>
                <td><input type="text" name="username" /></td>
            </tr>
            <tr>
                <td><label for="password">Password: </label></td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="    Login    " /><?php echo $noti ?></td>
            </tr>
        </table>
    </form>
</div>


</body>
</html>