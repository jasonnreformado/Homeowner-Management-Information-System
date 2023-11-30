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
    transform: translateY(-100%);
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

    /* Style the officers section */
.officers {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 40px;
}

.officer {
  text-align: center;
  margin: 10px;
  padding: 130px;
  border: 1px solid #ddd;
  border-radius: 5px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.officer-img {
  width: 150px;
  height: 150px;
  background-image: url('officer-image.jpg');
  background-size: cover;
  background-position: center;
  border-radius: 50%;
  margin: 0 auto 10px;
}

.social-media a {
  margin: 5px;
  text-decoration: none;
  color: #333;
}
.social-media img {
  width: 30px;
  height: 30px;
  margin: 5px;
}

/* Add animations */
.officer:hover .officer-info {
  transform: translateX(0);
  transition: transform 0.3s ease-in-out;
}

.officer-info {
  transform: translateX(-100%);
  transition: transform 0.3s ease-in-out;
}

/* Add animation for officer profile image on hover */
.officer:hover .officer-img img {
  transform: scale(1.1);
  transition: transform 0.3s ease-in-out;
}

/* Add animation for background color change on hover */
.officer:hover {
  background-color: #f5f5f5;
  transition: background-color 0.3s ease-in-out;
}
.officer:hover .social-media img {
  color: #007bff;
  transition: color 0.3s ease-in-out;
}



/* Add animation for officer position on hover */
.officer:hover .officer-info {
  transform: translateX(0);
  transition: transform 0.3s ease-in-out;
}

.officer-info {
  transform: translateX(-100%);
  transition: transform 0.3s ease-in-out;
}   

h1 {
    text-align:center;
}

body.loaded {
  transform: translateY(0); /* Slide in from the top */
  transition: transform 1s ease-in-out;
}

@keyframes fadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
</style>
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="faqs.php">FAQs</a>
        <a href="index.php">Officer</a>
        <a href="../login.php">Login
        </a>
    </nav>
    <br>
    <h1>Homeowners Association Staff</h1>

    <section class="officers">
    <div class="officer">
      <div class="officer-img">
      <img src="image/man.png" alt="Officer 1">
      </div>
      <h3>Juan Dela Cruz</h3>
      <h4>President</h4>
      <p>Has over 5 years HOA and property management experience</p>
      <div class="social-media">
        <a href="#"><img src="image/facebook.png" alt="Facebook"></a>
        <a href="#"><img src="image/twitter.png" alt="Twitter"></a>
        <a href="#"><img src="image/instagram.png" alt="LinkedIn"></a>
      </div>
      
    </div>
    <div class="officer">
      <div class="officer-img">
      <img src="image/woman.png" alt="Officer 1">
      </div>
      <h3>Juan Dela Cruz</h3>
      <h4>Vice President</h4>
      <p>Has over 5 years HOA and property management experience</p>
      <div class="social-media">
      <a href="#"><img src="image/facebook.png" alt="Facebook"></a>
        <a href="#"><img src="image/twitter.png" alt="Twitter"></a>
        <a href="#"><img src="image/instagram.png" alt="LinkedIn"></a>
      </div>
      
    </div>
    <div class="officer">
      <div class="officer-img">
      <img src="image/man.png" alt="Officer 1">
      </div>
      <h3>Juan Dela Cruz</h3>
      <h4>Secretary</h4>
      <p>Has over 5 years HOA and property management experience</p>
      <div class="social-media">
      <a href="#"><img src="image/facebook.png" alt="Facebook"></a>
        <a href="#"><img src="image/twitter.png" alt="Twitter"></a>
        <a href="#"><img src="image/instagram.png" alt="LinkedIn"></a>
      </div>
      
    </div>
    <div class="officer">
      <div class="officer-img">
      <img src="image/woman.png" alt="Officer 1">
      </div>
      <h3>Juan Dela Cruz</h3>
      <h4>Treasurer</h4>
      <p>Has over 5 years HOA and property management experience</p>
      <div class="social-media">
      <a href="#"><img src="image/facebook.png" alt="Facebook"></a>
        <a href="#"><img src="image/twitter.png" alt="Twitter"></a>
        <a href="#"><img src="image/instagram.png" alt="LinkedIn"></a>
      </div>
      
    </div>
    
    <!-- Repeat the above officer structure for Officers 2, 3, and 4 -->
  </section>
  <script>
// Wait for the page to fully load
window.addEventListener('load', () => {
  const body = document.querySelector('body');
  body.classList.add('loaded');
});
</script>
</body>
</html>
