<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if (strlen($_SESSION['bpmsuid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['send'])) {
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'jasonreformado46@gmail.com';
        $mail->Password = 'rybq fvly ipue kvlg    ';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->isHTML(true);

        // Fetch email addresses from the user table
        $query = "SELECT email FROM tbluser";
        $result = mysqli_query($con, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $mail->addAddress($row['email']);
            }
            $mail->Subject = $subject;
            $mail->Body = $message;

            try {
                $mail->send();
                header("Location: customer-list.php?email_sent=true");
                exit();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error in SQL query: " . mysqli_error($con);
        }
    }
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/allencasul/lonica@d9dbccfa5b0a4666760e4f72b28effa775c56857/css/cdn/lonica.css"
          integrity="sha256-E1S8yAbnRZ6uM4sA6NMSgTyoDsdK1ZCjBYF3lqXqv6Q=" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1e8d61f212.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }

        h2 {
            text-align: center;
        }

        .center-absolute {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            max-width: 900px;
            margin: auto;
            padding: 100px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        form:hover {
            transform: scale(1.02);
        }

        textarea, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #3498db;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease-in-out;
        }

        textarea:focus {
            border-color: #007bff;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="center-absolute">

<form class="display-grid row-gap-1-rem" method="post">
    <h2>Email</h2>
    <textarea class="box-shadow-primary" name="subject" placeholder="Subject" required></textarea>
    <textarea class="box-shadow-primary" name="message" placeholder="Message..." required></textarea>
    <button type="submit" name="send">
        Send <i class="fa-solid fa-paper-plane color-white margin-left-1-rem"></i>
    </button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Your desired text to be automatically inputted
        var automaticText = "Good day, We would like to remind you to pay your monthly due through Gcash or etc.";

        // Find the textarea element by class and name
        var textarea = document.querySelector('textarea.box-shadow-primary[name="message"]');

        // Set the value of the textarea to your desired text
        textarea.value = automaticText;
    });
</script>
</body>
</html>
<?php   ?>
