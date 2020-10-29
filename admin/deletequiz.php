<?php
include "./config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM testname where test_id='$id'";
    if (mysqli_query($conn, $query)) {
        header("location:managequiz.php");
    } else {
        echo "<script>alert('Something worng !!!! test Cant delete')</script>";
    }
}