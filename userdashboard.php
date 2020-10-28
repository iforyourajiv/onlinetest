<?php 

include_once './admin/config.php';

if (!isset($_SESSION)) {
    session_start();
}


$query = "SELECT * FROM testname";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {




?>

<?php include_once './header.php' ?>
<div class="contents">

<h4>Available Test </h4>
<div >
  <table>
  <tr>
    <th> Test Name</th>
     <th>Action</th>
  </tr>
  <?php
    while ($row = mysqli_fetch_assoc($result)) {
            $test_id = $row['test_id'];
            $test_name = $row['test_name'];
        ?>
  <tr>
    <td><?php echo $test_name ?></td>
    <td><a href='quiz.php?test_id=<?php echo $test_id ?>&test_name=<?php echo $test_name ?>'>Start Test</a>
    </td>

  </tr>

  <?php }}?>
</div>
</div>

</body>
</html>
