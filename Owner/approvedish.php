<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['role'] == "owner")
{
    ?>
<!DOCTYPE html>

<html>
<head>
    <title>Dishes to Approve</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php @include '../navbar.php' ?>
    <div class="approvedishcss">
        <h2> Dishes to Approve </h2>
        <table class="reporttable">
            <th>Dish</th>
            <th>Type</th>
            <th>Actions</th>
            <?php 
                include "connect.php";
                $selectQuery = mysqli_query($DBConnect, "   SELECT nDishID, dishName, type, dateCreated, approved, img 
                                                            FROM pending_dish
                                                            WHERE approved IS NULL 
                                                            ORDER BY createdBy;");
                while($pendingDish = mysqli_fetch_array($selectQuery)) {
            ?>
                <tr>
                    <td>
                        <form action="dishdetailed.php" method="POST">
                            <input type="hidden" name="nDishID" value="<?= $pendingDish['nDishID']; ?>" />
                            <button type="submit" class="ingredname"><?= $pendingDish['dishName']; ?></button>
                        </form>
                    </td>
                    <td>
                        <?= $pendingDish['type']?>
                    </td>
                    <td>
                        <form method="POST" action="dishentry.php">
                            <input type="hidden" name="nDishID" value="<?= $pendingDish['nDishID']; ?>"/>
                            <button type="submit" name="approve" class="approve">Approve</button>
                            <button name="deny" value="deny" class="deny">Deny</button>
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
<?php
}

else{
    header("Location: ../logout.php");
    exit();
}
?>
