<!DOCTYPE html>
<html lang="en">
<head>
  <title>Homeowners Portal</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/style-starter.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: "Lato", sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .mySlides {
      display: none;
    }

    /* Add responsive styles here */
    @media screen and (max-width: 600px) {
      /* Adjust styles for smaller screens */
      #navDemo {
        display: none;
      }
      .w3-top {
        position: static;
      }
      .w3-bar.w3-card.w3-right {
        float: none;
        width: 100%;
      }
      .w3-bar-block.w3-hide-large.w3-hide-medium {
        display: block;
        width: 100%;
        position: static;
        margin-top: 0;
      }
      .w3-content {
        margin-top: 0;
      }
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

  </style>
</head>
<body>

<!-- Navbar -->
<nav>
        <a href="index.php">Home</a>
        <a href="faqs.php">FAQs</a>
        <a href="index.php">Officer</a>
        <a href="../login.php">Login
        </a>
    </nav>



<!-- Page content -->
<div class="w3-content" style="max-width:2000px;">
  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="image/main.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small"></div>
  </div>
  
  <!-- Include aboutus.php content -->
  <?php include_once('../aboutus.php');?>

  <!-- The Tour Section -->
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-large">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <?php include_once('../includes/footer.php');?>
</footer>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button


// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
