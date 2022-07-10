<?php
session_start();
require('../connection.php');
?>
<?php include "top.php"?>
<div class="container-fluid text-center">
      <h3>MANAGE PASSWORD</h3>
      <hr>
      </div>
<div id="container-fluid">
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
    $encPass = $row['password'];
    }

    //Process
    if (isset($_GET['id']) && isset($_POST['update']))
    {
        $myId = addslashes( $_GET['id']);
        $mypassword = md5($_POST['oldpass']);
        $newpass= $_POST['newpass'];
        $confpass= $_POST['confpass'];
        if($encPass==$mypassword)
        {
            if($newpass==$confpass)
            {
            $newpass = md5($newpass); //This will make your password encrypted into md5, a high security hash
            $sql = mysqli_query($con, "UPDATE tbadministrators SET password='$newpass' WHERE admin_id = '$myId'" );
            echo "<script>alert('Your password updated');</script>";
            }
            else
            {
                echo "<script>alert('Your new pass and confirm pass not match');</script>";
            }    
        }
        else
        {
            echo "<script>alert('Your old pass not match');</script>";
        }
        
    }
    ?>
        <table align="center">
        <tr>
        <td>
            <form action="change-pass.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
            <table align="center">
            <tr><td>Old Password:</td><td><input type="password" name="oldpass" maxlength="15" value=""></td></tr>
            <tr><td>New Password:</td><td><input type="password" name="newpass" maxlength="15" value=""></td></tr>
            <tr><td>Confirm Password:</td><td><input type="password" name="confpass" maxlength="15" value=""></td></tr>
            <tr><td>&nbsp;</td><td><button class="btn btn-success" type="submit" name="update" >Update Password</button></td></tr>
            </table>
            </form>
</td>
</tr>
        </table>
</div>
<?php include "bottom.php"?>