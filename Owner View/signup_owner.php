<!DOCTYPE html>
    <html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="owner.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    </head>
    <body>
    <?php @include 'navbar.php' ?>
    <div class ="signupview">
		<div id="title">
			<h2>Create User</h2>
		</div>
        <div class="card"
        <form action="process_sign_up.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input class ="password" type="password" id="password" name="password" required><br><br>

            <label for="confirmpassword">Confirm Password:</label>
            <input class ="password" type="password" id="confirmpassword" name="confirmpassword" required><br><br>

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required><br><br>
 
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required><br><br>
                   
            <label for="role">Role:</label>
            <select name="role" id="role"> 
                <option style="color:black" value="chef">Chef</option>
                <option style="color:black" value="cashier">Cashier</option>
                <option style="color:black" value="inventory">Inventory</option>
            </select> <br><br>

            <input type="Submit" name="stocksubmit"  class="inputbutton" value="CONFIRM">
            <br>  
        </form>
    </div>
</div>
    </body>
</html>
<?php
