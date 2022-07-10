<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
} 
//retrive candidates from the tbcandidates table
$result=mysqli_query($con,"SELECT * FROM tbcandidates");
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php
// retrieving positions sql query
$positions_retrieved=mysqli_query($con, "SELECT * FROM tbpositions");
$row = mysqli_fetch_array($positions_retrieved);
 if($row)
 {
 // get data from db
 $positions = $row['position_name'];
 }
?>
<?php
// inserting sql query
if (isset($_POST['Submit']))
{

$newCandidateName = addslashes( $_POST['name'] ); //prevents types of SQL injection
$mydate_of_birth = $_POST['date_of_birth'];
$mymobile = $_POST['mobile'];
$myaadhar = $_POST['aadhar'];
$mycity = $_POST['city'];
$mystate = $_POST['state'];
$newCandidatePosition = addslashes( $_POST['position'] ); //prevents types of SQL injection

$sql = mysqli_query($con, "INSERT INTO tbcandidates(candidate_name, date_of_birth, mobile, aadhar, city, state, candidate_position) 
VALUES ('$newCandidateName','$mydate_of_birth','$mymobile','$myaadhar','$mycity','$mystate','$newCandidatePosition')" );

// redirect back to candidates
 header("Location: candidates.php");
}
?>
<?php
// deleting sql query
// check if the 'id' variable is set in URL
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysqli_query($con, "DELETE FROM tbcandidates WHERE candidate_id='$id'");
 
 // redirect back to candidates
 header("Location: candidates.php");
 }
 else
 // do nothing   
?>
<?php include "top.php"?>
<div class="container-fluid text-center">
      <h3>MANAGE CANDIDATES</h3>
      <hr>
      </div>

<div id="container-fluid">
  <center>
<table>
<form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
<tr>
    <td>Candidate Name :</td>
    <td><input type="text" name="name" value="Enter Candidate Full Name"/></td>
</tr>
<tr>
    <td>Date-of-Birth :</td>
    <td><input type="date" name="date_of_birth" value=""/></td>
</tr>
<tr>
    <td>Mobile No. :</td>
    <td><input type="number" name="mobile" minlength="10" maxlength="10" value="9876543210"/></td>
</tr>
<tr>
    <td>Aadhar No. :</td>
    <td><input type="number" name="aadhar" minlength="12" maxlength="12" value="2222444455556666"/></td>
</tr>
<tr>
    <td>City :</td>
    <td><input type="text" name="city" value="Enter Candidate City"/></td>
</tr>
<tr>
    <td>State :</td>
    <td><input type="text" name="state" value="Enter Candidate State"/></td>
</tr>
<tr>
    <td>Candidate Position</td>
    <!--<td><input type="combobox" name="position" value="<?php echo $positions; ?>"/></td>-->
    <td><SELECT NAME="position" id="position">select
    <OPTION VALUE="select">select
    <?php
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions_retrieved)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT>
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><button class="btn btn-success" type="submit" name="Submit" value="Add" >Add Candidates</button></td>
</tr>
</table>
</center>
<br>
<center>
<table >

<tr>
<th>Candidate ID</th>
<th>Candidate Name</th>
<th>Candidate Position</th>
</tr>

<?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($result)){
    
echo "<tr>";
echo "<td>" . $inc."</td>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo '<td><a href="candidates.php?id=' . $row['candidate_id'] . '"><button class="btn btn-danger">Delete Candidate</button></a></td>';
echo "</tr>";
$inc++;
}

mysqli_free_result($result);
mysqli_close($con);
?>
</table>
</center>
<br>
</div>
<?php include "bottom.php"?>