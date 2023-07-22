<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['role'] == "Chef")
{
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
    <?php @include '../navbar.php' ?>
        <h1> HELLO, <?php echo $_SESSION['username']; ?> </h1>
        <a href="logout.php">Logout</a>
    </body>
    </html>

<?php
}

else{
    header("Location: ../logout.php");
    exit();
}
?>