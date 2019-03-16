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

    <div id = "tab">
        <button class="tablink" onclick="openPage('Home', this, '#5bc0eb')" id="defaultOpen">Daily</button>
        <button class="tablink" onclick="openPage('News', this, '#5bc0eb')" >Weekly</button>
        <button class="tablink" onclick="openPage('Contact', this, '#5bc0eb')">Monthly</button>
        <button class="tablink" onclick="openPage('About', this, '#5bc0eb')">Annual</button>

        <div id="Home" class="tabcontent">
            <center>
                <h3>Your Daily Transactions</h3>
                <select name="" id="select">
                    <option value=""></option>
                </select>

                <table>
                    <tr>
                        
                        <th>Capital Price</th>
                        <th>Selling Price</th>
                        <th>Quantity</th>
                        <th>Date</th>
                    </tr>
                </table>

            </center>
        </div>

        <div id="News" class="tabcontent">
            <center>
                <h3>Your Weekly Transactions</h3>
                <select name="" id="select">
                    <option value=""></option>
                </select>

                 <table>
                    <tr>
                        
                        <th>Capital Price</th>
                        <th>Selling Price</th>
                        <th>Quantity</th>
                        <th>Date</th>
                    </tr>
                </table>

            </center>
        </div>

        <div id="Contact" class="tabcontent">
            <center>
                <h3>Your Monthly Transactions</h3>
                <select name="" id="select">
                    <option value=""></option>
                </select>

                <table>
                    <tr>
                       
                        <th>Capital Price</th>
                        <th>Selling Price</th>
                        <th>Quantity</th>
                        <th>Date</th>
                    </tr>
                </table>

            </center>
        </div>

        <div id="About" class="tabcontent">
            <center>
                <h3>Your Annual Transactions</h3>
                <select name="" id="select">
                    <option value=""></option>
                </select>

                <table>
                    <tr>
                        
                        <th>Capital Price</th>
                        <th>Selling Price</th>
                        <th>Quantity</th>
                        <th>Date</th>
                    </tr>
                </table>

            </center>
        </div>

<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
    </div>



</body>
</html>