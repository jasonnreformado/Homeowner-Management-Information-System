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
            background-color: grey;
        }

        header {
            background-color: #333;
            color: white;
            padding: 1em;
            text-align: center;
        }

            .post-container {
                max-width: 800px;
                margin: 20px auto;
                padding: 20px;
                background-color: white;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

        .post {
            margin-bottom: 15px;
        }

        .post-border {
            border: 1px solid #ccc;
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

      

        a:hover {
            background-color: #333;
            color: white;
        }
    </style>
    <title>Create | Announcement</title>
</head>
<body>

<!-- Navigation Bar -->


<div class="post-container">
        <form action="../epost/create_post.php" method="post" enctype="multipart/form-data" class="post-form">
            <label for="content">Description:</label>
            <textarea name="content" id="content" required></textarea>
            
            <label for="file">Upload Image/Video:</label>
            <input type="file" name="files[]" id="file" multiple>
            <br>
            <input type="checkbox" name="pin" id="pin"> 
            <label for="pin"></label>

            <button type="submit">Post</button>
            <button><a class="create-new-button" href="../admin/announcement.php">Back</a></button>
        
        </form>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
