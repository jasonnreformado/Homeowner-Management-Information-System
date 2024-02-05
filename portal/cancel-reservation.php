<?php
session_start();
include('includes/dbconnection.php');

if (isset($_GET['aptnumber'])) {
    $aptnumber = $_GET['aptnumber'];

    // Perform cancellation logic (Update the status or delete the reservation record)
    $updateQuery = mysqli_query($con, "UPDATE tblbook SET Status='Cancelled' WHERE AptNumber='$aptnumber'");

    if ($updateQuery) {
        // Display a success message using JavaScript alert
        echo "<script>alert('Reservation successfully canceled.'); window.location='booking-history.php';</script>";
        exit;
    } else {
        // Handle cancellation failure (e.g., display an error message)
        echo "Cancellation failed. Please try again.";
    }
} else {
    // Handle invalid or missing reservation number
    echo "Invalid or missing reservation number.";
}
?>
