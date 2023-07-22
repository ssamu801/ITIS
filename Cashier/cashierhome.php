<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['role'] == "Cashier")
{
    ?>
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1> HELLO, <?php echo $_SESSION['username']; ?> </h1>
        <a href="logout.php">Logout</a>
        <button class="loginsubmitbutton">hello</button>
    </body>
    </html>

<?php
}


else{
    header("Location: index.php");
    exit();
}
?>