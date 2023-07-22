<?php 
    include "connect.php";

    $newUnit       = $_POST['unitName'];
    $unitName        = $_POST['unit'];
    $conversion     = $_POST['conversion'];

    mysqli_query($DBConnect, "  INSERT INTO unit(unitName, type, conversion) 
                                SELECT      '$newUnit', type, ($conversion * conversion) AS conversion
                                FROM        unit 
                                WHERE       unitID  = '$unitName';");
            
    header("Location: viewstock.php");
    exit;
?>