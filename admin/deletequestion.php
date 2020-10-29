<?php
include "./config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM question where qid='$id'";
    if (mysqli_query($conn, $query)) {
        header("location:managequestion.php");
    } else {
        echo "<script>alert('Something worng !!!! Question Cant delete')</script>";
    }
}