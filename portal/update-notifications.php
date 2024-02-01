<?php
// Assuming $con is your database connection

// Mark appointments as read
mysqli_query($con, "UPDATE tblbook SET Status = 1 WHERE Status IS NULL");

// Mark complaints as read
mysqli_query($con, "UPDATE tblcomplaint SET IsRead = 1 WHERE IsRead IS NULL");

// Output success (you can customize the output as needed)
echo "success";
?>
