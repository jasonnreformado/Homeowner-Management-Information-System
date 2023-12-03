<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $time=$_POST['time'];
     
    $query=mysqli_query($con, "insert into tblcontact(FirstName,LastName,Phone,Email,address,subject,time,Message) value('$fname','$lname','$phone','$email','$address','$subject','$time','$message')");
    if ($query) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='complaint.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
?>
<!doctype html>
<html lang="en">
  <head>
 

    <title>Villa Arcadia | Complaint</title>

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
<br><br><br>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
  
        <div class="container">
        <div class="text-center">
    <h3>Request Maintenance</h3>
</div><br><br>
            <div class="d-grid contact-view">
               
                    
               <?php  ?> </div>
                <div class="map-content-9 mt-lg-0 mt-4">
                    <form method="post">
                    <?php
$uid=$_SESSION['bpmsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <div class="twice-two">
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required="">
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required="">
                        </div>
                        <div class="twice-two">
                          
                           <input type="text" class="form-control" placeholder="Phone" required="" name="phone" pattern="[0-9]+" maxlength="10">
                           <input type="text" class="form-control" name="email" value="<?php  echo $row['Email'];?>"  readonly="true">
                           
                        </div>
                        <div class="twice-two">
                        <input type="text" class="form-control" name="address" value="<?php  echo $row['address'];?>"  readonly="true">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
                        </div>

                        <div class="twice-two">
                        <input type="time" class="form-control" name="time" id="time" placeholder="Time" required="">
                        </div>
                        
                        
                        <textarea class="form-control" id="message" name="message" placeholder="Description of Request" required=""></textarea>
                        <?php }?>
                        <button type="submit" class="btn btn-contact" name="submit">Send Message</button>
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
</script>
<!-- /move top -->
</body>

</html>