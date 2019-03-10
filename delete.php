<?php

session_start();
$conn_error = 'could not connect';

$storename = $_SESSION['store_name'];
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'e_tinda';
$message = "Your account has been deleted! Thak you for using E-Tinda!";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, "e_tinda") ;
$sql =  "Update t_account set status = 'inactive' where store_name = '$storename'";


if (mysqli_query($con, $sql)) {
    echo "<script type=\"text/javascript\">window.alert('$message');window.location.href = 'index.php';</script>";
 } else {
    echo "Error updating record: " . mysqli_error($con);
 }
 mysqli_close($con);





?>







?>