<?php
include_once './config.php';
$noti = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select *from question where qid='$id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $test_id = $row['test_id'];
            $q_id = $row['qid'];
            $question = $row['question'];
            $option1 = $row['option1'];
            $option2 = $row['option2'];
            $option3 = $row['option3'];
            $option4 = $row['option4'];
            $correct = $row['correct'];
        }
    }
}

if (isset($_POST['submit'])) {
    $qid = $_POST['qid'];
    $question = $_POST['question'];
    $answer1 = $_POST["answer1"];
    $answer2 = $_POST["answer2"];
    $answer3 = $_POST["answer3"];
    $answer4 = $_POST["answer4"];
    $correct = $_POST["correct"];
    $test_id = $_POST['test'];

    $query = "UPDATE question SET question='$question',option1='$answer1',option2='$answer2',
            option3='$answer3',option4='$answer4',correct='$correct',test_id='$test_id'
            WHERE qid='$q_id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('updated Successfull')";
        header('location:managequestion.php');
    } else {
        $noti .= "Something Went Worng";
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
<?php
require './config.php';
$query = "select * from testname";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $html = "";
    $html .= "<select name='test' class='small-input'>";
    while ($row = mysqli_fetch_assoc($result)) {
        $test_id = $row['test_id'];
        $test_name = $row['test_name'];
        $html .= "<option value='$test_id'>$test_name</option>";

    }
    $html .= "</select>";
    echo $html;
}

?>
<br/>
    <br/>
    <input type="text" value="<?php echo $question ?>"  name="qid" hidden>
    <label for="statement">Question :</label><textarea name="question"  cols="100" rows="3"><?php echo $question ?></textarea>
    <br/>
    <br/>
    <label for="answer1">Answer1: </label><input type="text" name="answer1" value="<?php echo $option1?>" size="50"/>
     Correct? <input type="radio" name="correct" value="1" require/>
    <br/>
    <br/>
    <label for="answer2">Answer2: </label><input type="text" name="answer2" value="<?php echo $option2?>"  size="50"/>
     Correct? <input type="radio" name="correct" value="2" required/>
    <br/>
    <br/>
    <label for="answer3">Answer3: </label><input type="text" name="answer3" value="<?php echo $option3?>" size="50"/>
     Correct? <input type="radio" name="correct" value="3" required/>
    <br/>
    <br/>
    <label for="answer4">Answer4: </label><input type="text" name="answer4" value="<?php echo $option4?>" size="50"/>
     Correct? <input type="radio" name="correct" value="4" required/>
    <br/>
    <br/>
    <input type="submit" name="submit" value="Update Question" />
</form>
</div>
<?php echo $noti; ?>
</div>
</body>