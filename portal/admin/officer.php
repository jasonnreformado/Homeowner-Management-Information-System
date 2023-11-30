<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if($_GET['delid']){
$sid=$_GET['delid'];
mysqli_query($con,"delete from tbluser where ID ='$sid'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='unreadenq.php'</script>";
          }

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Villa Arcadia | Officer</title>

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
					<h3 class="title1">Officer List</h3>
					
					
                    <form action="" method="get" class="mb-4">
      <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search by name or email">
      
      </div>
    </form>
    <!-- Search form ends here -->

    <div class="text-right">
    <a href="employee/create.php" class="btn btn-secondary" style="background-color: blue; color: white;">
        <i class="bi bi-plus-circle-fill"></i> Add Officer
    </a>
</div>

    <!-- Table starts here -->
    <table class="table class='table table-hover align-middle bg-white ">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email Address</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Role</th>
          <th>Joining Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        # Include connection
        require_once "employee/config.php";

        # Search functionality
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $sql = "SELECT * FROM employees WHERE 
                first_name LIKE '%$search%' OR 
                last_name LIKE '%$search%' OR 
                email LIKE '%$search%'";

        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
              <tr>
                <td><?= $count++; ?></td>
                <td><?= $row["first_name"]; ?></td>
                <td><?= $row["last_name"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["age"]; ?></td>
                <td><?= $row["gender"]; ?></td>
                <td><?= $row["designation"]; ?></td>
                <td><?= $row["joining_date"]; ?></td>
                <td>
                  <a href="employee/update.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">Edit
                    <i class="bi bi-pencil-square"></i>
                  </a>&nbsp;
                  <a href="employee/delete.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm">Delete
                    <i class="bi bi-trash-fill"></i>
                  </a>
                </td>
              </tr>
            <?php
            }
            # Free result set
            mysqli_free_result($result);
          } else { ?>
            <tr>
              <td class="text-center text-danger fw-bold" colspan="9">** No records were found **</td>
            </tr>
        <?php
          }
        }
        # Close connection
        mysqli_close($link);
        ?>
      </tbody>
    </table>
    <!-- Table ends here -->

    <!-- Print Table button starts here -->
    <div class="text-right">
      <button onclick="printTable()" class="btn btn-info">Print Table</button>
    </div>
					
		</div>
		<!--footer-->
    <br><br>
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
	<script src="js/bootstrap.js"> </script>
    <script>
    const delBtnEl = document.querySelectorAll(".btn-danger");
    delBtnEl.forEach(function(delBtn) {
      delBtn.addEventListener("click", function(e) {
        const message = confirm("Are you sure you want to delete this record?");
        if (message == false) {
          e.preventDefault();
        }
      });
    });
  </script>
   <script>
      function printTable() {
        var printContents = document.getElementsByTagName('table')[0].outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
      }
    </script>
</body>
</html>
<?php }  ?>