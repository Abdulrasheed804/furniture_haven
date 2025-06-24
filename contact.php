<?php
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "contact_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (name, email, subject, message)
            VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        $success = "Your message has been sent successfully!";
    } else {
        $success = "Error: " . $conn->error;
    }

    $conn->close();
}
?>