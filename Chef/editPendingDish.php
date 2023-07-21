<?php 
    include 'upload.php';

    $dishName       = $_POST['dishname'];
    $ingredient     = $_POST['ingredientname'];
    $qty            = $_POST['quanity'];
    $unit           = $_POST['unit'];

    $hasDish = mysqli_fetch_array(mysqli_query($DBConnect, "SELECT dishID FROM dish WHERE dishName = '$dishName' AND Active = 'Yes';"));

    if (($hasDish) != 0) {
        mysqli_query($DBConnect, "INSERT INTO Pending_Dish(dishName, type, dateCreated, img) 
        VALUES ('$dishName', 'Edit', NOW(), '$filePathInDatabase');");

        $ndishQuery = mysqli_query($DBConnect, "SELECT ndishID FROM Pending_Dish ORDER BY dateCreated DESC LIMIT 1;");
        $ndishID = mysqli_fetch_array($ndishQuery)['ndishID'];

        for($i = 0; $i < count($qty); $i++ ) {
        $newQty = $qty[$i];

        if($unit[$i] == 1001) {
        $newQty = $qty[$i] * 1000;
        $unit[$i] = 1002;
        }

        if($unit[$i] == 1003) {
        $newQty = $qty[$i] * 1000;
        $unit[$i] = 1004;
        }

        $ingredientQuery = mysqli_query($DBConnect, "SELECT ingredientID FROM Ingredient WHERE ingredientName = '$ingredient[$i]' LIMIT 1;");
        $ingredientID = mysqli_fetch_array($ingredientQuery)['ingredientID'];

        mysqli_query($DBConnect, "INSERT INTO Pending_Recipe(nDishID, ingredientID, quantity) 
        VALUES ($ndishID, $ingredientID, $newQty);");
        }
    }
?>