<?php

$conn = new mysqli("localhost","root","","vanilla_js_form_practice");


if(isset($_POST['name']) AND isset($_POST['lname']) AND isset($_POST['email']) AND isset($_POST['password'])){
    $fname = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    mysqli_query($conn,"INSERT INTO `persons`(`fname`, `lname`, `email`, `password`) VALUES ('$fname','$lname','$email','$password')");

    echo "success";


}else{
    echo "Error: HAHAHAHAHA";
}



if(isset($_POST['login_email']) AND isset($_POST['login_password'])){
    echo "Success";
}else{
    echo "error";
}