<?php

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    die();
}

$user_id = $_GET["uid"];
$land_id = $_GET["lid"];


$sql = "DELETE FROM land_rating WHERE user_id = '" . $user_id . "' AND land_id = '" . $land_id . "';";
mysqli_query($connection, $sql);

header("Location: ../../routes/on-sale/land/index.php?land_id=" . $land_id);