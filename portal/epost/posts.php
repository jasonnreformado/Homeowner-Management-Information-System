
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <!-- Add these lines in the head section of your HTML -->
 

    <title>Posts</title>
</head>
<body>
    <!-- Navigation Bar -->

    </div>
    <div class="post-container">
        <br>
        <?php
        include('db_config.php');

        $query = "SELECT * FROM posts ORDER BY is_pinned DESC, post_id DESC";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<div class='post-border' style='border: 3px solid #ccc; padding: 50px; margin: 0 auto; text-align: center; width: 800px; height: 500px;'>";
            echo "<div class='post'>";
            echo "<p style='color: black; font-family: Arial;'>{$row['content']}</p>";
            // Display post content
            



            // Display associated images or videos
            $postId = $row['post_id'];
            $fileQuery = "SELECT file_path, description FROM post_files WHERE post_id = $postId";
            $fileResult = mysqli_query($conn, $fileQuery);

            while ($fileRow = mysqli_fetch_assoc($fileResult)) {
                $file_path = $fileRow['file_path'];
                $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);

                // Container for each image or video and its description
                echo "<div class='media-container'>";

                echo "<div class='post-media'>";
                if (in_array($file_extension, ['jpg', 'png', 'jpeg', 'gif'])) {
                    // Display images
                    echo "<img class='' data-src='{$file_path}' alt='Image'>";
                } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                    // Display videos
                    echo "<video class='lazy-load' data-src='{$file_path}' controls>";
                    echo "<source src='{$file_path}' type='video/mp4'>";
                    echo "Your browser does not support the video tag.";
                    echo "</video>";
                }
                echo "</div>";

                // Display image or video description
                $description = $fileRow['description'];
                echo "<p class='media-description'>$description</p>";

                echo "</div>"; // Close media-container
            }

            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>

    <script>
        // Lazy load images and videos
        document.addEventListener("DOMContentLoaded", function () {
            var lazyloadImages = document.querySelectorAll(".lazy-load");
            var lazyloadThrottleTimeout;

            function lazyload() {
                if (lazyloadThrottleTimeout) {
                    clearTimeout(lazyloadThrottleTimeout);
                }

                lazyloadThrottleTimeout = setTimeout(function () {
                    var scrollTop = window.pageYOffset;

                    lazyloadImages.forEach(function (img) {
                        if (img.offsetTop < (window.innerHeight + scrollTop)) {
                            img.src = img.dataset.src;
                            img.classList.add("loaded");
                        }
                    });

                    if (lazyloadImages.length === 0) {
                        document.removeEventListener("scroll", lazyload);
                        window.removeEventListener("resize", lazyload);
                        window.removeEventListener("orientationChange", lazyload);
                    }
                }, 20);
            }

            document.addEventListener("scroll", lazyload);
            window.addEventListener("resize", lazyload);
            window.addEventListener("orientationChange", lazyload);

            lazyload();
        });
    </script>
</body>
</html>
