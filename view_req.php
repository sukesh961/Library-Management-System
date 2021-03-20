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
           <h3 id=heading>View Request Details</h3>
           <?php
            $sql="SELECT student.name,request.MES,request.LOGS from student INNER JOIN request on student.ID=request.ID";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                echo"<table>
                    <tr>
                        <th>S.NO</th>
                        <th>NAME</th>
                        <th>MESSAGE</th>
                        <th>LOGS</th>
                    </tr>
                    ";
                        $i = 0;
                    while ($row=$res->fetch_assoc())
                    {
                        $i++;
                        echo "<tr>";
                        echo "<td>{$i}</td>";
                        echo "<td>{$row["name"]}</td>";
                        echo "<td>{$row["MES"]}</td>";
                        echo "<td>{$row["LOGS"]}</td>";
                        echo "</tr>";
                    }
                    echo "</table>";

            }
            else{
                echo"<p class='error'>No Request Records Found</P>";
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