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

$token = '';
$user_id = '';
if (!isset($_SESSION['token']) || !isset($_SESSION['id'])) {
    die();
} else {
    $token = $_SESSION['token'];
    $user_id = $_SESSION['id'];
}
$get_token_sql = "SELECT token FROM login WHERE user_nid = " . $user_id . ";";
$get_token_result = mysqli_query($connection, $get_token_sql);
$get_token = mysqli_fetch_assoc($get_token_result);


if ($token == $get_token['token']) {
    $proceed_to_book_sql = "INSERT INTO booked_land_purchase (land_id, potential_buyer_id, owner_id) VALUES (" . $land_id . ", " . $user_id . ", " . $owner_id . ");";
    if (mysqli_query($connection, $proceed_to_book_sql)) {
        header('Location: ../../routes/on-sale/land/?land_id=' . $land_id);
    } else {
        header('Location: ../../static/error/HTTP500.html');
    }

} else {
    session_destroy();
    $delete_token_sql = "UPDATE login SET token = NULL WHERE user_nid = " . $_SESSION['id'] . ";";
    $delete_token = mysqli_query($connection, $delete_token_sql);
    header('Location: ../../routes/sign-in/');
}


mysqli_close($connection);

