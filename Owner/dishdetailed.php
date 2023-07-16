<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name']))
{
    ?>

    <!DOCTYPE html>
    
    <html>
    <head>
        <title>Reports</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php @include '../navbar.php' ?>
    <div class="reportview">
        <h2> Dish Preview </h2>
        <div class="detailedspecs">
        <!-- dish image -->
        <img src="https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
        alt="food img" >
        </div>
        <!-- dish ingridients  -->
            <div class="detailedtext">
                <h3>Ingredients</h3>
                <ul>
                    <li>Sago</li>
                    <li>Tinapay</li>
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