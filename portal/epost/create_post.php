<?php
include('db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $isPinned = isset($_POST['pin']) ? 1 : 0;

    // File upload logic
    $targetDir = "uploads/";
    $filePaths = array();

    // Loop through each uploaded file
    foreach ($_FILES['files']['name'] as $key => $fileName) {
        $targetFilePath = $targetDir . basename($fileName);
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (!empty($fileName)) {
            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'mp4', 'avi', 'mov');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to the server
                if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFilePath)) {
                    // Store file paths for later use
                    $filePaths[] = $targetFilePath;
                } else {
                    echo "Error uploading the file.";
                    exit();
                }
            } else {
                echo "Unsupported file type.";
                exit();
            }
        }
    }

    // Insert post details into the database
    $query = "INSERT INTO posts (content, is_pinned) VALUES ('$content', $isPinned)";
    mysqli_query($conn, $query);

    // Get the post ID of the inserted post
    $postId = mysqli_insert_id($conn);

    // Insert file paths into a separate table with a reference to the post ID
    foreach ($filePaths as $filePath) {
        $query = "INSERT INTO post_files (post_id, file_path) VALUES ($postId, '$filePath')";
        mysqli_query($conn, $query);
    }

    header('Location: create_post1.php');
    exit();
}
?>