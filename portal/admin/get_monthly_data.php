<?php
include('includes/dbconnection.php');

if(isset($_POST['selectedMonth'])) {
    $uid = $_SESSION['bpmsuid'];
    $selectedMonth = mysqli_real_escape_string($con, $_POST['selectedMonth']);

    $query = "SELECT total_fee, total_paid, balance FROM tbluser WHERE ID='$uid' AND monthly='$selectedMonth'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Failed to fetch data']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
