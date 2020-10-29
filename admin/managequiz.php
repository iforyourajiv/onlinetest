<?php
include_once './config.php';

$query = "SELECT * FROM testname";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    ?>



<?php include_once './sidebar.php'?>
<!-- Page Content -->
<div style="margin-left:25%">
<div >

  <h1>Manage Quiz</h1>
  <table>
  <tr>
    <th>Test Id</th>
    <th> Test Name</th>
    <th>Action</th>
  </tr>
  <?php
    while ($row = mysqli_fetch_assoc($result)) {
            $test_id = $row['test_id'];
            $test_name = $row['test_name'];
        ?>
  <tr>
    <td><?php echo $test_id ?></td>
    <td><?php echo $test_name ?></td>
    <td>
       <a href='deletequiz.php?id=<?php echo $test_id ?>'>Delete</a>
    </td>

  </tr>

  <?php }}?>
</div>

</div>
</body>