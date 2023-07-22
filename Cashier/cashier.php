<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['role'] == "Cashier")
{
    ?>
<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    <title>Take Order</title>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-light bg-nav" style="background-color: #3a4f8a">
        <a class="navbar-brand text-white" href="#">Take Order</a>
        <div class="col-md-2" id="search-el" style="display: none;">
            <input type="text" class="form-control" id="search-input" placeholder="search item">
        </div>
    </nav>
    <!-- Container -->
    <div class="contain">
        <!-- Top Functions -->
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 p-3 cart">
                <div class="sub-nav text-left mb-5" style="background-color: #3a4f8a; color: white;"><p class="my-0"><span class="mr-1"><img src="https://img.icons8.com/pastel-glyph/30/000000/user-male--v1.png"></span >Employee: </p></div>
                    <div class="item-list mt-2">
                        <div id="loop-invoice">
                            <!-- loop sidebar items -->
                        </div>
                    </div>
                    <div class="amount">
                        <br>
                        <h3>Total : Php <span id="total">0</span></h3>
                    </div>
                </div>

                <!-- Dish List -->
                <div class="col-md-9 p-3 menu">
                    <div class="row mt-3" id="loop-card">
                        <!-- loop available dishes -->
                        <?php 
                            $dishQuery = mysqli_query($DBConnect, "SELECT dishName, price, img FROM dish WHERE Active = 'Yes';");
                            while ($dish = mysqli_fetch_assoc($dishQuery)) {
                                echo '<div class="col-md-3 mb-4 subCardParent">';
                                echo     '<img src="../Chef/'.$dish['img'].'"  class="card-img-top" height="130">';
                                echo     '<div class="card-body">';
                                echo         '<h5 class="card-title" style="color: white">' . $dish['dishName'] . '</h5>';
                                echo         '<p class="card-text" style="color: white">' . $dish['price'] . '</p>';
                                echo         '<button id="btn' . $dish['dishName'] . '" class="transparent-button" onclick="chooseDish(\'' . $dish['dishName'] . '\', '.$dish['price'].')"></button>';
                                echo     '</div>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Footer Functions -->
            <div class="buy">
                <div class="row">
                    <div class="col-md-3">
                        <button class="btn btn-outline-danger remove-all" onclick="removeAll()">Remove All</button>
                    </div>
                    <div class="col-md-9">
                        <div class="input-group mb-3">
                            <input type="number" id="money" name="money" class="form-control" placeholder="Insert Your Money" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <form action="process_order.php" method="POST" id="pay">
                                <button type="submit" name="cashierBtn" class="btn btn-sm"  style="color: white" >Payment
                                    <span><img src="https://img.icons8.com/material-rounded/24/ffffff/heck-for-payment.png"></span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
<?php
}

else{
    header("Location: ../logout.php");
    exit();
}
?>