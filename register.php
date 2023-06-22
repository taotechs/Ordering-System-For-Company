<!DOCTYPE html>
<html>

<head>
    <title>Register Page</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
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
                <li class="active"><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
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
                        <h3>Register</h3>
                    </div>
                    <form class="col-md-8 col-md-offset-2" role="form" method="post" action="./registeration.php">
                        <div class="form-group">Name:
                            <input class="form-control" placeholder="Full Name Pls" name="name" type="text" />
                        </div>
                        <div class="form-group">
                            Your uesrname :
                            <input class="form-control" placeholder="username Pls" name="username" type="text" />
                        </div>
                        <div class="form-group">
                            Your email :
                            <input class="form-control" placeholder="email Pls" name="email" type="email" />
                        </div>
                        <div class="form-group">
                            password:
                            <input class="form-control" name ="password" type="password" />
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success display-block" value="Register " name="register" type="submit" />
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