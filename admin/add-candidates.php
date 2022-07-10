<?php include "top.php"?>

<div class="login ">
<h3 class="fw-bold text-uppercase text-center">Voter Registration </h3>
<hr>
<?php
require('../connection.php');
// retrieving positions sql query
$positions_retrieved=mysqli_query($con, "SELECT * FROM tbPositions");

?>

<?php

if (isset($_POST['submit']))
{

$candidate_Name = addslashes( $_POST['candidate_name'] ); //prevents types of SQL injection
$email = $_POST['email'];
$DOB = $_POST['DOB'];
$Mobile_no = $_POST['mobile'];
$Aadhar_no = $_POST['aadhar'];//This will make your password encrypted into md5, a high security hash
$newCandidatePosition = addslashes( $_POST['position'] );

$sql = mysqli_query($con, "INSERT INTO tbcandidates(candidate_name,email,DOB,mobile,aadhar,candidate_position) 
VALUES ('$candidate_Name', '$email','$DOB', '$Mobile_no','$Aadhar_no','$newCandidatePosition') ");

header("Location: add-candidates.php");
}

echo '<form name="fmCandidates" id="fmCandidates" action="add-candidates.php" method="post" onsubmit="return candidateValidate(this)">';
echo '<table align="center"><tr><td>';
echo "<tr><td>Full Name:</td><td><input type='text' name='candidate_name' maxlength='45' value=''></td></tr>";
echo "<tr><td>Email:</td><td><input type='email' name='email' maxlength='70' id='email'value=''></td><td><span id='result' style='color:red;'></span></td></tr>";
echo "<tr><td>Date-of-Birth :</td><td><input type='date' name='DOB'  value=''></td></tr>";
echo "<tr><td>Mobile No. :</td><td><input type='number' name='mobile' maxlength='10' value=''></td></tr>";
echo "<tr><td>Aadhar No. :</td><td><input type='number' name='aadhar' maxlength='12' value=''></td></tr>";
echo "<tr>
<td>Candidate Position</td>
<td><SELECT NAME='position' id='position'>select
<OPTION VALUE='select'>select"?>
<?php
    while ($row=mysqli_fetch_array($positions_retrieved)){
        echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
        }
?>
<?php "
</SELECT>
</td>
</tr>";
echo "<tr><td>&nbsp;</td><td><input type='submit' name='submit' value='Register Account'/></td></tr>";

echo "</tr></td></table>";
echo "</form>";
?>
</div> 

<?php include "bottom.php"?>