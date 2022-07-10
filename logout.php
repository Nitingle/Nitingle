<?php
session_start();
?>
<?php include('top.php');?> 

<?php
session_destroy();
?>
You have been successfully logged out.<br>
Return to <a href="index.php">Login</a><br><br><br><br>
<?php include('bottom.php');?>