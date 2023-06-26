<?php
$conn = mysqli_connect("localhost", "root", "") or die ("Unable to Connect". mysqli_error($conn));
mysqli_select_db($conn, 'itisdev_db');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field	
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    date_default_timezone_set('Asia/Manila');

    $sql = "
        SELECT i.ingredientName, SUM(oi.quantity) AS stock_out,i.quantity AS ingredientQuantity
        FROM ingredient i
        JOIN recipe r ON i.ingredientID = r.ingredientID
        JOIN dish d ON r.dishID = d.dishID
        JOIN order_item oi ON d.dishID = oi.dishID
        JOIN orders o ON oi.orderID = o.orderID
        WHERE o.createdAt >= '$date1' AND o.createdAt <= '$date2'
        GROUP BY i.ingredientID;";

    $sql2 = "
        SELECT it.ingredientID,i.ingredientName, SUM(it.quantity) as stock_in
        FROM ingredient i
        JOIN ingredient_transaction it ON it.ingredientID=i.ingredientID
        WHERE it.boughtDate >= '$date1'
        AND it.boughtDate <= '$date2'
        GROUP BY it.ingredientID;";

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
    
    echo "<h3>Stock Report</h3>";
    echo "<h3>Report Created ".date("Y-m-d h:i:sa")."</h3>";
    echo "<h3>Report for $date1 to $date2</h3>";
    echo "<table border='1' width='25%'>";
    echo "<th>Ingredient</th><th>Stock In</th><th>Stock Out</th><th>Quantity</th>";

    while($results = mysqli_fetch_array($records))
    {
        $ingredientName = $results['ingredientName'];
        $quantity = $results['ingredientQuantity'] - $results['stock_out'];

        echo "<tr>
                <td>$ingredientName</td>
                <td>10</td>
                <td>".$results['stock_out']."</td>
                <td>$quantity</td>
              </tr>";
    }

    echo '</table>';
    echo "<h3>*END OF REPORT*</h3>";
}

mysqli_close($conn);
?>
