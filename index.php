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
            <input type="text" placeholder="Email" name="email">
            <button id="submit-button">Login</button>
            <h4>Don't have account?<br><br><a href="signup.php">Sign Up Now !!!</a></h4>
        </form>
    </section>
</body>
</html>