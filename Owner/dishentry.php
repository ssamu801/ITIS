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
        <h2> Enter Dish Details </h2>
        <div class="detailedspecs">
        <!-- dish image -->
        <img src="https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="food img"">
       <!-- dish form here  -->
       </div>
       <form class="priceform" action="">
            <div>
            <input type="number"  class="price" min="0" name="" id="" placeholder="Enter Price" style>
            <button><a href="#">Submit</a></button>
            </div>
        </form>
       
       <!-- ingridient list  -->
       <h3>Ingridients</h3>
       <ul>
        <li>Tinapoy</li>
        <li>Janin</li>
       </ul>
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