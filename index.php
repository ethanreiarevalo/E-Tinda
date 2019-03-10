<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Tinda | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="1.css" />
    
</head>
<body>
    
        <!--Header-->
        <div id="header">
              <div id="logopic"></div>
              <div id="logo">
                  
                  <h1>E-Tinda</h1>
                  <h4>Online Inventory and POS system</h4>
              </div>
              <div id="login">
                <form action="login.php" method="post">
                    <input id="login_input" type="text" placeholder="Username" name="username">
                    <input id="login_input" type="password" placeholder="Password" name="password">
                    <button id="button_input">Login</button>
                </form>
              </div>
        </div>

        <script>
            var user = document.getElementById("login_input");

            if(user == ""){
                alert("please fill out the fields...");
            }
        
        </script>


        
        <div id="content1">
            <div id="imageholder">
               
                    <div id="container">
                    <div id="slider">
<figure>
<img src="c_images/inventory.png" alt=>
<img src="c_images/pos.png" alt>
<img src="c_images/inventory.png" alt=>
</figure>
</div>



                    </div>




               


            </div>








            
                <form action="register.php" id = "signform" method="post">
                    <center><h1>Register <br>Now!</h1></center>
                    <input id="sign" type="text" placeholder="Username" name="username">
                    <input id="sign" type="password" placeholder="Password" name="password">
                    <input id="sign" type="text" placeholder="Email" name="email">
                    <input id="sign" type="text" placeholder="Store Name" name="store_name">
                    <input id="sign" type="text" placeholder="Your first name" name="first_name">
                    <input  id="sign"type="text" placeholder="Your last name" name="last_name">
                    <center><button id="signup_button" value="Insert" type="submit">Sign Up!</button></center> 
                </form>
            
        </div>
        
        <div id="content2">
            <ul>
                <li><h3>Manage Your Stocks</h3></li>
                <li><h3>Sales Report</h3></li>
                <li><h3>Point-of-sales system</h3></li>
            </ul>
            <div id="about">
            <h2 style="margin-top: 12%;">About E-Tinda</h2>
            <hr style="width: 30%; float: left;">
            <br>
            <p>E-Tinda is an inventory and point-of-sales system 
            that helps stores manage<br> 
            their stocks and their inventory.
            Know your sales without having to<br>
            compute in a sheet. 
            <br>
            <br>
            E-Tinda is here to help you!
            </p>
            </div>
        </div>
        <!--Footer-->
        <div id="footer">
            <center style="margin-top:1.5%;">
            ©JEC Development Team <br>
            For more inquiries contact us at: <br>
            JECdevteam@gmail.com | 09120012378
            </center>
        </div>
        
    
</body>
</html>