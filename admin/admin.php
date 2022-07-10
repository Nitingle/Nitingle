<?php include "top.php"?>
<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>

<marquee behavior="" direction="left"><h3> WELCOME TO ADMINISTRATION CONTROL PANEL</h3></marquee>
<div class= "dash-crd">
<div class="container-fluid text-center bg-warning">
<br><h3>Dashboard</h3><hr></div>
<div class="d-flex dash-tbl overflow-hidden">
        <div class="container-fluid" ><h4>Admin</h4><hr><br>
        <?php
                   $sql="SELECT * FROM tbadministrators";
                   $res=mysqli_query($con,$sql);
                   $count=mysqli_num_rows($res);
                   ?>
                   <h1><?php echo $count; ?></h1></div>
        <div class="container-fluid"><h4>No. of Voters</h4><hr><br>
        <?php
                   $sql="SELECT * FROM tbmembers";
                   $res=mysqli_query($con,$sql);
                   $count=mysqli_num_rows($res);
                   ?>
                   <h1><?php echo $count; ?></h1></div>
        
        <div class="container-fluid"><h4>No. of Candidates</h4><hr><br>
        <?php
                   $sql="SELECT * FROM tbcandidates";
                   $res=mysqli_query($con,$sql);
                   $count=mysqli_num_rows($res);
                   ?>
                   <h1><?php echo $count; ?></h1></div>
        
        <div class="container-fluid"><h4>Categories of Election</h4><hr><br>
        <?php
                   $sql="SELECT * FROM tbpositions";
                   $res=mysqli_query($con,$sql);
                   $count=mysqli_num_rows($res);
                   ?>
                   <h1><?php echo $count; ?></h1></div>
</div></div>

<?php include "bottom.php"?>