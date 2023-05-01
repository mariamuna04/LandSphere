<?php
session_start();

$index = 0;

if (isset($_GET['remove_children'])){
    $index = $_GET['remove_children'];
}

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../../static/error/HTTP521.html');
    die();
}

$get_all_children = "SELECT * FROM children WHERE parent_nid = '" . $_SESSION['id'] . "'";
$result = mysqli_query($connection, $get_all_children);
$result_check = mysqli_num_rows($result);

for ($i = 0; $i < $result_check; $i++) {
    $row = mysqli_fetch_assoc($result);
    if ($i == $index) {
        $delete_child = "DELETE FROM children WHERE birth_certificate_number = '" . $row['birth_certificate_number'] . "'";
        mysqli_query($connection, $delete_child);
        break;
    }

}

header('Location: ../../routes/user-dashboard/successor-settings/');