<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../../');
    die();
}


include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../static/error/HTTP521.html');
    die();
}

$land_id = $_GET['land_id'];
$token = '';
$user_id = '';
if (!isset($_SESSION['token']) && !isset($_SESSION['id'])) {
    die();
} else {
    $token = $_SESSION['token'];
    $user_id = $_SESSION['id'];
}
$get_token_sql = "SELECT token FROM login WHERE user_nid = " . $user_id . ";";
$get_token_result = mysqli_query($connection, $get_token_sql);
$get_token = mysqli_fetch_assoc($get_token_result);


if ($token == $get_token['token']) {
    $delete_booking_sql = "DELETE FROM booked_land_purchase 
       WHERE land_id = " . $land_id . " AND potential_buyer_id = " . $user_id . ";";
    $delete_booking = mysqli_query($connection, $delete_booking_sql);
    if ($delete_booking) {
        header('Location: ../../routes/user-dashboard/booking-land');
    } else {
        echo 'Error';
    }
} else {
    echo 'Error';
}
