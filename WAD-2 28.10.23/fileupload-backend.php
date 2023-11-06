<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $file = $_FILES["file"];
        $uploadDir = "./file-uploads/"; // Directory to save files
        $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
        $uniqueFilename = uniqid() . "." . $extension; // Generate a unique filename
        $targetPath = $uploadDir . $uniqueFilename;

        if (move_uploaded_file($file["tmp_name"], $targetPath)) {
            echo "File uploaded successfully as $uniqueFilename";
        } else {
            echo "Failed to upload the file.";
        }
    } else {
        echo "Error in file upload.";
    }
} else {
    echo "Invalid request method.";
}
?>