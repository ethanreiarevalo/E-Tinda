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
    <title><?php echo $storename;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="3.css" />
    <script src="main.js"></script>
</head>
<body>
    <div id="dashboard">
                <center>
                    <h2 style="color: ghostwhite; margin-top: 15%;">E-Tinda</h2>
                    <div id="hr"></div>
                    <div id= "image">upload<br> image<br> here</div>
                    <div id="hr"></div>
                    <h4 style="color: ghostwhite;"><?php echo $storename;?></h4>
                    <div id="hr"></div>
                    <a href="account.php" ><div id="link" class="link">Profile</div></a>
                    <a href="pos.php" ><div id="link"><h5>Point-Of-Sales</h5></div></a>
                    <div id="hr"></div>
                    <a href="inventory.php" ><div id="link">Inventory</div></a>
                    <a id = "dashlink" href="inventory.php" ><div id="link">Reports</div></a>
                    <a href="logout.php" ><div id="link">Logout</div></a> 
                
                </center>
                
                
    </div>


    <div id="pos">
        <div id="container">


            <div id="table">
                    
            <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th> 
                        <th>unit Price</th>
                        
                    </tr>
                    <?php
                        $user = 'root';
                        $pass = '';
                        $db = 'e_tinda';
                        
                        $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
                        $sql = "select itemID,itemQuantity, itemDescription, quantitySellingPrice from `e-tinda_reciepts`";
                        $result = $db->query($sql);


                        if($result->num_rows >0){
                            while($row = $result->fetch_assoc()){
                            echo '<tr><td><center>' .$row["itemQuantity"]. '</center></td>';
                            echo '<td><center>' .$row["itemDescription"]. '</center></td>';
                            echo '<td><center>' .$row["quantitySellingPrice"]. '</center></td>';
                            }
                        }
                       
                    ?>
                   
                </table>
                        
            </div>

            <div id="cashier">

                <div id="list">
                    <center>
                        <button id="addbtn" style="padding: 2%; width: 95%;
                        color:white; background:#0b132b;border:1px solid
                        #0b132b; cursor:pointer; margin-top: 20%;">Add Product</button>

                        <button id="rmvbtn" style="padding: 2%; width: 95%;
                        color:white; background:#0b132b;border:1px solid
                        #0b132b; cursor:pointer; margin-top: 5%;">Remove Product</button>

                        <button id="cancel_tran" style="padding: 2%; width: 95%;
                        color:white; background:#0b132b;border:1px solid
                        #0b132b; cursor:pointer; margin-top: 5%;">Cancel Transaction</button>

                        <button id="addbtn" style="padding: 2%; width: 95%;
                        color:white; background:#0b132b;border:1px solid
                        #0b132b; cursor:pointer; margin-top: 5%;">Check Out</button>

                    </center>
                </div>
                <div id="total" style="height:15vh;">
                    <center>
                        <h3 style="margin: 0%;margin-top: 3%; padding: 0%;">Total</h3>
                        <h1 style="margin: 0;">P5000</h1>
                        
                    </center>
                </div>
            </div>
        </div>

            <div id="sales">

                    <div id="report">
                            <center>
                                <h2 style="display: block;">Daily sales</h2>
                        
                                <h1>P 5000.00</h1>
                                    
                                <p><?php 
                                    echo date('d-F-Y');
                                ?></p>
                            </center>
                            
                        </div>
                        <div id="report">
                                <center>
                                    <h2 style="display: block;">Weekly Sales</h2>
                                
                                    <h1>P 5000.00</h1>
                                            
                                    <p>March 4-10</p>
                                </center>
                        </div>
                        <div id="report">
                                <center>
                                    <h2 style="display: block;">Monthly Sales</h2>
                                    
                                    <h1>P 5000.00</h1>
                                                
                                    <p><?php 
                                        echo date('F');
                                    ?></p>
                                </center>
                        </div>
                        <div id="report">
                                <center>
                                    <h2 style="display: block;">Annual Sales</h2>
                                
                                    <h1>P 5000.00</h1>
                                            
                                    <p><?php 
                                        echo date('Y');
                                    ?></p>
                                </center>
                        </div>
            
                    </div>

            </div>

    </div>





    <!--modal-->
    <div id="searchmodal" class="modal">

