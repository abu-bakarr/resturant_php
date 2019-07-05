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
<body class="lin" >
    <div class="header">
    <h2>Please Log in</h2>
    </div>
    <form action="login.php" method="post">

     <!-- display errors if any -->
     <?php include('errors.php'); ?>

        <div class="input-group">
            <label for="name">Username:</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="name">password:</label>
            <input type="password" name="password">
        </div>
         <div class="input-group">
            <button type="submit" name="login" class="btn">Log in</button>
        </div>
        <p>Don't have an account ? Please redirected to <a href="index.php">Home</a></p>
    </form>
</body>
</html>