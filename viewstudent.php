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
           <h3 id=heading>View Student Details</h3>
           <?php
            $sql="SELECT * FROM student";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                echo"<table>
                    <tr>
                        <th>S.NO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                    </tr>
                    ";
                        $i = 0;
                    while ($row=$res->fetch_assoc())
                    {
                        $i++;
                        echo "<tr>";
                        echo "<td>{$i}</td>";
                        echo "<td>{$row["NAME"]}</td>";
                        echo "<td>{$row["MAIL"]}</td>";
                        echo "<td>{$row["DEP"]}</td>";
                        echo "</tr>";
                    }
                    echo "</table>";

            }
            else{
                echo"<p class='error'>No Student Records Found</P>";
            }
           ?>
        </div>
        
        <div id="navi">
            <?php
            include "adminsidebar.php";
            ?>
           
        </div>
       
    </div>

</body>
</html>