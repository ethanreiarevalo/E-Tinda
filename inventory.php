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
    <link rel="stylesheet" type="text/css" media="screen" href="2.css" />
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
            <a href="account.php" ><div id="link" class="link">Profile</div></a>
            
            <a href="pos.php" >
            <div id="link">Point-Of-Sales</div></a>
            <a href="inventory.php" ><div id="link"><h5>Inventory</h5></div></a>
            <div id="hr"></div>
            <a href="logout.php" ><div id="link">Logout</div></a> 
        
        </center>
        
        
    </div>

    <div id="inventory">

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

        <div id="table">
            <div id="table_view">
            <table>
                    <tr>
                        <th>Item Name</th>
                        <th>Stock</th> 
                        <th>Capital</th>
                        <th>Selling Price</th>
                        <th>Date Modified</th>
                    </tr>
                    <?php
                        $user = 'root';
                        $pass = '';
                        $db = 'e_tinda';
                       // $storename = 'basaan ni ethan';
                        $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
                        $sql = "select itemid,itemName, stock, capital, sellingPrice, dateModified from `$storename`";
                        $result = $db->query($sql);


                        if($result->num_rows >0){
                            while($row = $result->fetch_assoc()){
                            echo '<tr><td><center>' .$row["itemName"]. '</center></td>';
                            echo '<td><center>' .$row["stock"]. '</center></td>';
                            echo '<td><center><div contenteditable>' .$row["capital"]. '</div></center></td>';
                            echo '<td><center><div contenteditable>' .$row["sellingPrice"]. '</div> </center></td>';
                            echo '<td><center>' .$row["dateModified"]. '</center></td>';
                            }
                        }
                       
                    ?>
                     
                </table>
                


            </div>


            
            <div id="add">
                
                <div id="search_container">
                    <div id="search">
                        <label for="" style="display:block;">Update Product</label>
                        
                        <button class="up" id="searchbtn" style="padding: 5%; width: 100%;
                        background:#0b132b; border: 1px solid #0b132b;
                        box-sizing:border-box; border-radius: 5px; color: white;
                        cursor:pointer;">Update</button>
                    </div>
                </div>

    <!-- Modal Search-->


<div id="searchmodal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="closex">&times;</span>
    <center><h3>Update</h3><form action="itemUpdate.php" method="post">
    <select id="item" name ="product" placeholder="Product Name" style="width:70%; padding:2%; margin:3%;">
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
    <input type="number" name="stock" placeholder="Stock" value="0" style="width:70%; padding:2%; margin:3%;">
    <input type="number" name="cPrice" step="0.01" placeholder="Capital Price" style="width:70%; padding:2%; margin:3%;">
    <input type="number" name="sPrice" step="0.01" placeholder="Selling Price" style="width:70%; padding:2%; margin:3%;">
    <button id = "modalbutton">Update</button>
    </form>
    </center>
</div>

</div>

<script>

var e = document.getElementById("item");

var strUser = e.options[e.selectedIndex].text;


 //---------Modal script of search

var searchmodal = document.getElementById('searchmodal');

// Get the button that opens the modal
var btns = document.getElementById("searchbtn");

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


                <div id="add_item">
                    <center>
                    <label for="">Add new Product</label>
                    <form action="inventoryprocess.php" method="post">
                        <input type="text" placeholder="Product Name" name="itemname">
                        <input type="number" placeholder="Stock" name="numberinstock">
                        <input type="number" step="0.01" placeholder="Capital Price" name="capital">
                        <input type="number"  step = "0.01"placeholder="Selling Price" name="sellingprice">
                        <button id="addButton">Add Product</button>
                    </form>
                    <button id="addStock">Add Stock</button>
                    </center>
                </div>




    <!-- Modal Search-->


<div id="stockmodal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="closey">&times;</span>
    <center><h3>Update</h3><form action="itemUpdate.php" method="post">
    <select id="item" name ="product" placeholder="Product Name" style="width:70%; padding:2%; margin:3%;">
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
    <input type="number" name="stock" placeholder="Stock" value="0" style="width:70%; padding:2%; margin:3%;">
    
    <button id = "modalbutton">Update</button>
    </form>
    </center>
</div>

</div>

<script>

var e = document.getElementById("item");

var strUser = e.options[e.selectedIndex].text;


 //---------Modal script of search

var stockmodal = document.getElementById('stockmodal');

// Get the button that opens the modal
var button = document.getElementById("addStock");

// Get the <span> element that closes the modal
var spansx = document.getElementsByClassName("closey")[0];

// When the user clicks the button, open the modal 
button.onclick = function() {
  stockmodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spansx.onclick = function() {
  stockmodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == searchmodal) {
    stockmodal.style.display = "none";
  }
}
</script>
            </div>
        </div>
    </div>
</body>
</html>