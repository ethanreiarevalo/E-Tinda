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
                    <a href="logout.php" ><div id="link">Logout</div></a> 
                
                </center>
                
                
    </div>


    <div id="pos">
        <div id="container">


            <div id="table">
                    
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
                       
                        $dba = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
                        $sql = "select itemName, stock, capital, sellingPrice, dateModified from `$storename`";
                        $result = $dba->query($sql);


                        if($result->num_rows >0){
                            while($row = $result->fetch_assoc()){
                            echo '<tr ><td><center>' .$row["itemName"]. '</center></td>';
                            echo '<td><center>' .$row["stock"]. '</center></td>';
                            echo '<td><center><div contenteditable>' .$row["capital"]. '</div></center></td>';
                            echo '<td><center><div contenteditable>' .$row["sellingPrice"]. '</div> </center></td>';
                            echo '<td><center>' .$row["dateModified"]. '</center></td></tr>';
                            }
                        }
                        // mysqli_close($db);
                    ?>
                </table>
                        
            </div>

            <div id="cashier">

                <div id="list">
                    <center>
                        <table>
                            <tr>
                                <th>QUANTITY</th>
                                <th>ITEM</th>
                                <th>SELLING PRICE</th>
                            </tr>
                    <?php
                        $user = 'root';
                        $pass = '';
                        $db = 'e_tinda';
                        $postblname = $storename."_reciepts";
                        $db1 = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
                        $sql1 = "SELECT itemDescription, itemQuantity, (sellingPrice*itemQuantity) as quantityprice, 
                        sum(quantityprice) as total from `$postblname`";
                        $result2 = mysqli_query($db1, $sql1);
                        
                        if($result2->num_rows > 0 ){
                            while($row = $result->fetch_assoc()){
                            echo '<tr><td><center>' .$row["itemQuantity"]. '</center></td>';
                            echo '<td><center>' .$row["itemDescription"]. '</center></td>';
                            echo '<td><center>' .$row["quantityprice"]. '</center></td>';
                            }
                        }
                    ?> 
                        </table>
                    </center>
                </div>
                <div id="total">
                    <center>
                        <h3 style="margin: 0%;margin-top: 3%; padding: 0%;">Total</h3>
                        <h1 style="margin: 0;">P5000</h1>
                        <button id="addbtn">AddItem</button>
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

<!-- Modal content -->
<div class="modal-content">
  <span class="closex">&times;</span>
    <center><h3>Update</h3>
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
    <input type="number" placeholder="Quantity" style="width:70%; padding:2%; margin:3%;">
   
    <button id = "modalbutton">Add Product</button>
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
</body>
</html>