<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ordering System</title>
  <style>
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }
    input[type="text"], input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
    }
    input[type="submit"] {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Order Form</h2>
    <form method="post" action="process_order.php">
      <label for="vDish">Dish:</label>
      <input type="text" id="vDish" name="vDish" required>
      
      <label for="vQuantity">Quantity:</label>
      <input type="number" id="vQuantity" name="vQuantity" required>
    
      <input type="submit" value="Submit Order">
    </form>
  </div>
</body>
</html>