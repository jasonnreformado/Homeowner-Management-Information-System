<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <style>
        /* Your existing styles here */
        h6{
          color: black;
          b
          font:  sans-serif;
        }
        /* Media query for responsive styles */
        @media screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
            }

            .cbp-spmenu {
                position: fixed;
                width: 100%;
                height: 100%;
                background: #333; /* Adjust the background color as needed */
                z-index: 1000;
                display: none;
            }

            .cbp-spmenu a {
                color: #fff; /* Adjust the text color as needed */
            }

            .navbar-collapse {
                display: block;
                text-align: center;
            }

            .navbar-collapse a {
                display: block;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

  <div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
          <ul class="nav" id="side-menu">
            <li>
              <a href="dashboard.php"><i class="fa fa-home nav_icon"></i>Dashboard <span class=""></span></a>
            </li>
           
            <h6><b>MANAGEMENT</b></h6>
            <li>
              <a href="customer-list.php" class="chart-nav"><i class="fa fa-users nav_icon"></i>Homeowner's Member</a>
            </li>
            <li>
              <a href="officer.php"><i class="fa fa-book nav_icon"></i>Officer <span class=""></span></a>
             
              <!-- /nav-second-level -->
            </li>
            <li>
              <a href="announcement.php"><i class="fa fa-bullhorn nav_icon"></i>Announcement <span class=""></span></a>
             
              <!-- /nav-second-level -->
            </li>
          
            <li>
              <a href="all-appointment.php"><i class="fa fa-check-square-o nav_icon"></i>Appointment<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collapse">
                <li>
                  <a href="all-appointment.php">All Appointment</a>
                </li>
                <li>
                  <a href="new-appointment.php">New Appointment</a>
                </li>
                <li>
                  <a href="accepted-appointment.php">Accepted Appointment</a>
                </li>
                <li>
                  <a href="rejected-appointment.php">Rejected Appointment</a>
                </li>
              </ul>
              <!-- //nav-second-level -->
            </li>



            <li>
              <a href="monthly_record.php"><i class="fa fa-bullhorn nav_icon"></i>Account Balance <span class=""></span></a>
             
              <!-- /nav-second-level -->
            </li>
         <!-- Request Maintenance -->
         <h6><b>SECURITY</b></h6>


            <li>
              <a href="read-complaint.php"><i class="fa fa-bell-o nav_icon"></i>Incident Reports<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collapse">
                <li><a href="read-complaint.php">Read Incident</a></li>
                <li><a href="unread-complaint.php">Unread Incident</a></li>
              </ul>
            </li>


           

           
            <li>
              <a href="manage-services.php" class="chart-nav"><i class="fa fa-pencil-square-o nav_icon"></i> Categories</a>
            </li>

        
            <li>
              <a href="invoices.php"><i class="fa fa-print nav_icon"></i>Invoice<span class=""></span></a>
            </li>
            <h6><b>MAINTENANCE</b></h6>
            <li>
              <a href="bwdates-reports-ds.php"><i class="fa fa-money nav_icon"></i>Monthly Collection Report<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collapse">
                 <li><a href="bwdates-reports-ds.php"> Collection Receipt</a></li>
                    <li><a href="sales-reports.php">Monthly Collection</a></li>
              </ul>
            </li>

            <li>
              <a href="admin-profile.php"><i class="fa fa-user nav_icon"></i>Admin Profile<span class=""></span></a>
            </li>




           
           


          </ul>
          <div class="clearfix"> </div>
          <!-- //sidebar-collapse -->
        </nav>
      </div>
    </div>
    <script>
        // You may need to add JavaScript to handle the sidebar toggle functionality
        // For example, using jQuery:
        $(document).ready(function(){
           $("#menu-button").click(function(){
               $(".cbp-spmenu").slideToggle();
          });
      });
    </script>
</body>
</html>