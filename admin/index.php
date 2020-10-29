<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['username'])) {
    $_SESSION['welcome'] = "Welcome" . $_SESSION['username'];
    header("location:dashboard.php");
}
include_once './config.php';
$msg = "";
if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];
    $query = "select * from admin where username='$user' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['username'] = $username;
            header("location:dashboard.php");
        }
    } else {
        $msg = "<h3>Username Or Password Is Incorrect.</h3><br>";
    }

}
?>


<!DOCTYPE html>
<title>
Admin|Login
</title>
<head>
<link href="./style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Admin Panel</h1>
<div class="form">
<form  action="index.php" method="post">
                            <h3>Login</h3>
                            <div >
                                <label for="username" >Username:</label><br>
                                <input type="text" name="username"  required>
                            </div>
                            <div>
                                <label for="password">Password:</label><br>
                                <input type="password" name="password" required>
                            </div>
                            <div>
                                <input type="submit" name="submit"  value="Login">
                            </div>
                            <?php echo $msg ?>
                        </form>
</div>
</body>
</html>