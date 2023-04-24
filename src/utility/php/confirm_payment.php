<?php
session_start();
include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../../static/error/HTTP521.html');
    die();
}

$buyer_id = $_SESSION['id'];
$land_id = $_GET["land_id"];
$total_amount = $_GET['total_amount'];
$deadline = $_GET["deadline"];
$installment = $_GET["installment"];

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

