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
           <h3 id=heading>Change Password</h3>
           <div id="center">
            <?php
                if (isset($_POST["submit"]))
                {
                    $sql="SELECT * from student WHERE PASS='{$_POST["opass"]}' and ID='{$_SESSION["ID"]}'";
                    $res=$db->query($sql);
                    if ($res->num_rows>0)
                    {
                        $s="update student set PASS='{$_POST["npass"]}' WHERE ID=".$_SESSION["ID"];
                        $db->query($s);
                        echo "<p class='success'>Password Changed Success</p>";
                        
                    }
                    else 
                    {
                        echo "<p class='error'>Invalid Password</p>";
                    }
                }
            ?>
               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                    <label>Old Password</label>
                    <input type="password" name="opass" required>
                    <label>New Password</label>
                    <input type="password" name="npass" required>
                    <button type="submit" name="submit">Update Password</button>

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