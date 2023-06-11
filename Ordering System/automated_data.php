<!DOCTYPE html>
<html>
  <head>
		<title>Automated Test</title>
	</head>
	<body>
  <body>
    <h2>Order Form</h2>
    <!-- <form method="post" action="process_order.php">

      <input type="hidden" id="vDish" name="vDish" value="Spaghetti">
      <input type="hiddent" id="vQuantity" name="vQuantity" value="2">

      <input type="hidden" id="vDish" name="vDish" value="Pizza">
      <input type="hiddent" id="vQuantity" name="vQuantity" value="3">
    
      <input type="submit" value="Submit Order"> -->

      <form method="POST" action="process_order.php">
        <input type="hidden" name="vDish[]" value="Spaghetti"/>
        <input type="hidden" name="vQuantity[]" value="2"/>
        <input type="hidden" name="vDish[]" value="Pizza"/>
        <input type="hidden" name="vQuantity[]" value="3"/>
        <input type="submit" value="Submit" />
    </form>
    <!-- </form> -->
    <?php
      $DBConnect = mysqli_connect("127.0.0.1:4306", "root", "") or die ("Unable to Connect". mysqli_error());
      $db = mysqli_select_db($DBConnect, 'itisdev');
      
    ?>
  </body>
</html>