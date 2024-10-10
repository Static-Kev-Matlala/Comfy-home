<?php
    include 'connection.php';

    // initialize the session
    session_start();

    // destroy the session
    session_destroy();

    // redirect to the login page with a logout message
    header("location: ../sign_in.php?message = you have logged out");
    exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <header>
        <div class="main">
            <form action="" method="POST">
            <h1>Welcome <?php echo $name; ?></h1>
            <a href="logout.php">Logout</a>
            </form>

        </div>
    </header>
</body>
</html>