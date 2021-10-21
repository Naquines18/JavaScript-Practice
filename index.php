<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p id="array_practice"></p>

    <button type="submit" id="click">Click Me</button>
    <p id="increment"></p>


    <form id="submit_data" method="post">
        <h3>Register Now</h3>
        <input type="text" name="name" id="name" spellcheck="false" maxlength="255" placeholder="Enter your name"><br><br>
        <input type="text" name="lname" id="lname" spellcheck="false" maxlength="255" placeholder="Enter your lastname"><br><br>
        <input type="email" name="email" id="email" spellcheck="false" maxlength="255" placeholder="Enter your email"><br><br>
        <input type="password" name="password" id="password" spellcheck="false" maxlength="255" placeholder="Enter your password"><br><br>
        <input type="submit" name="button" id="submit" value="Submit Information"><br>
    </form>

    ________________________________________________________________

    <form id="login_submit_data" method="post">
        <h3>Login Now</h3>
        <input type="email" name="email" id="login_email" spellcheck="false" maxlength="255" placeholder="Enter your email"><br><br>
        <input type="password" name="password" id="login_password" spellcheck="false" maxlength="255" placeholder="Enter your password"><br><br>
       
        <input type="submit" name="button" id="login_submit" value="Submit Information"><br>
    </form>

    <div>
        <h3>Users: </h3>
        <?php
        $conn = new mysqli("localhost","root","","vanilla_js_form_practice");

        $query = mysqli_query($conn,"SELECT * FROM persons LIMIT 5");
        foreach($query as $row){
            ?>
                UID: <span><?php echo $row['id']; ?></span><br>
                Name: <span><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></span><br>
                Email: <span><?php echo $row['email']; ?></span><br>
                ______________________________________________
                <br><br>
            <?php
        }
        ?>

        <span id="see_more_data"></span>
       <button id="see_more">See More</button>
    </div>

    <script>
   
    var array_practice_1 = document.getElementById("array_practice");

    document.getElementById("submit_data").addEventListener("submit", function(event){
            event.preventDefault();

            if(document.getElementById("name").value == ""){
                alert("Please enter your name")
            }else if(document.getElementById("lname").value == ""){
                alert("Please enter your lastname")
            }else if(document.getElementById("email").value == ""){
                alert("Please enter your email")
            }else if(document.getElementById("password").value == ""){
                alert("Please enter your password")
            }else{
                var ajax = new XMLHttpRequest();

                ajax.onreadystatechange = function(responce){
                    if (this.readyState == 4 && this.status == 200) {
                        if(ajax.responseText == "success"){
                            alert("You have successfully registered! Window will reload after 3 seconds");

                            setInterval(() => {
                                window.location.reload();
                            }, 3000);

                        }else{
                            alert("Error while registering....")
                        }
                    }
                };
                var data = 'name=' + document.getElementById("name").value +'&lname='+document.getElementById("lname").value +'&email='+ document.getElementById("email").value +'&password='+ document.getElementById("password").value;

                ajax.open('POST','action.php', true);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                ajax.send(data);
            }
        
    });


    document.getElementById("login_submit_data").addEventListener("submit", function(event){
        event.preventDefault();

        if(document.getElementById("login_email").value == ""){
            alert("Please enter your registered email");
        }else if(document.getElementById("login_password").value == ""){
            alert("Please enter your password");
        }else{
            var ajax = new XMLHttpRequest();

            ajax.onreadystatechange = function(responce){
                if(this.status == 200 && this.status == 200){
                    //const jsonObj = JSON.parse(ajax.responseText);

                    if(ajax.responseText == "success"){
                        //alert("You are going to redirect to dashboard with in 3 seconds");

                        setInterval(() => {
                            window.location.href='dashboard.php';
                        }, 1000);

                        return true;
                    }else if(ajax.responseText == "incorrect_credentials"){
                        alert("Incorrect credentials please enter again");

                        return false;
                    }
                }
            }

            const data = 'login_email='+ document.getElementById("login_email").value + '&login_password=' + document.getElementById("login_password").value;

            ajax.open("POST","login.php", true);
            ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            ajax.send(data);
        }
    })
    
   
    document.getElementById("see_more").addEventListener("click", function(){

        const data = "fetch_data";
        const ajax = new XMLHttpRequest();

        ajax.onreadystatechange = function(){
            if(this.status == 200 && this.readyState == 4){
                document.getElementById("see_more_data").innerHTML = this.responseText;
            }
        };
        const value = 'source=' + data;
        ajax.open("POST","fetch.php", true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send(value);
    });
    
    document.getElementById("click").addEventListener("click", function(){
        alert("Hello World")
    });
    

    </script>
</body>
</html>