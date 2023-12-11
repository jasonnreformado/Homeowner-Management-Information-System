<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <style>
        /* Your existing styles here */

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

           <!-- Profiles -->
            <li>
              <a href="user-dashboard.php"><i class="fa fa-home nav_icon"></i> Profile</a>
            </li>

             <!-- Announcement -->
            <li>
              <a href="announcement.php" class="chart-nav"><i class="fa fa-bullhorn nav_icon"></i>Announcement</a>
            </li>
            
           <!-- Reservation  -->
              <li>
              <a href="book-appointment.php"><i class="fa fa-check-square-o nav_icon"></i>Appointment<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collapse">
                <li>
                  <a href="book-appointment.php">Book Appointment</a>
                </li>
                <li>
                  <a href="appointment-detail.php">Appointment Details</a>
                </li>
                <li>
                  <a href="booking-history.php">Appointment History</a>
                </li>
              </ul>
            </li>
           
        <!-- complaint -->
          

            <li>
              <a href="complaint.php"><i class="fa fa-envelope-o nav_icon"></i>Incident Letter<span class=""></span></a>
            </li>
          
            <!-- Monthly Dues -->
              <li>
              <a href="#"><i class="fa fa-money nav_icon"></i>Monthly Dues<span></span></a>
              </li>

              <li>
              <a href="receipt.php"><i class="fa fa-money nav_icon"></i>Payment Receipt<span></span></a>
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