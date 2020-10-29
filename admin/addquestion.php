<?php
include_once './config.php';
$noti = "";
if (isset($_POST['submit'])) {

    $question = $_POST['question'];
    $answer1 = $_POST["answer1"];
    $answer2 = $_POST["answer2"];
    $answer3 = $_POST["answer3"];
    $answer4 = $_POST["answer4"];
    $correct = $_POST["correct"];
    $test_id = $_POST['test'];

    $query = "INSERT INTO question(question,option1,option2,option3,option4,correct,test_id)
            VALUES ('$question','$answer1','$answer2','$answer3','$answer4','$correct','$test_id')";
    if (mysqli_query($conn, $query)) {
        $noti .= "<div>Question Successfully Added in Quiz</div>";
    } else {
        $noti .= "<div>Something Went Wrong</div>";
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

    <label for="statement">Question :</label><textarea name="question" cols="100" rows="3"></textarea>
    <br/>
    <br/>
    <label for="answer1">Answer1: </label><input type="text" name="answer1" size="50"/>
     Correct? <input type="radio" name="correct" value="1" />
    <br/>
    <br/>
    <label for="answer2">Answer2: </label><input type="text" name="answer2" size="50"/>
     Correct? <input type="radio" name="correct" value="2"/>
    <br/>
    <br/>
    <label for="answer3">Answer3: </label><input type="text" name="answer3" size="50"/>
     Correct? <input type="radio" name="correct" value="3"/>
    <br/>
    <br/>
    <label for="answer4">Answer4: </label><input type="text" name="answer4" size="50"/>
     Correct? <input type="radio" name="correct" value="4"/>
    <br/>
    <br/>
    <input type="submit" name="submit" value="Add Question" />
</form>
</div>
<?php echo $noti; ?>
</div>
</body>