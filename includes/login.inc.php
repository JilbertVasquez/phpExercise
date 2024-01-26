<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $psswrd = $_POST["password"];

    try {
        require_once "dbh.inc.php";
        require_once "login_controller.inc.php";
        require_once "login_model.inc.php";

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $psswrd)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $results = get_user($pdo, $username);

        if (is_user_wrong($results)) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        if (!is_user_wrong($results) && is_password_wrong($psswrd, $results["psswrd"])) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION["error_signup"] = $errors;
            header ("Location: ../signup.php");

            die();
        }
        

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else {
    header ("Location: ../index.php");
    die();
}