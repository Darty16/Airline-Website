<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include config file
require_once "./common/config.php";

// initialize the session
session_start();

// check if the user is already logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

$name = $surname = $email = $age = $phone_number = $password = $confirm_password = "";
$valid = true;
$error = "";

// processing form data, validating the form
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // validating the name
    if (empty(trim($_POST["name"]))) {
        $valid = false;
        $error = "Please enter your name";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validating the surname
    if (empty(trim($_POST["surname"]))) {
        $valid = false;
        $error = "Please enter your surname";
    } else {
        $surname = trim($_POST["surname"]);
    }


    // validate email
    if (empty(trim($_POST["email"]))) {
        $valid = false;
        $error = "Please enter your email";
    } else {

        $sql = "SELECT userID FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $valid = false;
                    $error = "Email already exists";
                    // $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    // Validate age
    if (empty(trim($_POST["age"]))) {
        $valid = false;
        $error = "Please enter your age";
    } elseif (!is_numeric(trim($_POST["age"]))) {
        $valid = false;
        $error = "Age should be a number";
    } else {
        $age = trim($_POST["age"]);
    }

    // Validate phone number
    if (empty(trim($_POST["phone_number"]))) {
        $valid = false;
        $error = "Please enter your phone number";
    } elseif (!preg_match('/^\+?\d+$/', trim($_POST["phone_number"]))) {
        $valid = false;
        $error = "Your umber format is incorrect";
    } else {
        $phone_number = trim($_POST["phone_number"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $valid = false;
        $error = "Please enter your password";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $valid = false;
        $error = "Password should have 6 or more characters";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $valid = false;
        $error = "Please re-type your password";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $valid = false;
            $error = "Passwords do not match";
        }
    }

    if ($valid) {
        $sql = "INSERT INTO users (name, surname, email, age, phone_number, password) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_surname, $param_email, $param_age, $param_phone_number, $param_password);

            // Set parameters
            $param_name = $name;
            $param_surname = $surname;
            $param_email = $email;
            $param_age = $age;
            $param_phone_number = $phone_number;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // hash the password before storing it in the database

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // redirect the user to the login page
                header("location: login.php");
            } else {
                echo "<script>alert('not working')<\script>";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

  
    // Close connection
    mysqli_close($link);

}

?>
<!DOCTYPE html>
<html>

<head>
    <title>SkyKosovo</title>
    <link rel="stylesheet" type="text/css" href="./style/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="titleContain">
                <div class="logoContain">
                    <img class="logoReg" style="width: 5vw;" src="/web2-flight/images/SkyKosovoLogo.png">
                </div>
                <h1 class="titleReg">SkyKosovo</h1>
            </div>
            <p>The Wings of Kosovo!</p>
            <div class="nameSurname">
                <input class="inputi" type="text" id="name" name="name" placeholder="Name" value="<?php echo $name; ?>">
                <input class="inputi" type="text" id="surname" name="surname" placeholder="Surname"
                    value="<?php echo $surname; ?>">
            </div>
            <input class="inputi" type="email" id="email" name="email" placeholder="Email"
                value="<?php echo $email; ?>">
            <input class="inputi" type="text" id="phone_number" name="phone_number" placeholder="Phone Number"
                value="<?php echo $phone_number; ?>">
            <input class="inputi" type="number" id="age" name="age" placeholder="Age">
            <div class="passwords">
                <input class="inputi" type="password" id="password" name="password" placeholder="Password"
                    value="<?php echo $password; ?>">
                <input class="inputi" type="password" id="confirm_password" name="confirm_password"
                    placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">


            </div>

            <div class="errorMessage " style="<?php echo ($valid) ? "display: none" : "display: block" ?>">
                <?php echo "! $error !"; ?>
            </div>

            <button type="Submit" class="registerButton">Register</button>
            <!-- <div class="registerButton">
        <a class="register" href="index.php">Register</a>
        </div> -->
            <div class="loginLink">
                <div class="login">Already have an account?</div> <a href="/web2-flight/login.php" class="loginshort">Log
                    in</a>
            </div>
            <div class="socialMedia">
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
        </form>

    </div>

</body>

</html>