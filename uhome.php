<?php
include "database.php";
session_start();

if(!isset($_SESSION["ID"]))
{
    header("location:ulogin.php");
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>LMS</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/7caeb401d2.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1>E-Library Management System</h1>
        </div>
        <div id="wrapper">
           <h3 id=heading>Welcome <?php echo $_SESSION["NAME"];?></h3>
           

    
        </div>
        
        <div id="navi">
            <?php
            include "usersidebar.php";
            ?>
           
        </div>
        
    </div>

</body>
</html>