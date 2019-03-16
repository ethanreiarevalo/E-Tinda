<?php
session_start();
$storename = $_SESSION['store_name'];
$usernames = $_SESSION['username'];
$description = $_POST['text'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_tinda";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `notifications` VALUES (null, '$usernames', '$storename', '$description', CURDATE(), 'unread')";

if (mysqli_query($conn, $sql)) {
   header("location:account.php");
   
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>  
