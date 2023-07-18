<!DOCTYPE html>

<html>
<head>
    <title>Reports</title>
    <link rel="stylesheet" type="text/css" href="owner.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php @include 'navbar.php' ?>
    <div class="reportview">
        <h2> Dishes to Approve </h2>
        <table class="reporttable">
            <th>Dish</th>
            <th>Actions</th>
            <?php 
                include "connect.php";
                $selectQuery = mysqli_query($DBConnect, "   SELECT nDishID, dishName, dateCreated, approved, img 
                                                            FROM pending_dish
                                                            WHERE approved IS NULL 
                                                            ORDER BY createdBy;");
                while($pendingDish = mysqli_fetch_array($selectQuery)) {
            ?>
                <tr>
                    <td>
                        <form action="dishdetailed.php" method="POST">
                            <input type="hidden" name="nDishID" value="<?= $pendingDish['nDishID']; ?>" />
                            <button type="submit" style="color:black"><?= $pendingDish['dishName']; ?></button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="dishentry.php">
                            <input type="hidden" name="nDishID" value="<?= $pendingDish['nDishID']; ?>" />
                            <button type="submit" style="color:black">Approve</button>
                            <button type="submit" name="deny" value="deny" style="color:black">Deny</button>
                        </form>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>
