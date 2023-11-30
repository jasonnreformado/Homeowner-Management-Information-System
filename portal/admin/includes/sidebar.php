<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <style>
        /* Your existing styles here */
        h4{
          color: black;
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
              <a href="dashboard.php"><i class="fa fa-home nav_icon"></i>Dashboard</a>
            </li>
           
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
              <a href="all-appointment.php"><i class="fa fa-check-square-o nav_icon"></i>Reservation<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collapse">
                <li>
                  <a href="all-appointment.php">All Reservation</a>
                </li>
                <li>
                  <a href="new-appointment.php">New Reservation</a>
                </li>
                <li>
                  <a href="accepted-appointment.php">Accepted Reservation</a>
                </li>
                <li>
                  <a href="rejected-appointment.php">Rejected Reservation</a>
                </li>
              </ul>
              <!-- //nav-second-level -->
            </li>
           
        
           <li>
              <a href="readenq.php"><i class="fa fa-bell-o nav_icon"></i>Complaint Report<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collapse">
                <li><a href="readenq.php">Read Complaint</a></li>
        <li><a href="unreadenq.php">Unread Complaint</a></li>
               
              </ul>
              <!-- //nav-second-level -->
            </li>
           
             

            <li>
              <a href="invoices.php"><i class="fa fa-print nav_icon"></i>Invoice<span class=""></span></a>
            </li>

           
            <li>
              <a href="manage-services.php" class="chart-nav"><i class="fa fa-pencil-square-o nav_icon"></i>Collection Categories</a>
            </li>

            <li>
              <a href="search-appointment.php" class="chart-nav"><i class="fa fa-search nav_icon"></i>Search Reservation</a>
            </li>
            <li>
              <a href="search-invoices.php" class="chart-nav"><i class="fa fa-search nav_icon"></i>Search Invoice</a>
            </li>
          
            <li>
              <a href="sales-reports.php"><i class="fa fa-money nav_icon"></i>Monthly Collection Report<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collapse">
                 <li><a href="bwdates-reports-ds.php"> B/w dates</a></li>
                   
                    <li><a href="sales-reports.php">Sales Reports</a></li>
              </ul>
              <!-- //nav-second-level -->
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