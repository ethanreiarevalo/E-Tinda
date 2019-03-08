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
            <h4 style="color: ghostwhite;">STORE NAME</h4>
            <div id="hr"></div>
            <a href="account.html" ><div id="link" class="link">Profile</div></a>
            <a href="pos.html" ><div id="link">Point-Of-Sales</div></a>
            <a href="inventory.html" ><div id="link"><h5>Inventory</h5></div></a>
            <div id="hr"></div>
            <a href="index.html" ><div id="link">Logout</div></a> 
        
        </center>
        
        
    </div>

    <div id="inventory">

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

        <div id="table">
            <div id="table_view">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Stock</th>
                        <th>Capital Price</th>
                        <th>Selling Price</th>
                        <th>Date Modified</th>
                        <th>Update</th>
                    </tr>
                    <tr>
                        <td><center>Pencil</center></td>
                        <td><center>5</center></td>
                        <td><center>5.00</center></td>
                        <td><center>6.00</center></td>
                        <td><center>2019-03-05</center></td>
                        <td><center><button id="stock">Add</button> | <button id="stock">Update</button></center></td>
                    </tr>

                    <tr>
                        <td><center>Pencil</center></td>
                        <td><center>5</center></td>
                        <td><center>5.00</center></td>
                        <td><center>6.00</center></td>
                        <td><center>2019-03-05</center></td>
                        <td><center><button id="stock">Add</button> | <button id="stock">Update</button></center></td>
                    </tr>
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
                    <form action="" method="post">
                        <input type="text" placeholder="Product Name">
                        <input type="text" placeholder="Stock">
                        <input type="text" placeholder="Capital Price">
                        <input type="text" placeholder="Selling Price">
                        <button id="addButton">Add Product</button>
                    </form>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>