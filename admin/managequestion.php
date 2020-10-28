<?php
include_once './config.php';

$query = "SELECT * FROM question";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    ?>



<?php include_once './sidebar.php'?>
<!-- Page Content -->
<div style="margin-left:25%">
<div >

  <h1>Manage Question</h1>
  <table>
  <tr>
    <th>Question name</th>
    <th> Option 1</th>
    <th> Option 2</th>
    <th> Option 3</th>
    <th> Option 4</th>
    <th> Correct Answer</th>
    <th> Test Id</th>

    <th>Action</th>
  </tr>
  <?php
    while ($row = mysqli_fetch_assoc($result)) {
            $question= $row['question'];
            $option1 = $row['option1'];
            $option2 = $row['option2'];
            $option3 = $row['option3'];
            $option4 = $row['option4'];
            $correct = $row['correct'];
            $testid = $row['test_id'];
        ?>
  <tr>
    <td><?php echo $question ?></td>
    <td><?php echo $option1 ?></td>
    <td><?php echo $option2 ?></td>
    <td><?php echo $option3 ?></td>
    <td><?php echo $option4 ?></td>
    <td><?php echo $correct ?></td>
    <td><?php echo $testid ?></td>
    <td><a href='#'>Edit</a>
       <a href='#'>Delete</a>
    </td>

  </tr>

  <?php }}?>
</div>

</div>
</body>