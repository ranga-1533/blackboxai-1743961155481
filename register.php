<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate inputs
    if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($confirmPassword)) {
        $_SESSION['error'] = 'Please fill in all fields';
        header('Location: register.html');
        exit();
    }

    if ($password !== $confirmPassword) {
        $_SESSION['error'] = 'Passwords do not match';
        header('Location: register.html');
        exit();
    }

    try {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $_SESSION['error'] = 'Email already registered';
            header('Location: register.html');
            exit();
        }

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $stmt = $pdo->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $hashedPassword]);

        $_SESSION['success'] = 'Registration successful! Please login';
        header('Location: login.html');
        exit();

    } catch (PDOException $e) {
        $_SESSION['error'] = 'Database error: ' . $e->getMessage();
        header('Location: register.html');
        exit();
    }
} else {
    header('Location: register.html');
    exit();
}
?>