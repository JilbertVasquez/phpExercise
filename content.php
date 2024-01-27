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
        <h3>
            <?php
                // output_username();
                output();
            ?>
        </h3>
        <h1>Logout</h1>
        <form action="includes/content.inc.php" method="POST">
            <button id="submit-button">Logout</button>
        </form>

        <?php 
            check_login_errors();
        ?>
    </section>
</body>
</html>