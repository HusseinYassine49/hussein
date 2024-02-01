<?php
session_start();
require_once 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'"; // Modified query
    $stmt = $conn->prepare($query);
    // $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: dashboard.php");
        } else {
            header("Location: boarder.php");
        }
    } else {
        $_SESSION['message'] = 'Username or password is incorrect.';
        header("Location: index.php");
    }
}
