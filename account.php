<?php
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$storename = $_SESSION['store_name'];
$email= $_SESSION['email'];
$fname = $_SESSION['first_name'];
$lname = $_SESSION['last_name'];

$hidden_password = preg_replace("|.|","*",$password);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Tinda | Your Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="4.css" />
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
                    <a href="account.php" ><div id="link" class="link"><h5>Profile</h5></div></a>
                    <div id="hr"></div>
                    <a href="pos.php" ><div id="link">Point-Of-Sales</div></a>
                    <a href="inventory.php" ><div id="link">Inventory</div></a>
                    
                    <a href="logout.php" ><div id="link">Logout</div></a> 
                
                </center>
                
                
        </div>

        <div id="manage">

            <div id="profile">
                <div id="pro">
                <h2>Your Profile</h2>
                <h3>Username</h3>
                <h4><?php echo $username?></h4>
                <h3>Password</h3>
                <h4><?php echo $hidden_password?></h4>
                <h3>Email</h3>
                <h4><?php echo $email?></h4>
                <h3>Store Name</h3>
                <h4><?php echo $storename?></h4>
                <h3>Name</h3>
                <h4><?php echo $fname." ".$lname?></h4>
                </div>
            </div>

            <div id="container"></div>

        </div>
</body>
</html>