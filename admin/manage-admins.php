<?php
session_start();
require('../connection.php');
?>
<?php include "top.php"?>
<div class="container-fluid text-center">
      <h3>MANAGE ADMINS</h3>
      <hr>
      </div>

<div id="container">
<?php
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}

//fetch data for update file
$result=mysqli_query($con, "SELECT * FROM tbadministrators WHERE admin_id = '$_SESSION[admin_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // get data from db
 $adminId = $row['admin_id'];
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
 $email = $row['email'];
 }

//Process
if (isset($_GET['id']) && isset($_POST['update']))
{
$myId = addslashes( $_GET['id']);
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];

$sql = mysqli_query($con, "UPDATE tbAdministrators SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail' WHERE admin_id = '$myId'" );
}
?>
<table align="center">
<tr>
<td>
<form action="manage-admins.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
<table align="center">
<tr><td>First Name:</td><td><input type="text"  name="firstname" maxlength="15" value="<?php echo $firstName ?>"></td></tr>
<tr><td>Last Name:</td><td><input type="text"  name="lastname" maxlength="15" value="<?php echo $lastName ?>"></td></tr>
<tr><td>Email Address:</td><td><input type="text"  name="email" maxlength="100" value="<?php echo $email?>"></td></tr>
<tr><td>&nbsp;</td><td><button class="btn btn-success" type="submit" name="update" >Update Account</button></td></tr>
</table>
</form>
</td>
</tr>
</table>
</div>
<?php include "bottom.php" ?>