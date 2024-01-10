<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .post-container {
            max-width: 800px;
            margin: 20px auto;
        }

        .post-border {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        .post {
            margin-bottom: 10px;
        }

        .post p {
            margin: 0;
        }

        .post a img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: 10px;
        }

        .post video {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: 10px;
        }

        /* Add a bit of styling to the video controls */
        .post video::-webkit-media-controls {
            background-color: #333;
        }

        .post video::-webkit-media-controls-play-button {
            background-color: #fff;
        }

        .post video::-webkit-media-controls-volume-slider {
            background-color: #fff;
        }

        .post video::-webkit-media-controls-mute-button {
            background-color: #fff;
        }

        .post video::-webkit-media-controls-timeline {
            background-color: #666;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            margin: 10% auto;
            padding: 20px;
            background-color: #fefefe;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #modalDescriptionContainer {
            margin-top: 10px;
            max-height: 200px;
            overflow-y: auto;
            padding-right: 20px; /* To prevent text from overlapping the scrollbar */
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="modalImageContainer">
                <img id="modalImage" src="" alt="Modal Image">
            </div>
            <div id="modalDescriptionContainer">
                <p id="modalDescription"></p>
            </div>
        </div>
    </div>

    <script>
        // Function to open the modal
        function openModal(imagePath, description) {
            var modal = document.getElementById("myModal");
            var modalImage = document.getElementById("modalImage");
            var modalDescription = document.getElementById("modalDescription");

            modal.style.display = "block";
            modalImage.src = imagePath;
            modalDescription.innerHTML = description;
        }

        // Function to close the modal
        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
    </script>

    <div class="post-container">
        <?php
        include('db_config.php');

        $query = "SELECT * FROM posts ORDER BY is_pinned DESC, post_id DESC";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='post-border' style='border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;'>";
            echo "<div class='post'>";
            echo "<p>{$row['content']}</p>";

            // Display associated images or videos
            $postId = $row['post_id'];
            $fileQuery = "SELECT file_path FROM post_files WHERE post_id = $postId";
            $fileResult = mysqli_query($conn, $fileQuery);

            while ($fileRow = mysqli_fetch_assoc($fileResult)) {
                $file_path = $fileRow['file_path'];
                $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
            
                if (in_array($file_extension, ['jpg', 'png', 'jpeg', 'gif'])) {
                    // Display clickable images with modal
                    echo "<img src='{$file_path}' alt='Image' onclick='openModal(\"{$file_path}\", \"{$row['content']}\")'>";
                } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                    // Display videos
                    echo "<video width='200' height='150' controls>";
                    echo "<source src='{$file_path}' type='video/mp4'>";
                    echo "Your browser does not support the video tag.";
                    echo "</video>";
                }
            }

            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
    
</body>
</html>
