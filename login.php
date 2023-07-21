<?php
session_start();
include "db_conn.php"; //include db connection file

if(isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data); //remove the spaces
        $data = stripslashes($data); //remove backslashes
        $data = htmlspecialchars($data); //fix other special chars
        return $data;
        
    }
}

$uname = validate($_POST['username']);
$pass = validate($_POST['password']);

if(empty($uname)){
    header("Location: index.php?error=User Name is required");
    exit();
}
else if(empty($pass)){
    header("Location: index.php?error=Password is required");
    exit();
}

$sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['username'] === $uname && $row['password'] === $pass){
        echo "Logged In";
       $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['firstName'];
        $_SESSION['id'] = $row['employeeID'];
        $_SESSION['role'] = $row['role'];
        
        if($row['role'] == "Cashier")
        {
            header("Location: Cashier/cashierhome.php");
        }
        elseif($row['role'] == "Chef")
        {
            header("Location: Chef/chefhome.php");
        }
        elseif($row['role'] == "Owner")
        {
            header("Location: Owner/ownerhome.php");
        }
        elseif($row['role'] == "Inventory")
        {
            header("Location: ./Controller/invcontrollerhome.php");
        }
        exit();
        
    }
    else{
       header("Location: index.php?error=Incorrect User Name or Password");
    }
}
else{
    header("Location:index.php?error=Incorrect User Name or Password");
    exit();
}

