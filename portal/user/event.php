<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeowners Portal</title>
    <link rel="stylesheet" href="">
    <style>
        /* styles.css */
   
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #c9cecb;
    
    
}

nav {
    background-color: #006400;
    text-align: right;
}

nav a {
    display: inline-block;
    padding: 20px 20px;
    text-decoration: none;
    color: #fff;
}
/* nav bar ^^ */

.container {
            text-align: center;
        }

        .btn {
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            margin: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .gallery-item {
            text-align: center;
        }

        .gallery img {
            width: 420px;
            height: 300px;
            cursor: pointer;
        }

        .details-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            align-items: center;
            justify-content: center;
        }

        .details {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .back-btn {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-image {
            max-width: 100%;
            max-height: 50vh;
        }
</style>
</head>
<body>
    <nav>
<a href="index.php">Home</a>
        <a href="announcement.php">Announcement</a>
        <a href="faqs.php">FAQs</a>
        <a href="officer.php">Officer</a>
        <a href="admin_portal/login.php">Login
        </a>
    </nav>

   
   <br><br><br>
    <div class="container">
        <a href="announcement.php" class="btn">Announcements</a>
        <a href="event.php" class="btn">Events</a>
    </div>
        <br><br>
        <div class="gallery">
        <div class="gallery-item" onclick="showDetails('Events', 'image/zumba.png', 'we have a free zumba in the court')">
            <img src="image/zumba.png" alt="Announcement 1">
            <h3>Zumba</h3>
        </div>
        <div class="gallery-item" onclick="showDetails('Events', 'image/aa.jpg', 'Description ')">
            <img src="image/aa.jpg" alt="Announcement 2">
            <h3> Events 2</h3>
        </div>
        <div class="gallery-item" onclick="showDetails('Events', 'image/aa.jpg', 'Description ')">
            <img src="image/aa.jpg" alt="Announcement 3">
            <h3> Events 3</h3>
        </div>
    </div>
<br>
    <div class="gallery">
        <div class="gallery-item" onclick="showDetails('Events', 'image/aa.jpg', 'we have a free zumba in the court')">
            <img src="image/aa.jpg" alt="Announcement 1">
            <h3>Events 4</h3>
        </div>
        <div class="gallery-item" onclick="showDetails('Events', 'image/aa.jpg', 'Description ')">
            <img src="image/aa.jpg" alt="Announcement 2">
            <h3> Events 5</h3>
        </div>
        <div class="gallery-item" onclick="showDetails('Events', 'image/aa.jpg', 'Description ')">
            <img src="image/aa.jpg" alt="Announcement 3">
            <h3>Events 6</h3>
        </div>
    </div>
    <div class="details-container" id="details-container">
        <div class="details">
            <span class="close-btn" onclick="closeDetails()">&times;</span>
            <h3 id="announcement-title">Announcement Title</h3>
            <img class="popup-image" id="popup-image" src="" alt="Announcement Image">
            <p id="announcement-description">Description for the announcement</p>
            <button class="back-btn" onclick="closeDetails()">Back</button>
        </div>
    </div>

    <script>
        function showDetails(title, imageUrl, description) {
            const detailsContainer = document.getElementById("details-container");
            detailsContainer.style.display = "flex";

            const announcementTitle = document.getElementById("announcement-title");
            announcementTitle.textContent = title;

            const image = document.getElementById("popup-image");
            image.src = imageUrl;

            const descriptionElement = document.getElementById("announcement-description");
            descriptionElement.textContent = description;
        }

        function closeDetails() {
            const detailsContainer = document.getElementById("details-container");
            detailsContainer.style.display = "none";
        }
    </script>
  
</body>
</html>
