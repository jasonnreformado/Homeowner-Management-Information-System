<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {

    $cid = $_GET['viewid'];
    $remark = $_POST['remark'];
    $status = $_POST['status'];

    $query = mysqli_query($con, "UPDATE tblbook SET Remark='$remark', Status='$status' WHERE ID='$cid'");
    if ($query) {

        // Retrieve user information and reservation details
        $userQuery = mysqli_query($con, "SELECT tbluser.Email, tbluser.FirstName, tblbook.AptNumber, tblbook.AptDate, tblbook.AptTime, tblbook.endTime, tblbook.Message, tblbook.BookingDate FROM tbluser JOIN tblbook ON tbluser.ID = tblbook.UserID WHERE tblbook.ID='$cid'");
        $userRow = mysqli_fetch_assoc($userQuery);
        $userEmail = $userRow['Email'];
        $userName = $userRow['FirstName'];
        $reservationNumber = $userRow['AptNumber'];
        $appointmentDate = $userRow['AptDate'];
        $startTime = $userRow['AptTime'];
        $endTime = $userRow['endTime'];
        $message = $userRow['Message'];
        $bookingDate = $userRow['BookingDate'];

        // Send email to the user using PHPMailer
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Update with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'jasonreformado46@gmail.com'; // Update with your email
        $mail->Password = 'zgeg fjhg qknl gpvh   '; // Update with your email password
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->isHTML(true);

        $mail->setFrom('your_email@example.com', 'Villa Arcadia Subdivision'); // Replace with your email and name
        $mail->addAddress($userEmail, $userName);
        $mail->Subject = 'Reservation Status Update';
        $mail->Body = "Dear $userName,\n\nWe hope this email finds you well. We would like to inform you that your Amenity Reservation for $message has been $status. Thank you for choosing Villa Arcadia for your reservation. If you have any questions or concerns, please feel free to contact us.\n\nBest regards,\nThe Villa Arcadia Team.";

        try {
            $mail->send();
            echo '<script>alert("All remarks have been updated.")</script>';
            echo "<script type='text/javascript'> document.location ='all-appointment.php'; </script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Villa Arcadia | View Reservation </title>

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
					<h3 class="title1">View Reservation</h3>
					<div class="table-responsive bs-example widget-shadow">
						
						<h4>View Reservation:</h4>

						<?php
$cid=$_GET['viewid'];
$ret=mysqli_query($con,"select tbluser.FirstName,tbluser.LastName,tbluser.Email,tbluser.MobileNumber,tbluser.address,tbluser.status,tblbook.ID as bid,tblbook.AptNumber,tblbook.AptDate,tblbook.AptTime,tblbook.endTime,tblbook.Message,tblbook.BookingDate,tblbook.Remark,tblbook.Status,tblbook.RemarkDate from tblbook join tbluser on tbluser.ID=tblbook.UserID where tblbook.ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
				  		<table class="table table-bordered">
							<tr>
    <th>Reservation Number</th>
    <td><?php  echo $row['AptNumber'];?></td>
  </tr>
  <tr>
<th>Name</th>
    <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
  </tr>

<tr>
    <th>Email</th>
    <td><?php  echo $row['Email'];?></td>
  </tr>
   <tr>
    <th>Mobile Number</th>
    <td><?php  echo $row['MobileNumber'];?></td>
  </tr>

  <tr>
    <th>Address</th>
    <td><?php  echo $row['address'];?></td>
  </tr>

  <tr>
    <th>Status</th>
    <td><?php  echo $row['status'];?></td>
  </tr>


   <tr>
    <th> Date</th>
    <td><?php  echo $row['AptDate'];?></td>
  </tr>
 
<tr>
    <th>Start Time</th>
    <td><?php  echo $row['AptTime'];?></td>
  </tr>

  tr>
    <th>End Time</th>
    <td><?php  echo $row['endTime'];?></td>
  </tr>
  
  
  <tr>
    <th>Apply Date</th>
    <td><?php  echo $row['BookingDate'];?></td>
  </tr>
  <tr>
    <th>Message</th>
    <td><?php  echo $row['Message'];?></td>
  </tr>
  

<tr>
    <th>Status</th>
    <td> <?php  
if($row['Status']=="")
{
  echo "Not Updated Yet";
}

if($row['Status']=="Selected")
{
  echo "Selected";
}

if($row['Status']=="Rejected")
{
  echo "Rejected";
}

     ;?></td>
  </tr>
						</table>
						<table class="table table-bordered">
							<?php if($row['Status']==""){ ?>


<form name="submit" method="post" enctype="multipart/form-data"> 

<tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
   </tr>

  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="Approved" selected="true">Approved</option>
     <option value="Rejected">Rejected</option>
   </select></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Submit</button></td>
  </tr>
  </form>
<?php } else { ?>
						</table>
						<table class="table table-bordered">
							<tr>
    <th>Remark</th>
    <td><?php echo $row['Remark']; ?></td>
  </tr>
<tr>
    <th>Status</th>
    <td><?php echo $row['Status']; ?></td>
  </tr>

<tr>
<th>Remark date</th>
<td><?php echo $row['RemarkDate']; ?>  </td></tr>

						</table>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		
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
	<script src="js/bootstrap.js"> </script>
</body>
</html>
<?php   ?>