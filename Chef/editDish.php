<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['role'] == "Chef")
{
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Recipe</title>
    <link rel="stylesheet" type="text/css" href="../style.css">   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="processRecipe.js"></script>
</head>
<body>
    <?php @include '../navbar.php' ?>
    <div class ="chefview">
		<div id="title">
			<h2>Edit a Recipe</h2>
		</div>
        <form action="editPendingDish.php" method="POST" enctype="multipart/form-data">
            <label for="image">Select an image:</label>
            <input type="file" name="image" id="image" required />
            <br />

			<label for="recipename">Dish Name:</label>
            <input type="text" id="recipename" name="dishname" required><br><br>

            <div id="ingredientlist">
                <div class = "ingredients">
                    
					<label for="ingredientname">Ingredients:</label>
                    <input type="text" id="ingredientname" list="ingredients" name="ingredientname[]" required>

                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quanity" name="quanity[]" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>

                    <label>Unit:</label>
                    <select name="unit[]" class="unit" style="color: black;">
                    <option value="" disabled selected hidden></option>
					<?php
                        $DBConnect = mysqli_connect("127.0.0.1:4306", "root", "") or die ("Unable to Connect". mysqli_error());
                        $db = mysqli_select_db($DBConnect, 'itisdev');

                        $query = mysqli_query($DBConnect, "SELECT unitID, unitName FROM unit;");

                        foreach ($query as $unit) {
                            echo '<option value="' . $unit['unitID'] . '" style="color: black;">' . $unit['unitName'] . '</option>';
                        }
                    ?>
					</select>
                    
					<button class="remove" type="button"> <span>&#x1F5D1;
                    </span> </button>
                </div>
            </div>

            <button id="addbutton" type="button">+ Add Ingredient</button><br><br>
            <input type="Submit" name="stocksubmit"  class="inputbutton" value="CONFIRM">
            <br>
        </form>

        <div id="ingredientsHidden">
                <div class = "ingredients" hidden>
                    <label for="ingredientname">Ingredients:</label>
                    <input type="text" id="ingredientname" list="ingredients" name="ingredientname[]" required>
					<datalist id="ingredients">
					<!--Update to get datalist from database-->
						<option value="Meatballs">
						<option value="Spaghetti">
					</datalist>

                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quanity" name="quanity[]" required>

                    <label>Unit:</label>
                    <select name="unit[]" style="color: black;">
                    <option value="" disabled selected hidden></option>
					<?php
                        $DBConnect = mysqli_connect("127.0.0.1:4306", "root", "") or die ("Unable to Connect". mysqli_error());
                        $db = mysqli_select_db($DBConnect, 'itisdev');

                        $query = mysqli_query($DBConnect, "SELECT unitID, unitName FROM unit;");

                        foreach ($query as $unit) {
                            echo '<option value="' . $unit['unitID'] . '" style="color: black;">' . $unit['unitName'] . '</option>';
                        }
                    ?>
                    
                    </select>
                    <button class="remove" type="button"> <span>&#x1F5D1;
                    </span> </button>
                </div>
        </div>  
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