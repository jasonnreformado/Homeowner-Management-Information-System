<div class="sticky-header header-section ">
      <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <!--logo -->
        <div class="logo">
          <a >
            <img src="images/logo.png" width="100px" class="img-responsive ">
            <span>AdminPanel</span>
          </a>
        </div>
		<br>
        <!--//logo-->
       
       
        <div class="clearfix"> </div>
      </div>
      <div class="header-right">
      <div class="profile_details_left">
  <!-- Notifications menu start -->
  <ul class="nofitications-dropdown">
    <?php
      // Get appointment notifications
      $retAppointments = mysqli_query($con, "SELECT tbluser.FirstName, tbluser.LastName, tblbook.ID as bid, tblbook.AptNumber FROM tblbook JOIN tbluser ON tbluser.ID=tblbook.UserID WHERE tblbook.Status IS NULL");
      $numAppointments = mysqli_num_rows($retAppointments);

      // Get complaint notifications
      $retComplaints = mysqli_query($con, "SELECT * FROM tblcomplaint WHERE IsRead IS NULL");
      $numComplaints = mysqli_num_rows($retComplaints);

      // Total unread notifications count
      $totalUnreadNotifications = $numAppointments + $numComplaints;
    ?>  
    <li class="dropdown head-dpdn">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-bell"></i><span class="badge blue"><?php echo $totalUnreadNotifications; ?></span>
      </a>
              
      <ul class="dropdown-menu">
        <li>
          <div class="notification_header">
            <h3>You have <?php echo $totalUnreadNotifications; ?> Notifications</h3>
          </div>
        </li>
        <li>
          <div class="notification_desc">
            <?php if ($totalUnreadNotifications > 0) {
              // Display appointment notifications
              while ($resultAppointment = mysqli_fetch_array($retAppointments)) {
            ?>
                <a class="dropdown-item" href="view-appointment.php?viewid=<?php echo $resultAppointment['bid']; ?>">New appointment received from <?php echo $resultAppointment['FirstName']; ?> <?php echo $resultAppointment['LastName']; ?> (<?php echo $resultAppointment['AptNumber']; ?>)</a>
                <hr />
            <?php
              }
              // Display complaint notifications
              while ($resultComplaint = mysqli_fetch_array($retComplaints)) {
            ?>
                <a class="dropdown-item" href="view-complaint.php?viewid=<?php echo $resultComplaint['ID']; ?>">New complaint received from <?php echo $resultComplaint['FirstName']; ?> <?php echo $resultComplaint['LastName']; ?></a>
                <hr />
            <?php
              }
            } else {
            ?>
              <a class="dropdown-item" href="#">No New Notifications</a>
            <?php } ?>
          </div>
          <div class="clearfix"></div>  
        </li>
        <li>
          <div class="notification_bottom">
            <a href="new-appointment.php">See all notifications</a>
          </div> 
        </li>
      </ul>
    </li> 
  </ul>
  <div class="clearfix"> </div>
</div>
        <!--notification menu end -->
        <div class="profile_details">  
        <?php
$adid=$_SESSION['bpmsaid'];
$ret=mysqli_query($con,"select AdminName from tbladmin where ID='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?> 
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img"> 
                  <span class="prfil-img"><img src="images/admin.png" alt="" width="50" height="50"> </span> 
                  <div class="user-name">
                    <p><?php echo $name; ?></p>
                    <span>Administrator</span>
                  </div>
                  <i class="fa fa-angle-down lnr"></i>
                  <i class="fa fa-angle-up lnr"></i>
                  <div class="clearfix"></div>  
                </div>  
              </a>
              <ul class="dropdown-menu drp-mnu">
                <li> <a href="change-password.php"><i class="fa fa-cog"></i> Settings</a> </li> 
                <li> <a href="admin-profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
                <li> <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
              </ul>
            </li>
          </ul>
          
        </div>  
        <div class="clearfix"> </div> 
      </div>
      <div class="clearfix"> </div> 
    </div>
    