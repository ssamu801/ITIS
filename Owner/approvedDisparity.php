<?php
    include "connect.php";
    $ingredientID = $_POST['ingredientID'];
    $logID = $_POST['logID'];

    
    if(isset($_POST['approve'])) {
        mysqli_query($DBConnect, "UPDATE ingredient SET quantity = (SELECT mQuantity FROM disparity WHERE logID = $logID) WHERE ingredientID = '$ingredientID';");
        $updateQuery = mysqli_query($DBConnect, "UPDATE disparity SET approved = 'Yes' WHERE logID = $logID;");
        echo '<script>window.location.href = "approvedisparity.php";</script>';
    }
    if(isset($_POST['deny'])) {
        mysqli_query($DBConnect, "UPDATE disparity SET approved = 'No' WHERE logID = $logID;");
        echo '<script>window.location.href = "approvedisparity.php";</script>';
    }
?>