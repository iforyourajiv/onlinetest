<?php 

if (!isset($_SESSION)) {
  session_start();
}

if(!isset($_SESSION['username'])) {
  header('location:index.php');
}


?>




<?php include_once './sidebar.php'?>
<!-- Page Content -->
<div style="margin-left:25%">
<div class="w3-container">

  <h1>Welcome to Admin Panel</h1>
  
</div>

</div>
</body>