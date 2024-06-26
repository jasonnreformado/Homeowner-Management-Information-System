<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html lang="en">
  <head>
 

    <title>Villa Arcadia | Amenity Reservation History</title>

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

       
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="user-dashboard.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
    Amenity Reservation History</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">

            <div>
                <div class="cont-details">
                   <div class="table-content table-responsive cart-table-content m-t-30">
                    <h4 style="padding-bottom: 20px;text-align: center;color: blue;">Amenity Reservation History</h4>
                        <table border="2" class="table">
                        <thead class="gray-bg">
    <tr>
        <th>#</th>
        <th>Reservation Number</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Message</th>
        <th>Status</th>
        <th>Action</th>
       
    </tr>
</thead>
<tbody>
    <?php
    $userid = $_SESSION['bpmsuid'];
    $query = mysqli_query($con, "SELECT tbluser.ID as uid, tbluser.FirstName, tbluser.LastName, tbluser.Email, tbluser.MobileNumber, tblbook.ID as bid, tblbook.AptNumber, tblbook.AptDate, tblbook.AptTime, tblbook.endTime, tblbook.Message, tblbook.Remark, tblbook.BookingDate, tblbook.Status FROM tblbook JOIN tbluser ON tbluser.ID=tblbook.UserID WHERE tbluser.ID='$userid'");
    $cnt = 1;
    while ($row = mysqli_fetch_array($query)) { ?>
               <tr>
    <td><?php echo $cnt;?></td>
<td><?php echo $row['AptNumber'];?></td>
<td><p> <?php echo $row['AptDate']?> </p></td> 
<td><?php echo $row['AptTime']?></td> 
<td><?php echo $row['endTime']?></td> 
<td><?php echo $row['Message']?></td> 

<td><?php $status=$row['Status'];
if($status==''){
 echo "Waiting for confirmation";   
} else{
echo $status;
}
?>  </td>   

            <td><a href="appointment-detail.php?aptnumber=<?php echo $row['AptNumber']; ?>" class="btn btn-primary">View</a>
            
        </tr>
    <?php $cnt = $cnt + 1;
    } ?>
</tbody>
                        </table>
                    </div> </div>
                
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

</html><?php } ?>