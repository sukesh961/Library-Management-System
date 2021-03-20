<?php
include "database.php";
session_start();
function countRecord($sql,$db)
{
    $res=$db->query($sql);
    return $res->num_rows;
}
if(!isset($_SESSION["AID"]))
{
    header("location:alogin.php");
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
           <h3 id=heading>Welcome Admin</h3>
           <div id="center">
                <ul class="record">
                    <li>Total Students:<?php echo countRecord("select * from student",$db); ?></li>
                    <li>Total Books   :<?php echo countRecord("select * from book",$db); ?></li>
                    <li>Total Request :<?php echo countRecord("select * from request",$db); ?></li>
                   
                </ul>   
            </div>

    
        </div>
        
        <div id="navi">
            <?php
            include "adminsidebar.php";
            ?>
           
        </div>
        
    </div>

</body>
</html>