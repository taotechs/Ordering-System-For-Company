<?php
// Create a connection
include("connect-db.php"); //connnection started

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $complaints = htmlspecialchars($_POST["complaints"]);

    if ($name == '' || $complaints == '') {
        $server = "Error: please enter a value";
    } else {
        $stmt = $pdo->prepare("INSERT INTO complaints (name, email, phone, complaints) VALUES (?, ?, ?, ?)");

        try {
            $stmt->execute([$name, $email, $phone, $complaints]);
            echo "<script>alert('Order Successfully received')</script>";
        } catch (PDOException $e) {
            echo "Error inserting data: " . $e->getMessage();
        }
    }
} 
    ?>