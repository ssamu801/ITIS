<!DOCTYPE html>
<html>
<head>
    <title>View Disparity</title>
    <link rel="stylesheet" type="text/css" href="owner.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body>
<?php @include 'navbar.php' ?>
<div class="stockview">
<h1>Disparity Audit Table</h1>
    <div class="content">
        <table>
            <tr>
                <th scope="col">Ingredient</th>
                <th scope="col">System Count</th>
                <th scope="col">Manual Count</th>
                <th scope="col">Measurement</th>
                <th scope="col">Date Generated</th>
                <th scope="col">Created By</th>
            </tr>
            <tbody>
            <?php 
                @include 'connect.php';

                $query = mysqli_query($DBConnect, "SELECT i.ingredientName, d.sQuantity, d.mQuantity, u.unitName, d.createdAt, d.createdBy FROM disparity d JOIN ingredient i ON d.ingredientID = i.ingredientID JOIN unit u ON u.unitID = i.unitID ORDER BY d.createdAt DESC;");
                while($retrieve = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $retrieve['ingredientName']?></td>
                <td><?= $retrieve['sQuantity']?></td>
                <td><?= $retrieve['mQuantity']?></td>
                <td><?= $retrieve['unitName']?></td>
                <td><?= $retrieve['createdAt']?></td>
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