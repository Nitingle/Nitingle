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
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
 $email = $row['email'];
 }
?>
<?php
// updating sql query
if (isset($_POST['update'])){
$myId = addslashes( $_GET[id]);
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];

$sql = mysqli_query($con,"UPDATE tbMembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail' WHERE member_id = '$myId'" );

// redirect back to profile
 header("Location: manage-profile.php");
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
                <h3> Update Profile</h3>
                <hr>
</div>
<table >
<form action="manage-profile.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">
<table>
<tr><td>First Name:</td><td><input type="text"  name="firstname" maxlength="15" value="<?php echo $firstName; ?>"></td></tr>
<tr><td>Last Name:</td><td><input type="text"  name="lastname" maxlength="15" value="<?php echo $lastName; ?>"></td></tr>
<tr><td>Email Address:</td><td><input type="text"  name="email" maxlength="100" value="<?php echo $email; ?>"></td></tr>
<tr><td>&nbsp;</td></td><td><input type="submit" name="update" value="Update Profile"></td></tr>
</table>
</form>

</div>
<?php include('bottom.php');?>