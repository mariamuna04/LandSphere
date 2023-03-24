<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../dist/output.css" rel="stylesheet">
        <title>Title</title>
        <script src="js/utility.js"></script>
    </head>

<body class="bg-blue-100" style="height: 10000px">
<nav class="bg-blue-300 flex gap-6 justify-between pl-28
    pr-28 pt-5 pb-5 rounded-b-2xl fixed w-full bg-opacity-60
    backdrop-blur-sm">
    <div class="flex gap-10">
        <h1>Our hotels</h1>
        <h1>Rooms</h1>
        <h1>Offers</h1>
    </div>

    <div class="flex">
        <h1>Logo</h1>
    </div>

    <div class="flex gap-10">
        <h1>Contact</h1>
        <button onclick="gotoSignIn()">
            Sign In
        </button>
        <button onclick="gotoSignUp()">
            Sign Up
        </button>


    </div>

</nav>

</body>

</html>