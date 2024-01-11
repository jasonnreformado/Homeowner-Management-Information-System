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
        $monthly = mysqli_real_escape_string($con, $_POST['monthly']);
        $total_fee = mysqli_real_escape_string($con, $_POST['total_fee']);
        $total_paid = mysqli_real_escape_string($con, $_POST['total_paid']);
        $balance = mysqli_real_escape_string($con, $_POST['balance']);
  

        $query = "UPDATE tbluser SET FirstName='$fname', LastName='$lname', monthly='$monthly', total_fee='$total_fee', total_paid='$total_paid', balance='$balance' WHERE ID='$uid'";

        $result = mysqli_query($con, $query);

        if ($result) {
            echo '<script>alert("Profile updated successfully.")</script>';
            echo '<script>window.location.href="monthly_record.php"</script>';
        } else {
            echo '<script>alert("Something Went Wrong. Please try again.")</script>';
        }
    }
}
?>



<!DOCTYPE HTML>
<html>
<head>
<title>Villa Arcadia | Edit Balances</title>
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
                    <h3 class="title1 text-center">Account Balance</h3>

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
                                    <td><label>Month of</label></td>
                                    <td><input type="text" class="form-control" name="monthly" value="<?php echo $row['monthly'];?>" readonly="true"></td>
                                </tr>
                                <tr>
                                    <td><label>Total Fee</label></td>
                                    <td><input type="text" class="form-control" name="total_fee" value="<?php echo $row['total_fee'];?>" readonly="true"></td>
                                </tr>
                                <tr>
                                    <td><label>Total Paid</label></td>
                                    <td><input type="text" class="form-control" name="total_paid" value="<?php echo $row['total_paid'];?>" readonly="true"></td>
                                </tr>
                                <tr>
    <td><label>Balance</label></td>
    <td><input type="text" class="form-control" name="balance" value="<?php echo $row['balance'];?>" readonly="true" style="color: red;"></td>
</tr>


                               
                            </table>
                            <?php }?>
                           
                          
                        </form>
                        
                    </div>
                </div>
            
            </div>      
            <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
            <?php include_once('includes/footer.php');?>         
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