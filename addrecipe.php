<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name']) && $_SESSION['role'] == "chef")
{
    ?>

<!DOCTYPE html>
    
    <html>
    <head>
        <title>Chef Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php @include 'navbar.php' ?>
    <main>
    <div class="container">
      <form action="" method="POST">
	  <h2> Recipe Maker </h2>
      <div id="formfield">
        <input type="text" name="recipename" class="recipename" size="50" placeholder="Name" required>
               
		<div class ="left">
			<input type="text" name="username" list="ingredients" class="text" placeholder="Ingredient" required>
                <datalist id="ingredients">
                <option value="Meatballs">
                <option value="Spaghetti">
                <option value="Tomato Sauce">
                <option value="Salt">
                <option value="Pepper">
                <option value="Orange">
                </datalist>
		</div>
		<div class = "right">
			<input type="number" name="Quantity" class="inputarea" placeholder="Quantity" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
		</div>
      </div>
      <input name="submit" type="Submit" value="Create Recipe">
    </form>
      <div class="controls">
        <button class="add" onclick="add()"><i class="fa fa-plus"></i>Add</button>
        <button class="remove" onclick="remove()"><i class="fa fa-minus"></i>Remove</button>
      </div>
	  <script src="script.js"></script>
    </div>
    </main>
    </body>
    </html>
	
<?php
}

else{
    header("Location: index.php");
    exit();
}
?>