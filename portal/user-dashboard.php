<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (empty($_SESSION['bpmsuid'])) {
    header('location:logout.php');
} else {
    $uid = $_SESSION['bpmsuid'];

    if (isset($_POST['submit'])) {
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $mobilenumber = $_POST['mobilenumber'];
        $email = $_POST['email'];

        // Check if a new profile picture is uploaded
        $profilePicturePath = '';

        if (!empty($_FILES["profilepicture"]["name"])) {
            // File upload handling (your existing code)
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["profilepicture"]["name"]);

            // ... (rest of your file upload code)

            if (move_uploaded_file($_FILES["profilepicture"]["tmp_name"], $target_file)) {
                $profilePicturePath = $target_file;
            } else {
                echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
            }
        }

        // Only update ProfilePicture if a new picture is uploaded
        $updateProfilePicture = !empty($profilePicturePath) ? ", ProfilePicture='$profilePicturePath'" : "";

        // Update user profile
        $query = mysqli_query($con, "UPDATE tbluser SET FirstName='$fname', LastName='$lname', Email='$email', MobileNumber='$mobilenumber'$updateProfilePicture WHERE ID='$uid'");

        if ($query) {
            echo '<script>alert("Profile updated successfully.")</script>';
            echo '<script>window.location.href="user-dashboard.php"</script>';
        } else {
            echo '<script>alert("Something Went Wrong. Please try again.")</script>';
        }
    }

    // Fetch existing user profile information
    $ret = mysqli_query($con, "SELECT * FROM tbluser WHERE ID='$uid'");
    $cnt = 1;

    if ($row = mysqli_fetch_assoc($ret)) {
        $firstname = $row['FirstName'];
        $lastname = $row['LastName'];
        $mobilenumber = $row['MobileNumber'];
        $email = $row['Email'];
        $profilePicture = $row['ProfilePicture'];
        $address = $row['address'];
        $status = $row['status'];
        $numplp = $row['numplp'];
        $movein = $row['movein'];
        $regdate = $row['RegDate'];
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
    <?php include_once('includes/sidebar.php'); ?>
    <!--left-fixed -navigation-->
    <!-- header-starts -->
    <?php include_once('includes/header.php'); ?>
    <!-- //header-ends -->
    <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
      <div class="tables" id="exampl">
          <h3 class="title1">My Profile</h3>

          <!--content-->
          <div class="map-content-9 mt-lg-0 mt-4">
       

          <form method="post" name="signup" onsubmit="return checkpass();" enctype="multipart/form-data">
              <div id="profile-picture-container">
                <img id="profile-picture-preview" src="<?php echo $profilePicture; ?>" alt="Profile Picture Preview">
                <button type="button" id="change-picture-button" onclick="document.getElementById('profilepicture').click();">
                <i class="fa fa-camera"></i>
                </button>
                <input type="file" class="form-control" id="profilepicture" name="profilepicture" onchange="previewProfilePicture(this);">
              </div>

              <div style="padding-top: 0px;">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname; ?>" >
              </div>

              <div style="padding-top: 30px;">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>" readonly="true">
              </div>

              <div style="padding-top: 30px;">
                <label for="mobilenumber">Mobile Number</label>
                <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php echo $mobilenumber; ?>" readonly="true">
              </div>

              <div style="padding-top: 30px;">
                <label for="email">Email address</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly="true">
              </div>


             <div style="padding-top: 30px;">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" readonly="true">
            </div>

            <div style="padding-top: 30px;">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" name="status" value="<?php echo $status; ?>" readonly="true">
            </div>

            <div style="padding-top: 30px;">
                <label for="numplp">Number of people living in the unit</label>
                <input type="text" class="form-control" id="numplp" name="numplp" value="<?php echo $numplp; ?>" readonly="true">
            </div>

            <div style="padding-top: 30px;">
                <label for="movein">Resident Move-in date</label>
                <input type="date" class="form-control" id="movein" name="movein" value="<?php echo $movein; ?>" readonly="true">
            </div>


            <div style="padding-top: 30px;">
                <label for="regdate">Registration Date</label>
                <input type="text" class="form-control" id="regdate" name="regdate" value="<?php echo $regdate; ?>" readonly="true">
            </div>
                    <?php  ?>
                    <br>    
                    <button type="submit" class="btn btn-primary" name="submit">Save Change</button>
                    <p style="margin-top:1%"  align="center">
  <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
</p>
            </form>
          </div>
        </div>
      </div>
    </div>

<!--content-->

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

    <script>
    function previewProfilePicture(input) {
      var preview = document.getElementById('profile-picture-preview');
      var file = input.files[0];
      var reader = new FileReader();

      reader.onloadend = function () {
        preview.src = reader.result;
      }

      if (file) {
        reader.readAsDataURL(file);
      } else {
        preview.src = "<?php echo $profilePicture; ?>";
      }
    }
  </script>
    <script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
</body>
</html>
<?php   ?>