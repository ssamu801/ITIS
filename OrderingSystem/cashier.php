<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="test.css">

    <title>Take Order</title>
    </head>
<body>
    <?php 
        include 'connect.php';
        $chosenDishes = $_POST['chosenDish'];
        $chosenDishesQty = $_POST['chosenDishQty'];
        $dishQuery = mysqli_query($DBConnect, "SELECT dishName, price FROM dish;");
    ?>
    <!-- Header -->
    <nav class="navbar navbar-light bg-nav">
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
                <div class="type-buying">
                    <select name="buy-type" id="buy-type" class="form-control mb-2 bg-primary text-white">
                    <option style="color: black" class="bg-white" value="Dine In">Dine In</option>
                    <option style="color: black" class="bg-white" value="Take out">Take out</option>
                    </select>
                </div>
            <div class="sub-nav bg-primary text-center text-white mb-2"><p class="my-0"><span class="mr-1"><img src="https://img.icons8.com/pastel-glyph/30/000000/user-male--v1.png"></span >Employee: </p></div>
                <div class="item-list mt-2">
                    <div id="loop-invoice">
                        <!-- loop sidebar items -->
                        <?php
                        if (!empty($chosenDishes) && !empty($chosenDishesQty)) {
                            for ($i = 0; $i < count($chosenDishes); $i++) {
                                if ($chosenDishes[$i] != "" && $chosenDishesQty[$i] != "") {
                                    $price = mysqli_fetch_assoc(mysqli_query($DBConnect, "SELECT price FROM dish WHERE dishName = '".$chosenDishes[$i]."';"));
                                    echo '<div class="media mb-2">';
                                    echo        '<img src="img/'.$chosenDishes[$i].'.png" class="align-self-center mr-3" width="95">';
                                    echo        '<div class="media-body">';
                                    echo            '<h6 class="mt-0">' . $chosenDishes[$i] .'</h6>';
                                    echo            '<p>Php <span id="price'.$i.'" value="'.$price['price'].'">'.$price['price'].'</span></p>';
                                    echo        '</div>';
                                    echo        '<input class="quantity mt-3" name="chosenDishQty[]" type="number" value="' . $chosenDishesQty[$i] . '" onchange="updateField(this, '.$i.')">';
                                    echo        '<button class="btn delete mt-2"><img src="https://img.icons8.com/wired/35/000000/trash.png"></button>';
                                    echo '</div>';
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="amount">
                    <br>
                    <span><h3>Total : Php <span id="total"></span></span>
                </div>
            </div>

            <!-- Dish List -->
            <div class="col-md-9 p-3 menu">
                <div class="sub-nav bg-white">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="my-0">Item List</h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="my-0 text-center" id="name-cat">Food</h5>
                        </div>
                        <div class="col-md-4">
                            <div class="nav-btn float-right">

                                <div class="dropdown float-left mr-1">
                                    <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="https://img.icons8.com/material-rounded/24/000000/menu-2.png">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#" id="food">Food</a>
                                        <a class="dropdown-item" href="#" id="drink">Drink</a>
                                    </div>
                                </div>

                                <button class="btn btn-sm" id="search-btn"><img src="https://img.icons8.com/android/24/000000/search.png"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3" id="loop-card">
                    <!-- loop available dishes -->
                    <?php 
                        while ($dish = mysqli_fetch_assoc($dishQuery)) {
                            echo '<div class="col-md-3 mb-4 subCardParent">';
                                  // if isPick = 0 then it adds to the side bar
                            echo '<form method="POST" action="cashier.php">';
                            echo     '<img src="img/'.$dish['dishName'].'.png" class="card-img-top" height="130">';
                            echo     '<div class="card-body">';
                            echo         '<h5 class="card-title" style="color: white">' . $dish['dishName'] . '</h5>';
                            echo         '<p class="card-text" style="color: white">' . $dish['price'] . '</p>';
                                            if (!empty($chosenDishes) && !empty($chosenDishesQty)) {
                                                for ($i = 0; $i < count($chosenDishes); $i++) {
                                                    if ($chosenDishes[$i] != "" && $chosenDishesQty[$i] != "") {
                                                        echo '<input type="hidden" name="chosenDish[]" value="'. $chosenDishes[$i] .'">';
                                                        echo '<input type="hidden" name="chosenDishQty[]" value="'. $chosenDishesQty[$i] .'">';
                                                    }
                                                }
                                            }
                            echo         '<input type="hidden" name="chosenDish[]" value="'. $dish['dishName'] .'">';
                            echo         '<input type="hidden" name="chosenDishQty[]" value="1">';
                                         $disabled = "";
                                         foreach ($chosenDishes as $chosenDish) 
                                            if ($dish['dishName'] == $chosenDish) 
                                                $disabled = "disabled";
                            echo         '<input type="submit" class="transparent-button" '. $disabled .'/>';
                            echo     '</div>';
                            echo '</form>';
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
                    <form action="" method="post">
                        <input type="hidden" name="chosenDish[]" value="" />
                        <input type="hidden" name="chosenDishQty[]" value="" />
                        <button class="btn btn-outline-danger remove-all">Remove All</button>
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="input-group mb-3">
                        <input type="text" id="money" class="form-control" placeholder="Insert Your Money" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <form action="process_order.php" method="POST" id="pay">
                            <?php
                                if (!empty($chosenDishes) && !empty($chosenDishesQty)) {
                                    for ($i = 0; $i < count($chosenDishes); $i++) {
                                        if ($chosenDishes[$i] != "") {
                                            echo '<input type="hidden" name="vDish[]" value="'. $chosenDishes[$i] .'">';
                                        }
                                        if ($chosenDishesQty[$i] != "") {
                                            echo '<input type="hidden" name="vQuantity[]" id="hiddenField'.$i.'">';
                                        }
                                    }
                                }
                            ?>
                            <button type="submit" class="btn btn-sm"  style="color: white" ><img src="https://img.icons8.com/android/24/000000/search.png"></i>Payment
                                <span><img src="https://img.icons8.com/material-rounded/24/ffffff/heck-for-payment.png"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateField(input, index) {
            var qty = input.value; 
            var hiddenField = document.getElementById("hiddenField" + index); 
            hiddenField.value = qty;

            var spanElement = document.getElementById("price" + index);
            var text = spanElement.innerHTML;
            var number = parseInt(text);
            spanElement.innerHTML = number * qty;
        }
    </script>
</body>
</html>