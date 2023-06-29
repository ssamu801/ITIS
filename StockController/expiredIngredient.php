<?php 
    $DBConnect = mysqli_connect("127.0.0.1:4306", "root", "") or die ("Unable to Connect". mysqli_error());
    $db = mysqli_select_db($DBConnect, 'itisdev');

    $ingredientName = $_POST['ingredientName'];
    $qty            = $_POST['qty'];
    $unit           = $_POST['unit'];

    if($unit == 1001) {
        $newQty = $qty * 1000;
        $unit = 1002;
    }

    if($unit == 1003) {
        $newQty = $qty * 1000;
        $unit = 1004;
    }
    
    $query = "SELECT quantity FROM ingredient WHERE ingredientName = '$ingredientName'";

    mysqli_query($DBConnect, "UPDATE ingredient SET quantity=($query) - $newQty WHERE ingredientName = '$ingredientName';");

    mysqli_query($DBConnect, "INSERT INTO expired(ingredientID, quantity, unitID, expiredDate) 
                    VALUES ((SELECT ingredientID FROM ingredient WHERE ingredientName = '$ingredientName'), 
                            $newQty,
                            $unit,
                            NOW());");

    header("Location: viewstock.php");
    exit;
?>