<?php 
    include "db_conn.php"; //include db connection file
    $result = mysqli_query($conn, "SELECT ingredientName, quantity, measurement FROM ingredient");
  	while($retrieve = mysqli_fetch_array($result)){?> 
                <tr>
                    <td> <?= $retrieve['ingredientName']?></td>
                    <td></td>
                    <td><?= $retrieve['quantity']?></td>
                    <td><?= $retrieve['measurement']?></td>
                    <td>12/23/2000</td>
                </tr>
<?php } ?>