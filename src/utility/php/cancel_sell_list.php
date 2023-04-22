<?php

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../static/error/HTTP521.html');
    die();
}

$land_id = $_GET["land_id"];

$sql = "DELETE FROM sell_list WHERE land_id = " . $land_id . ";";

if (mysqli_query($connection, $sql)) {
    header("Location: ../../routes/user-dashboard/sale-list/");
} else {
    echo "Error" . mysqli_error($connection);
}