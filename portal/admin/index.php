<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofNl3KVgsfNHDGjaaH9x1BQn5uqF04hj0"
        crossorigin="anonymous">
		<link href="css/font-awesome.css" rel="stylesheet"> 
    <title>Login</title>
    <style>
        .show-password {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-- Image -->
                </div>

                <div class="col-md-6 right">
                    <div class="input-box">
                        <header>Sign In</header>
                        <form role="form" method="post" action="">
                            <p style="font-size: 16px; color: red" align="center">
                                <?php
                                session_start();
                                error_reporting(0);
                                include('includes/dbconnection.php');

                                if (isset($_POST['login'])) {
                                    $adminuser = $_POST['username'];
                                    $password = md5($_POST['password']);
                                    $query = mysqli_query($con, "select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
                                    $ret = mysqli_fetch_array($query);
                                    if ($ret > 0) {
                                        $_SESSION['bpmsaid'] = $ret['ID'];
                                        header('location:dashboard.php');
                                    } else {
                                        $msg = "Invalid Details.";
                                    }
                                }
                                echo $msg;
                                ?>
                            </p>
                            <div class="input-field">
                                <input type="text" class="input" name="username" placeholder="username" required="true">
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" name="password" id="password" placeholder="password"
                                    required="true">
                                <span class="show-password" onclick="togglePasswordVisibility()">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" name="login" value="Sign In">
                            </div>
                        </form>
                        <div class="signin">
                            <span>Forget your password? <a href="forgot-password.php">Click Here!</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha384-dGYYzX3SQU07CULzg5D9Q1bdKkcpWAqex1Q7BFFaJxm2auIs9X+qDShkgtWEmnh2"
        crossorigin="anonymous"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</body>

</html>
