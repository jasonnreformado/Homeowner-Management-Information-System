<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (empty($_SESSION['bpmsuid'])) {
    // Redirect or handle the case where the user is not logged in
} else {
    $uid = $_SESSION['bpmsuid'];

    if (isset($_POST['submit'])) {
        $fname = mysqli_real_escape_string($con, $_POST['firstname']);
        $lname = mysqli_real_escape_string($con, $_POST['lastname']);
        $mobilenumber = mysqli_real_escape_string($con, $_POST['mobilenumber']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $status = mysqli_real_escape_string($con, $_POST['status']);
        $numplp = mysqli_real_escape_string($con, $_POST['numplp']);
        $movein = mysqli_real_escape_string($con, $_POST['movein']);

        $query = "UPDATE tbluser SET FirstName='$fname', LastName='$lname', MobileNumber='$mobilenumber', Email='$email', address='$address', status='$status', numplp='$numplp', movein='$movein' WHERE ID='$uid'";

        $result = mysqli_query($con, $query);

        if ($result) {
            echo '<script>alert("Profile updated successfully.")</script>';
            echo '<script>window.location.href="view-profiles.php"</script>';
        } else {
            echo '<script>alert("Something Went Wrong. Please try again.")</script>';
        }
    }
}
?>



<!DOCTYPE HTML>
<html>
<head>
<title>Villa Arcadia | Profiles</title>
<script>
    function printTable() {
        var printContents = document.getElementById('printableTable').outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = '<h3 class="title1 text-center">Resident Information</h3>' + printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
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
<style>
    #profile-picture-container {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 30px;
    }

    #profile-picture-preview {
      width: 100px;
      height: 100px;
      border-radius: 50%; /* Make it circular */
      display: block;
    }

    #change-picture-button {
      position: absolute;
      bottom: 0;
      background-color: gray; /* Set your button color */
      color: #FFFFFF; /* Set your button text color */
      border: none;
      padding: 2px;
      cursor: pointer;
      border-radius: 50%;
    }

    #profilepicture {
      display: none; /* Hide the actual file input */
    }

    #camera-icon {
      width: 20px;
      height: 20px;
    }
  </style>
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
                    <h3 class="title1 text-center">Resident Information</h3>

                    <!-- Add a table with an ID for printing -->
                    <div class="map-content-9 mt-lg-0 mt-4" id="printableTable">
                        <form method="post" name="signup" onsubmit="return checkpass();" enctype="multipart/form-data">
                            <?php
                            $uid = $_SESSION['bpmsuid'];
                            $ret = mysqli_query($con, "select * from tbluser where ID='$uid'");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            <table class="table">
                                <tr>
                                    <td><label>First Name</label></td>
                                    <td><input type="text" class="form-control" name="firstname" value="<?php echo $row['FirstName'];?>" required="true"></td>
                                </tr>
                                <tr>
                                    <td><label>Last Name</label></td>
                                    <td><input type="text" class="form-control" name="lastname" value="<?php echo $row['LastName'];?>" required="true"></td>
                                </tr>
                                <tr>
                                    <td><label>Mobile Number</label></td>
                                    <td><input type="text" class="form-control" name="mobilenumber" value="<?php echo $row['MobileNumber'];?>" required="true"></td>
                                </tr>
                                <tr>
                                    <td><label>Email address</label></td>
                                    <td><input type="text" class="form-control" name="email" value="<?php echo $row['Email'];?>" required="true"></td>
                                </tr>
                                <tr>
                                    <td><label>Address</label></td>
                                    <td><input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>" required="true"></td>
                                </tr>
                                <tr>
                                    <td><label>Status</label></td>
                                    <td><input type="text" class="form-control" name="status" value="<?php echo $row['status'];?>" required="true"></td>
                                </tr>
                                <tr>
                                    <td><label>Number of people living in the unit</label></td>
                                    <td><input type="text" class="form-control" name="numplp" value="<?php echo $row['numplp'];?>" required="true"></td>
                                </tr>
                                <tr>
                                    <td><label>Resident Move-in date</label></td>
                                    <td><input type="date" class="form-control" name="movein" value="<?php echo $row['movein'];?>" required="true"></td>
                                </tr>
                                <tr>
                                    <td><label>Registration Date</label></td>
                                    <td><input type="text" class="form-control" name="regdate" value="<?php echo $row['RegDate'];?>" readonly="true"></td>
                                </tr>
                            </table>
                            <?php }?>
                            <br>
                            <button type="submit" class="btn btn-primary" name="submit">Save Change</button>
                        </form>
                    </div>
                </div>
    <div class="text-center">
                    <button onclick="printTable()" class="btn btn-info">Print</button>
                </div>
                <br>
                <!--footer-->
                <?php include_once('includes/footer.php');?>
                <!--//footer-->
            </div>
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
<?php   ?>