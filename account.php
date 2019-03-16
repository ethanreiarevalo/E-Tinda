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
                    <a id = "dashlink" href="sale_report.php" ><div id="link">Reports</div></a>
            
                    <a href="logout.php" ><div id="link">Logout</div></a> 
                
                </center>
                
                
        </div>

        <div id="user_popup" class="myForm">
            <center>
                    <form action="accountUpdate.php" id="form">
                        <h2 style="display:inline;">Update Your Account</h2>
                        <button style="margin-left:5%; border: none;" onclick="closeForm()">X</button>
                        <input type="text" value="<?php echo $username?>">
                        <input type="text" value="<?php echo $password?>">
                        <input type="text" style="display:block;" value="<?php echo $email?>">
                        <button>Submit</button>
                       
                        </form>
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
                    <div id="form_popup"></div>

                    <h3>Email</h3>
                    <h4><?php echo $email?></h4>
                    <div id="form_popup"></div>

                    <h3>Store Name</h3>
                    <h4><?php echo $storename?></h4>
                    <div id="form_popup"></div>

                    <h3>Name</h3>
                    <h4><?php echo $fname." ".$lname?></h4>

                    <button onclick = "openForm()">Edit Your Profile</button>
                   
                        
                </div>

            </div>
            



            <div id="container">
                    

                    <div id="delete">
                        <h2>Delete Your Acount?</h2>
                        <form action="delete.php" method="post">
                            <button style="background:red; border: 1px solid red; color: white;" value="update">Delete Account</button>
                        </form>
                       
                        <br><br>
                        <h2>Found some Errors?</h2>
                        <form action="bug.php" method ="post">
                            <textarea name="text" id="" cols="30" rows="10"></textarea>
                            <button id="toadmin">Report to the Admin</button>
                        </form>
                        
                   </div>

                   
                       

                   
            </div>          
        </div>

        

        <script>
function openForm() {
  document.getElementById("user_popup").style.display = "block";
}

function closeForm() {
  document.getElementById("user_popup").style.display = "none";
}
</script>
</body>
</html>