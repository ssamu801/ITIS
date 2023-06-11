<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name']) && $_SESSION['role'] == "invcontroller")
{
    ?>

    <!DOCTYPE html>
    
    <html>
    <head>
        <title>Inventory Controller Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php @include 'navbar.php' ?>
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