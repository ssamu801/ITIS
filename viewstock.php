<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name']))
{
    ?>

    <!DOCTYPE html>
    
    <html>
    <head>
        <title>Stock View Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php @include 'navbar.php' ?>
    <div class="stockview">
        <h1>Stock View</h1>
        <div class="content">
            <table>
                <tr>
                    <th scope="col">Ingredient</th>
                    <th scope="col">Purchase Date</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Measurement</th>
                    <th scope="col">Expiration Date</th>
                </tr>
                <tbody>
                <?php @include 'viewstock_backend.php' ?>
    </tbody>
            </table>
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