<!--========================================= ADD PRODUCT FOR TRANSACTION =========================================-->
<!-- Modal content -->
<div class="modal-content">
  <span class="closex">&times;</span>
    <center><h3>SELECT PRODUCT</h3><form action="posprocess.php" method="post">
    <select name ="product" placeholder="Product Name" style="width:70%; padding:2%; margin:3%;">
        <<?php
        $user = 'root';
        $pass = '';
        $db = 'e_tinda';
        $postblname = $storename."_POS";
        $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
        $sql = "SELECT * FROM `$storename`";
        $result = $db->query($sql);if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                echo "<option value='".$row['itemName']."'>".$row['itemName']."</option>";
            }
        }
    ?>
    </select>
    <input type="number" placeholder="Quantity" name ="quantity" value="0" style="width:70%; padding:2%; margin:3%;">

    <button id = "modalbutton" value="AddProduct" name="addProduct">Add Product</button>
    </form>
    </center>
</div>

</div>

<script>
 //---------Modal script of search

var searchmodal = document.getElementById('searchmodal');

// Get the button that opens the modal
var btns = document.getElementById("addbtn");

// Get the <span> element that closes the modal
var spans = document.getElementsByClassName("closex")[0];

// When the user clicks the button, open the modal 
btns.onclick = function() {
  searchmodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spans.onclick = function() {
  searchmodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == searchmodal) {
    searchmodal.style.display = "none";
  }
}
</script>
<!--========================================= REMOVE PRODUCT FOR TRANSACTION =========================================-->
<!--modal-->
<div id="removemodal" class="modal">
<!-- Modal content -->
<div class="modal-content">
  <span class="closer">&times;</span>
    <center><h3>SELECT PRODUCT TO REMOVE</h3><form action="posprocess.php" method="post">
    <select name ="product" placeholder="Product Name" style="width:70%; padding:2%; margin:3%;">
        <<?php
        $user = 'root';
        $pass = '';
        $db = 'e_tinda';
        $postblname = $storename."_POS";
        $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
        $sql = "SELECT * FROM `e-tinda_reciepts`";
        $result = $db->query($sql);if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                echo "<option value='".$row['itemDescription']."'>".$row['itemDescription']."</option>";
            }
        }
    ?>
    </select>
    <input type="number" placeholder="Quantity" name ="quantity" value="0" style="width:70%; padding:2%; margin:3%;">

    <button id = "modalbutton" value="RemoveProduct" name="removeProduct">Remove Product</button>
    </form>
    </center>
</div>

</div>

<script>
 //---------Modal script of search

var removemodal = document.getElementById('removemodal');

// Get the button that opens the modal
var removebtns = document.getElementById("rmvbtn");

// Get the <span> element that closes the modal
var removespans = document.getElementsByClassName("closer")[0];

// When the user clicks the button, open the modal 
removebtns.onclick = function() {
  removemodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
removespans.onclick = function() {
  removemodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == removemodal) {
    removemodal.style.display = "none";
  }
}
</script>
<!--========================================= CANCEL TRANSACTION =========================================-->
<!--modal-->
<div id="cancelmodal" class="modal">
<!-- Modal content -->
<div class="modal-content">
  <span class="closec">&times;</span>
    <center><h3>CANCEL TRANSACTION?</h3><form action="posprocess.php" method="post">
    
    <button id = "modalbutton" value="canceltransY" name="canceltransY">YES</button>
    <button id = "modalbutton" value="canceltransN" name="canceltransN">NO</button>
    </form>
    </center>
</div>

</div>

<script>
 //---------Modal script of search

var cancelmodal = document.getElementById('cancelmodal');

// Get the button that opens the modal
var cancelbtns = document.getElementById("cancel_tran");

// Get the <span> element that closes the modal
var cancelspans = document.getElementsByClassName("closec")[0];

// When the user clicks the button, open the modal 
cancelbtns.onclick = function() {
  cancelmodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
cancelspans.onclick = function() {
  cancelmodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == cancelmodal) {
    cancelmodal.style.display = "none";
  }
}
</script>
</body>
</html>