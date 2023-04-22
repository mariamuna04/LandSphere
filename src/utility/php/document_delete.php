<?php

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../static/error/HTTP521.html');
    die();
}

$land_id = $_GET["land_id"];
$document = $_GET["document"];

$sql = "UPDATE land_docs SET " . $document . " = NULL WHERE land_id = " . $land_id . ";";

if (mysqli_query($connection, $sql)) {
    header("Location: ../../routes/user-dashboard/owned-land/my-land/?land_id=" . $land_id);
} else {
    echo "Error deleting file: " . mysqli_error($connection);
}