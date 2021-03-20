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
           <h3 id=heading>Search Book</h3>
           <div id="center">
           
               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                    <label>Enter Book Name or Keywords</label>
                    <input type="text" required name="name">
                    <button type="submit" name="submit">Search Now</button>

               </form>
            


            </div>
            <?php
             if (isset($_POST["submit"]))
             {                   
                
            $sql="SELECT * FROM book where BTITLE like'%{$_POST["name"]}%' or Keywords like'%{$_POST["name"]}%'";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                echo"<table>
                    <tr>
                        <th>S.NO</th>
                        <th>Book Name</th>
                        <th>Keywords</th>
                        <th>View</th>
                    </tr>
                    ";
                        $i = 0;
                    while ($row=$res->fetch_assoc())
                    {
                        $i++;
                        echo "<tr>";
                        echo "<td>{$i}</td>";
                        echo "<td>{$row["BTITLE"]}</td>";
                        echo "<td>{$row["KEYWORDS"]}</td>";
                        echo "<td><a href='{$row["FILE"]}'target='_blank'>View</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";

            }
            else{
                echo"<p class='error'>No Books Records Found</P>";
            }
        }
           ?>
        </div>
        
        <div id="navi">
            <?php
            include "usersidebar.php";
            ?>
           
        </div>
       
    </div>

</body>
</html>