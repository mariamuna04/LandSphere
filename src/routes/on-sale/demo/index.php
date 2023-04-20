<?php
// Define database connection parameters

include "../../../utility/php/connection.php";
$conn = connection();

// Check for errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
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

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload PDF File</title>
</head>
<body>
<h1>Upload PDF File</h1>
<form action="" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <input type="submit" value="Upload File" name="submit">
</form>

<?php
$sql = "SELECT * FROM pdf_files";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<a href='download.php?id=" . $row['id'] . "'>" . $row['name'] . "</a><br>";
    }
}

?>
</body>
</html>