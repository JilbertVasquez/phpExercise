<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $psswrd = $_POST["password"];
    $repsswrd = $_POST["repassword"];
    $email = $_POST["email"];

    try {

        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_controller.inc.php";

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $psswrd, $repsswrd, $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_password_not_equal($psswrd, $repsswrd)) {
            $errors["password_not_equal"] = "Password not equal!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered!";
        }

        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION["error_signup"] = $errors;
            header ("Location: ../signup.php");

            $signupData = [
                "username" => $username,
                "email" => $email
            ];

            $_SESSION["signup_data"] = $signupData;

            die();
        }
        create_user($pdo, $username, $psswrd, $email);

        header ("Location: ../signup.php?signup=success");
        
        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else {
    header ("Location: ../signup.php");
    die();
}