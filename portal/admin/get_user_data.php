<?php
include('includes/dbconnection.php');

if (isset($_GET['month'])) {
    $selectedMonth = mysqli_real_escape_string($con, $_GET['month']);
    $uid = $_SESSION['bpmsuid'];

    $query = "SELECT total_fee, total_paid, balance FROM tbluser WHERE ID='$uid' AND monthly='$selectedMonth'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $data = array(
            'total_fee' => $row['total_fee'],
            'total_paid' => $row['total_paid'],
            'balance' => $row['balance']
        );

        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'Database error'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request'));
}
?>
