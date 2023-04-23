<?php
session_start();
if (!isset($_SESSION["id"])) {
    echo 'Why are you here?';
}

include "../../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../../static/error/HTTP521.html');
    die();
}

$token = $_SESSION['token'];
$user_id = $_SESSION['id'];
$land_id = $_GET['land_id'];

$get_token_sql = "SELECT * FROM login WHERE token = '$token';";
$get_token = mysqli_query($connection, $get_token_sql);

if ($get_token->num_rows > 0) {
    $delete_booking_sql = "DELETE FROM booked_land_purchase 
       WHERE land_id = " . $land_id . " AND potential_buyer_id = " . $user_id . ";";
    $delete_booking = mysqli_query($connection, $delete_booking_sql);
    if ($delete_booking) {
        header('Location: index.php');
    } else {
        echo 'Error';
    }
} else {
    echo 'Error';
}
