<?php
session_start();
include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../../static/error/HTTP521.html');
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

// Retrieve the PDF file from the database
    $sql = "SELECT " . $document . " FROM land_docs WHERE land_id = " . $land_id . ";";
    $result = mysqli_query($connection, $sql);

// Check if the PDF file was found
    if (mysqli_num_rows($result) > 0) {
        // Get the file name and contents
        $row = mysqli_fetch_assoc($result);
        $content = $row[$document];

        // Set the content type header to indicate that the response is a PDF file
        header('Content-Type: application/pdf');

        // Set the content disposition header to force the browser to download the file
        header('Content-Disposition: inline; filename="' . $content . '"');

        // Output the file contents to the browser
        echo $content;
    } else echo "PDF file not found.";
} else {
    session_destroy();
    $delete_token_sql = "UPDATE login SET token = NULL WHERE user_nid = " . $_SESSION['id'] . ";";
    $delete_token = mysqli_query($connection, $delete_token_sql);
    header('Location: ../../routes/sign-in/');
}


// Close the database connection
mysqli_close($connection);