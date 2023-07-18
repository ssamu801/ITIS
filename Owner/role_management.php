<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name']) && $_SESSION['role'] == "owner")
{
    ?>

    <!DOCTYPE html>
    
    <html>
    <head>
        <title>Employee Roles</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php @include '../navbar.php' ?>

    <?php
	
    $DBConnect = mysqli_connect("localhost", "root", "") or die ("Unable to Connect". mysqli_error($DBConnect));
    mysqli_select_db($DBConnect, 'itisdev');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field	
        $newrole = $_POST['rolechoice'];
        $employeeid = $_POST['employeeID'];
              $sql = "
              UPDATE user SET role='$newrole' WHERE employeeID='$employeeid';";
              $records = mysqli_query($DBConnect, $sql) or die(mysqli_error($DBConnect));
      } 
		
			$sql = "
			SELECT employeeID, firstName, lastName, role
			FROM user 
			ORDER BY employeeID;";
			$records = mysqli_query($DBConnect, $sql) or die(mysqli_error($DBConnect));
    ?>


    <div class="roleview">
		<h1>List of employees</h1>
        <div class="content">
			<table border='1' width='25%'>
            <tbody>    
			    <th>NAME </th>
			    <th>ROLE </th>
            </tbody>
     
            <tbody>
    <?php
	    while($wow = mysqli_fetch_array($records))
		    {
			    $EMPLOYEE_ID = $wow['employeeID'];
				$FIRST_NAME = $wow['firstName'];
				$LAST_NAME = $wow['lastName'];
				$ROLE = $wow['role'];
    ?>        
            
		    <tr>  
			    <td>  
			        <form method='post' action='editemployee.php'>  
                        <input class="names" type="submit" name="action" value="<?= $FIRST_NAME . ' ' . $LAST_NAME ?>" />  
				        <input type='hidden' name='employeeID' value='<?= $EMPLOYEE_ID ?>'>  
			        </form>  
			    </td>  
			    <td> <?=$ROLE?> </td>  
		   </tr>  

    <?php
			}
    ?>
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