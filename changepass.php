<?php
session_start();
require('connection.php');

//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
} 
//retrive student details from the tbmembers table
$result=mysqli_query($con, "SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // get data from db
 $stdId = $row['member_id']; 
  $encpass= $row['password'];
}
?>
<?php
// updating sql query
if (isset($_POST['changepass'])){
$myId =  $_REQUEST['id'];
$oldpass = md5($_POST['oldpass']);
$newpass = $_POST['newpass'];
$conpass = $_POST['conpass'];
if($encpass == $oldpass)
{
  if($newpass == $conpass)
  {
    $newpassword = md5($newpass); //This will make your password encrypted into md5, a high security hash
    $sql = mysqli_query($con,"UPDATE tbmembers SET password='$newpassword' WHERE member_id = '$myId'" );
    echo "<script>alert('Password Change')</script>";
  }
  else
  {
    echo "<script>alert('New and Confirm Password Not Match')</script>";
  }

}
else
{
    echo "<script>alert('Old password not match')</script>";
}


// redirect back to profile
// header("Location: manage-profile.php");
}
?>
<?php include('top.php');?>
     
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <h4><a class="nav-link" href="student.php">Home</a></h4>
                        <h4><a class="nav-link" href="manage-profile.php" active>Manage Profile</a></h4>
                        <h4><a class="nav-link" href="changepass.php">Change Password</a></h4>
                        <h4><a class="nav-link" href="logout.php">Logout</a></h4>
                    </div>
                    
                </div>
            </div>
    </nav>
<div class="login">
<div class="mb-5 fw-bold text-uppercase text-center">
                <h3> Update Password</h3>
                <hr>
</div>
<table>
<form action="changepass.php?id=<?php echo $_SESSION['member_id']; ?>" method="post">
<table >
<tr><td>Old Password:</td><td><input type="password" name="oldpass" maxlength="5" value=""></td></tr>
<tr><td>New Password:</td><td><input type="password" name="newpass" maxlength="5" value=""></td></tr>
<tr><td>Confirm New Password:</td><td><input type="password" name="conpass" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td></td><td><input type="submit" name="changepass" value="Update Password"></td></tr>
</table>
</form>
</div>
<?php include('bottom.php');?>