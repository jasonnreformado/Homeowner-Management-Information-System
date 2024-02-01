<div class="sticky-header header-section ">
      <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <!--logo -->
        <div class="logo">
          <a href="#">
            <img src="assets/images/logo.png" width="100px" class="img-responsive ">
            <span>UserPanel</span>
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
        // Get approved appointments notifications
        $retApprovedAppointments = mysqli_query($con, "SELECT tbluser.FirstName, tbluser.LastName, tblbook.ID as bid, tblbook.AptNumber FROM tblbook JOIN tbluser ON tbluser.ID=tblbook.UserID WHERE tblbook.Status = 'Approved'");
        $numApprovedAppointments = mysqli_num_rows($retApprovedAppointments);

        // Get rejected appointments notifications
        $retRejectedAppointments = mysqli_query($con, "SELECT tbluser.FirstName, tbluser.LastName, tblbook.ID as bid, tblbook.AptNumber FROM tblbook JOIN tbluser ON tbluser.ID=tblbook.UserID WHERE tblbook.Status = 'Rejected'");
        $numRejectedAppointments = mysqli_num_rows($retRejectedAppointments);

        // Total unread notifications count
        $totalUnreadNotifications = $numApprovedAppointments + $numRejectedAppointments;
?>
    
            <li class="dropdown head-dpdn">
            <a href="#" id="bellButton" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
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
                                // Display approved appointments notifications
                                while ($resultApprovedAppointment = mysqli_fetch_array($retApprovedAppointments)) {
                                    ?>
                                    <a class="dropdown-item" href="booking-history.php?viewid=<?php echo $resultApprovedAppointment['bid']; ?>">Your appointment has been approved: <?php echo $resultApprovedAppointment['FirstName']; ?> <?php echo $resultApprovedAppointment['LastName']; ?> (<?php echo $resultApprovedAppointment['AptNumber']; ?>)</a>
                                    <hr />
                                <?php
                                }

                                // Display rejected appointments notifications
                                while ($resultRejectedAppointment = mysqli_fetch_array($retRejectedAppointments)) {
                                    ?>
                                    <a class="dropdown-item" href="booking-history.php?viewid=<?php echo $resultRejectedAppointment['bid']; ?>">Your appointment has been rejected: <?php echo $resultRejectedAppointment['FirstName']; ?> <?php echo $resultRejectedAppointment['LastName']; ?> (<?php echo $resultRejectedAppointment['AptNumber']; ?>)</a>
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
                            <a href="#">See all notifications</a>
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
 $ret = mysqli_query($con, "SELECT * FROM tbluser WHERE ID='$uid'");
 $cnt = 1;
 if ($row = mysqli_fetch_assoc($ret)) {
  $firstname = $row['FirstName'];
 }
?> 
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img"> 
                <span class="prfil-img">
                <img id="profile-picture-preview" src="<?php echo $profilePicture; ?>" alt="Profile Picture Preview" style="max-width: 50px; max-height: 50px;">
                </span>

                  <div class="user-name">
                    <p><?php echo $firstname; ?></p>
                    <span>Resident</span>
                  </div>
                  <i class="fa fa-angle-down lnr"></i>
                  <i class="fa fa-angle-up lnr"></i>
                  <div class="clearfix"></div>  
                </div>  
              </a>
              <ul class="dropdown-menu drp-mnu">
                <li> <a href="change-password.php"><i class="fa fa-cog"></i> Settings</a> </li> 
                <li> <a href="user-dashboard.php"><i class="fa fa-user"></i> Profile</a> </li> 
                <li> <a href="login.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
              </ul>
            </li>
          </ul>
        </div>  
        <div class="clearfix"> </div> 
      </div>
      <div class="clearfix"> </div> 
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <!-- Add this script after including jQuery -->
<script>
  $(document).ready(function () {
    $("#bellButton").click(function () {
      $.ajax({
        type: "POST",
        url: "update-notifications.php",
        success: function (data) {
          // Update the notification count on success
          $("#bellButton .badge").text("0");
        },
        error: function (xhr, status, error) {
          console.error("Error updating notifications: " + error);
        }
      });
    });
  });
</script>
