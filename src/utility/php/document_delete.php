<?php
session_start();
include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../static/error/HTTP521.html');
    die();
}

$land_id = $_GET["land_id"];
$document = $_GET["document"];


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
    $sql = "UPDATE land_docs SET " . $document . " = NULL WHERE land_id = " . $land_id . ";";
    if (mysqli_query($connection, $sql)) {
        header("Location: ../../routes/user-dashboard/owned-land/my-land/?land_id=" . $land_id . "&delete_success=1");
    } else {
        echo "Error deleting file: " . mysqli_error($connection);
    }
} else {
    session_destroy();
    $delete_token_sql = "UPDATE login SET token = NULL WHERE user_nid = " . $_SESSION['id'] . ";";
    $delete_token = mysqli_query($connection, $delete_token_sql);
    header('Location: ../../routes/sign-in/');
}

mysqli_close($connection);