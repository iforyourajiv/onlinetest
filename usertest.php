<?php

include_once './admin/config.php';

if (!isset($_SESSION)) {
    session_start();
}

$user = $_SESSION['username'];
$query = "SELECT * FROM result where username='$user'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    ?>

<?php include_once './header.php'?>
<div class="contents">

<h4>Completed Test </h4>
<div >
  <table>
  <tr>
    <th> Test Name</th>
     <th> Correct Answer  </th>
     <th>   Wrong Answer  </th>
     <th> Total Marks  </th>
     <th> Test Date & Time  </th>
  </tr>
  <?php
while ($row = mysqli_fetch_assoc($result)) {
        $test = $row['testname'];
        $correct = $row['correct'];
        $wrong = $row['wrong'];
        $total = $row['marks'];
        $date = $row['datetime'];
        ?>
  <tr>
    <td><?php echo $test ?></td>
    <td><?php echo $correct ?></td>
    <td><?php echo $wrong ?></td>
    <td><?php echo $total ?></td>
    <td><?php echo $date ?></td>


  </tr>

  <?php }}?>
</div>
</div>

</body>
</html>
