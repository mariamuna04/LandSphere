<?php
session_start();
if(!isset($_SESSION["id"])) {
    header("Location: signIn.php");
}
if(isset($_POST["logout"])) {
    session_destroy();
    header("Location: index.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Title</title>
</head>
<body>
<h1>Hi <?php echo $_SESSION["name"]; ?></h1>
<form action="" method="post">
    <button type="submit" name="logout">Sign out</button>
</form>
</body>
</html>
