<?php
include "database.php";
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
           <h3 id=heading>New User Registration</h3>
           <div id="center">
            <?php
                if (isset($_POST["submit"]))
                {
					    echo $_POST["dep"];
                        $sql="insert into student(NAME,PASS,MAIL,DEP) values('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
                        $db->query($sql);
						//if ($db->query($sql) === TRUE) {
						//	$last_id = $db->insert_id;
						//	echo "New record created successfully. Last inserted ID is: " . $last_id;
						//} else {
						//	echo "Error: " . $sql . "<br>" . $db->error;
						//}
                        echo"<p class ='success'>User Registration success</p>";
                    
                    
                }

            ?>
               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
                    <label>Name</label>
                    <input type="text" name="name" required>
                    <label>Password</label>
                    <input type="password" name="pass" required>  
                    <labe>Email ID</label>  
                    <input type="email" name="mail" required> 
					 <labe>Department</label>  
                    <select name ="dep" required> 
                        <option value="">Select</option>
                        <option value="BCA">BCA</option>
                        <option value="MCA">MCA</option>
                    </select>            
                    <button type="submit" name="submit">Register Now</button>

               </form>
            


            </div>
           
        </div>
        
        <div id="navi">
            <?php
            include "sidebarhome.php";
            ?>
           
        </div>
        
    </div>

</body>
</html>