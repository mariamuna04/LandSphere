<?php

include "../../../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../../static/error/HTTP521.html');
    die();
}

$land_id = $_GET["land_id"];
$document = $_GET["document"];

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


// Close the database connection
mysqli_close($connection);