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
            <a href="index.php" ><div id="link">Logout</div></a> 
        
        </center>
        
        
    </div>

    <div id="inventory">

        <div id="sales">
            <div id="report">
                <center>
                    <h2 style="display: block;">Daily sales</h2>
            
                    <h1>P 5000.00</h1>
                        
                    <p><?php 
                    echo date('Y-m-d');
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
                                    
                        <p>March</p>
                    </center>
            </div>
            <div id="report">
                    <center>
                        <h2 style="display: block;">Annual Sales</h2>
                    
                        <h1>P 5000.00</h1>
                                
                        <p>2019</p>
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
                        <th>Add Stock</th>
                        <th>Update Item</th>
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
                            echo "<td><a href=\"addItemStock.php?id=".$row['itemid']."\">ADD</a></td>";
                            // echo '<td><center><button id="stock">ADD</button></center></td></center></td>';
                            echo '<td><center><button id="stock">UPDATE</button></center></td></center></td></tr>';
                            }
                        }
                    ?>
                </table>
            </div>
            <div id="add">
                
                <div id="search_container">
                    <div id="search">
                        <label for="">Search Product</label>
                        <input type="text" placeholder="search" style="padding: 5%;">
                    </div>
                </div>
                <div id="add_item">
                    <center>
                    <label for="">Add new Product</label>
                    <form action="inventoryprocess.php" method="post">
                        <input type="text" placeholder="Product Name" name="itemname">
                        <input type="text" placeholder="Stock" name="numberinstock">
                        <input type="text" placeholder="Capital Price" name="capital">
                        <input type="text" placeholder="Selling Price" name="sellingprice">
                        <button id="addButton">Add Product</button>
                    </form>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>