<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <title>Login</title>
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
                                <input type="text" class="input" name="username" placeholder="Username" required="true">
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" name="password" placeholder="Password" required="true">
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
</body>

</html>
