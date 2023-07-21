<?php
    include "connect.php";// Gets Data from Front-End
    $dishName = $_POST['vDish'];
    $qty = $_POST['vQuantity'];
    for ($i = 0; $i < count($qty); $i++) {
        $priceQuery = mysqli_query($DBConnect, "SELECT price FROM dish WHERE dishName = '$dishName[$i]';");

        $dish = mysqli_fetch_array($priceQuery);
        $totalPrice = $dish["price"] * $qty[$i];
    }

    $orderQuery = mysqli_query($DBConnect, "INSERT INTO orders (total, createdAt) VALUES ($totalPrice, NOW());");
  
    for ($i = 0; $i < count($qty); $i++) {
        // Insert entries to Order and Order_Item tables
        $orderItemQuery = mysqli_query($DBConnect, "INSERT INTO order_item (orderID, dishID, quantity) VALUES ((SELECT orderID FROM orders ORDER BY createdAt DESC LIMIT 1), (SELECT dishID FROM dish WHERE dishName = '$dishName[$i]'), $qty[$i]);");

        // Gets the array list of ingredients using ingredientID
        $ingredientsQuery = mysqli_query($DBConnect, "SELECT i.ingredientID FROM recipe r JOIN dish d ON d.dishID = r.dishID JOIN ingredient i ON r.ingredientID = i.ingredientID WHERE d.dishName = '$dishName[$i]';");

        // Loop to subtract all the ingredients found on the dish to Inventory base from Recipe table
        foreach ($ingredientsQuery as $ingredient) {
            $ingredientQtyQuery = mysqli_query($DBConnect, "SELECT i.quantity FROM recipe r JOIN dish d ON d.dishID = r.dishID JOIN ingredient i ON r.ingredientID = i.ingredientID WHERE i.ingredientID = " . $ingredient['ingredientID']);
            $ingredientQty = mysqli_fetch_array($ingredientQtyQuery)['quantity'];

            $subtractQtyQuery = mysqli_query($DBConnect, "SELECT r.quantity FROM recipe r JOIN dish d ON d.dishID = r.dishID JOIN ingredient i ON r.ingredientID = i.ingredientID WHERE i.ingredientID = " . $ingredient['ingredientID']);
            $subtractQty = mysqli_fetch_array($subtractQtyQuery)['quantity'];

            $updateQtyQuery =  mysqli_query($DBConnect, "UPDATE ingredient SET quantity = ( $ingredientQty - ($subtractQty * $qty[$i]) ) WHERE ingredientID = " . $ingredient['ingredientID']);
        }
    }
    header("Location: reciept.php");
    exit;
?>