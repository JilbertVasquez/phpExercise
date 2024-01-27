<?php 
    require_once "includes/config_session.inc.php";
    require_once "includes/login_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>phpExercise</title>
</head>
<body>
    <section>
        <h1>Login</h1>
        <form action="includes/login.inc.php" method="POST">
            <input type="text" placeholder="Username" name="username">
            <input type="text" placeholder="Password" name="password">
            <button id="submit-button">Login</button>
            <h4>Don't have account?<br><br><a href="signup.php">Sign Up Now !!!</a></h4>
        </form>

        <?php
                output_username();
            ?>

        <?php 
            check_login_errors();
        ?>
    </section>
</body>
</html>