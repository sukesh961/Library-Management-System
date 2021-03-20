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
           <h3 id=heading>New Book Request</h3>
           <div id="center">
            <?php
                if (isset($_POST["submit"]))
                {
                    $sql="insert into request (ID,MES,LOGS) values('{$_SESSION["ID"]}','{$_POST["mess"]}',now())";
                    $db->query($sql);
                    echo "<p class='success'>Request Send to Admin</p>";
                        
                    
                   
                }
            ?>
               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                    <label>Message</label>
                    <textarea required name="mess"></textarea>
                    <button type="submit" name="submit">Send Message</button>

               </form>
            


            </div>
           
        </div>
        
        <div id="navi">
            <?php
            include "usersidebar.php";
            ?>
           
        </div>
       
    </div>

</body>
</html>