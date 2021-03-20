
<?php
include "database.php";
session_start();

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
           <h3 id=heading>Change Password</h3>
           <div id="center">
            <?php
                if (isset($_POST["submit"]))
                {
      
                    $sql="SELECT * from admin WHERE APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
                    $res=$db->query($sql);
                     //echo $res;
                    
                    if ($res->num_rows>0)
                    {
                        $s="update admin set APASS='{$_POST["npass"]}' WHERE AID=".$_SESSION["AID"];
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
            include "adminsidebar.php";
            ?>
           
        </div>
        
    </div>

</body>
</html>