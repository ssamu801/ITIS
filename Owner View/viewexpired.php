<!DOCTYPE html>
<html>
<head>
    <title>View Expired</title>
    <link rel="stylesheet" type="text/css" href="owner.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body>
<?php @include 'navbar.php' ?>
<div class="stockview">
<h1>Expired Audit Table</h1>
    <div class="content">
        <table>
            <tr>
                <th scope="col">Ingredient</th>
                <th scope="col">Quantity</th>
                <th scope="col">Measurement</th>
                <th scope="col">Expired Date</th>
                <th scope="col">Updated By</th>
            </tr>
            <tbody>
            <?php 
                @include 'connect.php';

                $query = mysqli_query($DBConnect, "SELECT i.ingredientName, e.quantity, u.unitName, e.expiredDate, e.updatedBy FROM expired e JOIN ingredient i ON e.ingredientID = i.ingredientID JOIN unit u ON u.unitID = i.unitID ORDER BY e.expiredDate DESC;");
                while($retrieve = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $retrieve['ingredientName']?></td>
                <td><?= $retrieve['quantity']?></td>
                <td><?= $retrieve['unitName']?></td>
                <td><?= $retrieve['expiredDate']?></td>
                <td><?= $retrieve['updatedBy']?></td>
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