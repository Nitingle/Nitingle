<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/admin_style2.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/d334deac33.js" crossorigin="anonymous"></script>
    <script language="JavaScript" src="js/admin.js"></script>
        <title>D-voting</title>
</head>

<body class="text-sm-start text-md-start text-lg-start">
<header>
        
        <center>
          <h1><img src="images/WhatsApp Image 2022-06-21 at 9.48.53 PM.jpeg" height="100px" width="100px" class="img-fluid py-2" alt="" srcset="">Digital Voting System</h1>
        </center>
    </header>
    <hr>
    <div class="success fs-1 fw-bold" align="center">Thank You!! Visit Again</div>
    
<?php
session_start();
session_destroy();
?>
<div>
    <br>
You have been successfully logged out of your control panel.

Return to <a href="index.php">Login</a><br></div><br>
<?php include "bottom.php"?>