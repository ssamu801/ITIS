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

$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['user_name'] === $uname && $row['password'] === $pass){
        echo "Logged In";
       $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        
        if($row['role'] == "cashier")
        {
            header("Location: cashierhome.php");
        }
        elseif($row['role'] == "chef")
        {
            header("Location: chefhome.php");
        }
        elseif($row['role'] == "owner")
        {
            header("Location: ownerhome.php");
        }
        elseif($row['role'] == "invcontroller")
        {
            header("Location: invcontrollerhome.php");
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

