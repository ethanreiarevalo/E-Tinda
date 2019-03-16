<?php
session_start();

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$storename = $_SESSION['store_name'];
$email=$_SESSION['email'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="7.css" />
    <script src="main.js"></script>
</head>
<body>

    <div id="dashboard">
        <center>
            <h2 style="color: ghostwhite; margin-top: 15%;">E-Tinda</h2>
            <div id="hr"></div>
            <div id= "image">upload<br> image<br> here</div>
            <div id="hr"></div>
            <h4 style="color: ghostwhite;"><?php echo $storename?></h4>
            <div id="hr"></div>
            <a id = "dashlink" href="account.php" ><div id="link" class="link">Profile</div></a>
            
            <a id = "dashlink" href="pos.php" >
            <div id="link">Point-Of-Sales</div></a>
            <a id = "dashlink" href="inventory.php" ><div id="link">Inventory</div></a>
            
            <a id = "dashlink" href="inventory.php" ><div id="link"><h5>Reports</h5></div></a>
            <div id="hr"></div>
            <a id = "dashlink" href="logout.php" ><div id="link">Logout</div></a> 
        
        </center>  
    </div>



</body>
</html>