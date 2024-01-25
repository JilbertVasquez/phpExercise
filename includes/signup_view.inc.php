<?php 

declare(strict_types=1);

function signup_inputs() {

    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["error_signup"]["username_taken"])) {
        echo '<input type="text" placeholder="Username" name="username" value=' . $_SESSION["signup_data"]["username"] . '>';
    }
    else {
        echo '<input type="text" placeholder="Username" name="username">';
    }

    echo '<input type="text" placeholder="Password" name="password">';
    echo '<input type="text" placeholder="re-enter password" name="repassword">';
    
    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["error_signup"]["email_used"]) && !isset($_SESSION["error_signup "]["invalid_email"])) {
        echo '<input type="text" placeholder="Email" name="email" value=' . $_SESSION["signup_data"]["email"] . '>';
    }
    else {
        echo '<input type="text" placeholder="Email" name="email">';
    }
}

function check_signup_errors() {
    if (isset($_SESSION["error_signup"])) {
        $errors = $_SESSION["error_signup"];

        echo "<br>";
        foreach ($errors as $error) {
            
            echo '<p class ="form-error">' . $error . '</p>';
        }

        unset($_SESSION["error_signup"]);
    }
    else if (isset($_GET['signup']) && $_GET["signup"] === "success") {
        echo "<br>";
        echo '<p class ="form-error"> Sign Up Success!</p>';
    }
}