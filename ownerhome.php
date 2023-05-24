<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name']))
{
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Owner Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <div class="wrapper">    
        <div class="sidebar">
        <p class="navtitle"> Hello, <?php echo $_SESSION['user_name']; ?> </p>
            <ul class="navbarul">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                    <a href="logout.php">Logout</a>
                    </li>
            </ul>
        </div>
    </div>    
    </body>
    </html>

<?php
}

else{
    header("Location: index.php");
    exit();
}
?>