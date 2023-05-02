<?php
session_start();

$index = 0;

if (isset($_GET['index'])){
    $index = $_GET['index'];
}

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../../static/error/HTTP521.html');
    die();
}

$delete_children_sql = "DELETE FROM children WHERE birth_certificate_number = " . $index . ";";
$delete_children_result = mysqli_query($connection, $delete_children_sql);

header('Location: ../../routes/user-dashboard/successor-settings/');