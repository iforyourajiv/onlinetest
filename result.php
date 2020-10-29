<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once './admin/config.php';
$c = 0;
$w = 0;
if (isset($_POST['submit'])) {
    $id = $_POST['correct'];

    foreach ($id as $i => $data) {
        $q = "select *from question where qid='$i'";
        $r = mysqli_query($conn, $q);
        if (mysqli_num_rows($r) > 0) {
            while ($row = mysqli_fetch_assoc($r)) {
                if ($data == $row['correct']) {
                    $c = $c + 1;
                } else {
                    $w = $w + 1;
                }
            }
        }
    }

}

if (isset($_GET['correct'])) {
    $correct = $_GET['correct'];
    $wrong = $_GET['wrong'];
    $marks = $_GET['marks'];
    $user = $_SESSION['username'];
    $testname = $_SESSION['test'];
    $query = "insert into result(username,correct,wrong,marks,testname,datetime)
            values('$user','$correct','$wrong','$marks','$testname',now())";
    if (mysqli_query($conn, $query)) {
        unset($_SESSION['test']);
        header("location:index.php");
    }

}

?>

<?php include_once './header.php'?>
<h2 style="text-align:center;">Result</h2>
<div class="contents">

<h4>Correct Answer <?php echo $c ?></h4>
<h4>Wrong Answer <?php echo $w ?></h4>
<?php
$marks = $c * 10;
if ($marks < 60) {
    echo "<h4> You Are Not Passed !!Your Marks is $marks</h4>";
} else {
    echo "<h4> You Are  Passed !!Your Marks is $marks</h4>";
}
?>
<a href="result.php?correct=<?php echo $c ?>&wrong=<?php echo $w ?>&marks=<?php echo $marks ?>"><button>Save Result</button></a>
</div>



</body>
</html>