<?php
session_start();

//if(isset($_SESSION['id']) && isset($_SESSION['user_name']))
{
    ?>

   <html>
    <head>
        <title>Chef Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php @include 'navbar.php' ?>
    <main>
                <div class="notifications">
                    <h2>Notifications</h2>
                    <ul>
                        <li>New Ingredient added: Tomato</li>
                        <li>New Ingredient added: Noodles</li>
                    </ul>
                </div>
                <div class="msales">
                <h2> Pending Recipes </h2>
                <h3>Recipe 6</h3>
                </div>
            <div class="restocklog">
            <h2> Processed Recipes </h2>
                <div class="table">
                    <ul class="name">
                        <li>Recipe1</li>
                        <li>Recipe2</li>
                        <li>Recipe3</li>
                        <li>Recipe4</li>
                        <li>Recipe5</li>
                    </ul>
                    <ul class="date">
                        <li>Approved</li>
                        <li>Approved</li>
						<li>Approved</li>
						<li>Approved</li>
						<li>Approved</li>
                    </ul>
                </div>
            </div>
    </main>
    </body>
    </html>

<?php
}

//else{
//    header("Location: index.php");
//    exit();
//}
?>
