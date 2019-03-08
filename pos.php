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
                    <h4 style="color: ghostwhite;"><?php $storename;?></h4>
                    <div id="hr"></div>
                    <a href="account.php" ><div id="link" class="link">Profile</div></a>
                    <a href="pos.php" ><div id="link"><h5>Point-Of-Sales</h5></div></a>
                    <div id="hr"></div>
                    <a href="inventory.php" ><div id="link">Inventory</div></a>
                    <a href="index.php" ><div id="link">Logout</div></a> 
                
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
                       // $storename = 'basaan ni ethan';
                        $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
                        $sql = "select itemName, stock, capital, sellingPrice, dateModified from `$storename`";
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

            <div id="cashier">

                <div id="list">
                    <center></center>
                </div>
                <div id="total">
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
                                    
                                <p>March 4, 2019</p>
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

            </div>

    </div>
</body>
</html>