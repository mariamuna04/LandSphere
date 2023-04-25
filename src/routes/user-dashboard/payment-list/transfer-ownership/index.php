<?php
session_start();
if (!isset($_GET['land_id'])) {
    $_SESSION['redirect_url'] = "http" .
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : '') .
        "://" . $_SERVER['HTTP_HOST'] .
        $_SERVER['REQUEST_URI'];
    header('Location: ../../../../static/error/HTTP404.html');
    die();
}

include "../../../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../../static/error/HTTP521.html');
    die();
}

$token = '';
$user_id = '';
if (!isset($_SESSION['token'])) {
    die();
} else {
    $token = $_SESSION['token'];
    $user_id = $_SESSION['id'];
}
$get_token_sql = "SELECT token FROM login WHERE user_nid = " . $user_id . ";";
$get_token_result = mysqli_query($connection, $get_token_sql);
$get_token = mysqli_fetch_assoc($get_token_result);

if ($token != $get_token['token']) {
    session_destroy();
    $delete_token_sql = "UPDATE login SET token = NULL WHERE user_nid = " . $_SESSION['id'] . ";";
    $delete_token = mysqli_query($connection, $delete_token_sql);
    header('Location: ../../../sign-in/');
} else {

    $current_date = date('Y-m-d');

    $land_id = $_GET['land_id'];
    $payment_id = $_GET['payment_id'];
    echo $current_date;

    // Clear all installments
    $clear_installments_sql = "DELETE FROM installment WHERE id = " . $payment_id . ";";
    $clear_installments_result = mysqli_query($connection, $clear_installments_sql);
    if ($clear_installments_result) {
        // Clear all payments
        $clear_payments_sql = "DELETE FROM payment WHERE payment_id = " . $payment_id . ";";
        $clear_payments_result = mysqli_query($connection, $clear_payments_sql);
        if ($clear_payments_result) {
            // Transfer ownership
            $transfer_ownership_sql = "UPDATE owns SET owner_id = " . $user_id . ", acquire_date = '" . $current_date . "'  WHERE land_id = " . $land_id . ";";
            $transfer_ownership_result = mysqli_query($connection, $transfer_ownership_sql);

            // Clear from booking
            $clear_booking_sql = "DELETE FROM booked_land_purchase WHERE land_id = " . $land_id . ";";
            $clear_booking_result = mysqli_query($connection, $clear_booking_sql);

            // Remove from on sale
            $remove_from_on_sale_sql = "DELETE FROM sell_list WHERE land_id = " . $land_id . ";";
            $remove_from_on_sale_result = mysqli_query($connection, $remove_from_on_sale_sql);

            if ($transfer_ownership_result && $clear_booking_result && $remove_from_on_sale_result) {
                header('Location: ../');
            }
        }
    }
}
