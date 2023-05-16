<!DOCTYPE html>
<html>
    <head> <!-- everything basically boilerplate -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css"> <!-- user style.css for decoration -->
    </head>
    <body>
        <form action="login.php" method="post">
            <h2>Sign In</h2>

            <!-- Display the error (if any) -->
            <?php if(isset($_GET['error'])) { ?>
                <p class='error'> <?php echo $_GET['error']; ?></p>
            <?php } ?>

            <!-- Ask for username and pssword.... sign in -->
            <label> User Name </label>
            <input type="text" name="username" placeholder="User Name"><br>
            <label> Password </label>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit"> Sign In </button>
    </body>
</html>