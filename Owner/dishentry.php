<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['role'] == "owner")
{
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body>
<?php @include '../navbar.php' ?>
<div class="reportview">
    <h2> Enter Dish Details </h2>
    <div style="width: 50%">
        <?php 
            @include "connect.php";
            $nDishID = $_POST['nDishID'];

            if(isset($_POST['approve'])) {
            $selectDishQuery = mysqli_query($DBConnect, "   SELECT nDishID, dishName, dateCreated, approved, img 
                                                            FROM pending_dish
                                                            WHERE nDishID = '$nDishID'");
            $pendingDish = mysqli_fetch_array($selectDishQuery);
        ?>
        <!-- dish image -->
        <img src="../Chef/<?= $pendingDish['img'] ?>" alt="../Chef/<?= $pendingDish['img'] ?>" style="width:100%; border-radius:10px" />
        <!-- dish form here  -->
        <form action="approvedDish.php" method="POST">
            <div>
                <input type="hidden" name="nDishID" value="<?= $nDishID ?>" />
                <input type="number"  min="0" name="price" placeholder="Enter Price" required style />
                <button type="submit" style="color:black">Submit</button>
            </div>
        </form>
    </div>
    <!-- ingridient list  -->
    <h3>Ingridients</h3>
    <ul>
        <?php 
            $selectRecipeQuery = mysqli_query($DBConnect, " SELECT i.ingredientName, pr.quantity, u.unitName 
                                                            FROM pending_recipe pr 	JOIN ingredient i	ON i.ingredientID=pr.ingredientID
                                                                                    JOIN unit u			ON i.unitID=u.unitID
                                                            WHERE pr.nDishID = $nDishID;"); 
            while ($pendingRecipe = mysqli_fetch_array($selectRecipeQuery)) echo "<li>" . $pendingRecipe['ingredientName'] . "</li>";
        ?>
    </ul>
    </div>
    <?php
        }
        if(isset($_POST['deny'])) {
            mysqli_query($DBConnect, "UPDATE pending_dish SET approved = 'No' WHERE nDishID = $nDishID;");
            echo '<script>window.location.href = "approvedish.php";</script>';
        }
    ?>
</body>
</html>
<?php
}

else{
    header("Location: ../logout.php");
    exit();
}
?>