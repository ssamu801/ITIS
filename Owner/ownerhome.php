<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name']) && $_SESSION['role'] == "owner")
{
    ?>

    <!DOCTYPE html>
    
    <html>
    <head>
        <title>Owner Page</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php @include '../navbar.php' ?>
    <main>
                <div class="notifications">
                    <h2>Notifications</h2>
                    <ul>
                        <li>Tomato Sauce Out of Stock Tomato Sauce Out of Stock Tomato Sauce Out of Stock Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                        <li>Tomato Sauce Out of Stock</li>
                    </ul>
                </div>
                <div class="msales">
                <h2> Monthly Sales </h2>
                <h3>39,700</h3>
                </div>
            <div class="restocklog">
            <h2> Restock Logs </h2>
                <div class="table">
                    <ul class="name">
                        <li>Pomegranite</li>
                        <li>Pomegranite</li>
                        <li>Pomegranite</li>
                        <li>Pomegranite</li>
                        <li>Pomegranite</li>
                    </ul>
                    <ul class="date">
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                    </ul>
                    <ul class="date">
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                        <li>12/23/00</li>
                    </ul>         
                </div>
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