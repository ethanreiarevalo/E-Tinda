<?php
session_start();
$updateItem = $_POST['product'];
$updateStock = $_POST['stock'];
$updatecPrice = $_POST['cPrice'];
$updatesPrice = $_POST['sPrice'];

$conn_error = 'could not connect';
$storename = $_SESSION['store_name'];
$invStoreName = 
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'e_tinda';
$Today=date('Y-m-d');


$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, "e_tinda") ;
$sql = "UPDATE `$storename` set stock = stock + $updateStock, capital = $updatecPrice, sellingPrice = $updatesPrice,
dateModified = '$Today' where itemName = '$updateItem'";

if(mysqli_query($con,$sql)===true){
    header("refresh:0;url=inventory.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>