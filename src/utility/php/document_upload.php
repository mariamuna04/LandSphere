<?php

include "../../utility/php/connection.php";
$connection = connection();
if (!$connection) {
    header('Location: ../../../static/error/HTTP521.html');
    die();
}

$land_id = $_GET["land_id"];
$document = $_GET["document"];

if (isset($_FILES["document_file"]) && $_FILES["document_file"]["error"] == UPLOAD_ERR_OK) {
    $file_size = $_FILES["document_file"]["size"];
    $file_tmp = $_FILES["document_file"]["tmp_name"];
    $file_type = $_FILES["document_file"]["type"];

    // Open the file and read its contents
    $fp = fopen($file_tmp, "r");
    $content = fread($fp, $file_size);
    fclose($fp);

    // Escape the file name and contents for use in an SQL query
    $content = mysqli_real_escape_string($connection, $content);

    // Insert the file into the database
    $sql = "UPDATE land_docs SET " . $document . " = '$content' WHERE land_id = " . $land_id . ";";

    if (mysqli_query($connection, $sql)) {
        header("Location: ../../routes/user-dashboard/owned-land/my-land/?land_id=" . $land_id . "&upload_success=1");
    } else {
        echo "Error uploading file: " . mysqli_error($connection);
    }
} else echo "No file uploaded.";

mysqli_close($connection);