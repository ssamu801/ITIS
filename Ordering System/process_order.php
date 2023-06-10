<!DOCTYPE html>
<html>
  <head>
		<title>Process Order</title>
	</head>
	<body>
  <body>
    <?php
      $DBConnect = mysqli_connect("127.0.0.1:4306", "root", "") or die ("Unable to Connect". mysqli_error());
      $db = mysqli_select_db($DBConnect, 'itisdev');

      // Gets Data from Front-End
      $dishName = $_POST['vDish'];
      $qty = $_POST['vQuantity'];

      $priceQuery = mysqli_query($DBConnect, "SELECT price FROM dish WHERE dishName = '$dishName';");

      $dish = mysqli_fetch_array($priceQuery);
      $totalPrice = $dish["price"] * $qty;

      // Insert entries to Order and Order_Item tables
      $orderQuery = mysqli_query($DBConnect, "INSERT INTO orders (totalPrice, createdAt) VALUES ($totalPrice, NOW());");
      $orderItemQuery = mysqli_query($DBConnect, "INSERT INTO order_item (orderID, dishID, quantity) VALUES ((SELECT orderID FROM orders ORDER BY createdAt DESC LIMIT 1), (SELECT dishID FROM dish WHERE dishName = '$dishName'), $qty);");

      // Gets the array list of ingredients using ingredientID
      $ingredientsQuery = mysqli_query($DBConnect, "SELECT i.ingredientID FROM recipe r JOIN dish d ON d.dishID = r.dishID JOIN ingredient i ON r.ingredientID = i.ingredientID      WHERE d.dishName = '$dishName';");

      // Loop to subtract all the ingredients found on the dish to Inventory base from Recipe table
      foreach ($ingredientsQuery as $ingredient) {
        $ingredientQtyQuery = mysqli_query($DBConnect, "SELECT i.quantity FROM recipe r JOIN dish d ON d.dishID = r.dishID JOIN ingredient i ON r.ingredientID = i.ingredientID WHERE i.ingredientID = " . $ingredient['ingredientID']);
        $ingredientQty = mysqli_fetch_array($ingredientQtyQuery)['quantity'];

        $subtractQtyQuery = mysqli_query($DBConnect, "SELECT r.quantity FROM recipe r JOIN dish d ON d.dishID = r.dishID JOIN ingredient i ON r.ingredientID = i.ingredientID WHERE i.ingredientID = " . $ingredient['ingredientID']);
        $subtractQty = mysqli_fetch_array($subtractQtyQuery)['quantity'];

        $updateQtyQuery =  mysqli_query($DBConnect, "UPDATE ingredient SET quantity = ( $ingredientQty - $subtractQty ) WHERE ingredientID = " . $ingredient['ingredientID']);
      }
    ?>
  </body>
</html>