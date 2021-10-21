<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JS DOM</title>
</head>
<body>

    <p id="demo">Hi Im learning JavaScript</p>

    <h4 id="message">Im Message</h4>

    <h4 id="array">Array here</h4>


    <form action="" method="get">
        <input type="text" name="fname" id="fname" placeholder="Enter value"><br><br>
        <input type="text" name="lname" id="lname" placeholder="Enter value"><br><br>
        <input type="text" name="email" id="email" placeholder="Enter value"><br><br>

        <input type="submit" name="submit" id="submit" value="Submit"><br><br>
    </form>
    <script>

        var uname = window.prompt("What is your name?")

        var uname = window.prompt("What is your password?")
       

        document.getElementById("submit").addEventListener("click", function(event){
            event.preventDefault();
            
            var fname = document.getElementById("fname").value;
            var lname = document.getElementById("lname").value;
            var email = document.getElementById("email").value;

            // var str_data = [
            //     "Harry",
            //     "Potter",
            //     "harry_potter@gmail.com",
            // ];
            var data = [fname,lname,email];
            // execute one time
            // the logic
            // incrementor or how many time the script execute

            for(i = 0; i < data.length; i++){
                console.log(data[i])
            }

        });

        document.getElementById("demo").addEventListener("click", function(){
            document.getElementById("demo").innerHTML = "Ohh it's nice keep up the good work";
        });

        document.getElementById("message").addEventListener("click", function(){
            document.getElementById("message").innerHTML = "Its nice Kian Naquines";
        });
        
        var j = '';

        const user = {
            'fname': 'Kian',
            'lname': 'Naquines',
            'email': 'kiannaquines@gmail.com',
            'age': 18,
        }

        const kiannaquines = {
            'name' : 'Kian Naquines',
            'gender': 'Male',
            'age': 18,
            'religion': 'Catholic',
        }

        for (j in kiannaquines){
            console.log(kiannaquines[j])
        }



    </script>
</body>
</html>