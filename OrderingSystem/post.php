<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <?php
        $dishname = $_POST['vDish'];
        $dishqty = $_POST['vQuantity'];
        for ($i = 0; $i < count($dishname); $i++) {
            echo $dishname[$i] . "<t />" . $dishqty[$i] . "<br />";
        }
    ?>
</body>
</html>