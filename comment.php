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
           <h3 id=heading>Send your Comment</h3>
                <?php
                $sql="SELECT * from BOOK where BID=".$_GET["id"];
                $res=$db->query($sql);
                if($res->num_rows>0)
                {
                    echo "<table>";
                    $row=$res->fetch_assoc();
                    echo "
                        <tr>
                            <th>Book Name</th>
                            <td>{$row["BTITLE"]}</td>
                        </tr>
                        <tr>
                            <th>Keywords</th>
                            <td>{$row["KEYWORDS"]}</td>
                        </tr>

                    ";
                    echo "<table>";
                }
                else
                {
                    echo "<p class='error'>No Book Found</p>";
                }
                ?>

           <div id="center">
           
            </div>
        </div>
        
        <div id="navi">
            <?php
            include "usersidebar.php";
            ?>
           
        </div>
        <div id="footer">
            <p>
                Copyrights &copy; vijay
            </p>
        </div>
    </div>

</body>
</html>