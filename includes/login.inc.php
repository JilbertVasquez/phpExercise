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
            $_SESSION["error_login"] = $errors;
            header ("Location: ../index.php");

            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result;
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["username"] = htmlspecialchars($result["username"]);
        
        $_SESSION["last_regeneration"] = time();

        header ("Location: ../content.php?login=success");
        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else {
    header ("Location: ../index.php");
    die();
}