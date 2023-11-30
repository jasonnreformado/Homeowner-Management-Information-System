<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $uid=$_SESSION['bpmsuid'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $query=mysqli_query($con, "update tbluser set FirstName='$fname', LastName='$lname' where ID='$uid'");


    if ($query) {
 echo '<script>alert("Profile updated successully.")</script>';
echo '<script>window.location.href=profile.php</script>';
  }
  else
    {
     
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

}


  ?>
<!doctype html>
<html lang="en">
  <head>
 

    <title>SAM'S SALON AND SPA | Signup Page</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body id="home">
<?php include_once('includes/header.php');?>

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

<!-- breadcrumbs //-->

                <div class="map-content-9 mt-lg-0 mt-4">
                    <h3>User Profile!!</h3>
                    <form method="post" name="signup" onsubmit="return checkpass();">
<?php
$uid=$_SESSION['bpmsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <div style="padding-top: 30px;">
                            <label>First Name</label>
                            
                            <input type="text" class="form-control" name="firstname" value="<?php  echo $row['FirstName'];?>" required="true"></div>
                           <div style="padding-top: 30px;">
                            <label>Last Name</label>
                            
                            <input type="text" class="form-control" name="lastname" value="<?php  echo $row['LastName'];?>" required="true">
                        </div>
                        <div style="padding-top: 30px;">
                            <label>Mobile Number</label>
                           
                           <input type="text" class="form-control" name="mobilenumber" value="<?php  echo $row['MobileNumber'];?>"  readonly="true"></div>
                           <div style="padding-top: 30px;">
                            <label>Email address</label>
                            
                            <input type="text" class="form-control" name="email" value="<?php  echo $row['Email'];?>"  readonly="true">
                        </div>
                         <div style="padding-top: 30px;">
                            <label>Registration Date</label>
                           
                           <input type="text" class="form-control" name="regdate" value="<?php  echo $row['RegDate'];?>"  readonly="true">
                       </div>
                     
                      <?php }?>
                        <button type="submit" class="btn btn-contact" name="submit">Save Change</button>
                    </form>
                </div>
    </div>
   
    </div></div>
</section>
<?php include_once('includes/footer.php');?>
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
<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
</body>

</html><?php } ?>