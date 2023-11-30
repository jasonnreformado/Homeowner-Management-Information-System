<!DOCTYPE html>
<html lang="en">
<head>
<title>Homeowners Portal</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-green w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-center" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="../login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>
    
    <a href="faqs.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Faqs</a>
    <a href="officer.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Officer</a>
   
    </div>
    <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class=""></i></a>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="../index.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Login</a>
  <a href="announcement.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Announcement</a>
  <a href="faqs.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Faqs</a>
  <a href="officer.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Officer</a>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="image/main.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    
      
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="image/main.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
     
       
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="image/main.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">

       
    </div>
  </div>

  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">About Us </h2>
    <p class="w3-opacity"><i>Our Vision</i></p>
    <p class="w3-justify">Our vision for the homeowners association is to foster a vibrant and harmonious community that thrives on a sense of belonging and shared responsibility. We aspire to create an environment where residents feel not just homeowners, but integral members of a close-knit community. Through proactive communication, inclusive events, and collaborative decision-making, we aim to enhance the overall quality of life for every resident. We envision a homeowners association that not only addresses immediate needs but also plans for the long-term sustainability and growth of our shared living space.</p>
   
    <p class="w3-opacity"><i>Our Mission</i></p>
    <p class="w3-justify">Our vision for the homeowners association is to foster a vibrant and harmonious community that thrives on a sense of belonging and shared responsibility. We aspire to create an environment where residents feel not just homeowners, but integral members of a close-knit community. Through proactive communication, inclusive events, and collaborative decision-making, we aim to enhance the overall quality of life for every resident. We envision a homeowners association that not only addresses immediate needs but also plans for the long-term sustainability and growth of our shared living space.</p>
    <div class="w3-row w3-padding-32">
      
    </div>
  </div>

  <!-- The Tour Section -->
  <div class="w3-black" id="tour">
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> Imus, Cavite<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: +00 151515<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: mail@mail.com<br>
      </div>
      <div class="w3-col m6">
        <form action="/action_page.php" target="_blank">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
          <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
        </form>
      </div>
    </div>
  </div>



  
<!-- End Page Content -->
</div>
<br>
<!-- Image of location/map -->
<a href="https://www.google.com/maps/place/Villa+Arcadia/@14.4294311,120.9262113,18z/data=!4m6!3m5!1s0x3397d2ec4efc7d11:0xc6f88a73d2461f84!8m2!3d14.4295727!4d120.9268054!16s%2Fg%2F11c0vp0_d1?entry=tts">
  <img src="image/map.jpg" class="w3-image w3-greyscale-min" style="width:100%" alt="Clickable Image">
</a>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
 
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
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

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
