<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
//retrive positions from the tbpositions table
$result=mysqli_query($con, "SELECT * FROM tbPositions");
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php
// inserting sql query
if (isset($_POST['Submit']))
{

$newPosition = addslashes( $_POST['position'] ); //prevents types of SQL injection

$sql = mysqli_query($con, "INSERT INTO tbpositions (position_name) VALUES ('$newPosition')");

// redirect back to positions
 header("Location: positions.php");
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
 $result = mysqli_query($con, "DELETE FROM tbPositions WHERE position_id='$id'");
 
 // redirect back to positions
 header("Location: positions.php");
 }
 else
 // do nothing
    
?>
<?php include "top.php" ?>
      
      <div class="container-fluid text-center">
      <h3>MANAGE CATEGORIES</h3>
      <hr>
      </div>
    
    <div class="container-fluid">
      <center>
        <table>
        <tr>
        <th>Position ID&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Position Name</th>
        </tr>

        <?php
        //loop through all table rows
        $inc=1;
        while ($row=mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>" .$inc."</td>";
        echo "<td>" . $row['position_name']."</td>";
        echo '<td><a href="positions.php?id=' . $row['position_id'] . '"><button class="btn btn-danger">Delete Position</button></a></td>';
        echo "</tr>";
        $inc++;
        }

        mysqli_free_result($result);
        mysqli_close($con);
        ?>
        </table>
        </center>
    <br>
    <center>
    <table class="tbl-1">
    <form name="fmPositions" id="fmPositions" action="positions.php" method="post" onsubmit="return positionValidate(this)">
       <tr >
        <td><input type="text" name="position" value="Enter New Categories" />  &nbsp;&nbsp;&nbsp;  </td>
        <td><button class="btn btn-success" type="submit" name="Submit">Add Categories</button></td>
    </tr>
    </table>
    </center>
    <br><br>
<?php include "bottom.php"?>