<?php
include("db_connect.php");
 
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
 
    $check = mysqli_query($link, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
        echo "Existed";
    } else {
        
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($link, $query)) {
            echo "Successful";
        } else {
            echo "Error " . mysqli_error($link);
        }
    }
}
?>