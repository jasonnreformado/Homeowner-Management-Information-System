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


<!DOCTYPE HTML>
<html>
<head>
<title>Villa Arcadia | Profiles</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
                
				<div class="tables">
					<h3 class="title1">My Profile</h3>

					<!--content-->
          <div class="map-content-9 mt-lg-0 mt-4">
                
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
<!--content-->
<br>
		<!--footer-->
		 <?php include_once('includes/footer.php');?>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->

  <script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
</body>
</html>
<?php  } ?>