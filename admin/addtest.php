<?php
require './config.php';
$noti = "";
if (isset($_POST['submit'])) {
    $testname = $_POST['test_name'];
    $query = "select * from testname where test_name='$testname'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $noti .= "<div>Test Already Exist</div>";

    } else {
        $query1 = "INSERT INTO testname(test_name)VALUE('$testname')";
        if (mysqli_query($conn, $query1)) {
            $noti .= "<div>Test Successfully Added</div>";
        }
    }

}

?>

<?php include_once './sidebar.php'?>
<!-- Page Content -->
<div style="margin-left:25%">
<div class="w3-container">

  <h1>Add Question</h1>
  <form action="#" method="post">
  <label>TestName</label>

<input type="text" id="small-input" name="test_name" required/>
<br/>

<input class="button" name="submit" type="submit" value="Add Test" />

</form>
<?php echo $noti ?>
</div>

</div>
</body>