<?php
// Define database connection parameters

include "../../../utility/php/connection.php";
$conn = connection();

// Check for errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if a file was uploaded
if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {

    // Get file information
    $file_name = $_FILES["fileToUpload"]["name"];
    $file_size = $_FILES["fileToUpload"]["size"];
    $file_tmp = $_FILES["fileToUpload"]["tmp_name"];
    $file_type = $_FILES["fileToUpload"]["type"];

    // Open the file and read its contents
    $fp = fopen($file_tmp, "r");
    $content = fread($fp, $file_size);
    fclose($fp);

    // Escape the file name and contents for use in an SQL query
    $file_name = mysqli_real_escape_string($conn, $file_name);
    $content = mysqli_real_escape_string($conn, $content);

    // Insert the file into the database
    $sql = "INSERT INTO pdf_files (name, content) VALUES ('$file_name', '$content')";
    if (mysqli_query($conn, $sql)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file: " . mysqli_error($conn);
    }
} else {
    echo "No file uploaded.";
}

// Close the database connection
mysqli_close($conn);