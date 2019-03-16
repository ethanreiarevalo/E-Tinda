<?php
session_start();

$conn_error = 'could not connect';
$storename = $_SESSION['store_name'];
$invStoreName = 
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'e_tinda';
$Today=date('Y-m-d');

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, "e_tinda") ;

if(isset($_POST["addProduct"])){ //=====================add item for buying
    
    $updateItem = $_POST['product'];
    $updateStock = $_POST['quantity'];
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
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }
        mysqli_close($con);

    }
}
//=================================================================================================================


else if(isset($_POST["removeProduct"])){//=================== remove specific product
    
$updateItem = $_POST['product'];
    $sql = "DELETE FROM `e-tinda_reciepts`where itemDescription = '$updateItem'";

    if(mysqli_query($con,$sql)===true){
        header("refresh:0;url=pos.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);

}


//=================================================================================================================



else if(isset($_POST["canceltransY"])){ //========================cancel transaction? y
    $sql = "DELETE FROM `e-tinda_reciepts`";

    if(mysqli_query($con,$sql)===true){
        header("refresh:0;url=pos.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}


//=================================================================================================================



else if(isset($_POST["canceltransN"])){//=====================cancel transaction? => no
        header("refresh:0;url=pos.php");

}

//=================================================================================================================


else if(isset($_POST["finishTransaction"])){//=======================finish transaction
    $sql = "SELECT SUM(itemQuantity) AS sQuantity, SUM(quantitySellingPrice) AS sqsPrice, 
    SUM(quantityCapitalPrice) AS sqcPrice, itemQuantity, itemDescription FROM `e-tinda_reciepts`";

    if(mysqli_query($con,$sql)===true){ //========SELECT FROM ETINDARECIEPTS
        while($row = mysqli_fetch_assoc($result)) {
            $iquantity = $row["itemQuantity"];
            $iDescription = $row["itemDescription"];
            $sumQuantity = $row["sQuantity"];
            $sumsPrice = $row["sqsPrice"];
            $sumcPrice = $row["sqcPrice"];
            $storePOS = $storename."_POS";
            $Today=date('Y-F-d');
            
            $sql1 = "UPDATE `$storename` set  stock = '$iquantity', dateModified = '$Today' 
            where itemName = '$iDescription'";
            
            if(mysqli_query($con,$sql1)===true){//===========update inventory
                $sql2 = "INSERT INTO `$storePOS` VALUES (null,null,'$sumQuantity','$sumcPrice','$sumsPrice','$Today')";
                
                if(mysqli_query($con,$sql2)===true){//=============insert in pos
                    header("refresh:0;url=pos.php");
                } else {
                    echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
                }
            } else {
                echo "Error: " . $sql1 . "<br>" . mysqli_error($con);
            
            } 

        } 
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    mysqli_close($con);
}
?>