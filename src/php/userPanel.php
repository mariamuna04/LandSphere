<?php
//session_start();
//if(!isset($_SESSION["id"])) {
//    header("Location: ../index.php");
//}
//if(isset($_POST["logout"])) {
//    session_destroy();
//    header("Location: ../index.php");
//}
//?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../dist/output.css" rel="stylesheet">
    <title>Title</title>
</head>
<body>
<h1>Hi <?php echo $_SESSION["name"]; ?></h1>
<form action="" method="post">
    <button type="submit" name="logout">Sign out</button>
</form>


<!-- Modal toggle -->
<button  class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
</button>





</body>

</html>
