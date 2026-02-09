<?php
include "db.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user["password"])) {
  $_SESSION["user_id"] = $user["id"];
  echo "success";
} else {
  echo "error";
}
