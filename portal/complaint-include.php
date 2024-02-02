<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $time=$_POST['time'];

    $uploadDir = "admin/uploads/";  // Specify the directory where you want to save uploaded files

    // Check if the 'proof' file input is set and if there is no error during file upload
    if (isset($_FILES['proof']) && $_FILES['proof']['error'] == UPLOAD_ERR_OK) {
        $proofTmp = $_FILES['proof']['tmp_name'];
        $proofFile = $uploadDir . basename($_FILES['proof']['name']);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($proofTmp, $proofFile)) {
            $query = mysqli_query($con, "INSERT INTO tblcomplaint (FirstName, LastName, Phone, Email, address, subject, time, Message, proof) VALUES ('$fname', '$lname', '$phone', '$email', '$address', '$subject', '$time', '$message', '$proofFile')");

            if ($query) {
                echo "<script>alert('Your message was sent successfully!');</script>";
                echo "<script>window.location.href ='complaint.php'</script>";
            } else {
                echo '<script>alert("Something Went Wrong. Please try again")</script>';
            }
          } else {
            echo '<script>alert("Failed to move the uploaded file. Please try again. ' . $_FILES['proof']['error'] . '")</script>';
        }
    } else {
        echo '<script>alert("Error uploading the file. Please try again.")</script>';
    }
}
     
  
?>
<!doctype html>
<html lang="en">
  <head>
    <style>
      /* Add your existing styles here */

.w3l-contact-info-main {
    padding: 100px 0;
    background-color: #f8f8f8;
}

.container {
    max-width: 800px;
    margin: 0 auto;
}

.text-center {
    margin-bottom: 30px;
}

.twice-two {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
}

.form-control {
    width: 48%; /* Adjust as needed */
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

textarea {
    width: 100%;
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.btn-contact {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-contact:hover {
    background-color: #0056b3;
}

/* Add more styles as needed */

/* Media query for responsiveness */
@media (max-width: 768px) {
    .twice-two {
        flex-direction: column;
    }

    .form-control {
        width: 100%;
    }
}
</style>
 
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    </head>
    <body id="home">

<script src="assets/js/jquery-3.3.1.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script>


<h3 class="title1">Incident Letter</h3>
<section class="w3l-contact-info-main" id="contact">
    <div class="container">
       
        <br><br>
        <div class="d-grid contact-view">
            <?php /* Add your PHP code here if needed */ ?>
        </div>
        <div class="map-content-9 mt-lg-0 mt-4">
        <form method="post" enctype="multipart/form-data">
                <?php
                $uid = $_SESSION['bpmsuid'];
                $ret = mysqli_query($con, "select * from tbluser where ID='$uid'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <div class="twice-two">
                        <input type="text" class="form-control" name="fname" value="<?php echo $row['FirstName']; ?>"  id="fname" placeholder="First Name" readonly="">
                        <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $row['LastName']; ?>" placeholder="Last Name" readonly="">
                    </div>
                  
                    <div class="twice-two">
                        <input type="text" class="form-control" placeholder="Phone" readonly="" name="phone" value="<?php echo $row['MobileNumber']; ?>" pattern="[0-9]+" maxlength="10">
                        <input type="text" class="form-control" name="email" value="<?php echo $row['Email']; ?>" readonly="true">
                    </div>
                    <div class="twice-two">
                        <input type="text" class="form-control" name="address" id="address" placeholder="Location" required="">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="What kind of incident" required="">
                    </div>
                    <div class="twice-two">
                        <input type="file" class="form-control" name="proof" id="proof" accept="image/*,application/pdf" required="">
                        <input type="time" class="form-control" name="time" id="time" placeholder="Time" required="">
                    </div>
                    <textarea class="form-control" id="message" name="message" placeholder="Description of Incident" required=""></textarea>
                <?php } ?>
                <button type="submit" class="btn btn-contact" name="submit">Send Message</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>