<?php

$conn = new mysqli("localhost","root","","vanilla_js_form_practice");


if(isset($_POST['source'])){
    if($_POST['source'] == "fetch_data"){
        $output = "";

        $source = $_POST['source'];


        $query = mysqli_query($conn,"SELECT * FROM persons");
        while ($row = mysqli_fetch_assoc($query)) {
            $output = '
            UID: <span>'.$row['id'].'</span><br>
            Name: <span>'.$row['fname'].' '.$row['lname'].'</span><br>
            Email: <span>'.$row['email'].'</span><br>
            ___________________________________________________

            <br><br>
            ';
            
            echo $output;
        }
    }


}else{
    echo "No data";
}