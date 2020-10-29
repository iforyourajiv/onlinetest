<?php
include_once './config.php';

$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    ?>



<?php include_once './sidebar.php'?>
<!-- Page Content -->
<div style="margin-left:25%">
<div >

  <h1>Manage User</h1>
  <table>
  <tr>
    <th>Username</th>
    <th>Full name</th>
    <th>Email</th>
    <th>Action</th>
  </tr>
  <?php
while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $uname = $row['username'];
        $fname = $row['fullname'];
        $email = $row['email'];
        ?>
  <tr>
    <td><?php echo $uname ?></td>
    <td><?php echo $fname ?></td>
    <td><?php echo $email ?></td>
    <td>
       <a href='manageuser.php?id=<?php echo $id ?>'>Delete</a>
    </td>

  </tr>

  <?php }}?>
</div>

</div>
</body>


<?php

include "./config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM user where id='$id'";
    if (mysqli_query($conn, $query)) {
        header("location:manageuser.php");
    } else {
        echo "<script>alert('Something worng !!!! test Cant delete')</script>";
    }
}
?>
