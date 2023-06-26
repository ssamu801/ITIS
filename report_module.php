<html>
    <head>
        <title>Reports</title>
    <body>
	<br>
    <?php
        $conn = mysqli_connect("localhost", "root", "") or die ("Unable to Connect". mysqli_error($conn));
        mysqli_select_db($conn, 'itisdev_db');
    ?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	  Start Date: <input type="date" name="date1" value="<?php if(!isset($_POST['date1'])){
																	echo date('Y-m-d');} 
																else{
																	echo $_POST['date1'];
																	} ?>" required >
	  <br>
	  <br>
	  End &nbsp;Date: <input type="date" name="date2" value="<?php if(!isset($_POST['date2'])){
																		echo date('Y-m-d');} 
																	else{
																		echo $_POST['date2'];
																		} ?>" required >
	  <br><br>
	  <input type="submit" value="Generate Report">
	</form>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  // collect value of input field	
	  $date1 = $_POST['date1'];
	  $date2 = $_POST['date2'];
			$sql = "
			SELECT i.ingredientName, SUM(oi.quantity) AS stock_out,i.quantity AS ingredientQuantity
            FROM ingredient i		JOIN recipe r                   ON i.ingredientID = r.ingredientID
						            JOIN dish d                     ON r.dishID = d.dishID
						            JOIN order_item oi              ON d.dishID = oi.dishID
						            JOIN orders o                   ON oi.orderID = o.orderID
            WHERE o.createdAt >= '$date1' AND o.createdAt <= '$date2'
            GROUP BY i.ingredientID;";

			$sql2 = "
			SELECT 		it.ingredientID,i.ingredientName, SUM(it.quantity) as stock_in
			FROM 		ingredient i			JOIN	ingredient_transaction it		ON it.ingredientID=i.ingredientID
			WHERE 		it.boughtDate 	>= '$date1' 	
			AND 		it.boughtDate 	<= '$date2' 
			GROUP BY 	it.ingredientID;";

			$records = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			$stockResult = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

			$stock_in = [];
			while($stockResults = mysqli_fetch_array($stockResult))
			{
				$id = $stockResults['ingredientID'];
				$ingredientName = $stockResults['ingredientName'];
				$stockIn = $stockResults['stock_in'];

				$stocks = array(
					'ingredientID' => $id,
					'ingredientName' => $ingredientName,
					'stock_in' => $stockIn
					 );
					
				array_push($stock_in, $stocks);	 	 
			}

			echo "<h3>Report for $date1 to $date2</h3>";
			echo
			"<table border='1' width='25%'>
			<th>Ingredient</th>
			<th>Stock In</th>
            <th>Stock Out</th>
			<th>Quantity</th>";

			$i = 0;
			 while($results = mysqli_fetch_array($records))
			{
				$ingredientName = $results['ingredientName'];
				$quantity = $results['ingredientQuantity'] - $results['stock_out'];
				 echo 
				 "<tr>
					<td>$ingredientName</td>
					<td>10</td>
                    <td>".$results['stock_out']."</td>
                    <td>$quantity</td>
					</tr>
				 ";

				$i++;
			}
			echo '</table>';
		} 
	?>
	<table border='1' width='25%'>
	<table>
    </body>
</html>