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
           <h3 id=heading>View Comment Details</h3>
           <?php
            $sql="SELECT book.BTITLE,student.NAME,comment.COMM,comment.LOGS from comment INNER JOIN book on book.BID=comment.BID INNER JOIN student on comment.SID=student.ID";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                echo"<table>
                    <tr>
                        <th>S.NO</th>
                        <th>BOOK</th>
                        <th>NAME</th>
                        <th>COMMENT</th>
                        <th>LOGS</th>
                    </tr>
                    ";
                        $i = 0;
                    while ($row=$res->fetch_assoc())
                    {
                        $i++;
                        echo "<tr>";
                        echo "<td>{$i}</td>";
                        echo "<td>{$row["BTITLE"]}</td>";
                        echo "<td>{$row["NAME"]}</td>";
                        echo "<td>{$row["COMM"]}</td>";
                        echo "<td>{$row["LOGS"]}</td>";
                        echo "</tr>";
                    }
                    echo "</table>";

            }
            else{
                echo"<p class='error'>No Comments Found</P>";
            }
           ?>
        </div>
        
        <div id="navi">
            <?php
            include "adminsidebar.php";
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