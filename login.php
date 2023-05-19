<?php 
// include ("./common/navbar.php"); 

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

// Include config file
require_once "./common/config.php";

// Define variables and initialize with empty values
$email = $password = "";
$validCredentials = true;
$login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $validCredentials = false;
        $login_err = "Please enter email";
    } else {
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $validCredentials = false;
        $login_err = "Please enter your password";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if ($validCredentials) {
        // Prepare a select statement
        $sql = "SELECT userId, email, password FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if email exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Redirect user to welcome page
                            header("location: index.php");
                            // echo "<script>alert('hi')</script>";
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password";
                        }
                    }
                } else {
                    // email doesn't exist, display a generic error message
                    $login_err = "Invalid email or password";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
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
    <title>SkyKosovo - Login</title>
    <link rel="stylesheet" type="text/css" href="./style/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="contain">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="titleContainer">
                <div class="logoContainer">
                    <img class="logo" style="width: 5vw;" src="/web2-flight/images/SkyKosovoLogo.png">
                </div>
                <h1 class="title">SkyKosovo</h1>
            </div>
            <p>The Wings of Kosovo!</p>
            <input class="inputi" type="email" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
            <input class="inputi" type="password" id="password" name="password" placeholder="Password"  value="<?php echo $password; ?>">

            <div class="errorMessage " style="<?php echo ($validCredentials) ? "display: none" : "display: block" ?>">
                <?php echo "! $login_err !"; ?>
            </div>

            <button type="submit" class="loginButton">Log in</button>
            <!-- <div class="loginButton">
                <a class="login" href="index.php">Login</a>
            </div> -->
            <div class="registerLink">
                <a class="register" href="register.php">Don't have an account? Create one!</a>
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