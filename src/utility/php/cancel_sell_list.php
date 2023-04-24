<?php
session_start();

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../static/error/HTTP521.html');
    die();
}

$land_id = $_GET["land_id"];

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
    $sql = "DELETE FROM sell_list WHERE land_id = " . $land_id . ";";
    if (mysqli_query($connection, $sql)) {
        header("Location: ../../routes/user-dashboard/sale-list/");
    } else {
        echo "Error" . mysqli_error($connection);
    }
} else {
    session_destroy();
    $delete_token_sql = "UPDATE login SET token = NULL WHERE user_nid = " . $_SESSION['id'] . ";";
    $delete_token = mysqli_query($connection, $delete_token_sql);
    header('Location: ../../routes/sign-in/');
}

mysqli_close($connection);