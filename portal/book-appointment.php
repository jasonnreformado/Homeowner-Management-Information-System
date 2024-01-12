<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['bpmsuid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $uid = $_SESSION['bpmsuid'];
        $adate = $_POST['adate'];
        $atime = $_POST['atime'];
        $endtime = $_POST['endtime'];
        $msg = $_POST['message'];
        $aptnumber = mt_rand(100000000, 999999999);

        // Check if the selected date and time range is available for the specific activity
        $checkQuery = mysqli_query($con, "SELECT AptTime, endTime FROM tblbook WHERE AptDate = '$adate' AND (
            ('$atime' >= AptTime AND '$atime' < endTime) OR
            ('$endtime' > AptTime AND '$endtime' <= endTime) 
        ) AND Message = '$msg'");

        if (mysqli_num_rows($checkQuery) > 0) {
            $bookedTimes = array();

            while ($row = mysqli_fetch_assoc($checkQuery)) {
                $bookedTimes[] = $row['AptTime'] . ' - ' . $row['endTime'];
            }

            $unavailableTimes = implode(', ', $bookedTimes);
            echo '<script>alert("Selected date and time slot is already booked for ' . $msg . '. The unavailable times are: ' . $unavailableTimes . '. Please choose another slot.")</script>';
        } else {
            $query = mysqli_query($con, "INSERT INTO tblbook(UserID,AptNumber,AptDate,AptTime,endTime,Message) VALUES('$uid','$aptnumber','$adate','$atime','$endtime','$msg')");

            if ($query) {
                $ret = mysqli_query($con, "SELECT AptNumber FROM tblbook WHERE tblbook.UserID='$uid' ORDER BY ID DESC LIMIT 1;");
                $result = mysqli_fetch_array($ret);
                $_SESSION['aptno'] = $result['AptNumber'];
                echo "<script>window.location.href='thank-you.php'</script>";
            } else {
                echo '<script>alert("Something Went Wrong. Please try again")</script>';
            }
        }
    }
}
?>

<!-- Rest of your HTML code remains unchanged -->


<!doctype html>
<html lang="en">
  <head>
 

    <title>Villa Arcadia | Reservation Page</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body id="home">


<script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
<!--bootstrap working-->
<script src="assets/js/bootstrap.min.js"></script>
<!-- //bootstrap working-->
<!-- disable body scroll which navbar is in active -->
<script>
$(function () {
  $('.navbar-toggler').click(function () {
    $('body').toggleClass('noscroll');
  })
});
</script>
<!-- disable body scroll which navbar is in active -->

<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
   
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="user-dashboard.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Book Appointment</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">

            <div class="d-grid contact-view">
                <div class="cont-details">
                  
                   
                    </div>
               <?php  ?> </div>
                <div class="map-content-9 mt-lg-0 mt-4">
                <form method="post">
    <div style="padding-top: 30px;">
        <label>Appointment Date</label>
        <input type="date" class="form-control appointment_date" placeholder="Date" name="adate" id='adate' required="true">
    </div>

    <div style="padding-top: 30px;">
        <label>Start Time</label>
        <input type="time" class="form-control appointment_time" placeholder="Time" name="atime" id='atime' required="true">
    </div>

    <div style="padding-top: 30px;">
        <label>End Time</label>
        <input type="time" class="form-control appointment_time" placeholder="Time" name="endtime" id='endtime' required="true">
    </div>

    <div style="padding-top: 30px;">
        <label>Message ↓</label>
        <select class="form-control" id="message" name="message" required="">
            <option value="Basketball Court">Basketball Court</option>
            <option value="Club House">Club House</option>
            <option value="Table">Table</option>
            <option value="Chairs">Chairs</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <button type="submit" class="btn btn-contact" name="submit">Make an Appointment</button>
</form>

                </div>
    </div>
   
    </div></div>
</section>

<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
	<span class="fa fa-long-arrow-up"></span>
</button>
<script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function () {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("movetop").style.display = "block";
		} else {
			document.getElementById("movetop").style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#adate').attr('min', maxDate);
});</script>
<!-- /move top -->

</body>

</html><?php  ?>