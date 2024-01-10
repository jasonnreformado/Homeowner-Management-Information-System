<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .post-container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .create-new-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }

        .post {
            margin-bottom: 15px;
        }

        .post-border {
            border: 10px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        textarea {
            width: 100%;
            height: 100px;
            resize: none;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        img, video {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            display: block; /* Added display block for proper spacing */
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            margin-right: 10px;
            color: #333;
            text-decoration: none;
            padding: 5px 10px;
        }

        a:hover {
            background-color: #333;
            color: white;
        }
    </style>
    <title>Edit Post</title>
</head>
<body>

<div class="post-container">
    <a class="create-new-button" href="../epost/create_post1.php">Create New</a>

    <?php
    include('db_config.php');

    $allowImageTypes = array('jpg', 'png', 'jpeg', 'gif');
    $allowVideoTypes = array('mp4', 'avi', 'mov');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        handlePostEdit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && isset($_GET['id'])) {
        $action = $_GET['action'];
        $postId = $_GET['id'];

        if ($action === 'edit') {
            displayEditForm($postId);
        } elseif ($action === 'delete') {
            handlePostDelete($postId);
        }
    } else {
        displayPosts();
    }

function handlePostEdit() {
    global $conn, $allowImageTypes, $allowVideoTypes;

    $postId = $_POST['post_id'];
    $newContent = mysqli_real_escape_string($conn, $_POST['new_content']);

    // Update post content
    $updateQuery = "UPDATE posts SET content = '$newContent' WHERE post_id = $postId";
    mysqli_query($conn, $updateQuery);

    // Handle deletion of selected files
    if (isset($_POST['delete_files'])) {
        $filesToDelete = $_POST['delete_files'];
        foreach ($filesToDelete as $fileToDelete) {
            // Fetch file_path and file extension
            $fileQuery = "SELECT file_path FROM post_files WHERE file_id = $fileToDelete";
            $fileResult = mysqli_query($conn, $fileQuery);

            if ($fileRow = mysqli_fetch_assoc($fileResult)) {
                $filePath = $fileRow['file_path'];
                $file_extension = pathinfo($filePath, PATHINFO_EXTENSION);

                // Only delete the file if it's an image or video
                if (in_array($file_extension, $allowImageTypes) || in_array($file_extension, $allowVideoTypes)) {
                    unlink($filePath); // Delete the file from the server
                }
            }

            // Delete the file record from the database
            $deleteFileQuery = "DELETE FROM post_files WHERE file_id = $fileToDelete";
            mysqli_query($conn, $deleteFileQuery);
        }
    }

    // Handle file upload logic for new images or videos
    $targetDir = "uploads/";
    $filePaths = array();

    foreach ($_FILES['files']['name'] as $key => $fileName) {
        $targetFilePath = $targetDir . basename($fileName);
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (!empty($fileName)) {
            // Upload file to the server only if it's an image or video
            if (in_array($fileType, $allowImageTypes) || in_array($fileType, $allowVideoTypes)) {
                if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFilePath)) {
                    // Store file paths for later use
                    $filePaths[] = $targetFilePath;
                } else {
                    echo "Error uploading one or more files.";
                    exit();
                }
            }
        }
    }

    // Update file paths in the database
    foreach ($filePaths as $filePath) {
        $fileUpdateQuery = "INSERT INTO post_files (post_id, file_path) VALUES ($postId, '$filePath')";
        mysqli_query($conn, $fileUpdateQuery);
    }

}

function displayEditForm($postId) {
    global $conn, $allowImageTypes, $allowVideoTypes;

    $query = "SELECT * FROM posts WHERE post_id = $postId";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        echo "Click the checkbox to delete img/video";
        echo "";
        ?>

        <div class="post">
            <form action="edit_post.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="post_id" value="<?php echo $postId; ?>">
                <label for="new_content">Description:</label>
                <textarea name="new_content" id="new_content" style='width: 300px; height: 100px; resize: none;' ><?php echo $row['content']; ?></textarea>
                <label for="files">New Image/Video:</label>
                <input type="file" name="files[]" id="files" multiple>

                <!-- Display existing images or videos with checkboxes for deletion -->
                <?php displayExistingFiles($postId, $allowImageTypes, $allowVideoTypes, true); ?>

                <button type="submit">Save</button>
                <a class="create-new-button" href="../admin/announcement.php">Back to announcement</a>
            </form>
        </div>
        <?php
    } else {
        echo "Post not found.";
    }
}

function handlePostDelete($postId) {
    global $conn;

    // Handle post deletion
    $deleteFilesQuery = "DELETE FROM post_files WHERE post_id = $postId";
    mysqli_query($conn, $deleteFilesQuery);

    $deleteQuery = "DELETE FROM posts WHERE post_id = $postId";
    mysqli_query($conn, $deleteQuery);

    header('Location: ../admin/announcement.php'); // Redirect to refresh the page after deletion
    exit();
}

function displayPosts() {
    global $conn, $allowImageTypes, $allowVideoTypes;

    $query = "SELECT * FROM posts ORDER BY is_pinned DESC, post_id DESC";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $postId = $row['post_id'];
        echo "<div class='post-border' style='border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;'>";
        echo "<div class='post'>";
        echo "<p>{$row['content']}</p>";

        // Display associated images or videos with checkboxes for deletion
        displayExistingFiles($postId, $allowImageTypes, $allowVideoTypes);

        // Edit and Delete links
        echo "<a href='../epost/edit_post.php?action=edit&id=$postId'>Edit</a>";
        echo "<a href='../epost/edit_post.php?action=delete&id=$postId'>Delete</a>";
        echo "</div>";
        echo "</div>";
    }
}

function displayExistingFiles($postId, $allowImageTypes, $allowVideoTypes, $editMode = false) {
    global $conn;

    $fileQuery = "SELECT file_id, file_path FROM post_files WHERE post_id = $postId";
    $fileResult = mysqli_query($conn, $fileQuery);

    while ($fileRow = mysqli_fetch_assoc($fileResult)) {
        echo "<div>";

        // Display checkboxes only in edit mode
        if ($editMode) {
            echo "<input type='checkbox' name='delete_files[]' value='{$fileRow['file_id']}'>";
        }

        $file_path = $fileRow['file_path'];
        $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);

        if (in_array($file_extension, $allowImageTypes)) {
            // Display images with specific width and height
            echo "<img src='{$file_path}' alt='Image' style='width: 200px; height: 150px;'>";
        } elseif (in_array($file_extension, $allowVideoTypes)) {
            // Display videos with specific width and height
            echo "<video width='320' height='240' controls>";
            echo "<source src='{$file_path}' type='video/mp4'>";
            echo "Your browser does not support the video tag.";
            echo "</video>";
        }

        echo "</div>";
    }
}
?>

</div>



</body>
</html>
