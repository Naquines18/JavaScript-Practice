<?php
session_start();
$conn = new mysqli("localhost","root","","vanilla_js_form_practice");


if(isset($_POST['login_email']) AND isset($_POST['login_password'])){
    

    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    $query = mysqli_query($conn,"SELECT * FROM persons WHERE email = '$email' AND password = '$password' LIMIT 1");

    if(mysqli_num_rows($query) === 0){
        echo "incorrect_credentials";
    }else{
        while ($row = mysqli_fetch_assoc($query))
        {
            $_SESSION['loggedin'] = true;
            $_SESSION['token'] = uniqid();
            $_SESSION['name'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];

            echo "success";

        }
    }

    
}else{
    echo "error";
}