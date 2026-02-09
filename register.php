<?php
// Path to store user data
$file = 'users.json';

// Get POST data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$section = trim($_POST['section'] ?? '');

// Simple validation
if (!$name || !$email || !$password || !$section) {
    die("Please fill all fields.");
}

// Hash password for security
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Load existing users
$users = [];
if (file_exists($file)) {
    $json = file_get_contents($file);
    $users = json_decode($json, true) ?? [];
}

// Check if email already exists
foreach ($users as $user) {
    if ($user['email'] === $email) {
        die("This email is already registered. <a href='register.html'>Go back</a>");
    }
}

// Add new user
$users[] = [
    'name' => $name,
    'email' => $email,
    'password' => $hashedPassword,
    'section' => $section
];

// Save back to JSON file
file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));

// Redirect to login page
header("Location: login.html");
exit;
?>
