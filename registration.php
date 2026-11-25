
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>

    <style>
        body {
            background-color: lightblue;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            width: 400px;
            margin: 60px auto;
            padding: 25px;
            background-color: violet;
            border-radius: 15px;
            box-shadow: 0px 0px 15px gray;
        }

        h2 {
            color: blue;
        }

        form {
            color: darkblue;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid gray;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin: 10px 5px;
        }

        input[type="submit"] {
            background-color: lightblue;
            color: ;
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: auto;
        }

        input[type="submit"]:hover {
            background-color: lightblue;
            
        }

        h3 {
            color: blue;
        }

        .result {
            color: darkblue;
            text-align: center;
            line-height: 1.8;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

<h2>STUDENT REGISTRATION FORM</h2>

<form method="POST" action="">

    Name:<br>
    <input type="text" name="name"><br><br>

    Email:<br>
    <input type="text" name="email"><br><br>

    Password:<br>
    <input type="password" name="password"><br><br>

    Phone:<br>
    <input type="text" name="phone"><br><br>

    Gender:<br>
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Female">Female
    <br><br>

    <input type="submit" name="submit" value="Register">

</form>

<?php

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'] ?? "";

    if(empty($name) || empty($email) ||
       empty($password) || empty($phone) ||
       empty($gender))
    {
        echo "<p class='error'>All fields are required!</p>";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<p class='error'>Invalid Email Address!</p>";
    }
    elseif(strlen($password) < 6)
    {
        echo "<p class='error'>Password must contain at least 6 characters!</p>";
    }
    elseif(!preg_match("/^[0-9]{10}$/", $phone))
    {
        echo "<p class='error'>Phone number must contain 10 digits!</p>";
    }
    else
    {
        echo "<div class='result'>";
        echo "<h3>Registration Successful</h3>";

        echo "Name: " . htmlspecialchars($name) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Phone: " . htmlspecialchars($phone) . "<br>";
        echo "Gender: " . htmlspecialchars($gender) . "<br>";

        echo "</div>";
    }
}

?>

</div>

</body>
</html>

