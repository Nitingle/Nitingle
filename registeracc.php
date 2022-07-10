<?php include('top.php');?>

   
<div class="login ">
<h3 class="fw-bold text-uppercase text-center">Voter Registration </h3>
<hr>

<?php
require('connection.php');
//Process
if (isset($_POST['submit']))
{

$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$mydate_of_birth = $_POST['date_of_birth'];
$mymobile = $_POST['mobile'];
$myaadhar = $_POST['aadhar'];
$mycity = $_POST['city'];
$mystate = $_POST['state'];
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];


$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

$sql = mysqli_query($con, "INSERT INTO tbMembers(first_name, last_name, date_of_birth, mobile, aadhar, city, state, email,password) 
VALUES ('$myFirstName','$myLastName','$mydate_of_birth','$mymobile','$myaadhar','$mycity','$mystate', '$myEmail', '$newpass') ");

die( "You have registered for an account.<br><br>Go to <a href=\"index.php\">Login</a>" );
}

echo '<form action="registeracc.php" method="post" onsubmit="return registerValidate(this)">';
echo '<table align="center"><tr><td>';
echo "<tr><td>First Name:</td><td><input type='text' name='firstname' maxlength='15' value=''></td></tr>";
echo "<tr><td>Last Name:</td><td><input type='text' name='lastname' maxlength='15' value=''></td></tr>";
echo "<tr><td>DOB :</td><td><input type='date' name='date_of_birth'  value=''></td></tr>";
echo "<tr><td>Mobile No. :</td><td><input type='number' name='mobile' maxlength='10'  value=''></td></tr>";
echo "<tr><td>Aadhar No. :</td><td><input type='number' name='aadhar' minlength='12' maxlength='12'  value=''></td></tr>";
echo "<tr><td>City :</td><td><input type='Text' name='city'  value=''></td></tr>";
echo "<tr><td>State :</td><td><input type='Text' name='state'  value=''></td></tr>";
echo "<tr><td>Email Address:</td><td><input type='email' name='email' maxlength='100' id='email'value=''></td><td><span id='result' style='color:red;'></span></td></tr>";
echo "<tr><td>Password:</td><td><input type='password' name='password' maxlength='15' value=''></td></tr>";
echo "<tr><td>Confirm Password:</td><td><input type='password' name='ConfirmPassword' maxlength='15' value=''></td></tr>";
echo "<tr><td>&nbsp;</td><td><br><input class='btn btn-primary' type='submit' name='submit' value='Register Account'/></td></tr>";
echo "<tr><td colspan = '2'><p>Already have an account? <a href='index.php'><b>Login Here</b></a></td></tr>";
echo "</tr></td></table>";
echo "</form>";
?>
</div> 




<?php include('bottom.php');?>