<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Major</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
    <h2>User Registration</h2>
    </div>
    <form action="register.php" method="post">
        <!-- display errors if any -->
        <?php include('errors.php'); ?>

        <div class="input-group">
            <label for="name">Username:</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="name">Email:</label>
            <input type="text" name="email">
        </div>
        <div class="input-group">
            <label for="name">password:</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="name">Confirm Password:</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" name="register" class="btn"> Register Now!!</button>
        </div>
        <p>Don't wanna create account ? <a href="service.php">Back</a></p>
    </form>
</body>
</html>