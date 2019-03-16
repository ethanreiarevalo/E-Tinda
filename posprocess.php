<?php
session_start();
$updateItem = $_POST['product'];
$updateStock = $_POST['quantity'];

$conn_error = 'could not connect';
$storename = $_SESSION['store_name'];
$invStoreName = 
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'e_tinda';
$Today=date('Y-m-d');

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, "e_tinda") ;

if(isset($_POST["addProduct"])){
    $sql2 = "SELECT * FROM `$storename` where itemName = '$updateItem'";
    $result = $con->query($sql2);

    if($result->num_rows >0){
        echo "<br>"."<br>"."ate's error";
        while($row = mysqli_fetch_assoc($result)) {
        $capitalPrice = $row["capital"];
        $sellingPrice = $row["sellingPrice"];
        $quantityCapital = $capitalPrice * $updateStock;
        $quantitySelling = $sellingPrice * $updateStock;
        $sql = "INSERT INTO `e-tinda_reciepts` VALUES (null,$updateStock,'$updateItem','$sellingPrice','$capitalPrice',
        '$quantitySelling','$quantityCapital')";
        if(mysqli_query($con,$sql)===true){
            header("refresh:0;url=pos.php");
        } else {
            echo $updateItem;
            echo $capitalPrice;
            echo $sellingPrice;
            echo $quantityCapital;
            echo $quantitySelling;
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
    }else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
    }
    
    mysqli_close($con);

}else if(isset($_POST["removeProduct"])){
    $sql = "DELETE FROM `e-tinda_reciepts`where itemDescription = '$updateItem'";

    if(mysqli_query($con,$sql)===true){
        header("refresh:0;url=pos.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}else if(isset($_POST["canceltransY"])){
    $sql = "DELETE FROM `e-tinda_reciepts`";

    if(mysqli_query($con,$sql)===true){
        header("refresh:0;url=pos.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}else if(isset($_POST["canceltransN"])){
        header("refresh:0;url=pos.php");
}


?>