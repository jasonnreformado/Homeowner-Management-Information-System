<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['btnlogin']))
{
    $emailcon = $_POST['emailcont'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT ID FROM tbluser WHERE (Email='$emailcon' OR MobileNumber='$emailcon') AND Password='$password'");
    $ret = mysqli_fetch_array($query);

    if($ret > 0)
    {
        $_SESSION['bpmsuid'] = $ret['ID'];
        header('location:user-dashboard.php');
    }
    else
    {
        echo "<script>alert('Invalid Details.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="theme-color" content="#064635" />
	

	<!-- DESCRIPTION -->
	<meta name="description" content="" />
	
	<!-- OG -->
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />

	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />


	<!-- PAGE TITLE HERE ============================================= -->
	<title>Resident Portal - Villa Arcadia Subdivision</title>

	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="https://cvsu-imus.edu.ph/student-portal/assets/css/assets.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- STYLESHEETS ============================================= -->
	
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color-1.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<style>
        body {
            background-image: url('assets/images/bgg.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed; /* This ensures that the background image stays fixed as you scroll */
        }
        .edit-profile {
        /* Set the opacity to your preferred value (0.8 in this example) */
        opacity: 0.8;
        /* You can also add other styling properties as needed */
        border-radius: 10px;
        background-color: #f0f0f0;
        padding: 20px;
    }

    .ttr-sidebar-navi .ttr-sidebar-wrapper  {
        /* Set the opacity to your preferred value (0.8 in this example) */
        opacity: 0.8;
        /* You can also add other styling properties as needed */
        border-radius: 10px;
        background-color: #f0f0f0;
        padding: 20px;
    }

    .widget-box {
        /* Set the opacity to your preferred value (0.8 in this example) */
        opacity: 0.85;
        /* You can also add other styling properties as needed */
        border-radius: 30px;
        background-color: #f0f0f0;
        padding: 20px;
    }
    .portal-title h4 {
        color: #fff;
    }
    .ttr-sidebar {
    opacity: 0.8; /* Set the desired opacity value between 0 (completely transparent) and 1 (fully opaque) */
    /* Add other styling properties as needed */
}
.image-popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
    max-width: 95%; /* Adjust as needed */
    max-height: 95%; /* Adjust as needed */
    overflow: hidden;
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    text-align: center;
    padding: 10px;
    cursor: move;
}

.image-popup img {
    width: auto;
    height: auto;
    max-width: 100%;
    max-height: 100%;
    cursor: grab;
}

.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 18px;
    color: #333;
}

.zoom-buttons {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
}

.zoom-buttons button {
    margin: 0 5px;
    padding: 5px 10px;
    font-size: 16px;
    cursor: pointer;
}
#popupImage {
    cursor: grab;
  
}
    </style>
   
		
</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar" >
	
	<!-- header start -->
	<header class="ttr-header">
		<div class="ttr-header-wrapper">
			<!--sidebar menu toggler start -->
			<div class="ttr-toggle-sidebar ttr-material-button">
				<i class="ti-close ttr-open-icon"></i>
				<i class="ti-menu ttr-close-icon"></i>
			</div>
			<!--sidebar menu toggler end -->
			<!--logo start -->
			<div class="ttr-logo-box">
				<div>
					<a href="user/index.php" class="ttr-logo">
						<img class="ttr-logo-mobile" alt="" src="assets/images/logo.png" width="120" height="30">
						<img class="ttr-logo-desktop" alt="" src="assets/images/logo.png" width="120" height="30"> 
					</a>
				</div>
			</div>
			<!--logo end -->
					</div>
	</header>
	<!-- header end -->	
<!-- Left sidebar menu start -->
<div class="ttr-sidebar">
    <div class="ttr-sidebar-wrapper content-scroll">
        <!-- side menu logo start -->
        <div class="ttr-sidebar-logo">
            <a href="javascript:void(0);">NAVIGATION</a>
            <!-- <div class="ttr-sidebar-pin-button" title="Pin/Unpin Menu">
                <i class="material-icons ttr-fixed-icon">gps_fixed</i>
                <i class="material-icons ttr-not-fixed-icon">gps_not_fixed</i>
            </div> -->
            <div class="ttr-sidebar-toggle-button">
                <i class="ti-arrow-left"></i>
            </div>
        </div>
        <!-- side menu logo end -->
        <!-- sidebar menu start -->
        <nav class="ttr-sidebar-navi">
             
                <ul>
                    <li>
                        <a href="login.php" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa fa-sign-in"></i></span>
                            <span class="ttr-label">Login</span>
                        </a>
                    </li>		
                    <li>
                        <a href="https://forms.gle/E74R2QDrTMxzyKQn7" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa fa-user-plus"></i></span>
                            <span class="ttr-label">Apply for Resident Account </span>
                        </a>
                    </li>		
                    <li>
                        <a href="forgot-password.php" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa fa-unlock"></i></span>
                            <span class="ttr-label">Forgot Password</span>
                        </a>
                    </li>
                    <li class="ttr-seperate"></li>
                    <li>
                        <a href="rules.php" class="ttr-material-button">
                            <span class="ttr-icon"><i class="fa fa-gavel"></i></span>
                            <span class="ttr-label">Rules and Regulation</span>
                        </a>
                    </li>
                    <li>
                    <a href="#" class="ttr-material-button" id="mapButton">
                    <span class="ttr-icon"><i class="fa fa-map"></i></span>
                    <span class="ttr-label"> Map</span>
                </a>
            </li>
                    </li>	
                </ul>
                </nav>
                   <!-- sidebar menu end -->
        <!-- sidebar menu end -->
    </div>
</div>
<div class="image-popup" id="imagePopup">
    <span class="close-button" onclick="closeImagePopup()">&times;</span>
    <img id="popupImage" src="assets/images/map.png" alt="Popup Image">
</div>
<!-- Left sidebar menu end -->
	<!--Main container start -->			
	<main class="ttr-wrapper">
		<div class="container-fluid">
        <div class="portal-title ">
                <h4><i class="fa fa-university"></i> Resident Portal</h4>
                <hr>
            </div>		
			<div class="row">
				<div class="col-lg-5 m-b30">
					<div class="widget-box">				
						<div class="wc-title ">
							<h4><i class="fa fa-sign-in"></i> Login your account</h4>
						</div>
                        <div class="widget-inner edit-profile">
						   
							
                            <form class=" m-b30" method="POST" autocomplete="off">
    <div class="row">
        <div class="form-group col-12">
            <!-- The existing content in this div is empty, you can add additional content if needed -->
        </div>
        <div class="form-group col-12">
        <label class="col-form-label" style="font-family:  Times New Roman;">Email Address</label>

            <div>
                <input type="text" class="form-control" name="emailcont" required="true" placeholder="" required="true">
            </div>
        </div>
        <div class="form-group col-12">
        <label class="col-form-label" style="font-family:  Times New Roman;">Password</label>
            <div>
                <input type="password" class="form-control" name="password" placeholder="" required="true">
                <span class="help text-center"style="font-family:  Times New Roman;"><a href="forgot-password.php">Forgot Password?</a></span>
            </div>
        </div>
        <div class="col-12">
            <button type="submit"   class="btn" style="font-family:  Times New Roman;" name="btnlogin" id="btnlogin">Login</button>
        </div>
        <div class="seperator"></div>
        <div class="col-12 m-t20">
            <div class="ml-auto m-b5" style="font-family:  Times New Roman;">
                Don't have an account? <a href="https://forms.gle/E74R2QDrTMxzyKQn7">Click here</a>
            </div>
        </div>
    </div>
</form>



                            <hr>
							
						</div>																		                																																		
					</div>
				</div>

                <div class="col-lg-7 m-b30">
    <div class="widget-box">
        <div class="wc-title">
        <h4><i class="fa fa-info-circle"></i> Website Guide</h4>
        </div>
        <div class="widget-inner">						
            <ul style="padding-left: 15px;">
                <li style="padding-bottom: 15px; font-family:  Times New Roman;  font-size: 18px;"><strong>Applying for an Account.</strong>
                    <ul style="padding-left: 50px;text-align:left;">										
                        <li>Provide the requested information to admin</li>
                        <li>Make sure to provide working email address</li>
                        <li>Enter the information in the required format</li>
                        <li>Only resident with valid record on subdivision can register</li>
                       
                    </ul>
                </li>
                <li style="padding-bottom: 15px; font-family:  Times New Roman;  font-size: 18px;"><strong>Trouble logging into your account?</strong>
                    <ul style="padding-left: 50px;text-align:left;">										
                        <li>Account must be activated</li>
                        <li>Make sure to enter valid email address and password</li>
                        <li>Information must match our record</li>
                        <li>Forgot your password? Click <a href="forgot-password.php">here</a> to recover.</li>
                    </ul>
                </li>
               <hr></hr>
            </ol>
        </div>
    </div>
</div>
			</div>
		</div>
	</main>

    <div class="ttr-overlay"></div>


    <!-- External JavaScripts -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/vendors/js/popper.min.js"></script>
    <script src="assets/vendors/js/bootstrap.min.js"></script>
    <script src='assets/vendors/scrollbar.min.js'></script>
    <script src="assets/vendors/chart.min.js"></script>
    <script src="assets/js/admin.js"></script></body>

    <script>
    // JavaScript for handling the click event and showing the image popup
    document.getElementById('mapButton').addEventListener('click', function() {
        // Show the image popup
        document.getElementById('imagePopup').style.display = 'block';
    });

</script>
<script>
   var currentZoomLevel = 1.0;
var zoomStep = 0.1;
var isDragging = false;
var dragStartX, dragStartY, initialX, initialY;

function showImagePopup() {
    document.getElementById('imagePopup').style.display = 'block';
}

function closeImagePopup() {
    var image = document.getElementById('popupImage');
    document.getElementById('imagePopup').style.display = 'none';
    currentZoomLevel = 1.0;
    isDragging = false;
    image.style.transform = 'scale(' + currentZoomLevel + ')';
    image.style.left = '0px';
    image.style.top = '0px';
}

function handleZoom(event) {
    event.preventDefault();
    var image = document.getElementById('popupImage');
    var deltaY = event.deltaY || event.detail || event.wheelDelta;

    if (deltaY > 0) {
        currentZoomLevel -= zoomStep;
    } else {
        currentZoomLevel += zoomStep;
    }

    image.style.transform = 'scale(' + currentZoomLevel + ')';
}

function handleDragStart(event) {
    if (currentZoomLevel > 1.0) {
        return;
    }
    isDragging = true;
    dragStartX = event.clientX;
    dragStartY = event.clientY;
    initialX = dragStartX - parseFloat(window.getComputedStyle(document.getElementById('popupImage')).left);
    initialY = dragStartY - parseFloat(window.getComputedStyle(document.getElementById('popupImage')).top);
}

function handleDragMove(event) {
    if (!isDragging) return;
    var image = document.getElementById('popupImage');
    var offsetX = event.clientX - dragStartX;
    var offsetY = event.clientY - dragStartY;
    var newLeft = initialX + offsetX;
    var newTop = initialY + offsetY;

    image.style.left = newLeft + 'px';
    image.style.top = newTop + 'px';
}

function handleDragEnd() {
    isDragging = false;
}

document.getElementById('mapButton').addEventListener('click', function () {
    showImagePopup();
});

document.getElementById('popupImage').addEventListener('wheel', handleZoom);
document.getElementById('popupImage').addEventListener('mousedown', handleDragStart);
document.addEventListener('mousemove', handleDragMove);
document.addEventListener('mouseup', handleDragEnd);

</script>

</html>