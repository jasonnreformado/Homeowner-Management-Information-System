<?php
// get_monthly_data.php

include('includes/dbconnection.php');

if (isset($_GET['month'])) {
    $uid = $_SESSION['bpmsuid'];
    $selectedMonth = mysqli_real_escape_string($con, $_GET['month']);

    $fetchQuery = "SELECT total_fee, total_paid, balance, paid FROM tbluser WHERE ID='$uid' AND monthly='$selectedMonth'";
    $fetchResult = mysqli_query($con, $fetchQuery);

    if ($fetchResult) {
        $data = mysqli_fetch_assoc($fetchResult);
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Failed to fetch data']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
