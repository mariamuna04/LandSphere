<?php
session_start();
if (!isset($_GET['land_id']) && !isset($_SESSION['id'])) {
    header('Location: ../../../static/error/HTTP404.html');
    die();
}
$land_id = $_GET['land_id'];
$owner_id = $_GET['owner_id'];
$user_id = $_SESSION['id'];

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../static/error/HTTP521.html');
    die();
}

if(!isset($_SESSION['id'])) {
    header('Location: ../../routes/sign-in/');
    die();
}

$proceed_to_book_sql = "INSERT INTO booked_land_purchase (land_id, potential_buyer_id, owner_id) VALUES (". $land_id .", ". $user_id .", ". $owner_id .");";

if (mysqli_query($connection, $proceed_to_book_sql)) {
    header('Location: ../../routes/on-sale/land/?land_id=' . $land_id);
} else {
    header('Location: ../../static/error/HTTP500.html');
}



