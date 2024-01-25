<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/signup_view.inc.php';
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
        <h1>Sign Up</h1>
        <form action="includes/signup.inc.php" method="POST">
            <?php 
                signup_inputs();
            ?>
            <button id="submit-button">Sign Up</button>
            <h4>Already have an account? <br><br><a href="index.php">Login Now !!!</a></h4>
        </form>

        <?php
            check_signup_errors();
        ?>

    </section>
</body>
</html>