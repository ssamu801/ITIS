<?php
    include "connect.php";
    $nDishID = $_POST['nDishID'];
    $price = $_POST['price'];

    $pendingDish = mysqli_fetch_array(mysqli_query($DBConnect, "SELECT dishName, img FROM pending_dish WHERE nDishID = $nDishID;"));
    $hasDish = mysqli_query($DBConnect, "SELECT dishID FROM dish WHERE dishName = '" . $pendingDish['dishName'] . "' AND Active = 'Yes';");
    if (mysqli_num_rows($hasDish) != 0) {
        mysqli_query($DBConnect, "  UPDATE dish SET Active = 'No' 
                                    WHERE dishName = '".$pendingDish['dishName']."';");
        $oldDish = mysqli_fetch_array($hasDish)['dishID'];
    }

    mysqli_query($DBConnect, "UPDATE pending_dish SET approved = 'Yes' WHERE nDishID = $nDishID;");
    mysqli_query($DBConnect, "INSERT INTO dish(dishName, dateCreated, price, img) VALUES('" . $pendingDish['dishName'] . "', NOW(), $price, '" . $pendingDish['img'] . "');");

    $approvedDish = mysqli_fetch_array(mysqli_query($DBConnect, "SELECT dishID FROM dish WHERE dishName = '" . $pendingDish['dishName'] . "' AND Active = 'Yes';"))[0];

    mysqli_query($DBConnect, "  INSERT INTO recipe(dishID, ingredientID, quantity)
                                SELECT $approvedDish, ingredientID, quantity 
                                FROM pending_recipe
                                WHERE nDishID = $nDishID;");
?>