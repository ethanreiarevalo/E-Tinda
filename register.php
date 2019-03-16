<?php
session_start();
$conn_error = 'could not connect';
$username =$_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$storename =$_POST['store_name'];
$fname =$_POST['first_name'];
$lname =$_POST['last_name'];
$type = "client";
$status = "active";
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'e_tinda';
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, "e_tinda") ;
if(mysqli_query($con,"INSERT INTO `t_account` VALUES (null,'$username','$email','$storename','$pass',
'$fname','$lname','$type','$status')")===true){

  $sql = "CREATE TABLE IF NOT EXISTS `$storename` (
    itemid INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    itemName VARCHAR(30) NOT NULL,
    stock int(10) NOT NULL,
    capital DECIMAL(6,2),
    sellingPrice DECIMAL(6,2),
    dateModified DATE
    )";
    if ($con->query($sql) === TRUE) {
      $postblname = $storename."_POS";
      $sql2 = "CREATE TABLE IF NOT EXISTS `$postblname` (
        transactionID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        transactinonDescription VARCHAR(30) NOT NULL,
        transactionQuantity INT(10),
        capital DECIMAL(6,2),
        sellingPrice DECIMAL(6,2),
        dateModified DATE
        )";
        if ($con->query($sql2) === TRUE) {
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $pass;
          $_SESSION['store_name'] = $storename;
          $_SESSION['first_name'] = $fname;
          $_SESSION['last_name'] = $lname;
          $_SESSION['email'] = $email;
            header("location: account.php");
        } else {
            echo "Error creating POS table: " . $con->error;
        }
    } else {
        echo "Error creating table: " . $con->error;
    }
} else {
  echo "Error creating account: " . $con->error;
}
mysqli_close($con);

?>