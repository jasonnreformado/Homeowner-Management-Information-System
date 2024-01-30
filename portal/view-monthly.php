<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (empty($_SESSION['bpmsuid'])) {
    // Redirect or handle the case where the user is not logged in
} else 
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
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="row">               
            <div class="col-lg-12 m-b30">                  
                <div class="widget-box">				
                    <div class="widget-inner">    
                        <div class="table-responsive">     
                            <small>                    
                                <table id="enrolledsubjects" class="table table-striped table-bordered " style="width:100%; ">
                                    <thead class="bg-success">
                                    <tr class="text-center">
                                    <td class="align-middle font-weight-bold">Monthly of</td>
                                    <td class="align-middle font-weight-bold">Total Fee</td>				
                                    <td class="align-middle font-weight-bold">Total Paid</td>
                                    <td class="align-middle font-weight-bold">Balance</td>
                                </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $uid = $_SESSION['bpmsuid'];
                                        $ret = mysqli_query($con, "select * from tbluser where ID='$uid'");
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <tr class="text-center">
                                                <td class="align-middle">January</td>
                                                <td class="align-middle"><?php echo $row['January_total_fee']; ?></td>
                                                <td class="align-middle"><?php echo $row['January_total_paid']; ?></td>
                                                <td class="align-middle text-danger"><b><?php echo $row['January_balance']; ?></b></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="align-middle">February</td>
                                                <td class="align-middle"><?php echo $row['February_total_fee']; ?></td>
                                                <td class="align-middle"><?php echo $row['February_total_paid']; ?></td>
                                                <td class="align-middle text-danger"><b><?php echo $row['February_balance']; ?></b></td>
                                            </tr>

                                            <tr class="text-center">
                                                <td class="align-middle">March</td>
                                                <td class="align-middle"><?php echo $row['March_total_fee']; ?></td>
                                                <td class="align-middle"><?php echo $row['March_total_paid']; ?></td>
                                                <td class="align-middle text-danger"><b><?php echo $row['March_balance']; ?></b></td>
                                            </tr>

                                        
                                           
                                           

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


                        
                  
            
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