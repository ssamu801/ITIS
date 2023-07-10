<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name']) && $_SESSION['role'] == "owner")
{
?>

<html>
    <head>
        <title>Employee Details</title>
		<link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body>
	<?php @include 'navbar.php' ?>

	<?php
	
	$DBConnect = mysqli_connect("localhost", "root", "") or die ("Unable to Connect". mysqli_error($DBConnect));
    mysqli_select_db($DBConnect, 'sampledb');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $empid = $_POST['employee_id'];
	  
			$sql = "
			SELECT employee_id, first_name, last_name, role
			FROM   employees 
			WHERE  employee_id = $empid;";
			$records = mysqli_query($DBConnect, $sql) or die(mysqli_error($DBConnect));
			
			while($wow = mysqli_fetch_array($records))
			{
			$EMPLOYEE_ID = $wow['employee_id'];
			$FIRST_NAME = $wow['first_name'];
			$LAST_NAME = $wow['last_name'];
			$ROLE = $wow['role'];
			}
	?>		
		<div class="roleview">
			<h1>Edit Role</h1>
		<div class="content">
		<table border='1' width='25%'>
			<form action='role_management.php' method='post'>
				 <input type='hidden' name='employeeid' value='<?= $EMPLOYEE_ID ?>'>
					<tr>
						<td> EMPLOYEE ID: </td> <td><?= $EMPLOYEE_ID ?></td>
					</tr>
					<tr>
						<td> FIRST NAME: </td> <td><?= $FIRST_NAME ?></td>
					</tr>
					<tr>
						<td> LAST NAME: </td> <td><?= $LAST_NAME ?></td>
					</tr>
					<tr>
					<td> ROLE:      </td>
					<td>
						<select id='rolechoice' name='rolechoice'>
							<option value='Owner'    <?php if($ROLE == 'Owner'){echo"selected";}      echo"> Owner </option>"; ?>
							<option value='Chef'     <?php if($ROLE == 'Chef'){ echo"selected";}      echo">Chef </option>";  ?>
							<option value='Cashier'  <?php if($ROLE == 'Cashier'){echo"selected";}    echo">Cashier </option>"; ?>
					
						</select>
						<input type='submit' value='Update'>
					</td>
					</tr>
			</table>
			</form>
	<?php		 
		} 
	?>
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