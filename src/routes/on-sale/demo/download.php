<?php
include "../../../utility/php/connection.php";

$conn = connection();

// Check for errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the ID of the PDF file to retrieve
$id = $_GET['id'];
$token = $_GET['token'];
if (!isset($id) || !isset($token)) {

    exit();
}

// Retrieve the PDF file from the database
$sql = "SELECT * FROM pdf_files WHERE id=$id";
$result = mysqli_query($conn, $sql);

// Check if the PDF file was found
if (mysqli_num_rows($result) > 0) {
    // Get the file name and contents
    $row = mysqli_fetch_assoc($result);
    $file_name = $row['name'];
    $content = $row['content'];

    // Set the content type header to indicate that the response is a PDF file
    header('Content-Type: application/pdf');

    // Set the content disposition header to force the browser to download the file
    header('Content-Disposition: inline; filename="' . $file_name . '"');

    // Output the file contents to the browser
    echo $content;
} else {
    echo "PDF file not found.";
}

// Close the database connection
mysqli_close($conn);