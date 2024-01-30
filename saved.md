<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (empty($_SESSION['bpmsuid'])) {
    // Redirect or handle the case where the user is not logged in
} else {
    $uid = $_SESSION['bpmsuid'];

    if (isset($_POST['submit'])) {

        $monthly = mysqli_real_escape_string($con, $_POST['monthly']);
        $total_fee = mysqli_real_escape_string($con, $_POST[$monthly.'_total_fee']);
        $total_paid = mysqli_real_escape_string($con, $_POST[$monthly.'_total_paid']);
        $balance = mysqli_real_escape_string($con, $_POST[$monthly.'_balance']);
        $paid = mysqli_real_escape_string($con, $_POST['paid']);

        $query = "UPDATE tbluser SET {$monthly}_total_fee='$total_fee', {$monthly}_total_paid='$total_paid', {$monthly}_balance='$balance', paid='$paid' WHERE ID='$uid'";

        $result = mysqli_query($con, $query);

        if ($result) {
            echo '<script>alert("Profile updated successfully.")</script>';
            echo '<script>window.location.href="monthly_record.php"</script>';
        } else {
            echo '<script>alert("Something Went Wrong. Please try again.")</script>';
        }
    }

    // Check if the "Paid" button is clicked
    if (isset($_POST['mark_as_paid'])) {
        $paid = mysqli_real_escape_string($con, $_POST['paid']);
    
        // Fetch the selected month from the form
        $monthly = mysqli_real_escape_string($con, $_POST['monthly']);
    
        // Fetch current balance and total_paid values from the database
        $fetchQuery = "SELECT {$monthly}_balance, {$monthly}_total_paid FROM tbluser WHERE ID='$uid'";
        $fetchResult = mysqli_query($con, $fetchQuery);
        $fetchRow = mysqli_fetch_assoc($fetchResult);
        $currentBalance = $fetchRow["{$monthly}_balance"];
        $currentTotalPaid = $fetchRow["{$monthly}_total_paid"];
    
        // Calculate new values
        $newTotalPaid = $currentTotalPaid + $paid;
        $newBalance = $currentBalance - $paid;
    
        // Update the database with new values
        $updateQuery = "UPDATE tbluser SET {$monthly}_total_paid='$newTotalPaid', {$monthly}_balance='$newBalance', paid='0' WHERE ID='$uid'";
        $updateResult = mysqli_query($con, $updateQuery);
    
        if ($updateResult) {
            echo '<script>alert("Payment marked as paid successfully.")</script>';
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
            <div class="map-content-9 mt-lg-0 mt-4" id="printableTable">
                <form method="post" name="signup" onsubmit="return checkpass();" enctype="multipart/form-data">
                    <?php
                    $uid = $_SESSION['bpmsuid'];
                    $ret = mysqli_query($con, "select * from tbluser where ID='$uid'");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                    <table class="table" id="januaryForm" style="display:none;">
                        <!-- January Form -->
                        <input type="hidden" name="monthly" value="January">
                        <tr>
                            <td><label>January Total Fee</label></td>
                            <td><input type="text" class="form-control" name="january_total_fee" value="<?php echo $row['January_total_fee']; ?>" required="true"></td>
                        </tr>
                        <tr>
                            <td><label>January Total Paid</label></td>
                            <td><input type="text" class="form-control" name="january_total_paid" value="<?php echo $row['January_total_paid']; ?>" readonly="true"></td>
                        </tr>
                        <tr>
                            <td><label>January Balance</label></td>
                            <td><input type="text" class="form-control" name="january_balance" value="<?php echo $row['January_balance']; ?>" readonly="true"></td>
                        </tr>
                       
                        <!-- ... (existing code for January) ... -->
                    </table>

                    <table class="table" id="februaryForm" style="display:none;">
                        <!-- February Form -->
                        <input type="hidden" name="monthly" value="February">
                        <tr>
                        <td><label>February Total Fee</label></td>
                        <td><input type="text" class="form-control" name="february_total_fee" value="<?php echo $row['February_total_fee']; ?>" required="true"></td>
                    </tr>
                    <tr>
                        <td><label>February Total Paid</label></td>
                        <td><input type="text" class="form-control" name="february_total_paid" value="<?php echo $row['February_total_paid']; ?>" readonly="true"></td>
                    </tr>
                    <tr>
                        <td><label>February Balance</label></td>
                        <td><input type="text" class="form-control" name="february_balance" value="<?php echo $row['February_balance']; ?>" readonly="true"></td>
                    </tr>
                        <!-- ... (existing code for February) ... -->
                    </table>

                    <table class="table" id="marchForm" style="display:none;">
                    <!-- March Form -->
                    <input type="hidden" name="monthly" value="March">
                    <tr>
                        <td><label>March Total Fee</label></td>
                        <td><input type="text" class="form-control" name="march_total_fee" value="<?php echo $row['March_total_fee']; ?>" required="true"></td>
                    </tr>
                    <tr>
                        <td><label>March Total Paid</label></td>
                        <td><input type="text" class="form-control" name="march_total_paid" value="<?php echo $row['March_total_paid']; ?>" readonly="true"></td>
                    </tr>
                    <tr>
                        <td><label>March Balance</label></td>
                        <td><input type="text" class="form-control" name="march_balance" value="<?php echo $row['March_balance']; ?>" readonly="true"></td>
                    </tr>
                    <!-- ... (existing code for March) ... -->
                </table>

                                <!-- April Form -->
                <table class="table" id="aprilForm" style="display:none;">
                    <input type="hidden" name="monthly" value="April">
                    <tr>
                        <td><label>April Total Fee</label></td>
                        <td><input type="text" class="form-control" name="april_total_fee" value="<?php echo $row['April_total_fee']; ?>" required="true"></td>
                    </tr>
                    <tr>
                        <td><label>April Total Paid</label></td>
                        <td><input type="text" class="form-control" name="april_total_paid" value="<?php echo $row['April_total_paid']; ?>" readonly="true"></td>
                    </tr>
                    <tr>
                        <td><label>April Balance</label></td>
                        <td><input type="text" class="form-control" name="april_balance" value="<?php echo $row['April_balance']; ?>" readonly="true"></td>
                    </tr>
                    <!-- ... (existing code for April) ... -->
                </table>

                                <!-- June Form -->
                <table class="table" id="juneForm" style="display:none;">
                    <input type="hidden" name="monthly" value="June">
                    <tr>
                        <td><label>June Total Fee</label></td>
                        <td><input type="text" class="form-control" name="june_total_fee" value="<?php echo $row['June_total_fee']; ?>" required="true"></td>
                    </tr>
                    <tr>
                        <td><label>June Total Paid</label></td>
                        <td><input type="text" class="form-control" name="june_total_paid" value="<?php echo $row['June_total_paid']; ?>" readonly="true"></td>
                    </tr>
                    <tr>
                        <td><label>June Balance</label></td>
                        <td><input type="text" class="form-control" name="june_balance" value="<?php echo $row['June_balance']; ?>" readonly="true"></td>
                    </tr>
                    <!-- ... (existing code for June) ... -->
                </table>

                <!-- July Form -->
                <table class="table" id="julyForm" style="display:none;">
                    <input type="hidden" name="monthly" value="July">
                    <tr>
                        <td><label>July Total Fee</label></td>
                        <td><input type="text" class="form-control" name="july_total_fee" value="<?php echo $row['July_total_fee']; ?>" required="true"></td>
                    </tr>
                    <tr>
                        <td><label>July Total Paid</label></td>
                        <td><input type="text" class="form-control" name="july_total_paid" value="<?php echo $row['July_total_paid']; ?>" readonly="true"></td>
                    </tr>
                    <tr>
                        <td><label>July Balance</label></td>
                        <td><input type="text" class="form-control" name="july_balance" value="<?php echo $row['July_balance']; ?>" readonly="true"></td>
                    </tr>
                    <!-- ... (existing code for July) ... -->
                </table>

                <table class="table" id="augustForm" style="display:none;">
                <input type="hidden" name="monthly" value="August">
                <tr>
                    <td><label>August Total Fee</label></td>
                    <td><input type="text" class="form-control" name="august_total_fee" value="<?php echo $row['August_total_fee']; ?>" required="true"></td>
                </tr>
                <tr>
                    <td><label>August Total Paid</label></td>
                    <td><input type="text" class="form-control" name="august_total_paid" value="<?php echo $row['August_total_paid']; ?>" readonly="true"></td>
                </tr>
                <tr>
                    <td><label>August Balance</label></td>
                    <td><input type="text" class="form-control" name="august_balance" value="<?php echo $row['August_balance']; ?>" readonly="true"></td>
                </tr>
                <!-- ... (existing code for August) ... -->
            </table>
                                <!-- September Form -->
            <table class="table" id="septemberForm" style="display:none;">
                <input type="hidden" name="monthly" value="September">
                <tr>
                    <td><label>September Total Fee</label></td>
                    <td><input type="text" class="form-control" name="september_total_fee" value="<?php echo $row['September_total_fee']; ?>" required="true"></td>
                </tr>
                <tr>
                    <td><label>September Total Paid</label></td>
                    <td><input type="text" class="form-control" name="september_total_paid" value="<?php echo $row['September_total_paid']; ?>" readonly="true"></td>
                </tr>
                <tr>
                    <td><label>September Balance</label></td>
                    <td><input type="text" class="form-control" name="september_balance" value="<?php echo $row['September_balance']; ?>" readonly="true"></td>
                </tr>
                <!-- ... (existing code for September) ... -->
            </table>

            

<!-- ... (existing code) ... -->

<!-- October Form -->
            <table class="table" id="octoberForm" style="display:none;">
            <input type="hidden" name="monthly" value="October">
            <tr>
                <td><label>October Total Fee</label></td>
                <td><input type="text" class="form-control" name="october_total_fee" value="<?php echo $row['October_total_fee']; ?>" required="true"></td>
            </tr>
            <tr>
                <td><label>October Total Paid</label></td>
                <td><input type="text" class="form-control" name="october_total_paid" value="<?php echo $row['October_total_paid']; ?>" readonly="true"></td>
            </tr>
            <tr>
                <td><label>October Balance</label></td>
                <td><input type="text" class="form-control" name="october_balance" value="<?php echo $row['October_balance']; ?>" readonly="true"></td>
            </tr>
            <!-- ... (existing code for October) ... -->
        </table>


                   <!-- ... (existing code) ... -->

<!-- November Form -->
<table class="table" id="novemberForm" style="display:none;">
    <input type="hidden" name="monthly" value="November">
    <tr>
        <td><label>November Total Fee</label></td>
        <td><input type="text" class="form-control" name="november_total_fee" value="<?php echo $row['November_total_fee']; ?>" required="true"></td>
    </tr>
    <tr>
        <td><label>November Total Paid</label></td>
        <td><input type="text" class="form-control" name="november_total_paid" value="<?php echo $row['November_total_paid']; ?>" readonly="true"></td>
    </tr>
    <tr>
        <td><label>November Balance</label></td>
        <td><input type="text" class="form-control" name="november_balance" value="<?php echo $row['November_balance']; ?>" readonly="true"></td>
    </tr>
    <!-- ... (existing code for November) ... -->
</table>

<!-- December Form -->
<table class="table" id="decemberForm" style="display:none;">
    <input type="hidden" name="monthly" value="December">
    <tr>
        <td><label>December Total Fee</label></td>
        <td><input type="text" class="form-control" name="december_total_fee" value="<?php echo $row['December_total_fee']; ?>" required="true"></td>
    </tr>
    <tr>
        <td><label>December Total Paid</label></td>
        <td><input type="text" class="form-control" name="december_total_paid" value="<?php echo $row['December_total_paid']; ?>" readonly="true"></td>
    </tr>
    <tr>
        <td><label>December Balance</label></td>
        <td><input type="text" class="form-control" name="december_balance" value="<?php echo $row['December_balance']; ?>" readonly="true"></td>
    </tr>
    <!-- ... (existing code for December) ... -->
</table>

<script>
    function showForm() {
        var selectedMonth = document.getElementById('monthlySelector').value;

        // Hide all month forms initially
        var allMonthForms = document.querySelectorAll('.monthly-forms');
        allMonthForms.forEach(function(monthForm) {
            monthForm.style.display = 'none';
        });

        // Show the selected month form
        var selectedMonthForm = document.getElementById(selectedMonth.toLowerCase() + 'Form');
        if (selectedMonthForm) {
            selectedMonthForm.style.display = 'block';
        }
    }
</script>

<form action="" method="post">
    <table>
        <tr>
            <td><label>Select Month:</label></td>
            <td>
                <select class="form-control" name="monthly" id="monthlySelector" onchange="showForm()" required="true">
                    <option value="January" <?php if($row['monthly'] == 'January') echo 'selected'; ?>>January</option>
                    <option value="February" <?php if($row['monthly'] == 'February') echo 'selected'; ?>>February</option>
                    <option value="March" <?php if($row['monthly'] == 'March') echo 'selected'; ?>>March</option>
                    <option value="April" <?php if($row['monthly'] == 'April') echo 'selected'; ?>>April</option>
                    <option value="May" <?php if($row['monthly'] == 'May') echo 'selected'; ?>>May</option>
                    <option value="June" <?php if($row['monthly'] == 'June') echo 'selected'; ?>>June</option>
                    <option value="July" <?php if($row['monthly'] == 'July') echo 'selected'; ?>>July</option>
                    <option value="August" <?php if($row['monthly'] == 'August') echo 'selected'; ?>>August</option>
                    <option value="September" <?php if($row['monthly'] == 'September') echo 'selected'; ?>>September</option>
                    <option value="October" <?php if($row['monthly'] == 'October') echo 'selected'; ?>>October</option>
                    <option value="November" <?php if($row['monthly'] == 'November') echo 'selected'; ?>>November</option>
                    <option value="December" <?php if($row['monthly'] == 'December') echo 'selected'; ?>>December</option>
                </select>
            </td>
        </tr>

        <!-- January Fields -->
        <tr class="January-fields month-fields" style="<?php echo ($row['monthly'] == 'January') ? '' : 'display: none;'; ?>">
            <!-- Your January fields -->
            <td><label>January Total Fee</label></td>
            <td><input type="text" class="form-control" name="january_total_fee" value="<?php echo $row['January_total_fee']; ?>" required="true"></td>
            <!-- Add other January fields as needed -->
        </tr>

        <!-- February Fields -->
        <tr class="February-fields month-fields" style="<?php echo ($row['monthly'] == 'February') ? '' : 'display: none;'; ?>">
            <!-- Your February fields -->
            <td><label>February Total Fee</label></td>
            <td><input type="text" class="form-control" name="february_total_fee" value="<?php echo $row['February_total_fee']; ?>" required="true"></td>
            <!-- Add other February fields as needed -->
        </tr>

        <tr class="March-fields month-fields" style="<?php echo ($row['monthly'] == 'March') ? '' : 'display: none;'; ?>">
            <!-- Your February fields -->
            <td><label>March Total Fee</label></td>
            <td><input type="text" class="form-control" name="march_total_fee" value="<?php echo $row['March_total_fee']; ?>" required="true"></td>
            <!-- Add other February fields as needed -->
        </tr>

        <!-- Add similar sections for other months -->

        <tr>
            <td><label>Input Payment</label></td>
            <td><input type="text" class="form-control" name="paid" id="paid" value="<?php echo $row['paid']; ?>" required="true"></td>
        </tr>

        <!-- Add other common fields -->

        <br>
        <button type="submit" class="btn btn-primary" name="submit">Save Change</button>
        <button type="submit" class="btn btn-success" name="mark_as_paid">Paid</button>
        <button type="button" class="btn btn-warning" onclick="resetForm()">Reset</button>
    </table>
</form>

<script>
    function showForm() {
        var selectedMonth = document.getElementById('monthlySelector').value;

        // Hide all month fields initially
        var allMonthFields = document.querySelectorAll('.month-fields');
        allMonthFields.forEach(function(monthField) {
            monthField.style.display = 'none';
        });

        // Show the selected month fields
        var selectedMonthFields = document.querySelector('.' + selectedMonth + '-fields');
        if (selectedMonthFields) {
            selectedMonthFields.style.display = '';
        }
    }
</script>

<script>
    function moveBalanceToPaid() {
        var balanceField = document.getElementById('paid');
        var totalPaidField = document.getElementById('total_paid');

        // Move balance value to total paid field
        totalPaidField.value = balanceField.value;

        // Update balance field to 0
        balanceField.value = 0;
    }

    function resetForm() {
        // Reset input fields dynamically
        var monthlyValue = document.getElementsByName("monthly")[0].value;

        document.getElementsByName(monthlyValue + "_total_fee")[0].value = "0";
        document.getElementsByName(monthlyValue + "_total_paid")[0].value = "0";
        document.getElementsByName(monthlyValue + "_balance")[0].value = "0";
        document.getElementsByName("paid")[0].value = "0";
    }

    function updateBalance(totalFee) {
        // Update the "Balance" field to have the same value as the "Total Fee"
        document.getElementById('balance').value = totalFee;
    }

    function showForm() {
        var selectedMonth = document.getElementById('monthlySelector').value;
        var januaryForm = document.getElementById('januaryForm');
        var februaryForm = document.getElementById('februaryForm');
        var marchForm = document.getElementById('marchForm');

        if (selectedMonth === 'January') {
            januaryForm.style.display = 'block';
            februaryForm.style.display = 'none';
            marchForm.style.display = 'none';
        } else if (selectedMonth === 'February') {
            januaryForm.style.display = 'none';
            februaryForm.style.display = 'block';
            marchForm.style.display = 'none';
        }else if (selectedMonth === 'February') {
            januaryForm.style.display = 'none';
            februaryForm.style.display = 'none';
            marchForm.style.display = 'none';
        // Add similar blocks for other months if needed
    }
}
</script>

        

</div>  </div>
                <!--footer-->
           
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
 <!-- Add this script in the head section of your HTML -->

</body>
</html>
<?php  } ?>