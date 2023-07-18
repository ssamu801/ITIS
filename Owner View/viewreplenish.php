<!DOCTYPE html>
<html>
<head>
    <title>View Replenish</title>
    <link rel="stylesheet" type="text/css" href="owner.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body>
<?php @include 'navbar.php' ?>
<div class="stockview">
<h1>Replenish Audit Table</h1>
    <div class="content">
        <table>
            <tr>
                <th scope="col">Ingredient</th>
                <th scope="col">Quantity</th>
                <th scope="col">Measurement</th>
                <th scope="col">Bought Date</th>
                <th scope="col">Updated By</th>
            </tr>
            <tbody>
            <?php 
                @include 'connect.php';

                $query = mysqli_query($DBConnect, "SELECT i.ingredientName, r.quantity, u.unitName, r.boughtDate, r.createdBy FROM replenish r JOIN ingredient i ON r.ingredientID = i.ingredientID JOIN unit u ON u.unitID = i.unitID ORDER BY r.boughtDate DESC;");
                while($retrieve = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $retrieve['ingredientName']?></td>
                <td><?= $retrieve['quantity']?></td>
                <td><?= $retrieve['unitName']?></td>
                <td><?= $retrieve['boughtDate']?></td>
                <td><?= $retrieve['createdBy']?></td>
            </tr>
            <?php 
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>