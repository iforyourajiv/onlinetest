<?php
session_start();
include './admin/config.php';
$noti="";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    if ($password == $password2) {
        $query = "select * from user where username='$username' OR email='$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
             $noti .= "<div>UserName Or Email Already Exist</div>";
        } else {
            $encrypted=md5($password);
            $save = "INSERT INTO user(fullname,username,password,email)
                     VALUES('$fullname','$username','$encrypted','$email')";
            if (mysqli_query($conn, $save)) {
                $noti .= "<div>SuccessFully Registerd</div>";
                header("location:index.php");
            } else {
                echo "Error: " . $save . "<br>" . mysqli_error($conn);
            }

        }
    } else {
        $noti .= "<div>Password Not Matched</div>";
    }

    mysqli_close($conn);
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
            <table>
                <caption><h1>User Registration Form</h1></caption>
                <tr>
                    <td><label for="username">User Id: </label></td>
                    <td><input type="text" name="username" /></td>
                </tr>
                <tr>
                    <td><label for="password">Password: </label></td>
                    <td><input type="password" name="password"/></td>
                </tr>
                <tr>
                    <td><label for="password">Re Enter Password: </label></td>
                    <td><input type="password" name="password2"/></td>
                </tr>
                <tr>
                    <td><label for="full_name">Full_Name: </label></td>
                    <td><input type="text" name="fullname" /></td>
                </tr>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input type="text" name="email" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="    Register User    " />   <?php echo $noti ?></td>
                 
                </tr>
            </table>
        </form>  
       
</div>


</body>
</html>