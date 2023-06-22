<?php
session_start();
if (!$_SESSION['email']) {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Customers Section</title>
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
            <div class="container">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">Home</a></li>
                    <a class="btn btn-danger active navbar-btn" href="./logout.php" target="_self"
                        role="button">Logout</a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Section Goes Here -->
    <section id="home" style="background: url(images/bd.jpg); background-size: 100% 100%;" class="cl_white text-center">
        <h1>Customer's Section</h1>
        <p> Welcome
            <?php
            if (isset($_SESSION["username"])) {
                echo $_SESSION["username"];
            }
            ?>
        </p>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="page-header">
                        <h4> Request </h4>
                    </div>
                    <form class="col-md-8 col-md-offset-2" role="form" action="" method="post">
                        <div class="form-group"> Username:
                            <input class="form-control" type="text" id="username" name="username">
                        </div>
                        <div class="form-group"> Quality:
                            <input class="form-control" type="number" id="quality" name="quality">
                        </div>
                        <div class="form-group"> Quantity:
                            <input class="form-control" type="number" id="quantity" name="quantity">
                        </div>
                        <div class="form-group"> Arival Date:
                            <input class="form-control" type="date" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success btn-block" name="submit" type="submit">
                        </div>
                    </form>
                    <!-- End of the first form -->
                </div>
                <div class="col-md-6">
                    <div class="page-header">
                        <h4>Complaints</h4>
                    </div>
                    <!-- Begining of the second form -->
                    <form class="col-md-8 col-md-offset-2" role="form" action="complaints.php" method="post">
                        <div class="form-group"> name:
                            <input class="form-control" type="text" id="name" name="name">
                        </div>
                        <div class="form-group"> email:
                            <input class="form-control" type="email" id="email" name="email">
                        </div>
                        <div class="form-group"> phone nummber:
                            <input class="form-control" type="number" id="phone" name="phone">
                        </div>
                        <div class="form-group"> Complaints:
                            <textarea class="form-control" id="complaints" name="complaints"></textarea>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success btn-block" type="submit" id="submit" name="submit">
                        </div>
                    </form>
                </div>
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
<?php
// Create a connection
include("connect-db.php");

if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST["username"]);
    $quality = htmlspecialchars($_POST["quality"]);
    $quantity = htmlspecialchars($_POST["quantity"]);
    $date = htmlspecialchars($_POST["date"]);

    if ($username == '' || $date == '') {
        $server = "Error: please enter a value";
    } else {
        $stmt = $pdo->prepare("INSERT INTO orders (username, quality, quantity, date) VALUES (?, ?, ?, ?)");

        try {
            $stmt->execute([$username, $quality, $quantity, $date]);
            echo "<script>alert('Order Successfully received')</script>";
        } catch (PDOException $e) {
            echo "Error inserting data: " . $e->getMessage();
        }
    }
    // } else {
//     renderForm('', '', '');
// 
}
?>