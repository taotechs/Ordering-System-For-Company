<?php
session_start(); // Start session here
?>
<?php
include("connection.php");
if (isset($_POST['login'])) {
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $check_user = "SELECT * FROM user WHERE user_email='$user_email' AND user_password='$user_password'";
    $run = mysqli_query($dbcon, $check_user);

    if (mysqli_num_rows($run) > 0) {
        $_SESSION['email'] = $user_email;

        // Set the username value
        $user_data = mysqli_fetch_assoc($run);
        $_SESSION['username'] = $user_data['user_name'];

        echo "<script>window.open('member_page.php', '_self')</script>";
        exit; // Add this line to stop executing further code
    } else {
        echo "<script>alert('Kindly Check Your Login Credentials')</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<style>
    .cl_white {
        color: rgb(255, 255, 255);
    }

    section {
        width: 100vw;
        height: 100vh;
        padding: 50px;
    }
</style>
<!-- Body STARTS from here -->
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">UserPage</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.html">Home</a></li>
                <li><a href="register.php">Register</a></li>
                <li class="active"><a href="login.php">Login</a></li>
                <li><a href="member_page.php">Customer's Section</a></li>
            </ul>
        </div>
    </nav>
    <!-- Section Goes Here -->
    <section id="home" style="background: url(images/bd.jpg); background-size: 100% 100%" class="cl_white text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-3"> </div>
                <div class="col-md-6">
                    <div class="page-header">
                        <h3>Login</h3>
                    </div>
                    <form role="form" action="login.php" method="post" class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            Your email:
                            <input class="form-control" name="email" placeholder="Email Please" type="email" required />
                        </div>
                        <div class="form-group">
                            Password:
                            <input class="form-control" name="password" type="password" required />
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success display-block" name="login" value="login" type="submit" />
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>

    <footer class="navbar navbar-default navbar-fixed-button">
        <div class="container">
            <p class="text-center" style="padding: 12px">
                Copyright - Reserved Happyo inc. 2023
            </p>
        </div>
    </footer>
</body>
</html>




