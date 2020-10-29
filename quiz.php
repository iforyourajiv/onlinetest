<?php 

include_once './admin/config.php';

if (!isset($_SESSION)) {
    session_start();
}

if(isset($_GET['test_id'])) {
    
    $testid=$_GET['test_id'];
    $testname=$_GET['test_name'];
    $_SESSION['test']=$testname;
}

$query = "SELECT * FROM question   where test_id='$testid' ORDER BY RAND() LIMIT 10";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {




?>

<?php include_once './header.php' ?>
<h2 style="text-align:center;"><?php echo $_SESSION['test']?></h2>
<div class="contents" >
<?php 
$n=0;
while($row=mysqli_fetch_assoc($result)) {
        $q_id=$row['qid'];
        $question= $row['question'];
        $option1 = $row['option1'];
        $option2 = $row['option2'];
        $option3 = $row['option3'];
        $option4 = $row['option4'];
        $correct = $row['correct'];
        $test= $row['test_id'];

       

?>

<p><?php  $n=$n+1; echo $n.")".$question;  ?></p>

<form action="result.php" method="post">
<input type="radio" name="correct[<?php echo $q_id ?>]" value="1" />
<label for="option1"><?php echo  $option1?></label>
<br>
<input type="radio" name="correct[<?php echo $q_id  ?>]" value="2" />
<label for="option2"><?php echo  $option2?></label>

<br>
<input type="radio" name="correct[<?php echo $q_id  ?>]" value="3" />
<label for="option3"><?php echo  $option3?></label>

<br>
<input type="radio" name="correct[<?php echo $q_id ?>]" value="4" />
<label for="option4"><?php echo  $option4?></label>
<br>


<?php }} else {
    
    header("location:notfound.php");
}
?>
<input type="submit" name="submit" value="Submit test">
</form>

</div>

</body>
</html>